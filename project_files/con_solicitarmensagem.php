<?php
  session_start();
  include "conexao.php";
  $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
  // recuperando dados
  $solicitar = $_POST['solicitar'];
  $solicitante = $_SESSION['matri'];
  $insert = "INSERT INTO Solicitar(matriAlu, solicitar) VALUES ($solicitante,'$solicitar')";
  echo $insert;
  $result = mysqli_query($con,$insert);

  if($result){
    echo "<h5 style='font-size:14pt' class='light-green-text'>Solicitado com sucesso!</h5>";
  } else{

    echo "<h5 style='display:none'>Falha ao solicitar encontro</h5>";
  }

  // fechando o conexao
  mysqli_close($con);
?>
