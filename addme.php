<!--
addme.php
Brad McMullen, Matt Karabetsos
Add Me
page to display all of the links relevant to the user whom this page is about-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add Me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
		<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
		<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
		<!--script src="js/less-1.3.3.min.js"></script-->
		<!--Agregar #!watch a la url para ver los cambios en tiempo real. -->
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

	<?php 
	
	include("db/database.php");
	
	$username = $_GET['name'];
	
	//Get user info from database
	$sqlsteam = mysql_query("SELECT steamid FROM members WHERE username='$username'");
	$sqlskype = mysql_query("SELECT skypeid FROM members WHERE username='$username'");
	$sqlfacebook = mysql_query("SELECT facebook FROM members WHERE username='$username'");
	$sqlmobile = mysql_query("SELECT cellphone FROM members WHERE username='$username'");
	
	$steam2 = mysql_fetch_row($sqlsteam);
	$skype2 = mysql_fetch_row($sqlskype);
	$facebook2 = mysql_fetch_row($sqlfacebook);
	$mobilephone2 = mysql_fetch_row($sqlmobile);
	mysql_query($sql);
	
	
	
	?>
	
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="img/favicon.png">
    
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>
  </head>

  <body>
    	<div class="container-fluid"><div class="row-fluid">
	<div class="span12 column">
		
		<img src = "http://puu.sh/2FohW.png">
		<ul class="nav nav-pills">

			<li class="active">
				<a href="index.html">Home</a>
			</li>
			<li>
				<a href="login.php">Login</a>
			</li>
			<li>
				<a href="register.php">Register</a>
			</li>
		</ul>
		<div class="hero-unit">
			<!-- Output user info in links -->
			<a href="steam://friends/add/<? echo $steam2[0]?>">Click Here to Add To Steam</a><br>
			<a href="skype:<? echo $skype2[0]?>?add">Click Here to Add To Skype</a><br>
			<a href="<?echo $facebook2[0]?>" target=_blank>Click Here to Add To Facebook</a><br>
			<a href="skype:+<? echo $mobilephone2[0]?>?call">Click Here to Phone Mobile Through Skype</a><br>			
			
			
		</div>
	</div>
</div></div>
  </body>
</html>
