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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Details - Staff Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="display-5 mb-4">Staff Member Details</h1>
                <a href="index.php" class="btn btn-secondary mb-3">Back to Staff List</a>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $staff['first_name'] . ' ' . $staff['last_name']; ?></h5>
                        <p class="card-text">
                            <strong>Staff ID:</strong> <?php echo $staff['staff_id']; ?><br>
                            <strong>Role:</strong> <?php echo $staff['role']; ?><br>
                            <strong>Date Hired:</strong> <?php echo format_date($staff['date_hired']); ?><br>
                            <strong>Added to System:</strong> <?php echo format_date($staff['created_at']); ?>
                        </p>
                        <div class="mt-3">
                            <a href="update.php?id=<?php echo $staff['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $staff['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this staff member?')">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>