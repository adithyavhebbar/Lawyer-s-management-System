<?php
require_once('../FPDF/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World !',1);
?>

echo '<a href="lawyerwelcome.php">Click here</a>';
