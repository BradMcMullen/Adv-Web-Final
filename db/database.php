<?php
$host = "localhost";
$username = "mattmhaw";
$password = "Ftb6mLaj7cZDA";
$db_name = "mattmhaw_addme";
$tbl_name = "members";

//Connect to the server and select the database
mysql_connect("$host", "$username", "$password") or die ("cannot connect");
mysql_select_db("$db_name") or die ("cannot select DB");