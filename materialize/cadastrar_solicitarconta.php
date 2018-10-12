<?php
  session_start();
  // if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK" ||$_SESSION['ocupa'] != '3' ) ) {
  //   $_SESSION["acesso"] = "<script>alert('Você não é ADM do sistema');</script>";
  //   header("location: login.php");
  // }
  include_once '0header.php';
  include_once '0menu.php';

?>
<!--Conteúdo-->
<div class="container center-align">
  <div class="col s12 m12 l12">
    <div class="card ">
      <div class="card-content yellow lighten-3">
        <span class="card-title">Cadastrar Usuários</span>
          <p>
            Todos os campos são de preenchimento obrigatório(*), e certifique-se de preencher tudo corretamente.
          </p>
      </div>
    </div>
    <?php
      require 'con_solicitarconta.php';
    ?>
  </div>
  <!--Cadastro-->
  <div class="input-field">
    <div class="row">
      <form class="col s12 m12 l12" action="" method="post">
        <div class="row">
          <div class="input-field col s12 m6 l6">
            <input id="nome" type="text" name="nome" required="required">
            <label for="nome">Nome *</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <input id="sobrenome" type="text" name="sobrenome" required="required">
            <label for="sobrenome">Sobrenome *</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12 l12">
            <input id="email" type="email" name="email" required="required">
            <label for="email">Email *</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m6 l6">
            <input id="matricula" type="number" name="matricula" required="required">
            <label for="matricula">Matrícula *</label>
          </div>
          <div class="input-field col s12 m6 l6">
            <input id="senha" type="password" name="senha" required="required">
            <label for="senha">Senha *</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m3 l3">
            <select name="sexo" id="sexo">
              <option value="0" name="sexo" disabled selected>Selecione o seu gênero</option>
              <option value="1" name="sexo">Feminino</option>
              <option value="2" name="sexo">Masculino</option>
            </select>
            <label for="sexo">Sexo *</label>
          </div>
          <div class="input-field col s12 m3 l3">
            <select name="campus" id="campus" required="required">
              <option value="0" name="campus" disabled selected>Selecione o seu Campus</option>
              <option value="1" name="campus">Caicó</option>
            </select>
            <label for="campus">Informe o seu Campus *</label>
          </div>
          <div class="input-field col s12 m3 l3">
            <select name="ocupa" id="ocupa" required="required">
              <option value="0" name="ocupa" disabled selected>Selecione sua ocupação</option>
              <option value="1" name="ocupa">Psicológico</option>
              <option value="2" name="ocupa">Aluno</option>
            </select>
            <label for="ocupa">Ocupação na Instituição *</label>
          </div>
          <div class="input-field col s12 m3 l3">
              <input id="nasc" type="date" name="nasc" class="datepicker" required="required">
              <label for="nasc">Data de Nascimento *</label>
          </div>
        </div>
        <div class="row">
          <!--Enviar Formulário-->
          <button class="btn waves-effect waves-light blush-orange" type="submit" name="action">Enviar formulário<i class="material-icons right">send</i></button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  include_once '0footer.php';
?>
