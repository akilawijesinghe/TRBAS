<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addBookingModal">Add Booking</button>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered ams-data-table" id="bookingTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Customer</th>
                    <th>Billboard</th>
                    <th>Price Package</th>
                    <th>Date Raneg</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking) : ?>
                    <tr>
                        <td><?php echo $booking['id']; ?></td>
                        <td><?php echo $booking['customer_name']; ?></td>
                        <td><?php echo $booking['billboard_name']; ?></td>
                        <td><?php echo $booking['price_package_name']; ?></td>
                        <td><?php

                            // check the expiration date and add a badge
                            $from_date = strtotime($booking['from_date']);
                            $to_date = strtotime($booking['to_date']);
                            $current_date = strtotime(date('Y-m-d'));
                            if ($current_date >= $from_date && $current_date <= $to_date) {
                                $badge = 'success';
                            } else {
                                $badge = 'danger';
                            }

                            echo $booking['from_date'] . ' to ' . $booking['to_date'];
                            ?>
                            <br><span class="badge bg-<?php echo $badge; ?>"><?php echo $badge == 'success' ? 'Ongoing' : 'Expired'; ?></span>

                        </td>
                        <td>
                            <?php
                            if ($booking['active'] == 1) {
                                $active = 'Yes';
                            } else {
                                $active = 'No';
                            }
                            ?>
                            <span class="badge bg-<?php echo $active == 'Yes' ? 'success' : 'danger'; ?>"><?php echo $active; ?></span>
                        </td>
                        <td>
                            <?php

                            // if expired booking then disable the edit/delete button
                            if ($badge == 'danger') {
                                $disabled = 'disabled data-bs-toggle="tooltip" title="You can not edit expired booking"';
                            } else {
                                $disabled = '';
                            }

                            ?>
                            <button class="btn btn-danger deleteBooking" data-id="<?php echo $booking['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteBookingModal" <?php echo $disabled; ?>>Delete</button>
                            <button class="btn btn-primary editBooking" data-id="<?php echo $booking['id']; ?>" data-customer_id="<?php echo $booking['customer_id']; ?>" data-billboard_id="<?php echo $booking['billboard_id']; ?>" data-price_package_id="<?php echo $booking['price_package_id']; ?>" data-from_date="<?php echo $booking['from_date']; ?>" data-to_date="<?php echo $booking['to_date']; ?>" data-bs-toggle="modal" data-bs-target="#addBookingModal" <?php echo $disabled; ?>>Edit</button>
                        </td>
                    </tr>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="addBookingModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Booking</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="booking_form">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="location" class="col-sm-2 col-form-label">Billboard</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="billboard_id" name="billboard_id">
                                <option value="">Select Billboard</option>
                                <?php foreach ($billboards as $billboard) : ?>
                                    <option value="<?php echo $billboard['id']; ?>"><?php echo $billboard['location']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="customer_id" class="col-sm-2 col-form-label">Customer</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="customer_id" name="customer_id">
                                <option value="">Select Customer</option>
                                <?php foreach ($customers as $customer) :
                                    $selected = '';
                                    if ($this->session->userdata('user_role') == 'customer') {
                                        if ($customer['id'] == $this->session->userdata('user_id')) {
                                            $selected = 'selected';
                                        }
                                    }
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $customer['customer_id']; ?>"><?php echo $customer['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="from_daterange" class="col-sm-2 col-form-label">Date Range</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="from_daterange" name="from_daterange" readonly>
                        </div>
                    </div>
                    <div class="form-group row d-none">
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="from_date" name="from_date" readonly>
                        </div>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="to_date" name="to_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price_package_id" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="price_package_id" name="price_package_id" disabled>
                                <option value="">Select date range first</option>
                                <?php foreach ($price_packages as $price_package) : ?>
                                    <option data-price="<?php echo $price_package['price']; ?>" data-discount="<?php echo $price_package['discount']; ?>" data-duration="<?php echo $price_package['duration']; ?>" value="<?php echo $price_package['id']; ?>"><?php echo $price_package['package_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
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
                    <!-- Price Calculation, discount and total and sub toatal -->
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10 price-dev">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_booking">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- booking delete modal  -->
<div class="modal" id="deleteBookingModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Booking</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="delete_booking_form">
                <div class="modal-body text-center">
                    <h4>Are you sure you want to delete this booking?</h4>
                    <input type="hidden" name="delete_booking_id" id="delete_booking_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete_booking">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/booking.js"></script>