<?php
require('C:\xampp\htdocs\projetweb - Copie\fpdf\fpdf.php');
include "../../Controller/HistoC.php";

function CreateTable($pdf, $header, $data)
{
    // Set column widths
    $colWidth = $pdf->GetPageWidth() / 7;

    // Set font
    $pdf->SetFont('Arial', 'B', 10);

    // Output table header
    foreach ($header as $col) {
        $pdf->Cell($colWidth, 10, $col, 1);
    }
    $pdf->Ln();

    // Set font for data
    $pdf->SetFont('Arial', '', 12);

    // Output table data
    foreach ($data as $row) {
        foreach ($row as $col) {
            $pdf->Cell($colWidth, 10, $col, 1);
        }
        $pdf->Ln();
    }
}

function generatePdfContent($idOrdo) {
    // Create a PDF document
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);

    // Fetch table data based on $idOrdo
    $histoC = new HistoC();
    $histoData = $histoC->getHistoById($idOrdo); // Modify this based on your actual method to get data

    // Add table header
    $pdf->Cell(40, 10, 'Ordonnance for ID: ' . $idOrdo);
    $pdf->Ln(); // Move to the next line

    $header = array('Num', 'Medicament', 'Dosages', 'Duree', 'Remarques', 'idpat');

    // Call the CreateTable function from the horizontal table example
    CreateTable($pdf, $header, $histoData);

    // Output the PDF content
    return $pdf->Output('S'); // Output as string
}

// Get the idordo parameter from the query string
$idOrdo = isset($_GET['idordo']) ? $_GET['idordo'] : null;

if ($idOrdo) {
    // Generate PDF content based on $idOrdo
    $pdfContent = generatePdfContent($idOrdo);

    // Set the headers for file download
    header("Content-type: application/pdf");
    header("Content-Disposition: attachment; filename=ordonnance.pdf");

    // Output the PDF content
    echo $pdfContent;
    exit(); // Terminate the script after sending the file
}
?>
