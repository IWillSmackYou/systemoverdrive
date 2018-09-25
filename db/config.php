<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "sysod";


// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

?>


<?php 
							// Get login url
    $authUrl = $gClient->createAuthUrl();
    
    // Render google login button
	$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/google-sign-in-btn.png" alt=""/></a>';
	
						?>
						<?php echo $output; ?>

// Include config file && User class
require_once '../google/gpConfig.php';
require_once '../google/User.class.php';
require_once("../db/config.php");
session_start();