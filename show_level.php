<?php 
	session_start();
    $username1= $_SESSION['username'];
    $current_level=$_SESSION['level'];
    if(!isset($_SESSION['username'])){
        header('Location: index.html');
        exit;
    }
    require 'db_connect.php';
    $sql3 = "SELECT level FROM scores WHERE username = '$username1'";
    $result = $conn->query($sql3);
    $row = $result->fetch_assoc();
    $level=$row["level"];
    if($current_level<=$level)
        echo "$current_level";
    else
        echo "$level";
    $conn->close();
?>.