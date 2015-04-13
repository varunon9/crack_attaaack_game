<?php
$to = $email;
       $subject = "Confirmation from ROOH to $username1";
       $header = "Interaction: Confirmation from ROOH";
       $message = "Please click the link below to verify and activate your account. ";
       $message .= "http://localhost/confirm.php?passkey=$com_code";

       $sentmail = mail($to,$subject,$message,$header);

       if($sentmail)
       {
          echo "Your Confirmation link Has Been Sent To Your Email Address.<br>";
       }
       else
       {
          echo "Cannot send Confirmation link to your e-mail address<br>";
       }
?>