<?php
// SESSÃO PSICÓLOGO
  session_start();
  if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK" ||$_SESSION['ocupa'] != '1' ) ) {
    $_SESSION["acesso"] = "<script>alert('Inicie a sessão antes, por favor');</script>";
    header("location: login.php");
  }
?>
<?php
// SESSÃO ALUNO
  session_start();
  if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK" ||$_SESSION['ocupa'] != '2' ) ) {
    $_SESSION["acesso"] = "<script>alert('Inicie a sessão antes, por favor');</script>";
    header("location: login.php");
  }
?>
