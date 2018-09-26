<?php

  

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

<body style="background-image:url(img/bg.jpg); background-size: cover; background-repeat: no-repeat;">

  
<div class="container">
  <form method="POST" action ="merge.php">

    <div class="row">
    
      <h2>One Last Thing...</h2>
      <h4>System OverDrive Account Setup</h4>
       <div class="input-group input-group-icon">
        <input type="text" placeholder="Username"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>

       <div class="input-group input-group-icon">
        <input type="password" placeholder="Password"/>
        <div class="input-icon"><i class="fa fa-key"></i></div>
      </div>
     
      <div class="input-group input-group-icon">
        <input type="text" placeholder="Address"/>
        <div class="input-icon"><i class="fa fa-envelope"></i></div>
      </div>

      <div class="input-group input-group-icon">
        <input type="text" maxlength="4" placeholder="4 Characters PIN (To be used to reset password)"/>
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
