<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addpricepackageModal">Add Price Package</button>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered ams-data-table" id="pricepackageTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Package Name</th>
                    <th>Duration (days)</th>
                    <th>Discount</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pricepackages as $pricepackage) : ?>
                    <tr>
                        <td><?php echo $pricepackage['id']; ?></td>
                        <td><?php echo $pricepackage['package_name']; ?></td>
                        <td><?php echo $pricepackage['duration']; ?></td>
                        <td><?php echo $pricepackage['discount']; ?>%</td>
                        <?php

                        if ($pricepackage['active'] == 1) {
                            $active = 'Yes';
                        } else {
                            $active = 'No';
                        }
                        ?>
                        <td><span class="badge bg-<?php echo $active == 'Yes' ? 'success' : 'danger'; ?>"><?php echo $active; ?></span></td>
                        <td>
                            <button class="btn btn-danger deletepricepackage" data-id="<?php echo $pricepackage['id']; ?>" data-bs-toggle="modal" data-bs-target="#deletepricepackageModal">Delete</button >
                            <button class="btn btn-primary editpricepackage" data-id="<?php echo $pricepackage['id']; ?>" data-package_name="<?php echo $pricepackage['package_name']; ?>" data-duration="<?php echo $pricepackage['duration']; ?>" data-discount="<?php echo $pricepackage['discount']; ?>" data-active="<?php echo $pricepackage['active']; ?>" data-bs-toggle="modal" data-bs-target="#addpricepackageModal">Edit</button>
                        </td>
                    </tr>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="addpricepackageModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Price Package</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="pricepackage_form">
                <div class="modal-body">
                   
                    <div class="form-group row">
                        <label for="size" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Package Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label">Days</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="duration" name="duration" placeholder="Duration">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="active" class="col-sm-2 col-form-label">Discount(%)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="active" class="col-sm-2 col-form-label">Active</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="active" name="active">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_pricepackage">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- location delete modal  -->
<div class="modal" id="deletepricepackageModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete pricepackage</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="delete_location_form">
                <div class="modal-body text-center">
                    <h4>Are you sure you want to delete this pricepackage?</h4>
                    <input type="hidden" name="delete_pricepackage_id" id="delete_pricepackage_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete_pricepackage">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/pricepackage.js"></script>