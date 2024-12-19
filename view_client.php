<?php
include("linknice.php");
include("headernice.php");
include("sidebarnice.php");
include("conn.php"); // Include the database connection

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $client_id = intval($_GET['id']); // Get the client ID from the URL and convert it to an integer

    // Fetch the client information from the database
    $stmt = $conn->prepare("SELECT * FROM clients WHERE id = ?");
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the client exists
    if ($result->num_rows > 0) {
        $client = $result->fetch_assoc(); // Fetch the client data
    } else {
        echo "<p>Client not found.</p>";
        exit; // Exit if no client is found
    }
} else {
    echo "<p>Invalid request.</p>";
    exit; // Exit if 'id' is not set
}
?>

<div class="container">
    <h2>Client Information</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?php echo htmlspecialchars($client['id']); ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?php echo htmlspecialchars($client['name']); ?></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><?php echo htmlspecialchars($client['phone']); ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo htmlspecialchars($client['address']); ?></td>
        </tr>
        <tr>
            <th>Loan Amount</th>
            <td><?php echo htmlspecialchars($client['loan_amount']); ?></td>
        </tr>
        <tr>
            <th>Interest Rate</th>
            <td><?php echo htmlspecialchars($client['interest_rate']); ?></td>
        </tr>
        <tr>
            <th>Loan Duration</th>
            <td><?php echo htmlspecialchars($client['loan_duration']); ?></td>
        </tr>
        <tr>
            <th>Collateral</th>
            <td><?php echo htmlspecialchars($client['collateral']); ?></td>
        </tr>
    </table>
    <a href="edit_client.php?id=<?php echo $client['id']; ?>" class="btn btn-warning">Edit</a>
    <a href="delete_client.php?id=<?php echo $client['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client?');">Delete</a>
    <a href="client_manage.php" class="btn btn-secondary">Back to Clients List</a>
</div>

<?php
// Close the connection
$conn->close();
include("footernice.php");
?>