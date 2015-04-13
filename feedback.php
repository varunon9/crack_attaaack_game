<?php
// define variables and set to empty values

$nameErr = $emailErr  = $designationErr = $commentsErr=  "";
$name = $email  = $designation = $comments = "";
$flag=0;
$Err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
     echo $nameErr;
     $flag=1;
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed";
       echo $nameErr;
       $flag=1;
     }
   }
  
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
     echo $emailErr;
     $flag=1;
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        echo $emailErr;
        $flag=1;
      }
      
   }
   if (empty($_POST["designation"])) {
     $designationErr = "Designation is required";
     echo $designationErr;
     $flag=1;
   } else {
     //$designation = mysqli_real_escape_string($_POST["designation"]);
    $designation = addslashes($_POST["designation"]);
     
   }
   if (empty($_POST["comments"])) {
     $commentsErr = "Designation is required";
     echo $commentsErr;
     $flag=1;
   } else {
     //$designation = mysqli_real_escape_string($_POST["designation"]);
    $comments = addslashes($_POST["comments"]);
     
   }

       
 

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
/*
if(($nameErr!=$Err) || ($emailErr!=$Err) || ($genderErr!=$Err) || ($designationErr!=$Err) || ($usernameErr!=$Err) || ($password1Err!=$Err) || ($password2Err!=$Err)){
   $flag=1;
}
*/
if($flag==1){
   echo "<h2>Error occured</h2>";
   //echo $nameErr+"<br>"+$genderErr+"<br>"+$emailErr+"<br>"+$designationErr+"<br>"+$usernameErr+"<br>"+$password1Err+"<br>"+$password2Err+"<br>";
   echo "<h3>Try again</h3><script>setTimeout(function(){
      window.location = \"index.html\";
    },5000);</script>";
}
else {
   require 'db_connect.php';
   $sql = "INSERT INTO feedback (name,email,designation,comments)
   VALUES ('$name', '$email','$designation','$comments')";

   if ($conn->query($sql) === TRUE) {


       echo "<p>Thanks for giving feedback.</p><script>setTimeout(function(){
         window.location = \"index.html\";
       },3000);</script>";
      // echo "Thanks for Showing Support to us.<a href=\"http://www.rooh.org.in/support.php\">Click here</a> to view support page";
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }

   $conn->close();
}
?>