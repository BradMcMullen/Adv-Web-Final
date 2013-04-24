<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Dotaparty!</title>
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
			<li>
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
			<?php
 
			include 'openid.php';
			 
			$openid = new LightOpenID('mattcubed.com'); //make new instance with our domain
			$openid->identity = 'http://steamcommunity.com/openid/'; //set the openid provider to steam
			 
			if (!isset($_GET['openid_mode']))
			{
				echo 'Click <a href="'.$openid->authUrl().'">here</a> to sign in with Steam!'; //ask the user to sign in
			} 
			else
			{
				if ($openid->validate())
				{
					$steam_community_id = substr($_GET['openid_identity'],-17); //steam returns an openid identifier, we just need the community id (last 17 digits of it)
					echo "Your Steam Community ID is: ".$steam_community_id; //do something with the newly found community ID
				}
			}
			?>
		</div>
	</div>
</div></div>
</body>
</html>