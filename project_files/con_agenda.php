<?php
session_start();
include "conexao.php";
$con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
// recuperando informações
$aluno = $_POST['aluno'];
$sala = $_POST['sala'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$comentario = $_POST['comentario'];
$psicologo = $_SESSION['matri'];

$insert = "INSERT INTO Agendamento(psicologo,aluno,sala,dia,hora,comentario) VALUES ($psicologo,$aluno,$sala,'$dia','$hora','$comentario')";
// echo $insert;
$result = mysqli_query($con,$insert);

if($result){
  echo "<h5 style='font-size:14pt' class='light-green-text'>Consulta marcada com êxito</h5>";
} else{
  echo "<h5 style='display:none'>Falha ao cadastrar encontro</h5>";;
}
// fecha conexão com o banco
mysqli_close($con);
?>
