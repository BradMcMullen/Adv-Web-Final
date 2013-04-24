<!--login.php
Brad McMullen, Matt Karabetsos
Add Me
The login page for our website-->
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
		<img src = "http://puu.sh/2FohW.png">
		<ul class="nav nav-pills">
			<li>
				<a href="index.html">Home</a>
			</li>
			<li class="active">
				<a href="login.php">Login</a>
			</li>
			<li>
				<a href="register.php">Register</a>
			</li>
		</ul>
		<div class="hero-unit">
			<?php if(isset($_SESSION['message'])) :
					echo $_SESSION['message'];
				endif;?>
            	<div id='loginform'>
				<h1>Add Me</h1><br/><br/>
            <form action="checklogin.php" method='post' id='login'>
                Username: <br />
                <input type='text' name='username' /><br />
                Password: <br />
                <input type='password' name='password' /><br />
                <input type='submit' value='Login' /><br/><br/>
				New to the site? <a href="register.php">Click here to register</a>
            </form>
		</div>
	</div>
</div></div>
  </body>
</html>
