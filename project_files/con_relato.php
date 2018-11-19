<?php
  session_start();
  include "conexao.php";
  $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
  // recuperando informações
  $autor = $_SESSION['matri'];
  $titulo = $_POST['titrel'];
  $humor = $_POST['humor'];
  $pri = $_POST['privacidade'];
  $corpo = $_POST['bodyrel'];

  $insert = "INSERT INTO Relatos(codAutor,titulo,codhumor,privacidade,corpo) VALUES ($autor,'$titulo',$humor,$pri,'$corpo')";
  echo $insert;
  $result = mysqli_query($con,$insert);

  if($result){
    echo "<h5>Relato cadastrado com sucesso!</h5>";
  } else{
    echo "<h5>Falha ao cadastrar relato!</h5>";
  }

  // fechando o conexao
  mysqli_close($con);
?>
