<?php
session_start();
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    if (isset($_POST['login'])) {
        $query = "SELECT * FROM users WHERE email = '" . $email . "' AND password = '" . $password . "'";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            $record = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $record['id'];
            $_SESSION['name'] = $record['name'];
            header('Location: index.php');
            die();
        } else {
            $_SESSION['error'] = "Invalid email or password";
            header('Location: login.php');
            die();
        }
    }
} else {
    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>