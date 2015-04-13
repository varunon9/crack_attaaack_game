<?php
$servername = "localhost";
   $username = "varun";
   $password = "password";
   $dbname = "crack_attaaack";

   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
?>
