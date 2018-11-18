<!-- DROPDOWN -->
<ul id="contaPsi" class="dropdown-content">
  <li><a href="perfil_psi.php" class="dark-violet-text"><i class="material-icons">account_circle</i>PERFIL</a></li>
  <li><a href="tela_psi.php" class="dark-violet-text"><i class="material-icons">border_color</i>GERENCIAMENTO</a></li>
  <li><a href="#!" class="dark-violet-text"><i class="material-icons">settings</i>CONFIGURAÇÕES</a></li>
  <li class="divider"></li>
  <li><a href="logout.php" class="dark-violet-text"><i class="material-icons">keyboard_tab</i> SAIR</a></li>
</ul>
<ul id="contaAlu" class="dropdown-content">
  <li><a href="perfil_alu.php" class="dark-violet-text"><i class="material-icons">account_circle</i>PERFIL</a></li>
  <li><a href="tela_aluno.php" class="dark-violet-text"><i class="material-icons">border_color</i>GERENCIAMENTO</a></li>
  <li><a href="#!" class="dark-violet-text"><i class="material-icons">settings</i>CONFIGURAÇÕES</a></li>
  <li class="divider"></li>
  <li><a href="logout.php" class="dark-violet-text"><i class="material-icons">keyboard_tab</i> SAIR</a></li>
</ul>
<ul id="admin" class="dropdown-content">
  <li><a href="admin.php" class="dark-violet-text"><i class="material-icons">developer_board</i>Cadastrar</a></li>
  <li class="divider"></li>
  <li><a href="logout.php" class="dark-violet-text"><i class="material-icons">keyboard_tab</i> SAIR</a></li>
</ul>
<!-- MENU -->
<nav>
  <div class="nav-wrapper deep-violet">
    <a href="index.php" class="brand-logo" style="margin-left:1%; font-family:'Caveat',cursive; font-size:32pt;">Extensão Psicológica</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down" >
      <li><a title='tela inicial' href='index.php'>HOME</a></li>
      <li><a title='saiba mais sobre o projeto' href='tela_sobre.php'>SOBRE</a></li>
      <!-- <li><a title='iniciar sessão' href='login.php'><i class='material-icons left'>account_circle</i>LOGIN</a></li> -->
      <?php
        session_start();
        //  ISSO FUNCIONA, NÃO MEXA!!!
        if(!isset($_SESSION["acesso"]) || $_SESSION["acesso"] != TRUE) {
          echo"<li><a title='iniciar sessão' href='login.php'><i class='material-icons left'>account_circle</i>LOGIN</a></li>";
        }
        else{
          if ($_SESSION['ocupa'] == '1'){
            echo "
              <li>
                <a class='dropdown-button' href='#' data-activates='contaPsi'>
                  <i class='material-icons left'>account_circle</i>Bem-vindo(a), ".$_SESSION['nome']."&nbsp;".$_SESSION['sobrenome']."<i class='material-icons right'>arrow_drop_down</i></a>
              </li>";
          }elseif($_SESSION['ocupa'] == '2'){
            echo "
              <li>
                <a class='dropdown-button' href='#' data-activates='contaAlu'>
                  <i class='material-icons left'>account_circle</i>Bem-vindo(a), ".$_SESSION['nome']."&nbsp;".$_SESSION['sobrenome']."<i class='material-icons right'>arrow_drop_down</i></a>
              </li>";
          }
          else{
            echo "
              <li>
                <a class='dropdown-button' href='#' data-activates='admin'>
                  <i class='material-icons left'>account_circle</i>Bem-vindo(a), administrador!<i class='material-icons right'>arrow_drop_down</i></a>
              </li>";
          }
        }
        
      ?>
      </ul>
  </div>
</nav>
<main class="clean-neutral">
