<?php
//subuserinfo.php
//Brad McMullen, Matt Karabetsos
//Add Me
//Submits users personal information to the database
session_start();
/*Database connection is in this file*/
include('db/database.php');

//Get the username, email, and password from the registration form
$steamid1 = mysql_real_escape_string($_POST['steamid1']);
$skypeid1 = mysql_real_escape_string($_POST['skypeid1']);
$facebook1 = mysql_real_escape_string($_POST['facebook1']);
$mobilephone1 = mysql_real_escape_string($_POST['mobilephone1']);
$steamid1 = stripslashes($steamid1);
$skypeid1 = stripslashes($skypeid1);
$facebook1 = stripslashes($facebook1);
$mobilephone1 = stripslashes($mobilephone1);

$username1 = $_SESSION['username'];

//Insert users information into the database.
$sql = "UPDATE members SET steamid='$steamid1', skypeid='$skypeid1', facebook='$facebook1', cellphone='$mobilephone1'
WHERE username='$username1'";
mysql_query($sql) or die(mysql_error());

    header('Location:landing.php');
?>