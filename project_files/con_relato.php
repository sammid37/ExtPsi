<?php
  session_start();
  include "conexao.php";
  $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
  // recuperando informações
  $titulo = $_POST['titrel'];
  $humor = $_POST['humor'];
  $pri = $_POST['privacidade'];
  $corpo = $_POST['bodyrel'];

  $insert = "INSERT INTO Relatos(titulo,codAutor,codhumor,privacidade,corpo) VALUES ('$titulo',$autor,$humor,$pri,'$corpo')";
  // echo $insert;
  $result = mysqli_query($con,$insert);

  if($result){
    echo "<h5 style='font-size:14pt' class='light-green-text'>Relato cadastrado com sucesso!</h5>";
  } else{
    echo "<h5 style='display:none'>Falha ao cadastrar relato!</h5>";
  }

  // fechando o conexao
  mysqli_close($con);
?>
