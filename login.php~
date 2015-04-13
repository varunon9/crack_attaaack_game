<?php
// define variables and set to empty values
$usernameErr = $passwordErr = "";
$username1 = $password1 = "";
$flag=0;
$Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_POST["username"])) {
     $usernameErr = "username is required";
   } else {
     $username1 = test_input($_POST["username"]);
     
   }

   if (empty($_POST["password"])) {
     $passwordErr = "Password is required";
   } else {
     $password1 = test_input($_POST["password"]);
     
   }

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

if(($usernameErr!=$Err) || ($passwordErr!=$Err) ){
   $flag=1;
}

if($flag==1){
   echo "<h2>Something went wrong</h2>";
   echo $usernameErr+"<br>"+$passwordErr+"<br>";
   echo "<h3>Try again</h3><script>setTimeout(function(){
      window.location = \"login_signup.html\";
    },5000);</script>";
}
else {
   require 'db_connect.php';
   session_start();
   $password1=md5($password1);
   $login = $conn->query("SELECT username,password FROM users WHERE username = '$username1' and password= '$password1' and com_code is null ");
   
   if (mysqli_num_rows($login) == 1) {
       // Set username session variable
       $_SESSION['username'] = $username1;
       // Jump to secured page
        header('Location: interaction.php');
    }
    else {
        // Jump to login page
        //header('Location: login_signup.html ');
        //echo $username1;
        //echo $password1;
        echo "<h3>Either Wrong username or password or you have not confirmed your link</h3>";
        echo "Please check spams in case you didn't receive email";
        echo "<script>setTimeout(function(){
             window.location = \"login_signup.html\";
        },7000);</script>";
    }

   $conn->close();
}
?>