<?php 
  session_start();
  
  if (!empty($_SESSION["email"])) {
    unset($_SESSION["email"]);
  }
	echo json_encode(['result' => 1]); 
?>

	