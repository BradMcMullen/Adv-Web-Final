<?php
session_start();
/*Database connection is in this file*/
include('db/database.php');

//Get the username and password from the login form
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$username = stripslashes($username);
$password = stripslashes($password);

	
//Selects username and password combo from database to make sure its a real user
$sql = "SELECT * FROM $tbl_name WHERE username = '$username'
and password = '$password'";
$result = mysql_query($sql);

//Count the table row. 0 = No user exists
$count = mysql_num_rows($result);

//If $result is 1 the user exists
if($count == 1) {
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	header('location:contacts.php');
	die;
}

//If no user exists this message displays
else {
    echo 'Wrong Username or Password';
	?> <a href="http://webdesign4.georgianc.on.ca/~200162912/mobile/login.php">Click Here to return.</a><?php
}
?>