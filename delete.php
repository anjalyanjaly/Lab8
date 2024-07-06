<?php
require_once './includes/header.php';
require_once './db/conn.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure the ID is an integer

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "DELETE FROM client_info WHERE client_id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);

    // Execute the statement and check for success
    if (mysqli_stmt_execute($stmt)) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record: " . mysqli_stmt_error($stmt);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Invalid ID";
    echo "<a href='delete.php?id=" . $row['client_id'] . "' class='btn btn-danger'>Delete</a><br>";
}

// Close the connection
mysqli_close($conn);
require_once './includes/footer.php';
?>
