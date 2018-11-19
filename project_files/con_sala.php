<?php  
  include "conexao.php";
  $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
  $salanome = $_POST['sala'];
  $numsala = $_POST['numsala'];
  $insert = "INSERT INTO Sala (sala, salanome) VALUES ($numsala,'$salanome');";
  echo $insert;
  $result = mysqli_query($con,$insert);

  if($result){
    echo "<h5>Sala cadastrada com sucesso</h5>";
    header("location:admin2.php");
  }else{
    echo "<h5>Falha ao cadastrar sala</h5>";
  }

  // fechando o banco
  mysqli_close($con);
?>