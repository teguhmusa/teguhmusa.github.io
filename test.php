<?php 
  $filename = "https://invitase.com/wp-comments-post.php"; //Obviously needs validation
  ob_end_clean();
  header("Content-Type: application/octet-stream; "); 
  header("Content-Transfer-Encoding: binary"); 
  header("Content-Length: ". filesize($filename).";"); 
  header("Content-disposition: attachment; filename=" . $filename);
  readfile($filename);
  die();
  ?>