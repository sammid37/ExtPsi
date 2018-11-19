<?php  
  include "conexao.php";
  $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
  $humor = $_POST['humor'];
  $insert = "INSERT INTO Humor (humor) VALUES ('$humor');";
  echo $insert;
  $result = mysqli_query($con,$insert);

  if($result){
    echo "<h5>Humor cadastrado com sucesso</h5>";
    header("location:admin2.php");
  }else{
    echo "<h5>Falha ao cadastrar humor</h5>";
  }

  // fechando o banco
  mysqli_close($con);
?>