<?php
  include_once '0header.php';
  include_once '0menu.php';
?>
<?php
  session_start();

  if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK") ) {
  	$_SESSION["acesso"] = "";
  	header("location: login.php");
  } else{
  	session_destroy();
  }
  header("location: index.php");
?>
<?php
  include_once '0footer.php';
?>
