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

$query = "DELETE FROM staff WHERE id = {$id}";
mysqli_query($connect, $query);

header('Location: index.php?success=delete');
die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete School</title>
</head>

<body>
    <a href="index.php">Back to Index</a>
</body>

</html>