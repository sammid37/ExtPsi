<?php
  // recuperando atributos
  $titulo = $_POST['titexer'];
  $imgexer = $_POST['imgexer'];
  $autor = $_POST['autorexer'];
  $origem = $_POST['linkexer'];
  $categoria = $_POST['categoria'];
  $conteudo = $_POST['contexer'];

  // variaveis para conexão
  $host="127.0.0.1";
  $user="root";
  $psw="";
  $schema="Bancoep";

  $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
  $insert = "INSERT INTO Exercicios(titulo,imgexer,autor,origem,categoria,conteudo) VALUES ('$titulo','$imgexer','$autor','$origem','$categoria','$conteudo')";
  // echo $insert;
  $result = mysqli_query($con,$insert);

  if($result){
    echo "<h5 style='font-size:14pt' class='light-green-text'>Exercício cadastrado com sucesso</h5>";
  }else{
    echo "<h5 style='display:none'>Falha ao cadastrar exercício</h5>";
  }

  // fechando o banco
  mysqli_close($con);

?>
