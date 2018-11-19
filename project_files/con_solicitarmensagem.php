<?php
  session_start();
  include "conexao.php";

  $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
  // recuperando dados
  $solicitar = $_POST['solicitar'];
  $solicitante = $_SESSION['matri'];
  $solicitado = "SELECT Atri.matriPsi 
FROM Psicologo P, Atribuicao Atri, Aluno A 
WHERE Atri.matriPsi = P.matriPsi AND A.matriAlu = $solicitante AND Atri.matriAlu = $solicitante;";

  $pesquisa = mysqli_query($con,$solicitado);
  if ($pesquisa->num_rows > 0) {
      // output data of each row
      while($row = mysqli_fetch_array($pesquisa)){
        echo"<p>" . $row['matriPsi'] . "</p>";
        $solicitado = $row['matriPsi'];
        echo $solicitado;
        $insert = "INSERT INTO SolicitarEncontro(matriAlu,matriPsi,solicitar) 
        VALUES ($solicitante,$solicitado,'$solicitar');";
        echo $insert;
      
        $result = mysqli_query($con,$insert);
        if($result){
          echo "<h5>Solicitado com sucesso!</h5>";
          header("location: tela_aluno.php");
          mysqli_close($con);
        } else{
          echo "<h5>Falha ao solicitar encontro</h5>";
          mysqli_close($con);
        } 
      }  
  } else {
      echo "0 results";
  }
mysqli_close($con);
?>
