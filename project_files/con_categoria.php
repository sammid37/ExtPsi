<?php  
  include "conexao.php";
  $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
  $categoria = $_POST['categoria'];
  $insert = "INSERT INTO Categoria (catnome) VALUES ('$categoria');";
  echo $insert;
  $result = mysqli_query($con,$insert);

  if($result){
    echo "<h5>Categoria cadastrada com sucesso</h5>";
    header("location:admin2.php");
  }else{
    echo "<h5>Falha ao cadastrar categoria</h5>";
  }

  // fechando o banco
  mysqli_close($con);
?>