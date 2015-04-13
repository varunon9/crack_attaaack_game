<?php
require 'db_connect.php';
 $passkey = $_GET['passkey'];
 
 $sql3 = "SELECT username FROM players WHERE com_code = '$passkey'";
$result = $conn->query($sql3);
$row = $result->fetch_assoc();
$username1=$row["username"];
 $sql = "UPDATE players SET com_code=NULL WHERE com_code='$passkey'";
 
 $sql1 = "INSERT INTO scores (username,level,date_of_joining)
        VALUES ('$username1', 1, now())";
 if($conn->query($sql) === TRUE)
 {
 	if($conn->query($sql1) === TRUE)
  		echo '<div>Your account is now active. You may now <a href="login_signup.html">Log in</a></div>';
  	else
  		echo "Error generated";
}
 else
 {
  echo "Some error occured.";
 }
 
 
 //echo $row["username"];

$conn->close();
?>