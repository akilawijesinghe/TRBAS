<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addCustomerModal">Add Customer</button>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered ams-data-table" id="customerTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>ABN</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer) : ?>
                    <tr>
                        <td><?php echo $customer['customer_id']; ?></td>
                        <td><?php echo $customer['name']; ?></td>
                        <td><?php echo $customer['email']; ?></td>
                        <td><?php echo $customer['contact']; ?></td>
                        <td><?php echo $customer['business_address']; ?></td>
                        <td><?php echo $customer['abn']; ?></td>
                        <?php

                        if ($customer['active'] == 1) {
                            $active = 'Yes';
                        } else {
                            $active = 'No';
                        }
                        ?>
                        <td><span class="badge bg-<?php echo $active == 'Yes' ? 'success' : 'danger'; ?>"><?php echo $active; ?></span></td>
                        <td>
                            <button class="btn btn-danger deletecustomer" data-id="<?php echo $customer['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteCustomerModal">Delete</button >
                            <button class="btn btn-primary editcustomer" data-id="<?php echo $customer['id']; ?>" data-name="<?php echo $customer['name']; ?>" data-email="<?php echo $customer['email']; ?>" data-contact="<?php echo $customer['contact']; ?>" data-active="<?php echo $customer['active']; ?>" data-bs-toggle="modal" data-bs-target="#addCustomerModal" data-business_address="<?php echo $customer['business_address']; ?>" data-abn="<?php echo $customer['abn']; ?>">Edit</button>
                        </td>
                    </tr>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="addCustomerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add customer</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="customer_form">
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
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="business_address" name="business_address" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="abn" class="col-sm-2 col-form-label">ABN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="abn" name="abn" placeholder="ABN">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
                    <button type="button" class="btn btn-primary" id="save_customer">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- location delete modal  -->
<div class="modal" id="deleteCustomerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete customer</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="delete_location_form">
                <div class="modal-body text-center">
                    <h4>Are you sure you want to delete this customer?</h4>
                    <input type="hidden" name="delete_customer_id" id="delete_customer_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete_customer">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/customer.js"></script>