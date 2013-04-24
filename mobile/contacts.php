<?php
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

//Gets contacts associated with user
$q = mysql_query("
SELECT * FROM contacts WHERE name='$username' AND password='$password'
ORDER BY cname;
");

$contacts = array();

while ($row = mysql_fetch_array($q)) {
$contacts[] = $row;
}

?>

<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <title>
        </title>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/mobiletheme.css" />
        <link rel="stylesheet" href="css/flexslider.css" />
        <link href='http://fonts.googleapis.com/css?family=Sintony' rel='stylesheet' type='text/css'>
        
        <script src="http://code.jquery.com/jquery-1.7.2.min.js">
        </script>
        <script src="main.js">
        </script>
        <script>
            try {

    $(function() {

    });

  } catch (error) {
    console.error("Your javascript has an error: " + error);
  }
        </script>
		<script type="text/javascript">
        $(document).bind("mobileinit", function () {
            $.mobile.ajaxEnabled = false;
        });
        </script>     
        <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js">
        </script>         
    </head>
    <body>
        <!-- Home -->
        <div data-role="page" id="page1">
            <div id="header" data-theme="a" data-role="header">
                <h3>
                    Brad McMullen
                </h3>
                <div id="nav1" data-role="navbar" data-iconpos="top">
                    <ul>
                        <li>
                            <a href="#" data-transition="fade" data-theme="" data-icon="home">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="http://webdesign4.georgianc.on.ca/~200162912/mobile/about.html" data-transition="fade" data-theme="" data-icon="info">
                                About Me
                            </a>
                        </li>
                        <li>
                            <a href="http://webdesign4.georgianc.on.ca/~200162912/mobile/contact.html" data-transition="fade" data-theme="" data-icon="star">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="nav2" data-role="navbar" data-iconpos="top">
                    <ul>
                        <li>
                            <a href="http://webdesign4.georgianc.on.ca/~200162912/mobile/projects.html" data-transition="fade" data-theme="" data-icon="">
                                Projects
                            </a>
                        </li>
                        <li>
                            <a href="http://webdesign4.georgianc.on.ca/~200162912/mobile/services.html" data-transition="fade" data-theme="" data-icon="">
                                Services
                            </a>
                        </li>
						<li>
                            <a href="http://webdesign4.georgianc.on.ca/~200162912/mobile/login.php" data-transition="fade" data-theme="" data-icon="home">
                                Business Contacts
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div data-role="content">
			<center>
			<h1>Contacts</h1>
			</center>
			<div class="contactdiv">
			<center>
			<table>
				<tr>
					<th>Name</th>
					<th>Phone</th>
				</tr>
				
				<?php 
				//Displays contacts
				foreach ($contacts as $contact):
					echo "<tr><td>";?>
					<!--Alert when you click on contacts name-->
					<a href="" onClick="alert('Name: <?php echo htmlentities($contact['cname']) .'\nEmail: '. htmlentities($contact['cemail']).' \nPhone: ' . htmlentities($contact['cphone']). ' \nAddress: ' . htmlentities($contact['caddress']);?> ')"><?php echo htmlentities($contact['cname']); ?></a>
					<?php
					echo "</td><td>";?>
					<a href="tel:<?php echo htmlentities($contact['cphone']);?>"><?php echo htmlentities($contact['cphone']);?></a>
					<?php
				endforeach;
				
				?>
			</table></center><br/><br/>
			<a href="logout.php" style="color:#06F !important;">Log Out</a>
			</div>
            </div>
            <div data-theme="a" data-role="footer" data-position="fixed">
                <h3>
                    &copy; Copyright 2013<br/>
                    <a href="http://webdesign4.georgianc.on.ca/~200162912/adv_web_a1" style="color:#06F !important;">Full Site</a>
                </h3>
            </div>
        </div>
    </body>
</html>