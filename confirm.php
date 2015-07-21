<?php
 include('connectdb.php');
 $passkey = $_GET['passkey'];
 $sql = "UPDATE userdatabase SET verify=NULL WHERE verify='$passkey'";
 $result = mysqli_query($mysqli,$sql) or die(mysqli_error());
 if($result)
 {
  echo '<div> Hello, Your account has now been activated. You may now <a href="index.html">Log in</a></div>';
}
 else
 {
  echo "Error occured.";
 }
?>