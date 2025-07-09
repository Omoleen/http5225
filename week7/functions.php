<?php
session_start();

function secure()
{
    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
        die();
    }
}

function set_message($message) {
    $_SESSION['message'] = $message;
}

// function check_admin() {
//     if ($_SESSION['role'] != 'admin') {
//         header('Location: index.php');
//         die();
//     }
// }

// function check_user() {
//     if ($_SESSION['role'] != 'user') {
//         header('Location: index.php');
//         die();
//     }
// }

// function check_guest() {
//     if (isset($_SESSION['id'])) {
//         header('Location: index.php');
//         die();
//     }
// }

// function check_role($role) {
//     if ($_SESSION['role'] != $role) {
//         header('Location: index.php');
//         die();
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>