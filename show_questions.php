<?php
	session_start();
    $username1= $_SESSION['username'];
    $current_level=$_SESSION['level'];
    if(!isset($_SESSION['username'])){
        header('Location: index.html');
        exit;
    }
    require 'db_connect.php';
    $sql2 = "SELECT level FROM scores WHERE username = '$username1'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $level= $row2["level"];
    if($current_level<=$level){
        $sql3 = "SELECT img_source FROM questions WHERE level = '$current_level'";
        $result = $conn->query($sql3);
        $row = $result->fetch_assoc();
        echo $row["img_source"];
    }
    else{
        $sql3 = "SELECT img_source FROM scores s,questions q WHERE s.level=q.level and s.username = '$username1'";
        $result = $conn->query($sql3);
        $row = $result->fetch_assoc();
        echo $row["img_source"];
        $current_level=$level;
        $_SESSION['level']=$current_level;
    }
    
    $conn->close();
?>