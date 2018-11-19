<?php
  include "conexao.php";
  $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
  // recuperando atributos
  $titulo = $_POST['titexer'];
  $imgexer = $_POST['imgexer'];
  $autor = $_POST['autorexer'];
  $origem = $_POST['linkexer'];
  $categoria = $_POST['categoria'];
  $conteudo = $_POST['contexer'];

  $insert = "INSERT INTO Exercicios(titulo,imgexer,autor,origem,categoria,conteudo) VALUES ('$titulo','$imgexer','$autor','$origem',$categoria,'$conteudo')";
  // echo $insert;
  $result = mysqli_query($con,$insert);

  if($result){
    header("location:index.php");
  }else{
    echo "<h5>Falha ao cadastrar exercício</h5>";
  }

  // fechando o banco
  mysqli_close($con);

?>
