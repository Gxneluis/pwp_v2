<?php
require('attachment.php');

$sAttachment = $_POST['attachment'];
$pdf = new PDF_Attachment();
$pdf->Attach($sAttachment);
$pdf->OpenAttachmentPane();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->Write(5,'This PDF contains an attached file.');
$pdf->Output();
?>