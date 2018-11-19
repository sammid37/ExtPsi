<?php
  // include_once '0header.php';
  // include_once '1menu.php';
?>
<div class="input-field">
  <div class="row">
    <form class="col s12 m12 l12" action="con_agenda.php" method="post">
      <div class="row">
        <div class="input-field col s12 m3 l3">
          <select name="aluno" id="aluno" required="required">
            <option name="aluno" value="" disabled selected>Selecione o paciente</option>
            <?php
            // variaveis para conexão
            include "conexao.php";
            $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
            $select = "SELECT DISTINCT Al.nome, Al.sobrenome, Al.matriAlu FROM Aluno Al,Atribuicao Atri, Psicologo P 
            WHERE Al.matriAlu = Atri.matriAlu AND Atri.matriPsi =".$_SESSION['matri'].";";
            $result = mysqli_query($con,$select);

            while($row = mysqli_fetch_array($result)){
              echo"<option  name='nomeal' value='".$row['matriAlu']."'>" .$row['nome']." ".$row['sobrenome']."</option>";
            }
            ?>

          </select>
          <label for="aluno">Paciente *</label>
        </div>
        <div class="input-field col s12 m3 l3">
          <select name="sala" id="sala" required="required">
            <option name="sala" value="" disabled selected>Selecionar local</option>
            <?php
            include "conexao.php";

            $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
            $select = "SELECT * FROM Sala";
            $result = mysqli_query($con,$select);

            while($row = mysqli_fetch_array($result)){
              echo"<option value='" . $row['sala'] . "' name='sala'>" .$row['salanome']."</option>";
              // echo"<option  name='sala'>" .$row['descricao']."</option>";
            }
            ?>
          </select>
          <label for="local">Local *</label>
        </div>
        <div class="input-field col s12 m3 l3">
          <input id="dia" name="dia" type="text" class="datepicker" required="required">
          <label for="dia">Data *</label>
        </div>
        <div class="input-field col s12 m3 l3">
          <input id="hora" name="hora" type="text" class="timepicker" required="required">
          <label for="hora">Horário *</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m12 l12">
          <textarea id="comentario" name="comentario" class="materialize-textarea" data-length="300"></textarea>
          <label for="comentario">Comentário Extra</label>
        </div>
      </div>
      <div class="row">
        <div class="center-align">
          <button class="btn waves-effect waves-light blush-orange" type="submit" name="action">Marcar Encontro
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php
  // include_once '0footer.php';
?>
