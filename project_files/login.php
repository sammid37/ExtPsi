<?php
	session_start();
	$matri = isset($_SESSION['matri']) ? $_SESSION['matri'] : "";
	$senha = isset($_SESSION['senha']) ? $_SESSION['senha'] : "";
?>
<?php
  include_once '0header.php';
  include_once '1menu.php';
?>
<div><br/><br/></div>
<div class="container center-align">
  <div class="input-field center-align">
    <div class="row">
      <?php
      if(isset($_SESSION['acesso']) && $_SESSION['acesso'] != "OK") {
				echo "<h6 class='center-align'>".$_SESSION['acesso']."</h6>";
        // echo  $_SESSION['acesso'];
      }
		  ?>
      <form class="col s12 m6 offset-m3 center-align l6 offset-l3 center-align" action="autenticar.php" method="post">
        <div class="row">
          <div class="input-field col s12 m12 l12 center-align">
            <input id="matri" type="text" name="matri"required="required" value="<?php echo $matri; ?>">
            <label for="matri"><i class="tiny material-icons">account_circle</i> MATRÍCULA</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12 12">
            <input id="senha" type="password" name="senha" required="required" value="<?php echo $senha; ?>">
            <label for="senha"><i class="tiny material-icons">vpn_key</i> SENHA</label>
          </div>
        </div>
        <div class="row">
          <!--Enviar Formulário-->
          <button class="btn waves-effect waves-light blush-orange" type="submit" name="enviar">
            Entrar<i class="material-icons right">send</i>
          </button>
        </div>
        <a class="peach-pink-text" href="#">Em breve a opção de solicitar uma conta!</a>
      </form>
    </div>
  </div>
</div>
<?php
  include_once '0footer.php';
?>
