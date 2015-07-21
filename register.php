<?php
session_start();
include('connectdb.php');
if(isset($_POST['submit']))
{
  if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/", $_POST['email']))
  {
   $email= $_POST['email'];
   $sql1 = "SELECT * FROM userdatabase WHERE email = '$email'";
   $result1 = mysqli_query($mysqli,$sql1) or die(mysqli_error());
   if (mysqli_num_rows($result1) > 0)
            {
    echo "This email has already been used";
   }

else
 {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $passwords = $_POST['password'];
  $password = md5($passwords);
  $verify = md5(uniqid(rand()));
  $sql2 = "INSERT INTO userdatabase (username, email, password, verify) VALUES ('$username', '$email', '$password', '$verify')";
  $result2 = mysqli_query($mysqli,$sql2) or die(mysqli_error()); 
  mkdir("uploads/$username");

 
  if($result2)
  {
   $to = $email;
   $subject = "Confirm  $username";
   $header = "CloudSync: Confirmation from drop in";
   $message = "http://www.dropin.netai.net/confirm.php?passkey=$verify";

   $sentmail = mail($to,$subject,$message,$header);

   if($sentmail)
            {
   echo "Activation code has been sent to your email, please also check junk mail";
   
   }
   else
         {
    echo "Cannot send Confirmation link to your e-mail address";
   }
  }

}  
}
}
?>