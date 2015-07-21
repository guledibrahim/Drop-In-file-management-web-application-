<?php
  $file_to_delete = $_GET['name'];
  if (is_file($file_to_delete)){
    echo (unlink($file_to_delete) ? "File Deleted" : "Problem deleting file";

  }
?>