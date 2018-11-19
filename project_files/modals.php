<!-- MODAL CONTAS SOLICITADAS AQUI -->
<div id="contasolicitadas" class="modal">
  <div class="modal-content">
    <h4>Contas Solicitadas</h4>
    <p>exemplo estático</p>
    <ul class="collection">
      <li class="collection-item">Maria da Luz</li>
      <li class="collection-item">José Bezerra</li>
      <li class="collection-item">MirianTech</li>
      <li class="collection-item">Katiúcia</li>
    </ul>
  </div>
  <div class="modal-footer">
     <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cadastrar</a>
    <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Fechar <i class="material-icons right">close</i></a>
  </div>
</div>
<!-- MODAL ALUNOS CADASTRADOS -->
<div id="alucad" class="modal">
  <div class="modal-content">
    <h4>Alunos Cadastrados</h4>
    <ul class="collection">
      <?php
        include "conexao.php";
        $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
        
        $select = "SELECT DISTINCT * FROM Aluno";
        $result=mysqli_query($con,$select);
        if($result){
          while($row=mysqli_fetch_assoc($result)){
            echo "
            <li class='collection-item'><b>".$row['matriAlu']."</b>&nbsp;".$row['nome']."&nbsp;".$row['sobrenome']."</li>";
        }}
      ?>
    </ul>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Fechar <i class="material-icons right">close</i></a>
  </div>
</div>
<!-- MODAL PSICÓLOGOS CADASTRADOS -->
<div id="psicad" class="modal">
  <div class="modal-content">
    <h4>Psicólogos Cadastrados</h4>
    <ul class="collection">
    <?php
      include "conexao.php";
      $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
      $select = "SELECT DISTINCT * FROM Psicologo";
      $result=mysqli_query($con,$select);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
          echo "
          <li class='collection-item'><b>".$row['matriPsi']."</b>&nbsp;".$row['nome']."&nbsp;".$row['sobrenome']."</li>";}}
    ?>
    </ul>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Fechar <i class="material-icons right">close</i></a>
  </div>
</div>
<!-- MODAL RELATOS CADASTRADOS -->
<div id="relcad" class="modal">
  <div class="modal-content">
    <h4>Relatos Cadastrados</h4>
    <ul class="collection">
    <?php
      include "conexao.php";
      $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
      $select = "SELECT DISTINCT * FROM Relatos R,Aluno A,Humor H WHERE R.codhumor = H.numhumor AND R.codAutor = A.matriAlu";
      $result=mysqli_query($con,$select);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
          echo "
          <li class='collection-item'><b>".$row['titulo']."</b>&nbsp;".$row['nome']."&nbsp;".$row['humor']."</li>";
      }}
    ?>
    </ul>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Fechar <i class="material-icons right">close</i></a>
  </div>
</div>
<!-- MODAL EXERCÍCIOS CADASTRADOS -->
<div id="exercad" class="modal">
  <div class="modal-content">
    <h4>Exercícios Cadastrados</h4>
    <ul class="collection">
    <?php
      include "conexao.php";
      $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
      $select = "SELECT DISTINCT* FROM Exercicios E, Categoria C WHERE E.categoria = C.categoria";
      $result=mysqli_query($con,$select);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
          echo "
          <li class='collection-item'><b>".$row['titulo']."</b>&nbsp;".$row['nome']."&nbsp;".$row['catnome']."</li>";
      }}
    ?>
    </ul>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-light btn-flat">Fechar <i class="material-icons right">close</i></a>
  </div>
</div>
