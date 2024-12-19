<?php
include("conn.php"); // Include the database connection

if (isset($_GET['id'])) {
    $clientId = intval($_GET['id']); // Get the client ID from the URL and convert it to an integer

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM clients WHERE id = ?");
    $stmt->bind_param("i", $clientId); // Bind the parameter

    if ($stmt->execute()) {
        // Redirect to the client management page with a success message
        header("Location: client_management.php?message=Client deleted successfully");
        exit();
    } else {
        // Redirect to the client management page with an error message
        header("Location: client_management.php?message=Error deleting client");
        exit();
    }

    $stmt->close();
} else {
    // Redirect to the client management page if no ID is provided
    header("Location: client_management.php?message=No client ID provided");
    exit();
}

$conn->close();
?>