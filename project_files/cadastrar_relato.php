<div class="input-field">
  <div class="row">
    <form class="col s12 m12 l12" action="" method="post">
      <div class="row">
        <div class="input-field col s12 m6 l6">
          <input type="text" name="titrel" id="titulo" required="required" data-length="50">
          <label for="titulo">Título do Relato *</label>
        </div>
        <div class="input-field col s12 m3 l3">
          <select name="humor" id="humor" required="required">
            <option name="humor" value="" disabled selected>Humor</option>
            <?php
            // variaveis para conexão
            include "conexao.php";
            $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
            $select="SELECT * FROM Humor";
            $result = mysqli_query($con,$select);
            while($row = mysqli_fetch_array($result)){
              echo"<option value='" . $row['numhumor'] . "' name='humor'>" .$row['humor']."</option>";
              // echo"<option  name='sala'>" .$row['descricao']."</option>";
            }
            ?>
          </select>
          <label for="humor">Meu humor *</label>
        </div>
        <div class="input-field col s12 m3 l3">
          <select name="privacidade" id="pri" required="required">
            <option name="privacidade" value="" disabled selected>Privacidade</option>
            <option name="privacidade" value="1">Privado</option>
            <option name="privacidade" value="2">Público</option>
          </select>
          <label for="pri">Privacidade *</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m12 l12">
          <textarea class="materialize-textarea" name="bodyrel" id="corpo" required="required" data-length="500"></textarea>
          <label for="corpo">Corpo do relato *</label>
        </div>
      </div>
      <div class="row">
        <div class="center-align">
          <button class="btn waves-effect waves-light blush-orange" type="submit" name="action">Publicar Relato
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
