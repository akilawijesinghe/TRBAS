<div class="row">
    <!-- headding billboard stats -->
    <h4 class="fw-bold">Billboard Stats</h4>
    <?php
    if($ads == null){
        echo "<p>No Billboards Found</p>";
    }
    foreach ($customers as $customer) { ?>
        <div class="col-md-3">
            <div class="card card-secondary bg-secondary-gradient">
                <div class="card-body curves-shadow">
                    <h5 class="op-8"><?php echo $customer->location_name; ?></h5>
                    <div class="pull-right op-8">
                        <h3 class="fw-bold">Total Vehicles : <?php echo $customer->total_vehicle_count; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<!-- Add stats -->
<div class="row">
    <h4 class="fw-bold">Ads Stats</h4>
    <?php

        if($ads == null){
            echo "<p>No Ads Found</p>";
        }

    foreach ($ads as $ad) { 
        $from_date = strtotime($ad->from_date);
        $to_date = strtotime($ad->to_date);
        $current_date = strtotime(date('Y-m-d'));
        $status = $current_date >= $from_date && $current_date <= $to_date ? 'Ongoing' : 'Expired';

        if ($status == 'Ongoing') {
            $bdg_color = 'badge-success';
        } else {
            $bdg_color = 'badge-danger';
        }
        $video_url = base_url() . "/advertisement/view_video/" . $ad->ad_id . "/" . $ad->booking_id;

        ?>
        <div class="col-md-3">
        <a href="<?php echo $video_url; ?>" target="_blank">
            <div class="card card-secondary bg-secondary-gradient">
                <div class="card-body bubble-shadow">
                    <h5 class="op-8">Ad ID : <?php echo $ad->ad_id; ?></h5>
                    <div class="pull-right op-8">
                        <h3 class="fw-bold">Total Vehicles : <?php echo $ad->total_vehicles; ?></h3>
                        <span class="badge <?php echo $bdg_color; ?> float-end"><?php echo $status; ?></span>
                    </div>
                </div>
            </div>
            </a>
        </div>
    <?php } ?>
</div>