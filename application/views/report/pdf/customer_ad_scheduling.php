<?php
// var_dump($billboard_data);die;
require_once 'application/libraries/class/Reporter.php';
$pdf = new Reporter(array('orientation' => 'P', 'unit' => 'mm', 'format' => 'A3', 'footer' => false));
$pdf->addPage();

$pdf->writeTitle("Ad Scheduling Report - " . $customer, 0, 'C');
$pdf->writeSubTitle('', 0, 'C');

$pdf->Ln();

$pdf->SetWidths(array($pdf->getAsPercentage(4),$pdf->getAsPercentage(10), $pdf->getAsPercentage(20), $pdf->getAsPercentage(20), $pdf->getAsPercentage(35), $pdf->getAsPercentage(10)));
$pdf->Ln();
$x = 0;

$pdf->Row(array('#', 'Booking ID','Billboard', 'From and To Date', 'Ad Videos', 'Status'), true);
$x += 1;
foreach ($data as $key => $value) {

    // get from and to dates and check is it ongoing, future or expired
    $from_date = date('Y-m-d', strtotime($value->from_date));
    $to_date = date('Y-m-d', strtotime($value->to_date));
    $booking = $from_date . ' to ' . $to_date;
    $status = 'Ongoing';
    if (strtotime($from_date) > strtotime(date('Y-m-d'))) {
        $status = 'Future';
    } else if (strtotime($to_date) < strtotime(date('Y-m-d'))) {
        $status = 'Expired';
    }

    $date_range = $from_date . ' to ' . $to_date;
    $billboard_data = "ID : ".$value->billboard_id . "\n" . $value->location_name;

    $ad_info = explode(',', $value->ad_info);
    $value->ad_info = '';

    foreach ($ad_info as $key => $ad) {
        $value->ad_info .= $ad . "\n";
    }


    $pdf->Row(array($x, $value->id, $billboard_data, $date_range, $value->ad_info, $status));
    $x += 1;
}

// Close the document and offer to show or save to ~/Downloads
$pdf->Output('Ad_Scheduling_Report.pdf', 'I');
