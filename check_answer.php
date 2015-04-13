<?php
	session_start();
    $username1= $_SESSION['username'];
    $current_level=$_SESSION['level'];
    if(!isset($_SESSION['username'])){
        header('Location: index.html');
        exit;
    }
    $flag=1;
    //$answer=$_POST["answer"];
    $answer = test_input($_POST["answer"]);
    $max=10;
    //echo "$answers";
    function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
   }
    if($flag==1){
        require 'db_connect.php';
        $sql2 = "SELECT level FROM scores WHERE username = '$username1'";
         $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $level= $row2["level"];

        //$sql3 = "SELECT answers FROM scores s,questions q WHERE s.level=q.level and s.username = '$username1'";
        $sql3="SELECT answers FROM questions where level='$current_level'";
         $result = $conn->query($sql3);
        $row = $result->fetch_assoc();
        $canswer= $row["answers"];
        //echo "$canswer";
        if($answer==$canswer){
            if($current_level!=$max){

                if($current_level==$level){
                    $level=$level+1;
                    $sql="UPDATE scores SET level='$level' where username='$username1'";
                    $result=$conn->query($sql);
                     echo "<h3>SUCCESS.</h3><p>You moved to next level.</p><script>setTimeout(function(){
                        window.location = \"crack_attaaack.php\";
                    },4000);</script>";
                }
                else{
                    echo "<p>SUCCESS.</p><p>You have already crossed this level.</p><script>setTimeout(function(){
                        window.location = \"crack_attaaack.php\";
                    },2000);</script>";
                }
                $current_level++;
                $_SESSION['level']=$current_level;
                           
            }
            else{
                echo "<h2>Congratulations. You have successfully cracked CRACK ATTAAACK. Wait we will contact you soon.</h2>";
            }
        }
        else{
            echo "<p>Wrong Answer. Try again</p><script>setTimeout(function(){
                window.location = \"crack_attaaack.php\";
            },2000);</script>";
        }
    }
    $conn->close();
?>