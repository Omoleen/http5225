<?php
include('connect.php');
include('functions.php');

if (!isset($_GET['id'])) {
  header('Location: index.php');
  die();
}

$id = $_GET['id'];
$staff = get_staff_by_id($connect, $id);

if (!$staff) {
  header('Location: index.php');
  die();
}

if (isset($_POST['submit'])) {
  $data = [
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'staff_id' => $_POST['staff_id'],
    'role' => $_POST['role'],
    'date_hired' => $_POST['date_hired']
  ];

  $errors = validate_staff_data($data);

  if (empty($errors)) {
    $query = "UPDATE staff SET 
                    first_name = '{$data['first_name']}',
                    last_name = '{$data['last_name']}',
                    staff_id = '{$data['staff_id']}',
                    role = '{$data['role']}',
                    date_hired = '{$data['date_hired']}'
                 WHERE id = {$id}";

    mysqli_query($connect, $query);
    header('Location: index.php?success=update');
    die();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Staff Member</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h1 class="display-5 mb-4">Edit Staff Member</h1>
        <a href="index.php" class="btn btn-secondary mb-3">Back to Staff List</a>

        <?php if (isset($errors) && !empty($errors)): ?>
          <div class="alert alert-danger">
            <ul class="mb-0">
              <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <form action="" method="POST">
          <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name"
              value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : $staff['first_name']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name"
              value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : $staff['last_name']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="staff_id" class="form-label">Staff ID</label>
            <input type="text" class="form-control" id="staff_id" name="staff_id"
              value="<?php echo isset($_POST['staff_id']) ? $_POST['staff_id'] : $staff['staff_id']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" class="form-control" id="role" name="role"
              value="<?php echo isset($_POST['role']) ? $_POST['role'] : $staff['role']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="date_hired" class="form-label">Date Hired</label>
            <input type="date" class="form-control" id="date_hired" name="date_hired"
              value="<?php echo isset($_POST['date_hired']) ? $_POST['date_hired'] : $staff['date_hired']; ?>" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Update Staff Member</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>