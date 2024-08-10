<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Bookings</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered ams-data-table table-hover" id="booking_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Billboard</th>
                                <th>Date Range</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bookings as $booking) :

                                // check expiration date and add a badge
                                $from_date = strtotime($booking['from_date']);
                                $to_date = strtotime($booking['to_date']);
                                $current_date = strtotime(date('Y-m-d'));
                                if ($current_date >= $from_date && $current_date <= $to_date) {
                                    $badge = 'success';
                                } else {
                                    $badge = 'danger';
                                }
                            ?>
                                <tr data-id="<?php echo $booking['id']; ?>" data-expiration="<?php echo $badge; ?>">
                                    <td><?php echo $booking['id']; ?></td>
                                    <td><?php echo $booking['customer_name']; ?></td>
                                    <td><?php echo $booking['billboard_name']; ?></td>
                                    <td>
                                        <?php echo $booking['from_date'];  ?> to <?php echo $booking['to_date']; ?>
                                        <br> <span class="badge bg-<?php echo $badge; ?>"><?php echo $badge == 'success' ? 'Ongoing' : 'Expired'; ?></span>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5" style="display: none;" id="ad_table_div">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Advertisements</h4>
            </div>
            <div class="card-body">
                <!-- normal table for old adverts -->
                <div class="table-responsive">
                    <table class="table table-sm" id="ad_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>URL</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- drop zone -->
                <div class="card-body">
                    <input type="hidden" id="bookingid">
                    <form action="<?php echo base_url(); ?>index.php/advertisement/upload_video" class="dropzone" id="videoDropzone"></form>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js"></script>
                    <script>
                        Dropzone.options.videoDropzone = {
                            url: "<?php echo base_url(); ?>index.php/advertisement/upload_video",
                            acceptedFiles: "video/*",
                            maxFiles: 1,
                            autoProcessQueue: false,
                            init: function() {
                                var myDropzone = this;

                                this.on("addedfile", function(file) {
                                    // Limit to 1 file
                                    if (this.files.length > 1) {
                                        this.removeFile(this.files[0]);
                                    }

                                    // Validate video duration
                                    let videoElement = document.createElement('video');
                                    videoElement.src = URL.createObjectURL(file);

                                    videoElement.onloadedmetadata = function() {
                                        if (videoElement.duration > 15) {
                                            $.notify({
                                                icon: 'fa fa-info',
                                                title: 'Error',
                                                message: 'Video duration should not exceed 15 seconds'
                                            }, {
                                                type: 'danger',
                                                placement: {
                                                    from: "top",
                                                    align: "right"
                                                },
                                                time: 1000,
                                            });
                                            myDropzone.removeFile(file);
                                        } else {
                                            myDropzone.processQueue(); // Process the queue only if video duration is valid
                                        }
                                    };
                                });

                                this.on("sending", function(file, xhr, formData) {
                                    // You can append additional data here if needed
                                    let booking_id = $('#bookingid').val();
                                    formData.append("bookingid", booking_id);
                                });

                                this.on("success", function(file, response) {
                                    let res = JSON.parse(response);
                                    if (res.error) {
                                        $.notify({
                                            icon: 'fa fa-info',
                                            title: 'Error',
                                            message: res.error
                                        }, {
                                            type: 'danger',
                                            placement: {
                                                from: "top",
                                                align: "right"
                                            },
                                            time: 1000,
                                        });
                                        this.removeFile(file);
                                    } else {
                                        $.notify({
                                            icon: 'fa fa-bell',
                                            title: 'Success',
                                            message: 'Video uploaded successfully!'
                                        }, {
                                            type: 'success',
                                            placement: {
                                                from: "top",
                                                align: "right"
                                            },
                                            time: 1000,
                                        });
                                        let booking_id = $('#bookingid').val();
                                        load_advertisements(booking_id);
                                        this.removeAllFiles();
                                    }
                                });

                                this.on("error", function(file, errorMessage) {
                                    err = JSON.parse(errorMessage);
                                    $.notify({
                                        icon: 'fa fa-info',
                                        title: 'Error',
                                        message: err.message
                                    }, {
                                        type: 'danger',
                                        placement: {
                                            from: "top",
                                            align: "right"
                                        },
                                        time: 1000,
                                    });
                                });
                            }
                        };
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ad delete modal  -->
<div class="modal" id="deleteAdModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Advertisement</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="delete_ad_form">
                <div class="modal-body text-center">
                    <h4>Are you sure you want to delete this advertisement?</h4>
                    <input type="hidden" name="delete_ad_id" id="delete_ad_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="delete_ad">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/advertisement.js"></script>