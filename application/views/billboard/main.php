<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addBillboardModal">Add Billboard</button>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered ams-data-table" id="billboardTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Location</th>
                    <th>Size</th>
                    <th>Type</th>
                    <th>Mac Address</th>
                    <th>Min Vehicle Count</th>
                    <th>Price Per Day</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($billboards as $billboard) : ?>
                    <tr>
                        <td><?php echo $billboard['id']; ?></td>
                        <td><?php echo $billboard['location']; ?></td>
                        <td><?php echo $billboard['size']; ?></td>
                        <td><?php echo $billboard['type']; ?></td>
                        <td><?php echo $billboard['mac_address']; ?></td>
                        <td><?php echo $billboard['minimum_vehicle_count']; ?></td>
                        <td>$<?php echo $billboard['price_per_day']; ?></td>
                        <?php

                        if ($billboard['active'] == 1) {
                            $active = 'Yes';
                        } else {
                            $active = 'No';
                        }
                        ?>
                        <td><span class="badge bg-<?php echo $active == 'Yes' ? 'success' : 'danger'; ?>"><?php echo $active; ?></span></td>
                        <td>
                            <button class="btn btn-danger deleteBillboard" data-id="<?php echo $billboard['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteBillboardModal">Delete</button >
                            <button class="btn btn-primary editBillboard" data-id="<?php echo $billboard['id']; ?>" data-location_id="<?php echo $billboard['location_id']; ?>" data-size="<?php echo $billboard['size']; ?>" data-type="<?php echo $billboard['type']; ?>" data-mac_address="<?php echo $billboard['mac_address']; ?>" data-active="<?php echo $billboard['active']; ?>" data-minimum_vehicle_count="<?php echo $billboard['minimum_vehicle_count']?>" data-bs-toggle="modal" data-bs-target="#addBillboardModal" data-price_per_day="<?php echo $billboard['price_per_day']; ?>">Edit</button>
                        </td>
                    </tr>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="addBillboardModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Billboard</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="billboard_form">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="location" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="location_id" name="location_id">
                                <option value="">Select Location</option>
                                <?php foreach ($locations as $location) : ?>
                                    <option value="<?php echo $location['id']; ?>"><?php echo $location['location_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="size" class="col-sm-2 col-form-label">Size</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="size" name="size" placeholder="Size">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="type" name="type">
                                <option value="LED">LED</option>
                                <option value="Digital">Digital</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mac_address" class="col-sm-2 col-form-label">Mac Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mac_address" name="mac_address" placeholder="Mac Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="minimum_vehicle_count" class="col-sm-2 col-form-label">Min Vehicle Count</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="minimum_vehicle_count" name="minimum_vehicle_count" placeholder="Minimum Vehicle Count">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price_per_day" class="col-sm-2 col-form-label">Price Per Day</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="price_per_day" name="price_per_day" placeholder="Price Per Day">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="active" class="col-sm-2 col-form-label">Active</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="active" name="active">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_billboard">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- location delete modal  -->
<div class="modal" id="deleteBillboardModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Billboard</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="delete_location_form">
                <div class="modal-body text-center">
                    <h4>Are you sure you want to delete this billboard?</h4>
                    <input type="hidden" name="delete_billboard_id" id="delete_billboard_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete_billboard">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/billboard.js"></script>