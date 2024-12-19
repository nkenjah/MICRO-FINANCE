<?php
require 'vendor/autoload.php'; // Include Composer's autoloader
include("conn.php"); // Include the database connection

// Fetch clients from the database
$result = $conn->query("SELECT * FROM clients");

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();
$section->addTitle('Client Information', 1);

// Add table
$table = $section->addTable();
$table->addRow();
$table->addCell(2000)->addText('#');
$table->addCell(2000)->addText('Name');
$table->addCell(2000)->addText('Phone');
$table->addCell(2000)->addText('Address');
$table->addCell(2000)->addText(' Loan Amount');
$table->addCell(2000)->addText('Interest Rate');
$table->addCell(2000)->addText('Loan Duration');
$table->addCell(2000)->addText('Collateral');

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $table->addRow();
        $table->addCell(2000)->addText($row['id']);
        $table->addCell(2000)->addText($row['name']);
        $table->addCell(2000)->addText($row['phone']);
        $table->addCell(2000)->addText($row['address']);
        $table->addCell(2000)->addText($row['loan_amount']);
        $table->addCell(2000)->addText($row['interest_rate']);
        $table->addCell(2000)->addText($row['loan_duration']);
        $table->addCell(2000)->addText($row['collateral']);
    }
} else {
    $section->addText('No clients found.');
}

// Save the document
$fileName = 'Client_Information.docx';
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('Cache-Control: max-age=0');
$phpWord->save('php://output');
exit;
?>