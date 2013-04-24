<?php
//userinfo.php
//Brad McMullen, Matt Karabetsos
//Add Me
//Page where users input their personal info
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

//Steam Related Stuff. 
include 'openid.php';
 
//Pre-Populate Fields
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
			<li class="active">
				<a href="index.html">Home</a>
			</li>
			<li>
				<a href="logout.php">Logout</a>
			</li>
		</ul>
		<div class="hero-unit">
			<form action="subuserinfo.php" method='post' id='login'>
                Steam ID: 
				
				<?		$openid = new LightOpenID('mattcubed.com'); //make new instance with our domain
						$openid->identity = 'http://steamcommunity.com/openid/'; //set the openid provider to steam
						 
						if (!isset($_GET['openid_mode']))
						{
								echo '<br><a href="'.$openid->authUrl().'"><img src=http://cdn.steamcommunity.com/public/images/signinthroughsteam/sits_small.png></a><br>'; //ask the user to sign in
						} 
						else
						{
							if ($openid->validate())
							{
								$steam_community_id = substr($_GET['openid_identity'],-17); //steam returns an openid identifier, we just need the community id (last 17 digits of it)
								echo "<br><input type='text' value='".$steam_community_id."'name='steamid1' /><br />";
							}
						}
				?>
				
				

                Skype Account Name: <br />
                <input type='text' name='skypeid1'value = '<?echo $skype2[0]?>'/><br />
				Facebook Profile URL: <br />
                <input type='text' name='facebook1'value = '<?echo $facebook2[0]?>'/><br />
				Mobile Phone #: <br />
                <input type='text' name='mobilephone1'value = '<?echo $mobilephone2[0]?>'/><br />
                <input type='submit' value='Submit' /><br/><br/>
            </form>
		</div>
	</div>
</div></div>
  </body>
</html>
