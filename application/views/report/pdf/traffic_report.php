<?php
require_once 'application/libraries/class/Reporter.php';
$pdf = new Reporter(array('orientation' => 'P', 'unit' => 'mm', 'format' => 'A4', 'footer' => false));
$pdf->addPage();

$pdf->writeTitle("Traffic Volume Report");
$pdf->writeSubTitle('From Date: ' . $from_date . ' To Date: ' . $to_date, 0, 'C');
$pdf->Ln();


$pdf->SetWidths(array($pdf->getAsPercentage(5), $pdf->getAsPercentage(15), $pdf->getAsPercentage(60), $pdf->getAsPercentage(20)));
$pdf->Ln();
$x = 0;

$pdf->Row(array('#', 'Billboard ID', 'Location', 'Total Vehicle Count'), true);
$x += 1;
foreach ($data as $key => $value) {
    if ($value->total_vehicle_count == null) {
        $value->total_vehicle_count = 0;
    }
    $pdf->Row(array($x, $value->billboard_id, $value->location_name, $value->total_vehicle_count));
    $x += 1;
}

// Close the document and offer to show or save to ~/Downloads
$pdf->Output('daily_billboard_traffic-' . date('YYYY-mm-dd'), 'i');
