<?php 

// Include config file && User class
require_once '../google/gpConfig.php';
require_once '../google/User.class.php';
require_once("../db/config.php");

if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if(isset($_SESSION['token'])){
    $gClient->setAccessToken($_SESSION['token']);
}

if($gClient->getAccessToken()){
    // Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    // Initialize User class
    $user = new User();
    
    // Getting user profile info
    $gpUserData = array();
    $gpUserData['oauth_uid']  = !empty($gpUserProfile['id'])?$gpUserProfile['id']:'';
    $gpUserData['first_name'] = !empty($gpUserProfile['given_name'])?$gpUserProfile['given_name']:'';
    $gpUserData['last_name']  = !empty($gpUserProfile['family_name'])?$gpUserProfile['family_name']:'';
    $gpUserData['email']      = !empty($gpUserProfile['email'])?$gpUserProfile['email']:'';
    $gpUserData['gender']     = !empty($gpUserProfile['gender'])?$gpUserProfile['gender']:'';
    $gpUserData['locale']     = !empty($gpUserProfile['locale'])?$gpUserProfile['locale']:'';
    $gpUserData['picture']    = !empty($gpUserProfile['picture'])?$gpUserProfile['picture']:'';
    $gpUserData['link']       = !empty($gpUserProfile['link'])?$gpUserProfile['link']:'';
    
   
	   
		
  
  $sql = "SELECT id FROM clients WHERE oauth_uid = '" . $gpUserData['oauth_uid']. "' AND email = '" . $gpUserData['email'] . "'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 
  
  $count = mysqli_num_rows($result);
  
  // If result matched $myusername and $mypassword, table row must be 1 row
	
  if($count == 1 ) {
	// session_register("username");

	$sql = "SELECT id FROM clients WHERE oauth_uid = '" . $gpUserData['oauth_uid']. "' AND username = '' AND password = '' AND address = '' AND PIN = '0'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
	$count = 0;
	$count = mysqli_num_rows($result);

	if($count == 1) {

	 $_SESSION['logged_user_email'] = $email;
	 $_SESSION['oauth_provider'] = $gpUserData['oauth_uid'];


	 header("Location: ../signup/merge.php?tokenid=" . $gpUserData['oauth_uid']);
	}else{
		$_SESSION['logged_user_email'] = $email;

	 $_SESSION['oauth_provider'] = $gpUserData['oauth_uid'];


		header("Location: ../account/index.php");
	}
  }
  else{

// Insert or update user data to the database
$gpUserData['oauth_provider'] = 'google';
$userData = $user->checkUser($gpUserData);

header("Location: ../signup/merge.php?tokenid=" . $gpUserData['oauth_uid']);



  }
  
    
  
}else{
    // Get login url
    $authUrl = $gClient->createAuthUrl();
    
    // Render google login button
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><center><img src="images/google-sign-in-btn.png" style="width:87%;" alt=""/></a></center>';
}


if(session_id() == '' || !isset($_SESSION)){
session_start();
}
   
   if($_SERVER['REQUEST_METHOD'] == 'POST') {
	   
      // username and password sent from form 
$username = mysqli_real_escape_string($db,$_POST['username']);
$pass = mysqli_real_escape_string($db,$_POST['pass']); 
$pwhash = hash('sha256',$pass);

$sql = "SELECT ID FROM clients WHERE username = '$username' AND password = '$pwhash'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];

$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
  
if($count == 1) {
  // session_register("username");
   $_SESSION['logged_user'] = $username;
   
   header("Location: ../index.php");
}else {
   header("Location: index.php");
}

}else{
	
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>System OverDrive Login Portal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-b-30">
				<form class="login100-form validate-form" method="POST" action="index.php">
				<span class="login100-form-logo p-t-68">
						
						<img src="../images/Logo.png" style="height:130px; width:110px;">
					</span>
					<br><br>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-center p-t-15 p-b-18">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn ">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn ">
								Login
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-20 p-b-5">
						<span>
							Or
						</span>
					</div>

					<div class="flex-c-m">
					
						<?php echo $output; ?>
						</a>
					</div>

					<div class="flex-col-c p-t-15">
						<span class="txt1 p-b-17">
							Not a registered user? <a href="../signup/" class="txt1">Click here.</a>
						</span>

						
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>