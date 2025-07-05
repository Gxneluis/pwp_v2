<?php
// require_once('Tcpdf.php');

$pdf = new TCPDF();

$pdf->AddPage();

$pdf->SetFont('times', '', 12);

$pdf->Write(0, 'Hello, world!');

// Attach file to PDF
// $pdf->AddAttachment('../uploads/attachment/OPWP_1449.pdf', 'OPWP_1449.pdf');

// Output PDF
$pdf->Output('example.pdf', 'D');
?>