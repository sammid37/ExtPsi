<?php
  session_start();
  if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK" ||$_SESSION['ocupa'] != '3' ) ) {
    $_SESSION["acesso"] = "<script>alert('Você não é ADM do sistema');</script>";
    header("location: login.php");
  }
  include_once '0header.php';
  include_once '0menu.php';
?>
<div class="container center-align">
  <div class="col s12">
    <div class="card ">
      <div class="card-content yellow lighten-3">
        <span class="card-title">Cadastro de Exercícios</span>
          <p>
            Os exercícios cadastrados estarão visíveis na tela inicial. Preencha os campos obrigatórios(*).
          </p>
      </div>
    </div>
    <?php
      require 'con_exer.php';
    ?>
  </div>
  <div class="input-field">
    <div class="row">
      <form class="col s12" action="" method="post">
        <div class="row">
          <div class="input-field col s12 m4 l4">
            <input id="titexer" type="text" name="titexer" required="required" data-length="100">
            <label for="titexer">Título do Exercício*</label>
          </div>
          <div class="input-field col s12 m8 l8">
            <input id="imgexer" type="text" name="imgexer" placeholder="cole a URL aqui" required="required">
            <label for="imgexer">Imagem ilustrativa*</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m4 l4">
            <input id="autorexer" type="text" name="autorexer">
            <label for="autorexer">Autor do Exercício</label>
          </div>
          <div class="input-field col s12 m4 l4">
            <input id="linkexer" type="text" name="linkexer">
            <label for="linkexer">Origem do exercício</label>
          </div>
          <div class="input-field col s12 m4 l4">
            <select name="categoria" id="categoria" required="required">
              <option value="0" name="categoria" disabled selected>Selecione uma categoria</option>
              <?php
              // variaveis para conexão
              include "conexao.php";
              $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
              $select = "SELECT * FROM Categoria";
              $result = mysqli_query($con,$select);

              while($row = mysqli_fetch_array($result)){
                echo"
                <option value='
                ". $row['categoria'] . "
                ' name='categoria'>" 
                .$row['catnome'].
                "</option>";
              }
              ?>
            </select>
            <label for="categoria">Categoria do exercício*</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12 l12">
            <textarea id="contexer" class="materialize-textarea" name="contexer" required="required" data-length="500"></textarea>
            <label for="contexer">Conteúdo do exercício*</label>
          </div>
        </div>
        <div class="row">
          <button class="btn waves-effect waves-light blush-orange" type="submit" name="action">Enviar<i class="material-icons right">send</i></button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  include_once '0footer.php';
?>
