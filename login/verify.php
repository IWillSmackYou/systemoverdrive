
<?php 

require_once("../db/config.php");
//session_start();
   
   if(ISSET($_POST['username'])) {
	   
      // username and password sent from form 
$username = mysqli_real_escape_string($db,$_POST['username']);
$pass = mysqli_real_escape_string($db,$_POST['pass']); 
$pwhash = hash('sha256',$pass);

$sql = "SELECT ID FROM users WHERE Username = '$username' AND Password = '$pwhash'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];

$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
  
if($count == 1) {
   //session_register("username");
   //$_SESSION['logged_user'] = $username;
   
  echo"fuck you";
}else {
   header("Location: index.php");
}

}else{
	echo "fuck";
}

?>