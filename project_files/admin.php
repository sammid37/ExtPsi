<?php
  session_start();
  if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK" ||$_SESSION['ocupa'] != '3' ) ) {
    $_SESSION["acesso"] = "<script>alert('Inicie a sessão antes, por favor');</script>";
    header("location: login.php");
  }
  include_once "0header.php";
  include_once "0menu.php";
?>
  <br/>
  <div class="container">
    <!-- <div class="card yellow lighten-4"> -->
      <div class="card-content ">
        <div class="row">
          <?php
          include "conexao.php";
          $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
          $user="SELECT COUNT(U.matricula) AS Usuarios FROM Usuarios U;";
          $relato="SELECT COUNT(R.cod) AS TotalRel FROM Relatos R;";
          $exer="SELECT COUNT(E.cod) AS TotalExer FROM Exercicios E;";
          $cadastrados="SELECT DISTINCT COUNT(A.matriAlu) AS aluno, COUNT(P.matriPsi) AS psicologo FROM Aluno A, Psicologo P;";
          
          $resultU=mysqli_query($con,$user);
          $resultR=mysqli_query($con,$relato);
          $resultE=mysqli_query($con,$exer);
          $resultC=mysqli_query($con,$cadastrados);

          if($resultC){
            while($row=mysqli_fetch_assoc($resultC)){
              echo "<div class='col s12 m6 l6'>
                <div class='card blush-orange'>
                  <!--<div class='card-image'>
                    <img src='https://data.whicdn.com/images/281655397/large.jpg'>
                    <a class='btn-floating halfway-fab waves-effect waves-light red'><i class='material-icons'>add</i></a>
                  </div>-->
                  <div class='card-content white-text'><center><i class='large material-icons'>person</i></center></div>
                  <div class='card-content white-text'>
                    <center>
                      <a href='#alucad' class='waves-effect waves-teal btn-flat white-text center-align modal-trigger'>".$row['aluno']." alunos cadastrados</a>
                      <a href='#psicad' class='waves-effect waves-teal btn-flat white-text center-align modal-trigger'>".$row['psicologo']." psicólgos cadastrados</a>
                    </center>
                    <!--<center><i class='large material-icons'>person</i></center>-->
                  </div>
                  <div class='card-action'>
                    <center>
                      <a href='#contasolicitadas' class='collection-item white-text modal-trigger'>Solicitações de nova conta em breve<span class='new badge'>?</span></a>
                    </center>
                  </div>
                </div>
              </div>";
            }
          }
          if($resultR){
            while($row=mysqli_fetch_assoc($resultR)){
              echo "<div class='col s6 m3 l3'>
                <div class='card blush-orange'>
                  <div class='card-content white-text'><center><i class='large material-icons'>receipt</i></center></div>
                  <div class='card-action'>
                    <a href='#relcad' class='waves-effect waves-teal btn-flat white-text center-align modal-trigger'>".$row['TotalRel']." Relatos cadastrados</a>
                  </div>
                </div>
              </div>";
            }
          }
          if($resultE){
            while($row=mysqli_fetch_assoc($resultE)){
              echo "<div class='col s6 m3 l3'>
                <div class='card blush-orange'>
                  <div class='card-content white-text'><center><i class='large material-icons'>web_asset</i></center></div>
                  <div class='card-action'>
                    <a href='#exercad' class='waves-effect waves-teal btn-flat white-text center-align modal-trigger'>".$row['TotalExer']." Exercícios cadastrados</a>
                  </div>
                </div>
              </div>";
            }
          }
          ?>

        </div>
      </div>
    <!-- </div> -->
    <?php
      include_once "modals.php";
    ?>
    <div class="divider"></div><br>
      <a href="cadastrar_users.php" class="waves-effect waves-light btn dawn-blue">Cadastrar Usuários</a>
      <a href="cadastrar_exer.php" class="waves-effect waves-light btn dawn-blue">Cadastrar Exercícios</a>
      <a href="cadastrar_atri.php" class="waves-effect waves-light btn dawn-blue">Atribuir Psicólogo à Aluno</a>
    </div>
<?php
  include_once "0footer.php";
?>