<?php
include('connect.php');
include('functions.php');

$query = 'SELECT * FROM staff ORDER BY last_name ASC';
$staff = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <h1 class="display-5 mb-4">Staff Directory</h1>
        <a href="add.php" class="btn btn-primary mb-3">Add New Staff Member</a>

        <?php if (isset($_GET['success'])): ?>
          <div class="alert alert-success">
            <?php
            $messages = [
              'add' => 'Staff member has been added successfully',
              'update' => 'Staff member has been updated successfully',
              'delete' => 'Staff member has been deleted successfully'
            ];
            echo $messages[$_GET['success']] ?? 'Operation completed successfully';
            ?>
          </div>
        <?php endif; ?>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Staff ID</th>
              <th>Name</th>
              <th>Role</th>
              <th>Date Hired</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($staff)): ?>
              <tr>
                <td><?php echo $row['staff_id']; ?></td>
                <td><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td><?php echo format_date($row['date_hired']); ?></td>
                <td>
                  <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">View</a>
                  <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>