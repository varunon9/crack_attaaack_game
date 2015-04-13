<!DOCTYPE html>
<html>
  <head>
    <title>Crack Attaaack|Leaderboard</title>
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
        #leaderboard{
          margin-top:65px;
          //font-size:1em;
          margin-bottom:20px;
        }
        .active{
          background-color:silver;
        }
        
        @media only screen and (max-width:740px){
          #leaderboard{
            font-size:.9em;
          }
        
        }
        @media only screen and (max-width:320px){
          #leaderboard{
            font-size:.8em;
            margin-top:50px;
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
            <li><a href="leaderboard.php" class="active">Leaderboard</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div id="leaderboard">
		<?php
 			require 'db_connect.php';

			$sql = "SELECT username,level,date_of_joining FROM scores order by level desc,date_of_joining desc";
			$result = $conn->query($sql);
			$rank=1;
			if ($result->num_rows > 0) {
    			echo "<div class=\"container\" id=\"rank\"><div class=\"row\"><div class=\"col-md-12\"><div class=\"table-responsive\"><table class=\"table\"><thead><tr><th>Rank</th><th>Username</th><th>Level</th></tr></thead><tbody>";
    			// output data of each row
    				while($row = $result->fetch_assoc()) {
        				echo "<tr><td>".$rank."</td><td>".$row["username"]."</td><td>".$row["level"]."</td></tr>";
        				$rank++;
    				}
    				echo "</tbody></table></div></div></div></div>";
			} else {
   				 echo "0 results";
			}
			$conn->close();
			?>
	  </div>
    </body>
</html>