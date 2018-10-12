<?php
  // pegando atributos
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $email = $_POST['email'];
  $matricula = $_POST['matricula'];
  $senha = $_POST['senha'];
  $sexo = $_POST['sexo'];
  $campus = $_POST['campus'];
  $ocupa = $_POST['ocupa'];
  $nasc = $_POST['nasc'];

  // variaveis para conexão
  $host="127.0.0.1";
  $user="root";
  $psw="";
  $schema="Bancoep";

  // estabelecendo conexao
  $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");

  if($ocupa==1){
    // $insertP = "INSERT INTO Psicologo VALUES ('$nome','$sobrenome','$email',$matricula,md5('$senha'),$sexo,$campus,$ocupa,'$nasc')";
    $insert = "INSERT INTO SolicitarConta VALUES ('$nome','$sobrenome','$email',$matricula,md5('$senha'),$sexo,$campus,$ocupa,'$nasc')";
    // echo $insert;
    $result = mysqli_query($con,$insertP);
    $result = mysqli_query($con,$insert);
    if($result){
      echo "<h5 style='font-size:14pt' class='light-green-text'>Psicólogo cadastrado com sucesso</h5>";
    }else{
      echo "<h5 style='font-size:14pt' class='red-text text-lighten-1'>Não foi possível cadastrar psicólogo</h5>";
    }
  }elseif($ocupa==2){
    //$insertA = "INSERT INTO Aluno VALUES ('$nome','$sobrenome','$email',$matricula,md5('$senha'),$sexo,$campus,$ocupa,'$nasc')";
    $insert = "INSERT INTO SolicitarConta VALUES ('$nome','$sobrenome','$email',$matricula,md5('$senha'),$sexo,$campus,$ocupa,'$nasc')";
    // echo $insert;
    $result = mysqli_query($con,$insertA);
    $result = mysqli_query($con,$insert);

    if($result){
      echo "<h5 style='font-size:14pt' class='light-green-text'>Aluno cadastrado com Sucesso</h5>";
    }else{
      echo "<h5 style='font-size:14pt' class='red-text text-lighten-1'>Não foi possível cadastrar aluno</h5>";
    }
  }else{
    echo "<h5 style='display:none'>Esse tipo de usuário não existe</h5>";
  }

  // fechando o banco
  mysqli_close($con);
?>
