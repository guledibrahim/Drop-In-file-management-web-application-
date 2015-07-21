<?php
include('myhub.php');
session_start();
$filename = 'uploads/'.$_SESSION['username']. '/'.$fileab. '/';
if (file_exists($filename)) {
    rmdir('uploads/'.$_SESSION['username']. '/'.$fileab. '/'); 
     echo "Folder is deleted";
} else {
   echo "This is only for folders";
}
?>