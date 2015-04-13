<?php
    session_start();
    $username1= $_SESSION['username'];
    if(!isset($_SESSION['username'])){
        header('Location: index.html');
        exit;
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Crack Attaaack</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="author" content="Varun kumar" >
    	<link rel="shortcut icon" href="images/logo.jpg">
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
		<link href="css/bootstrap.css" rel="stylesheet">
      <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
			<link href="css/landing-page.css" rel="stylesheet">
      <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <style type="text/css">
        body{
          width:100%;
          height:100%;
        }

        .navbar img{
          width:60%;
          margin-top:3%;
          max-width:300px;
        }
        #play{
          margin-top:65px;
          //font-size:1em;
          margin-bottom:20px;
        }
        .active{
          background-color:silver;
        }
        #wish{
          width:100%;
          padding:2%;
        }
        #answers{
          width:100%;
          padding:5%;
        }
        #questions{
          width:100%;
          padding:.5%;
        }
        #questions img{
          width:40%;
          min-width:200px;
        }
        #answers .form-signin{
          width:30%;
        }
        @media only screen and (max-width:740px){
          #play{
            font-size:.9em;
          }
          #answers .form-signin{
          width:50%;
        }
        }
        @media only screen and (max-width:320px){
          #play{
            font-size:.8em;
            margin-top:50px;
          }
          #answers .form-signin{
          width:100%;
        }
        }
      </style>
  </head>
  <body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="images/logo.jpg" alt="Crack Attaaack" class="logo"/></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav ">
            <li><a href="index.html#crack_attaaack">Home</a></li>

            <li><a href="index.html#about_us">About Us</a></li>
            <li><a href="index.html#contact_us">Contact Us</a></li>

              <li><a href="index.html#rules">Rules</a></li>
            <li><a href="index.html#hints">Hints</a></li>
            <li><a href="leaderboard.php">Leaderboard</a></li>
            <li><a href="logout.php">Logout</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div id="play">
        <div id="wish"><code>Hi <?php echo $username1; ?>!!</code>
          <p>You are at Level 
            <?php require 'show_level.php';?> Good Luck!
          </p>
          <form action="switch_level.php" method="post">
            Switch to Level: 
            <select name="input_level">
               <script>
                  for(var i =1;i<=10;i++)
                     document.write("<option value = "+i+">"+i+"</option>");
               </script>
            </select>
            <input type="submit" value="Go"/>
          </form>
        </div>
        <div id="questions">
            <center>
                <img src="questions/<?php require 'show_questions.php';?>" alt="Image"/>
            </center>
        </div>
        <div id="answers">
          <center>
          <form class="form-signin" action="check_answer.php" method="post">
            <h3 class="form-signin-heading">Your Answer</h3>
            <p>Type your answer in lowercase letters only.</p>
               <p>You may request hint for this questions by clicking <a href="hint.html"> here.</a></p>
            <input type="text" name="answer" class="form-control" placeholder="Your answer" required autofocus>
  
            <button class="btn btn-lg btn-primary btn-block" style="margin-top:10px;"type="submit">Send</button>
          </form>
          </center>
        </div>
    </div>
   </body>
 </html>
