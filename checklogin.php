<?php
//checklogin.php
//Brad McMullen, Matt Karabetsos
//Add Me
//Checks login information of user
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

//If $result is 1 the user exists, go to userinfo page
if($count == 1) {
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	header('location:userinfo.php');
	die;
}

//If wrong username or password
else {
    echo 'Wrong Username or Password';
	?> <a href="login.php">Click Here to return.</a><?php
}
?>