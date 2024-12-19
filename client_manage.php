<?php
include("linknice.php");
include("headernice.php");
include("sidebarnice.php");
include("conn.php"); // Include the database connection

// Fetch clients from the database
$result = $conn->query("SELECT * FROM clients");
?>

<p><h2><b>CLIENT MANAGE INFORMATION</b></h2></p>

<!-- Buttons for exporting data -->
<div>
    <a href="export_word.php" class="btn btn-success">Export to Word</a>
    <a href="export_pdf.php" class="btn btn-success">Export to PDF</a>
</div>

<!-- Table with stripped rows -->
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Loan Amount</th>
            <th scope="col">Interest Rate</th>
            <th scope="col">Loan Duration</th>
            <th scope="col">Collateral</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<th scope='row'>" . $row['id'] . "</th>"; // Assuming 'id' is the primary key
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                echo "<td>" . htmlspecialchars($row['loan_amount']) . "</td>";
                echo "<td>" . htmlspecialchars($row['interest_rate']) . "</td>";
                echo "<td>" . htmlspecialchars($row['loan_duration']) . "</td>";
                echo "<td>" . htmlspecialchars($row['collateral']) . "</td>";
                echo "<td>
                        <a href='view_client.php?id=" . $row['id'] . "' class='btn btn-info'>View</a>
                        <a href='edit_client.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                        <a href='delete_client.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this client?\");'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No clients found.</td></tr>";
        }
        ?>
    </tbody>
</table>
<!-- End Table with stripped rows -->
</div>
</div>
</div>

<?php
// Close the connection
$conn->close();
?>

<?php
include("footernice.php");
?>