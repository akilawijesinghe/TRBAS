<?php
require_once 'application/libraries/class/Reporter.php';
$pdf = new Reporter(array('orientation' => 'P', 'unit' => 'mm', 'format' => 'A4','footer' => false));
$pdf->addPage();
// print_r($dispensed_drug_info);die;

$pdf->writeTitle("Test Report");
$pdf->writeSubTitle('Daily Drug Dispensed');
$pdf->Ln();
$pdf->MultiCell(0, 4, 'List of drugs dispensed only', 0, 'C');

$dispened_drug_info = array();


$pdf->SetWidths(array($pdf->getAsPercentage(10), $pdf->getAsPercentage(70), $pdf->getAsPercentage(20)));
$pdf->Ln();
    $x = 0;
//    $pdf->writeSSubTitle('OPD: ', 10, true, 0);
    $pdf->MultiCell(0, 6, 'OPD: ');

    $pdf->Row(array('', 'Drug Name', 'Quantity Dispensed'), true);
        $x += 1;
        $pdf->Row(array($x, "Tets", "2666"));

// Close the document and offer to show or save to ~/Downloads
$pdf->Output('daily_drug_dispense-' . date('YYYY-mm-dd'), 'i');
?>
