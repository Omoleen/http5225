<?php
include('functions.php');
secure();
session_destroy();
header('Location: login.php');
die();
