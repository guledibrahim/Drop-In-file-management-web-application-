<?php
include('myhub.php');
session_start();
$fileup = 'uploads/'.$_SESSION['username']. '/'.$_GET['$searchfolders'];
if (file_exists($fileup)) {
    echo "The folder already exists or enter name" .$_GET['$searchfolders'];;
} else {
   mkdir('uploads/'.$_SESSION['username']. '/'.$_GET['$searchfolders'], 0700);
   echo "Folder has been created";
}