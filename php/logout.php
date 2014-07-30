<?php
	session_start();
      unset($_SESSION['login']);  
      session_destroy();  
      $redirect_page = "login.php";
      header("Cache-Control: private, must-revalidate, max-age=0");
	  header("Pragma: no-cache");
      header('Location: '.$redirect_page);
?>