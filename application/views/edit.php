<!DOCTYPE html>
<html>

<head>
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<?php if (isset($_GET['alert'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alert:try again</strong> <?= urldecode($_GET['alert']) ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="container mt-5">
        <h1>Employee Information</h1>
        <form method="post" action="<?= base_url('show/uedit/'.$record[0]['id'])?>" 
        onsubmit="return confirm('Are you sure you want to edit this record?');">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $record[0]['user'];; ?>">
            </div>
            <div class="form-group">
                <label for="userInfo">User Info:</label>
                <input type="text" class="form-control" id="userInfo" name="userInfo" value="<?= $record[0]['info'];; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>