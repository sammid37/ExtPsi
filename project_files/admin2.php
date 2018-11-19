<?php
  session_start();
  if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK" ||$_SESSION['ocupa'] != '3' ) ) {
    $_SESSION["acesso"] = "<script>alert('Inicie a sessão antes, por favor');</script>";
    header("location: login.php");
  }
  include_once "0header.php";
  include_once "0menu.php";
?>
<br/>
<div class="container">
  <div class="row">
    <?php 
    include "conexao.php";
    $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
    
    $humores="SELECT COUNT(H.numhumor) AS TotalHumor FROM Humor H";
    $categorias="SELECT COUNT(CT.categoria) AS TotalCategorias FROM Categoria CT";
    $salas="SELECT COUNT(S.sala) AS TotalSalas FROM Sala S";
    
    $resultHumor=mysqli_query($con,$humores);
    $resultCategoria=mysqli_query($con,$categorias);
    $resultSala=mysqli_query($con,$salas);
    
    if ($resultHumor) {
      while ($row=mysqli_fetch_assoc($resultHumor)) {
        echo "
        <div class='col s12 m4 l4'>
          <div class='card blush-orange'>
            <div class='card-content white-text'><center><i class='large material-icons'>mood</i></center></div>
            <div class='card-action'>
              <a href='#humormodal' class='waves-effect waves-teal btn-flat white-text center-align modal-trigger'>".$row['TotalHumor']." Humores cadastrados</a>
            </div>
          </div>
        </div>
        ";
      }
    }
    if ($resultCategoria) {
      while ($row=mysqli_fetch_assoc($resultCategoria)) {
        echo "
        <div class='col s12 m4 l4'>
          <div class='card blush-orange'>
            <div class='card-content white-text'><center><i class='large material-icons'>flag</i></center></div>
            <div class='card-action'>
              <a href='#categoriamodal' class='waves-effect waves-teal btn-flat white-text center-align modal-trigger'>".$row['TotalCategorias']." Categorias cadastradas</a>
            </div>
          </div>
        </div>
        ";
      }
    }
    if ($resultSala) {
      while ($row=mysqli_fetch_assoc($resultSala)) {
        echo "
        <div class='col s12 m4 l4'>
          <div class='card blush-orange'>
            <div class='card-content white-text'><center><i class='large material-icons'>insert_invitation</i></center></div>
            <div class='card-action'>
              <a href='#salamodal' class='waves-effect waves-teal btn-flat white-text center-align modal-trigger'>".$row['TotalSalas']." Salas cadastradas</a>
            </div>
          </div>
        </div>
        ";
      }
    }
    ?>
  </div>
  <?php  
    include_once "modals2.php";
  ?>
  <div class="divider"></div>
  <br><br>
  <div class="row">
    
    <div class="col s12">
      
      <ul class="tabs">
        <li class="tab col s4"><a href="#humor" class="active">Cadastrar Humor</a></li>
        <li class="tab col s4"><a href="#categoria">Cadastrar Categoria</a></li>
        <li class="tab col s4"><a href="#sala">Cadastrar Sala</a></li>
      </ul>
    </div>
    <div id="humor" class="col s12">
      <!-- Cadastro Humor -->
      <div class="col s12 m12 l12">
        <!-- <h5 class="deep-violet-text">Cadastro de Humor</h5> -->
        <br>
        <form class="col s12 m12 l12" action="con_humor.php" method="post">
          <label for="humor">Humor</label>
          <input placeholder="Insira o nome da categoria" id="humor" name="humor" type="text" class="validate">
          <div class="center-align">
            <button class="btn waves-effect waves-light blush-orange" type="submit" name="action">Cadastrar Humor<i class="material-icons right">send</i></button>
          </div>
        </form>
      </div>
    </div>
    <div id="categoria" class="col s12">
      <!-- Cadastro Categoria -->
      <div class="col s12 m12 l12">
        <!-- <h5 class="deep-violet-text">Cadastro de Categoria</h5> -->
        <br>
        <form class="col s12 m12 l12" action="con_categoria.php" method="post">
          <label for="sala">Categoria</label>
          <input placeholder="Insira o nome da categoria" name="categoria" type="text" class="validate">
          <div class="center-align">
            <button class="btn waves-effect waves-light blush-orange" type="submit" name="action">Cadastrar Categoria<i class="material-icons right">send</i></button>
          </div>
        </form>
      </div>
    </div>
    <div id="sala" class="col s12">
      <!-- Cadastro de Salas -->
      <div class="col s12 m12 l12">
        <!-- <h5 class="deep-violet-text">Cadastro de Sala</h5> -->
        <br>
        <form class="row" action="con_sala.php" method="post">
          <div class="col s8 m8 l8">
            <label for="sala">Sala</label>
            <input placeholder="Insira o nome da sala" id="sala" name="sala" type="text" class="validate">
          </div>
          <div class="col s4 m4 l4">
            <label for="numerosala">Número da Sala</label>
            <input type="text" name="numsala" placeholder="Informe o número da sala" class="validate">
          </div>
          <div class="center-align">
            <button class="btn waves-effect waves-light blush-orange" type="submit" name="action">Cadastrar Sala<i class="material-icons right">send</i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
include_once "0footer.php";
?>