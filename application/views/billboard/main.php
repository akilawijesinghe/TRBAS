<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addBillboardModal">Add Billboard</button>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered" id="billboardTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Location</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($billboards as $billboard) : ?>
                    <tr>
                        <td><?php echo $billboard['id']; ?></td>
                        <td><?php echo $billboard['location']; ?></td>
                        <td><?php echo $billboard['size']; ?></td>
                        <td><?php echo $billboard['price']; ?></td>
                        <td>
                            <button class="btn btn-danger deleteBillboard" data-id="<?php echo $billboard['id']; ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="addBillboardModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Billboard</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <form id="addBillboardForm">

                <div class="modal-body text-center">
                    <div class="form-group row">
                        <label for="location" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="size" class="col-sm-2 col-form-label">Size</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="size" name="size" placeholder="Size">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#billboardTable').DataTable();

        $('#addBillboardForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/billboard/add',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);
                    $('#addBillboardModal').modal('hide');
                    location.reload();
                }
            });
        });

        $('.deleteBillboard').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/billboard/delete',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    console.log(response);
                    location.reload();
                }
            });
        });
    });
</script>