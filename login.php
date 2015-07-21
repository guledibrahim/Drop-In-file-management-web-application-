<?php
 session_start();
 include('connectdb.php');
 if(isset($_POST['submit']))
 {
  $username= trim($_POST['username']);
  $password= trim($_POST['password']);
  $query = "SELECT * FROM userdatabase WHERE username='$username' AND password= md5('$password') AND verify IS NULL";
  $result = mysqli_query($mysqli,$query) or die (mysqli_error());
  $num_row = mysqli_num_rows($result);
  $row=mysqli_fetch_array($result);
  if($num_row ==1)
{
   $_SESSION['username']=$row['username'];
   header("Location: myfiles.html");
   exit;
}
else
 {
   header("Location: index.html");   
  }
}

?>