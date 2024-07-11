<!DOCTYPE html>
<html>

<head>
    <title>Add Item</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Add Item</h2>
        <form id="add_form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <!-- <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="images" name="images[]" required multiple>
            </div> -->
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?php echo base_url('items'); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        // Add item
        $('#add_form').submit(function(e) {
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: '<?php echo base_url('items/add_item'); ?>',
                type: 'POST',
                data: form_data,
                success: function(response) {
                    location.href = '<?php echo base_url('items'); ?>';
                },
                error: function() {
                    alert('Error adding item');
                }
            });
        });
    });
    </script>
</body>

</html>