<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addLocationModal">Add Location</button>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered ams-data-table" id="locationTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Location</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($locations as $location) : ?>
                    <tr>
                        <td><?php echo $location['id']; ?></td>
                        <td><?php echo $location['location_name']; ?></td>
                        <td><?php echo $location['created_at']; ?></td>
                        <td>
                            <button class="btn btn-danger deleteLocation" data-id="<?php echo $location['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteLocationModal">Delete</button>
                            <button class="btn btn-primary editLocation" data-id="<?php echo $location['id']; ?>" data-name="<?php echo $location['location_name']; ?>" data-bs-toggle="modal" data-bs-target="#addLocationModal">Edit</button>
                        </td>
                    </tr>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="addLocationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Location</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="location_form">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="location" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="location_name" name="location_name" placeholder="Location">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_location">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- location delete modal  -->
<div class="modal" id="deleteLocationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Location</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="delete_location_form">
                <div class="modal-body text-center">
                    <h4>Are you sure you want to delete this location?</h4>
                    <input type="hidden" name="delete_location_id" id="delete_location_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete_location">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/location.js"></script>