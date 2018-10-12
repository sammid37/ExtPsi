<?php
  session_start();

  $host="127.0.0.1";
  $user="root";
  $psw="";
  $schema="Bancoep";

  $matri = isset($_POST['matri']) ? trim($_POST['matri']):FALSE;
  $senha = isset($_POST['senha']) ? trim($_POST['senha']):FALSE;

  if (!$matri || !$senha){
    $_SESSION['acesso']="Digite seus dados corretamente";
    header("location:login.php");
  }
  $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim".mysqli_connect_error());
  $select = "SELECT*FROM Usuarios WHERE matricula = '$matri' AND senha=md5('$senha')";
  $result = mysqli_query($con,$select);

  if(mysqli_num_rows($result) > 0){
  	$dados = mysqli_fetch_array($result);
    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['sobrenome'] = $dados['sobrenome'];
  	$_SESSION['matri'] = $dados['matricula'];
  	$_SESSION['senha'] = $senha;
  	$_SESSION['ocupa'] = $dados['ocupa'];
  	$_SESSION['acesso'] = "OK";

  	if($_SESSION['ocupa'] == 1){
  		header("location: tela_psi.php");
    } else if($_SESSION['ocupa'] == 2){
      header("location: tela_aluno.php");
    }else{
    	header("Location: admin.php");
    }
  }else {
  	$_SESSION['matri']  = $matri;
  	$_SESSION['senha']  = "";
  	$_SESSION['acesso'] = "Login ou senha inválido!";
  	header("Location: login.php");
  }
?>
