<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Item</h2>
        <form id="edit_form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $item['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $item['price']; ?>" required>
            </div>
            <!-- <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="images" name="images" value="" required>
            </div> -->
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"><?php echo $item['description']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo base_url('items'); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Update item
            $('#edit_form').submit(function(e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: '<?php echo base_url('items/update_item'); ?>',
                    type: 'POST',
                    data: form_data,
                    success: function(response) {
                        location.href = '<?php echo base_url('items'); ?>';
                    },
                    error: function() {
                        alert('Error updating item');
                    }
                });
            });
        });
    </script>
</body>
</html>
