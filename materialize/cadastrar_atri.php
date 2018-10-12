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
  <div class="col s12 m12 l12">
    <div class="card ">
      <div class="card-content yellow lighten-3">
        <span class="card-title">Atribuir psicólogo à aluno</span>
        <p>
          Antes de tudo é necessário atribuir um psicólogo aos alunos do campus.
        </p>
      </div>
    </div>
    <?php
      require 'con_atri.php';
    ?>
  </div>
  <div class="input-field">
    <div class="row">
      <form class="col s12 m12 l12" action="" method="post">
        <div class="row">
          <div class="input-field col s12 m5 l5">
            <select name="psi">
              <option name="psi" value="">Selecione Psicólgo</option>
              <?php
                $host="127.0.0.1";
                $user="root";
                $psw="";
                $schema="Bancoep";

                $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
                $select = "SELECT * FROM Psicologo";
                $result = mysqli_query($con,$select);
                while($row = mysqli_fetch_array($result)){
                  echo"
                  <option value='"
                  . $row['matriPsi'] .
                  "' name='psi'>"
                  .$row['nome'].
                  "&nbsp;"
                  .$row['sobrenome'].
                  "</option>";
                }
              ?>
            </select>
          </div>
          <div class="input-field col s12 m2 l2 ">
            <i class="medium material-icons">arrow_forward</i>
          </div>
          <div class="input-field col s12 m5 l5">
            <select name="alu">
              <option name="alu" value="">Selecione Aluno</option>
              <?php
                $host="127.0.0.1";
                $user="root";
                $psw="";
                $schema="Bancoep";

                $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
                $select = "SELECT * FROM Aluno";
                $result = mysqli_query($con,$select);
                while($row = mysqli_fetch_array($result)){
                  echo"
                  <option value='"
                  . $row['matriAlu'] .
                  "' name='alu'>"
                  .$row['nome'].
                  "&nbsp;"
                  . $row['sobrenome'].
                  "</option>";
                }
              ?>
            </select>
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
