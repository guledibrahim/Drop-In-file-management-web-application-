<?php
include('myhub.php');
session_start();
$file = basename($_GET['file']);
$file = 'uploads/'.$_SESSION['user_name']. '/'.$fileab;

if(!$file){
    die('file not found');
} else {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);
}
?>