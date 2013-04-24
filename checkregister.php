<?php
//checkregister.php
//Brad McMullen, Matt Karabetsos
//Add Me
//Checks registration information given by users, inserts into database
session_start();
/*Database connection is in this file*/
include('db/database.php');

//Get the username, email, and password from the registration form
$username = mysql_real_escape_string($_POST['username']);
$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$username = stripslashes($username);
$email = stripslashes($email);
$password = stripslashes($password);

//Make sure all fields are filled in
if($username == '' || $email == '' || $password == ''){
	echo 'Something went wrong.';?>
	<a href="register.php">Click here to go back.</a><?php
	die;
}

	
//Selects username from database to make sure it doesn't exist yet
$sql = "SELECT * FROM $tbl_name WHERE username = '$username'";
$result = mysql_query($sql);

//Count the table row. 0 = No user exists
$count = mysql_num_rows($result);

//If $result is 1 the username is already in use.
if($count == 1) {
	echo 'Username is already in use';?>
	<a href="register.php">Click here to go back.</a><?php
	die;
}

//Selects username from database to make sure it doesn't exist yet
$sql = "SELECT * FROM $tbl_name WHERE email = '$email'";
$result = mysql_query($sql);

//Count the table row. 0 = No user exists
$count = mysql_num_rows($result);

//If $result is 1 the username is already in use.
if($count == 1) {
	echo 'Email is already in use';?>
	<a href="register.php">Click here to go back.</a><?php
	die;
}

//If no user exists this message displays
else {

$sql = "INSERT INTO members (username, email, password)
VALUES ('$username', '$email', '$password')";
mysql_query($sql);

    echo 'Account registered';
	?> <a href="login.php">Click here to return to login.</a><?php
	die;
}
?>