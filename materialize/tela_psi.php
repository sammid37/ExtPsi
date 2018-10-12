<?php
  session_start();
  $psionline = $_SESSION['matri'];
  if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK" ||$_SESSION['ocupa'] != '1' ) ) {
    $_SESSION["acesso"] = "<script>alert('Inicie a sessão antes, por favor');</script>";
    header("location: login.php");
  }
  include_once '0header.php';
  include_once '0menu.php';

?>
<!--conteúdo-->
<div class="container">
  <div class="row">
    <div class="col s12 m4 l4">
      <!-- Card Lista de Pacientes -->
      <div class="card">
        <div class="card-image">
          <img src="https://data.whicdn.com/images/246737278/original.gif">
        </div>
        <div class="card-content">
          <p>Lista com meus pacientes</p>
        </div>
        <div class="card-action">
          <a style="cursor:pointer" onclick="displayPacientes()" class="peach-pink-text">Meus Pacientes</a>
        </div>
      </div>
    </div>
    <div class="col s12 m4 l4">
      <!-- Card Agendamento -->
      <div class="card">
        <div class="card-image">
          <img src="https://data.whicdn.com/images/246737278/original.gif">
          <a href="#encontro" class="btn-floating halfway-fab waves-effect waves-light blush-orange modal-trigger">
            <i class="material-icons">date_range</i>
          </a>
          <!-- Agendamento -->
          <div id="encontro" class="modal">
            <div class="modal-content">
              <h5 class="center-align">Cadastrar novo encontro</h5>
              <?php
                require 'con_agenda.php';
                include_once 'cadastrar_agenda.php';
              ?>
            </div>
          </div>
        </div>
        <div class="card-content">
          <p>Agendamentos, encontros e afins</p>
        </div>
        <div class="card-action">
          <a style="cursor:pointer" onclick="displayCalendario()" class="peach-pink-text">Meu Calendário</a>
        </div>
      </div>
    </div>
    <div class="col s12 m4 l4">
      <!-- Card Favoritos -->
      <div class="card">
        <div class="card-image">
          <img src="https://data.whicdn.com/images/246737278/original.gif">
        </div>
        <div class="card-content">
          <p>Links favoritados</p>
        </div>
        <div class="card-action">
          <a style="cursor:pointer" onclick="displayFavoritos()" class="peach-pink-text">Meus Favoritos</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="divider"></div>
  <div id="pacientes"  style="display:none">
    <h5 class="center-align">Meus pacientes</h5>
    <ul class="collection">
      <?php
      // variaveis para conexão
      $host="127.0.0.1";
      $user="root";
      $psw="";
      $schema="Bancoep";

      $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
      $select = "SELECT Al.nome, Al.sobrenome, Al.matriAlu
      FROM Aluno Al, Atribuicao At
      WHERE At.matriAlu = Al.matriAlu
      AND At.matriPsi = $psionline
      ";
      $result = mysqli_query($con,$select);

      while($row = mysqli_fetch_array($result)){
        echo"
        <li class='collection-item'>
        <b>".$row[matriAlu]."</b>
        ".$row[nome]."&nbsp;".$row['sobrenome']."
        <a href='#' style='float:right' title='visualizar perfil' class='peach-pink-text'>
          <i class='material-icons'>account_box</i>
        </a>
        </li>";
      }
      ?>
    </ul>
  </div>
  <div id="calendario" style="display:none">
    <h5 class="center-align">Calendario</h5>
    <?php
    include_once 'calendario.php';
    ?>
    <br>

    <div class="row">
    <ul id="tabs" class="tabs">
      <li class="tab col s6 m6 l6"><a href="#marcadas" class="active">Consultas Marcadas</a></li>
      <li class="tab col s6 m6 l6"><a href="#solicitadas">Consultas Solicitadas</a></li>
    </ul>
    <div id="marcadas" class="col s12 m12 l12">
      <ul class="collection">
        <?php

          $host="127.0.0.1";
          $user="root";
          $psw="";
          $schema="Bancoep";

          $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
          $select = "SELECT Al.nome, A.dia, A.comentario, A.hora, S.salanome
          FROM Agendamento A, Sala S, Aluno Al, Psicologo P, Atribuicao At
          WHERE A.psicologo = P.matriPsi
          AND P.matriPsi=$psionline
          AND $psionline = At.matriPsi
          AND A.aluno=Al.matriAlu
          AND A.aluno=At.matriAlu
          AND S.sala = A.sala";
          $result = mysqli_query($con,$select);

          while($row = mysqli_fetch_array($result)){
            echo
            "<li class='collection-item'><b>Nome:</b>".$row['nome']."
            <b style='margin-left:50px;'>Data:</b>
            ".$row['dia'].$row['hora']."&nbsp;<b style='margin-left:50px;'>Local:</b>".$row[salanome ].
            "&nbsp;<b style='margin-left:50px;'>Mensagem:</b>".$row['comentario']."
            <div class='right'>
            <a href='#' class='peach-pink-text' style='margin-right:10px'><i class='material-icons'>edit</i></a>
            <a href='#' class='peach-pink-text'><i class='material-icons'>delete</i></a>
            <div>
            </li>";
          }
          ?>
      </ul>
    </div>
    <div id="solicitadas" class="col s12 m12 l12">
      <ul class="collection">
        <li class="collection-item">
          <b>Nome: </b> Nome do aluno
          <b style="margin-left:50px;">Mensagem: </b> Mensagem do aluno que solicitou a consulta
          <div class="right">
            <a href="#" class="peach-pink-text"><i class="material-icons">close</i></a>
          </div>
        </li>
        <?php
          $host="127.0.0.1";
          $user="root";
          $psw="";
          $schema="Bancoep";

          $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
          $select = "SELECT * FROM Solicitar S, Aluno A WHERE S.matriAlu=A.matriAlu";
          $result = mysqli_query($con,$select);

          while($row = mysqli_fetch_array($result)){
            echo
            "<li class='collection-item'><b>Nome:</b>"
            .$row['nome'].
            "<b style='margin-left:50px;'>Mensagem:</b>"
            .$row['solicitar'].
            "<div class='right'>
              <a href='#' class='peach-pink-text'><i class='material-icons'>close</i></a>
            <div>
            </li>";
          }
          ?>
      </ul>
    </div>
  </div>


  </div>
  <!-- Exercícios e atividades favoritas do feed -->
  <div id="favoritos"  style="display:none">
    <div class="collection">
      <a href="#!" class="collection-item">Link1</a>
      <a href="#!" class="collection-item active"><i class="material-icons left">link</i> Link2</a>
      <a href="#!" class="collection-item">Link3</a>
      <a href="#!" class="collection-item">Link4</a>
    </div>
  </div>
</div>
</br>
<?php
  include_once '0footer.php';
?>
