<?php
// variaveis para conexão
$host="127.0.0.1";
$user="root";
$psw="";
$schema="Bancoep";

$con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
?>
