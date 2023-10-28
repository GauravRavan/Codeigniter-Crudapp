<!DOCTYPE html>
<html>

<head>
    <title>Show Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .small-search {
            max-width: 200px;
        }

        .add-employee-button {
            text-align: right;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="add-employee-button">
            <form method="post" action="<?= base_url('show/showadd'); ?>">
                <button type="submit" class="btn btn-success">Add Employee</button>
            </form>
        </div>

        <!-- Add a search input at the top -->
        <div class="input-group small-search">
            <input type="text" class="form-control" placeholder="Search..." id="searchInput">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="searchButton">Search</button>
            </div>
        </div>

        <h1>User Data from the Database</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>User</th>
                    <th>Info</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($result)): ?>
                    <?php foreach ($result as $row): ?>
                        <tr>
                            <td>
                                <?php echo $row->id; ?>
                            </td>
                            <td>
                                <?php echo $row->user; ?>
                            </td>
                            <td>
                                <?php echo $row->info; ?>
                            </td>
                            <td>
                                <form method="post" action="<?= base_url('show/delete/' . $row->id); ?>"
                                    onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="<?= base_url('show/edit/' . $row->id); ?>">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No data available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('searchButton').addEventListener('click', function () {
            var searchInput = document.getElementById('searchInput').value.toLowerCase();
            var tableRows = document.querySelectorAll('tbody tr');

            tableRows.forEach(function (row) {
                var rowData = row.textContent.toLowerCase();
                if (rowData.includes(searchInput)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
