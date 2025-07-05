<?php
// create a new PDF document
$pdf = new PDFlib();

// open the document
$pdf->begin_document("output.pdf");

// open a page
$pdf->begin_page_ext(0, 0, "width=595 height=842");

// open the external PDF document
$doc = $pdf->open_pdi_document("OPWP_1449.pdf", "");
$page = $pdf->open_pdi_page($doc, 1, "");

// place the first page of the external PDF on the current page
$pdf->fit_pdi_page($page, 0, 0, "scale=0.5");

// close the external PDF document
$pdf->close_pdi_page($page);
$pdf->close_pdi_document($doc);

// end the page and document
$pdf->end_page_ext("");
$pdf->end_document("");

// output the PDF to the browser
header("Content-type: application/pdf");
echo $pdf->get_buffer();
?>
