<?php
require_once("../db/config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   // username and password sent from form 
$username = mysqli_real_escape_string($db,$_POST['username']);

$pass = mysqli_real_escape_string($db,$_POST['pass']); 

$pwhash = hash('sha256',$pass);
$address = mysqli_real_escape_string($db,$_POST['address']); 
$PIN = mysqli_real_escape_string($db,$_POST['PIN']); 

$sql = "UPDATE clients SET username = '$username' , password = '$pwhash' , address = '$address' , PIN = '$PIN' WHERE oauth_uid = '" . $_GET['tokenid'] . "'";
$result = mysqli_query($db,$sql);






}else if(ISSET($_GET['tokenid'])){

  $tokenid = $_GET['tokenid'];

}else{
  header("Location: ../account/index.php");
}

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Complete Your Profile</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body style="background-image:url(img/bg.jpg); background-size: cover; background-repeat: no-repeat;padding-top:5%;">

  
<div class="container">
  <form method="POST" action ="merge.php?tokenid=<?php echo $tokenid; ?>">

    <div class="row">
    
      <h2>One Last Thing...</h2>
      <h4>System OverDrive Account Setup</h4>
       <div class="input-group input-group-icon">
        <input type="text" placeholder="Username" name="username"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>

       <div class="input-group input-group-icon">
        <input type="password" placeholder="Password" name="pass"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
     
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Address" name="address"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>

      <div class="input-group input-group-icon">
        <input type="text" name="PIN" maxlength="4" placeholder="4 Characters PIN (To be used to reset password)"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
     
     
     
    </div>
   



<div class="row" style="padding-top:20px;">
<input type="submit" value="Complete My Registration" class="emerald-flat-button">
</div>




    </div>
    
   <!-- <div class="row">
      <h4>Terms and Conditions</h4>
      <div class="input-group">
        <input type="checkbox" id="terms"/>
        <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
      </div>
    </div>-->
    
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
