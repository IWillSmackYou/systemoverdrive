<?php 
require_once("../db/config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){




     // username and password sent from form 
$username = mysqli_real_escape_string($db,$_POST['username']);
$pass = mysqli_real_escape_string($db,$_POST['pass']); 
$pwhash = hash('sha256',$pass);
$email = mysqli_real_escape_string($db,$_POST['email']); 
$address = mysqli_real_escape_string($db,$_POST['address']); 
$PIN = mysqli_real_escape_string($db,$_POST['PIN1']) . mysqli_real_escape_string($db,$_POST['PIN2']) . mysqli_real_escape_string($db,$_POST['PIN3']) . mysqli_real_escape_string($db,$_POST['PIN4']); 
$gender = mysqli_real_escape_string($db,$_POST['gender']); 
$firstname = mysqli_real_escape_string($db,$_POST['firstname']); 
$lastname = mysqli_real_escape_string($db,$_POST['lastname']); 

$sql = "SELECT ID FROM clients WHERE username = '$username'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];

$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
  
if($count == 1) {
    
    
   
   header("Location: index.php?error=0");
}else {
    $sql = "INSERT INTO clients (username, password, first_name, last_name, email, PIN, address, gender) VALUES ('$username', '$pwhash' , '$firstname' , '$lastname', '$email', '$PIN', '$address', '$gender')";
    $result = mysqli_query($db,$sql);
}


}

  ?>