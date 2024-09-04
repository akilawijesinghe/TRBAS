<?php
require_once 'application/libraries/class/Reporter.php';
$pdf = new Reporter(array('orientation' => 'P', 'unit' => 'mm', 'format' => 'A4', 'footer' => false));
$pdf->addPage();

$pdf->writeTitle("Revenue Report", 0, 'C');
$pdf->writeSubTitle('From Date: ' . $from_date . ' To Date: ' . $to_date, 0, 'C');
$pdf->Ln();


$pdf->SetWidths(array($pdf->getAsPercentage(5), $pdf->getAsPercentage(25), $pdf->getAsPercentage(60)));
$pdf->Ln();
$x = 0;

$pdf->Row(array('#', 'Date', 'Revenue'), true);
$x += 1;
$revenue = 0;
foreach ($data as $key => $value) {
    if ($value->total_revenue == null) {
        $value->total_revenue = 0;
    }
    $total_revenue = number_format($value->total_revenue, 2);
    $pdf->Row(array($x, $value->created_at, "$".$total_revenue));
    $x += 1;
    $revenue += $value->total_revenue;
}
$revenue = number_format($revenue, 2);
$pdf->Row(array('', 'Total Revenue', "$".$revenue), true);

$pdf->Output('revenue_report-' . date('YYYY-mm-dd'), 'i');