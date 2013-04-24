<?php
//landing.php
//Brad McMullen, Matt Karabetsos
//Add Me
//The page where the user lands after submitting their personal information
session_start();

//Kicks user back to login if they try to access this page without logging in
if ($_SESSION['username'] =='') {
	header('location:login.php');
	exit;
}
//Gets database connection
include('db/database.php');

$username = $_SESSION['username'];
$password = $_SESSION['password'];

?>

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
		<ul class="nav nav-pills">
			<li class="active">
				<a href="index.html">Home</a>
			</li>
			<li>
				<a href="logout.php">Logout</a>
			</li>
		</ul>
		<div class="hero-unit">
			<p>Copy this link and give it to your friends!: http://www.mattcubed.com/final/addme.php?name=<?php echo $username;?></p>
		</div>
	</div>
</div></div>
  </body>
</html>
