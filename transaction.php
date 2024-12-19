<?php
include("conn.php"); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set in the POST request
    if (!isset($_POST['client_id'], $_POST['type'], $_POST['amount'], $_POST['staff_id'])) {
        echo "All fields are required.";
        exit;
    }

    // Get the form data
    $client_id = $_POST['client_id'];
    $type = $_POST['type']; // 'loan' or 'repayment'
    $amount = $_POST['amount'];
    $staff_id = $_POST['staff_id'];
    $status = 'pending'; // Default status

    // Validate the input
    if (empty($client_id) || empty($type) || empty($amount) || empty($staff_id)) {
        echo "All fields are required.";
        exit;
    }

    // Validate amount
    if (!is_numeric($amount) || $amount <= 0) {
        echo "Amount must be a positive number.";
        exit;
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO transactions (client_id, type, amount, staff_id, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isdss", $client_id, $type, $amount, $staff_id, $status);

    // Execute the statement
    if ($stmt->execute()) {
        // Update the client's balance based on the transaction type
        if ($type === 'loan') {
            // Increase the client's balance
            $update_stmt = $conn->prepare("UPDATE clients SET balance = balance + ? WHERE id = ?");
            $update_stmt->bind_param("di", $amount, $client_id);
        } elseif ($type === 'repayment') {
            // Decrease the client's balance
            $update_stmt = $conn->prepare("UPDATE clients SET balance = balance - ? WHERE id = ?");
            $update_stmt->bind_param("di", $amount, $client_id);
        }

        // Execute the update statement
        if (isset($update_stmt)) {
            if ($update_stmt->execute()) {
                $message = "Transaction recorded and client's balance updated successfully.";
            } else {
                $message = "Transaction recorded, but error updating client's balance: " . $update_stmt->error;
            }
            $update_stmt->close();
        }
    } else {
        $message = "Error recording transaction: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

   // Fetch the transaction details for display
$transaction_id = $conn->insert_id; // Get the last inserted transaction ID
$transaction_result = $conn->query("SELECT * FROM transactions WHERE id = $transaction_id");

if ($transaction_result && $transaction_result->num_rows > 0) {
    $transaction = $transaction_result->fetch_assoc();

    // Display the transaction in a table
    echo "<h2>Transaction Details</h2>";
    echo "<table border='1'>
            <tr>
                <th>Transaction ID</th>
                <th>Client ID</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Staff ID</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>{$transaction['id']}</td>
                <td>{$transaction['client_id']}</td>
                <td>{$transaction['type']}</td>
                <td>{$transaction['amount']}</td>
                <td>{$transaction['staff_id']}</td>
                <td>{$transaction['status']}</td>
            </tr>
          </table>";
} else {
    echo "Error fetching transaction details: " . $conn->error;
}
}