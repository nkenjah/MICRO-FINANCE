<?php
// Include database connection file
include("conn.php");

$message = "";
$type = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $loan_amount = trim($_POST['loan_amount']);
    $interest_rate = trim($_POST['interest_rate']);
    $loan_duration = trim($_POST['loan_duration']);
    $collateral = trim($_POST['collateral']);
    $created_by = trim($_POST['created_by']);

    // Validate input
    if (empty($name) || empty($phone) || empty($address) || empty($loan_amount) || empty($interest_rate) || empty($loan_duration)) {
        $message = "All fields are required.";
        $type = "danger";
        header("Location: add_client.php?message=" . urlencode($message) . "&type=" . urlencode($type));
        exit;
    }

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO clients (name, phone, address, loan_amount, interest_rate, loan_duration, collateral, created_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdidii", $name, $phone, $address, $loan_amount, $interest_rate, $loan_duration, $collateral, $created_by);

    // Execute the statement
    if ($stmt->execute()) {
        $message = "Client added successfully!";
        $type = "success";
        header("Location: add_client.php?message=" . urlencode($message) . "&type=" . urlencode($type));
        exit;
    } else {
        $message = "Error: " . $stmt->error;
        $type = "danger";
        header("Location: add_client.php?message=" . urlencode($message) . "&type=" . urlencode($type));
        exit;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>