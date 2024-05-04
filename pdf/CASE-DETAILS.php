<?php
  require('../fpdf/fpdf.php');

  $pageWidth = 670; // Example: A4 width is 210mm
  $pdf = new FPDF('L', 'mm', array($pageWidth, 297)); // 'L' for landscape orientation
  // Custom page width (adjust as needed)
  $number=0;
 
  $pdf->AddPage();
  $customHeaderNames = array(
    $number++ => '#',
    'u_name' => 'ATTORNEY NAMES',
    'u_firstname' => 'CLIENT FIRST NAME',
    'u_lastname' => 'CLIENT LAST NAME	',
    'u_email' => 'EMAIL',
    'u_phonenumber' => 'PHONENUMBER',
    'u_nid' => 'ID NUMBER',
    'u_residence' => 'RESIDENCE',
    'u_nationality' => 'NATIONALITY',
    'u_casedetails' => 'CASE DETAILS',
    'u_date' => 'DATE',
    // Add more as needed
);

$con=mysqli_connect('localhost','root','','law');
$sql=mysqli_query($con,"SELECT `user`.u_name,`cases`.u_firstname,`cases`.u_lastname,`cases`.u_email,`cases`.u_phonenumber,`cases`.u_nid,`cases`.u_residence,`cases`.u_nationality,`cases`.u_casedetails,`cases`.u_date FROM `cases` INNER JOIN `user` ON `cases`.user_id = `user`.`id`; ");
$tableName = "CASES REPORT";

// Set font
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, '' . $tableName);

if ($sql->num_rows > 0) {
  // Display table headers
  $pdf->Ln(10); // Add a new line with spacing
  $pdf->SetFont('Arial', 'B', 12);
while ($fieldInfo = $sql->fetch_field()) {
  $header[] = $fieldInfo->name;
  // Adjust the width of the cell based on the column name
  $customName = isset($customHeaderNames[$fieldInfo->name]) ? $customHeaderNames[$fieldInfo->name] : $fieldInfo->name;
  $cellWidth = ($fieldInfo->name == 'u_toolname') ? 60 : 60;
  $pdf->Cell($cellWidth, 10, $customName, 1);
}
$pdf->Ln(); // Add extra spacing between headers and data

while ($row = $sql->fetch_assoc()) {
  foreach ($header as $col) {
      // Adjust the width of the cell based on the column name
      $cellWidth = ($col == 'u_toolname') ? 60 : 60;
      $pdf->Cell($cellWidth, 10, $row[$col], 1);
  }
  $pdf->Ln(); // Move to the next line for the next row
}
  $pdf->Output();
}
?>