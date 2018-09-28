<?php 
require_once '../google/User.class.php';
require_once("../db/config.php");


?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>


<body style="background-image:url(img/bg.jpg); background-size: cover; background-repeat: no-repeat;">

  
<div class="container">
  <form  method="POST" action="auth.php">
    <div class="row">
      <h4>Account</h4>
       <div class="input-group input-group-icon">
        <input type="text" placeholder="Username" name="username"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="First Name" name="firstname"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div> 
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Last Name" name="lastname"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="email" placeholder="Email" name="email"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="password" placeholder="Password" name="pass"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Address" name="address" name="address"/>
        <div class="input-icon"><i class="fa fa-picture-o"></i></div>
      </div>
     
     
    </div>
    <div class="row">
      <div class="col-half">
        <h4>PIN 
        (To reset Password)</h4>
       
            
          
          <input class="inputs" style = "width:40px;" type="text" maxlength="1" />
<input class="inputs" style = "width:40px;" type="text" maxlength="1" />
<input class="inputs" style = "width:40px;" type="text" maxlength="1" />
<input class="inputs" style = "width:40px;" type="text" maxlength="1" />
        
      </div>
      <div class="col-half">
        <h4>Gender</h4>
        <div class="input-group">
          <input type="radio" name="gender" value="male" id="gender-male"/>
          <label for="gender-male">Male</label>
          <input type="radio" name="gender" value="female" id="gender-female"/>
          <label for="gender-female">Female</label>
        </div>
      </div>
      </div>



<div class="row" style="padding-top:20px;">
<input type="submit" value="Sign Up" class="emerald-flat-button">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  

    <script  src="js/tab.js"></script>




</body>

</html>
