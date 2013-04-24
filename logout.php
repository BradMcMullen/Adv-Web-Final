<?php
//logout.php
//Brad McMullen, Matt Karabetsos
//Add Me
//Logs the user out and returns them to the home page
session_start();
session_destroy();
session_start();
$_SESSION['message'] = "you have been logged out";
$_SESSION['username'] = '';
$_SESSION['password'] = '';

header('location:index.html');
die;