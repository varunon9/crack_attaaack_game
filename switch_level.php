<?php
	session_start();
    $username1= $_SESSION['username'];
    if(!isset($_SESSION['username'])){
        header('Location: index.html');
        exit;
    }
    $switch_level=$_POST["input_level"];
    $_SESSION['level']=$switch_level;
    //echo $_SESSION['level'];
    header('Location: crack_attaaack.php');
?>