<?php
session_start();
session_destroy();
session_start();
$_SESSION['message'] = "you have been logged out";
$_SESSION['username'] = '';
$_SESSION['password'] = '';

header('location:login.php');
die;