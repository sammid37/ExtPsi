<!-- MODAL HUMOR -->
<div id="humormodal" class="modal">
  <div class="modal-content">
    <h4>Humores Cadastrados</h4>
    <ul class="collection">
    <?php
      include "conexao.php";
      $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
      $select = "SELECT DISTINCT * FROM Humor H";
      $result=mysqli_query($con,$select);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
          echo "<li class='collection-item'>"
          .$row['humor'].
          "</li>";
      }}
    ?>
    </ul>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Fechar <i class="material-icons right">close</i></a>
      <!-- <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Fechar <i class="material-icons right">close</i></a> -->
  </div>
</div>
<!-- MODAL Categoria -->
<div id="categoriamodal" class="modal">
  <div class="modal-content">
    <h4>Categorias Cadastradas</h4>
    <ul class="collection">
    <?php
      include "conexao.php";
      $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
      $select = "SELECT DISTINCT * FROM Categoria C";
      $result=mysqli_query($con,$select);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
          echo "<li class='collection-item'>"
          .$row['catnome'].
          "</li>";
      }}
    ?>
    </ul>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Fechar <i class="material-icons right">close</i></a>
      <!-- <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Fechar <i class="material-icons right">close</i></a> -->
  </div>
</div>
<!-- MODAL SALA -->
<div id="salamodal" class="modal">
  <div class="modal-content">
    <h4>Salas Cadastradas</h4>
    <ul class="collection">
    <?php
      include "conexao.php";
      $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
      $select = "SELECT DISTINCT * FROM Sala S";
      $result=mysqli_query($con,$select);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
          echo "<li class='collection-item'>"
          .$row['salanome'].
          "</li>";
      }}
    ?>
    </ul>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Fechar <i class="material-icons right">close</i></a>
      <!-- <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Fechar <i class="material-icons right">close</i></a> -->
  </div>
</div>