<form id="date_range_form" action="<?php echo  base_url()."/".$action; ?>" method="post" target="_blank">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="from_date">From Date</label>
                <input type="date" class="form-control" id="from_date" name="from_date" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="to_date">To Date</label>
                <input type="date" class="form-control" id="to_date" name="to_date" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>
        <div class="col-md-2 d-flex align-items-md-end">
            <div class="form-group">
                <label for="search"></label>
                <button class="btn btn-primary" id="search">Search</button>
            </div>
        </div>
    </div>
</form>