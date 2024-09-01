<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addUserModal">Add user</button>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered ams-data-table" id="userTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['contact']; ?></td>
                        <?php

                        if ($user['active'] == 1) {
                            $active = 'Yes';
                        } else {
                            $active = 'No';
                        }
                        ?>
                        <td><span class="badge bg-<?php echo $active == 'Yes' ? 'success' : 'danger'; ?>"><?php echo $active; ?></span></td>
                        <td>
                            <button class="btn btn-danger deleteuser" data-id="<?php echo $user['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteUserModal">Delete</button >
                            <button class="btn btn-primary edituser" data-id="<?php echo $user['id']; ?>" data-name="<?php echo $user['name']; ?>" data-email="<?php echo $user['email']; ?>" data-contact="<?php echo $user['contact']; ?>" data-active="<?php echo $user['active']; ?>" data-bs-toggle="modal" data-bs-target="#addUserModal">Edit</button>
                        </td>
                    </tr>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="addUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add user</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="user_form">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <small><span class="password-hint">Password must be 8+ characters, include uppercase, lowercase, a number, and a special character.</span></small>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Confirm</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_conform" name="password_conform" placeholder="Password">
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
                    <button type="button" class="btn btn-primary" id="save_user">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- location delete modal  -->
<div class="modal" id="deleteUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete user</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="delete_location_form">
                <div class="modal-body text-center">
                    <h4>Are you sure you want to delete this user?</h4>
                    <input type="hidden" name="delete_user_id" id="delete_user_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete_user">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/user.js"></script>