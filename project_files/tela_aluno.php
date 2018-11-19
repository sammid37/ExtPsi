<?php
  session_start();
  if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK" ||$_SESSION['ocupa'] != '2' ) ) {
    $_SESSION["acesso"] = "<script>alert('Inicie a sessão antes, por favor');</script>";
    header("location: login.php");
  }
  include_once '0header.php';
  include_once '0menu.php';
?>

<!-- Conteúdo -->
<div class="container">
  <div class="row">
    <div class="col s12 m4 l4">
      <!-- Relatos Publicados -->
      <div class="card">
        <div class="card-image">
          <img src="https://data.whicdn.com/images/285548038/large.jpg">
          <a href="#erelato" class="btn-floating halfway-fab waves-effect waves-light blush-orange modal-trigger">
            <i class="material-icons">edit</i>
          </a>
          <div id="erelato" class="modal">
            <div class="modal-content">
              <h5 class="center-align">Escrever um relato</h5>
              <?php
                require 'con_relato.php';
                include_once 'cadastrar_relato.php';
              ?>
            </div>
          </div>
        </div>
        <div class="card-content">
          <p>Todos os relatos publicados</p>
        </div>
        <div class="card-action">
          <a style="cursor:pointer" onclick="displayRelatos()" class="peach-pink-text">Meus Relatos</a>
        </div>
      </div>
    </div>
    <div class="col s12 m4 l4">
      <!-- Calendário ALuno -->
      <div class="card">
        <div class="card-image">
          <img src="https://data.whicdn.com/images/285548038/large.jpg">
          <a href="#solicitar" class="btn-floating halfway-fab waves-effect waves-light blush-orange modal-trigger">
            <i class="material-icons">date_range</i>
          </a>
          <div id="solicitar" class="modal">
            <div class="modal-content">
              <h5 class="center-align">Solicitar consulta com o Psicólogo</h5>
              <?php
                include 'cadastrar_solicitacaomensagem.php';
              ?>
            </div>
          </div>
        </div>
        <div class="card-content">
          <p>Agendamentos com o psicólogo(a)</p>
        </div>
        <div class="card-action">
          <a style="cursor:pointer" onclick="displayCalendario()" class="peach-pink-text">Agendamentos</a>
        </div>
      </div>
    </div>
    <div class="col s12 m4 l4">
      <!-- Favoritos -->
      <div class="card">
        <div class="card-image">
          <img src="https://data.whicdn.com/images/285548038/large.jpg">
        </div>
        <div class="card-content">
          <p>Todos os links favoritados</p>
        </div>
        <div class="card-action">
          <a style="cursor:pointer" onclick="displayFavoritos()" class="peach-pink-text">Favoritos</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="divider"></div>
  <br/>
  <!-- RELATOS -->
  <div id="relatos" style="display:none">
    <h5 class="center-align">Meus relatos</h5>
    <ul class="collection">
      <?php
      include "conexao.php";
      $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
      $alunoAutor = $_SESSION['matri'];
      $select = "SELECT R.titulo FROM Relatos R, Aluno A WHERE R.codAutor = A.matriAlu and A.matriAlu = $alunoAutor";
      $result = mysqli_query($con,$select);

      while($row = mysqli_fetch_array($result)){
        echo"
        <li class='collection-item'>
        ".$row[titulo].
          "<a href='#' style='float:right' title='deletar'>
          <i class='material-icons'>delete</i>
          </a>
        </li>";
      }
      ?>
    </ul>
  </div>
  <!-- AGENDAMENTO -->
  <div id="calendario" style="display:none">
    <h5 class="center-align">Agendamentos</h5>
    <div class="row">
      <ul id="tabs" class="tabs">
        <li class="tab col s6 m6 l6"><a href="#agendadas" class="active">Consultas marcadas</a></li>
        <li class="tab col s6 m6 l6"><a href="#solicitadas">Minhas solicitações</a></li>
      </ul>
      <div id="agendadas" class="col s12 m12 l12">
        <ul class="collection">
          <?php
          // variaveis para conexão
          include "conexao.php";
          $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
          $select = "SELECT * FROM Agendamento Ag, Sala S, Aluno A 
          WHERE Ag.aluno =".$_SESSION['matri'].";";
          $result = mysqli_query($con,$select);
          while($row = mysqli_fetch_array($result)){
            echo
            "<li class='collection-item'><b>Data:</b>
            ".$row['dia']." <b>Horário:</b>".$row['hora']."&nbsp;<b style='margin-left:50px;'>Local:</b>".$row[descricao].
            "&nbsp;<b style='margin-left:50px;'>Mensagem:</b>".$row['comentario']."
            </li>";
          }
          ?>
        </ul>
      </div>
      <div id="solicitadas" class="col s12 m12 l12">
        <ul class="collection">
          <?php  
            include "conexao.php";
            $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
            $select = "SELECT DISTINCT SE.solicitar FROM SolicitarEncontro SE, Aluno A 
            WHERE SE.matriAlu = ".$_SESSION['matri'];
            $result = mysqli_query($con,$select);
            while($row = mysqli_fetch_array($result)){
              echo "<li class='collection-item'><b>Mensagem de solicitação: </b>
              ".$row['solicitar']."
              </li>";
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
  <!-- Exercícios e atividades favoritas do feed -->
  <div id="favoritos" class="disabled" style="display:none">
    <h5 class="center-align">Meus links favoritos</h5>
    <div class="collection">
      <a href="#!" class="collection-item">Link1</a>
      <a href="#!" class="collection-item active"><i class="material-icons left">link</i> Link2</a>
      <a href="#!" class="collection-item">Link3</a>
      <a href="#!" class="collection-item">Link4</a>
    </div>
  </div>
</div>
<?php
  include_once '0footer.php';
?>
