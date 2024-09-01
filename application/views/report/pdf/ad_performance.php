<?php
// var_dump($billboard_data);die;
require_once 'application/libraries/class/Reporter.php';
$pdf = new Reporter(array('orientation' => 'P', 'unit' => 'mm', 'format' => 'A4', 'footer' => false));
$pdf->addPage();

$pdf->writeTitle("Ad Performance Report", 0, 'C');
$pdf->writeSubTitle('From Date: ' . $from_date . ' To Date: ' . $to_date, 0, 'C');
$pdf->Ln();


$pdf->SetWidths(array($pdf->getAsPercentage(4), $pdf->getAsPercentage(25), $pdf->getAsPercentage(15), $pdf->getAsPercentage(45), $pdf->getAsPercentage(10)));
$pdf->Ln();
$x = 0;

$pdf->Row(array('#', 'Billboard', 'Customer', 'Booking', 'Total Vehicle Count'), true);
$x += 1;
foreach ($data as $key => $value) {
    if ($value->total_vehicles == null) {
        $value->total_vehicles = 0;
    }

    $billboard = "ID : " . $value->billboard_id . "\n" . $value->location_name;
    $booking = "From : " . $value->from_date . " To : " . $value->to_date . "\n" . $value->video_link;

    $pdf->Row(array($x, $billboard, $value->customer_name, $booking, $value->total_vehicles));
    $x += 1;
}

// Close the document and offer to show or save to ~/Downloads
$pdf->Output('performance_report-' . date('YYYY-mm-dd'), 'i');
