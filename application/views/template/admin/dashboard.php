<div class="row">
    <!-- headding billboard stats -->
    <h4 class="fw-bold">Billboard Stats</h4>
    <?php

    if($billboards == null){
        echo "<p>No Billboards Found</p>";
    }

    foreach ($billboards as $billboard) {
        if ($billboard->total_vehicle_count == "") {
            $billboard->total_vehicle_count = 0;
        }
    ?>
        <div class="col-md-3">
            <div class="card card-secondary bg-secondary-gradient">
                <div class="card-body curves-shadow">
                    <h1>ID : <?php echo $billboard->id;  ?></h1>
                    <h5 class="op-8"><?php echo $billboard->location_name;  ?></h5>
                    <div class="pull-right">
                        <h3 class="fw-bold op-8">Total Vehicles : <?php echo $billboard->total_vehicle_count; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="row">
    <h4 class="fw-bold">Customer Stats</h4>
    <?php

    if($customers == null){
        echo "<p>No Customers Found</p>";
    }

    foreach ($customers as $customer) { ?>

        <div class="col-md-3">
            <div class="card card-secondary bg-secondary-gradient">
                <div class="card-body curves-shadow">
                    <h1>ID : <?php echo $customer->id; ?></h1>
                    <h5 class="op-8"><?php echo $customer->name; ?></h5>
                    <div class="pull-right op-8">
                        <h3 class="fw-bold">Total Ads : <?php echo $customer->total_ads; ?></h3>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</div>