<?php
  session_start();
  if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK" ||$_SESSION['ocupa'] != '3' ) ) {
    $_SESSION["acesso"] = "<script>alert('Você não é ADM do sistema');</script>";
    header("location: login.php");
  }
  include_once '0header.php';
  include_once '0menu.php';
?>
<div class="container">
  <br>
  <div class="row">
    <!-- Cadastro Humor -->
    <div class="col s12 m4 l4">
      <!-- <div class="card ">
        <div class="card-content yellow lighten-3">
          <span class="card-title">Cadastro de Humor</span>
          <p>Referente ao humor do aluno em seu <b>relato</b>.</p>
        </div>
      </div> -->
      <h5 class="deep-violet-text">Cadastro de Humor</h5>
      <br>
      <form class="col s12 m12 l12" action="" method="post">
        <label for="humor">Humor</label>
        <input placeholder="Insira o nome da categoria" id="humor" name="humor" type="text" class="validate">
        <div class="center-align">
          <button class="btn waves-effect waves-light blush-orange" type="submit" name="action">Cadastrar Humor<i class="material-icons right">send</i></button>
        </div>
      </form>
    </div>
    <!-- Cadastro Categoria -->
    <div class="col s12 m4 l4">
      <h5 class="deep-violet-text">Cadastro de Categoria</h5>
      <br>
      <form class="col s12 m12 l12" action="" method="post">
        <label for="sala">Categoria</label>
        <input placeholder="Insira o nome da categoria" name="categoria" type="text" class="validate">
        <div class="center-align">
          <button class="btn waves-effect waves-light blush-orange" type="submit" name="action">Cadastrar Categoria<i class="material-icons right">send</i></button>
        </div>
      </form>
    </div>
    <!-- Cadastro de Salas -->
    <div class="col s12 m4 l4">
      <h5 class="deep-violet-text">Cadastro de Sala</h5>
      <br>
      <form class="col s12 m12 l12" action="" method="post">
        <label for="sala">Sala</label>
        <input placeholder="Insira o nome da sala" id="sala" name="sala" type="text" class="validate">
        <!-- <br>
        <label for="numerosala">Número da Sala</label>
        <input type="text" name="numerosala" placeholder="Informe o número da sala" class="validate"> -->
        <div class="center-align">
          <button class="btn waves-effect waves-light blush-orange" type="submit" name="action">Cadastrar Sala<i class="material-icons right">send</i></button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  include_once '0footer.php';
?>