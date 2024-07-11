<!DOCTYPE html>
<html>
<head>
    <title>Items List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Items List</h2>
        <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('items/create'); ?>'">Add Item</button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                        <td>
                            <a href="<?php echo base_url('items/edit/'.$item['id']); ?>" class="btn btn-sm btn-info">Edit</a>
                            <button class="btn btn-sm btn-danger delete_item" data-id="<?php echo $item['id']; ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Delete item
            $(document).on('click', '.delete_item', function() {
                var id = $(this).data('id');
                if (confirm('Are you sure to delete this item?')) {
                    $.ajax({
                        url: '<?php echo base_url('items/delete_item/'); ?>' + id,
                        type: 'DELETE',
                        success: function(response) {
                            location.reload();
                        },
                        error: function() {
                            alert('Error deleting item');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
