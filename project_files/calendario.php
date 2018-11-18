<?php
// include_once '0header.php';
// include_once '0menu.php';
?>
<style>
.month {
    padding: 70px 25px;
    width: 100%;
    background: #FFA174;
    text-align: center;
}

.month ul {
    margin: 0;
    padding: 0;
}

.month ul li {
    color: white;
    font-size: 20px;
    text-transform: uppercase;
    letter-spacing: 3px;
}

.month .prev {
    float: left;
    padding-top: 10px;
}

.month .next {
    float: right;
    padding-top: 10px;
}

.weekdays {
    margin: 0;
    padding: 10px 0;
    background-color: #ddd;
}

.weekdays li {
    display: inline-block;
    width: 13%;
    color: #666;
    text-align: center;
}

.days {
    padding: 10px 0;
    background: #eee;
    margin: 0;
}

.days li {
    list-style-type: none;
    display: inline-block;
    width: 13%;
    text-align: center;
    margin-bottom: 5px;
    font-size:12px;
    color: #777;
}

.days li .active {
    padding: 5px;
    background: #FFA174;
    font-weight:600;
    border-radius:50%;
    color: white !important
}
.encontro{
  border-bottom:3px solid #FFA174;
  width:1px;
  padding:5px;
  font-weight:600
}
.legenda{
  padding-top:-10px;
  padding-left:1em;
  padding-right:1em;
  padding-bottom:1em;
}
.legenda-itens li{
  padding-bottom:0.8em;
  font-size:10pt;
  /*background-color:#ccc;*/
}

}
/* Add media queries for smaller screens */
/*@media screen and (max-width:720px) {
    .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
    .weekdays li, .days li {width: 12.5%;}
    .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
    .weekdays li, .days li {width: 12.2%;}
}*/
.mailpaciente p{
  font-weight:800;
  padding:0.8em;
  border-bottom: 1px solid #ccc;
}
.content-mailpaciente p{
  padding:0em 0.8em 0em 0.8em;
  text-align: justify;
}
.action-mailpaciente{

  padding:0em 0.8em 0.8em 0.8em;
}
</style>
<!-- <div class="container"> -->
<div class="row">
  <div class="col m8 l8">
    <?php
    include "conexao.php";
    $con = mysqli_connect($host,$user,$psw,$schema) or die("Conexão ruim");
    $select = "SELECT Al.nome, Al.sobrenome, S.solicitar
    FROM Solicitar S, Aluno Al, Atribuicao At, Psicologo P
    WHERE S.matriAlu = Al.matriAlu
    AND Al.matriAlu = At.matriAlu
    AND P.matriPsi = At.matriPsi
    AND P.matriPsi = $psionline
    AND S.solicitar IS NOT NULL";
    $result = mysqli_query($con,$select);

    while($row = mysqli_fetch_array($result)){
      echo"
      <div class='card'>
        <div class='mailpaciente'>
          <p style='padding:0.8em'><i class='material-icons left'>person</i>".$row['nome']."&nbsp;".$row['sobrenome']."</p>
        </div>
        <div class='content-mailpaciente'>
          <p>".$row['solicitar']."</p>
        </div>
        <div class='action-mailpaciente'>
          <a class='waves-effect waves-dark btn-flat' title='aceitar e marcar consulta' onclick='aceitarSolicitacao()'><i class='material-icons'>done</i></a>
          <a class='waves-effect waves-dark btn-flat' title='apagar solicitação' onclick='rejeitarSolicitacao()'><i class='material-icons'>clear</i></a>
        </div>
      </div>
      ";
    }
    ?>
    <!-- <div class="card">
      <div class="mailpaciente">
        <p style="padding:0.8em"><i class="material-icons left">person</i>Maria da Luz</p>
      </div>
      <div class="content-mailpaciente">
        <p>
          Psicóloga Elaine, preciso conversar contigo... estou muito ansiosa sobre a virada do ano! Quando estará disponível? Pode ser qualquer dia da semana, menos na quinta porque vou estar cheia. Obrigada!
        </p>
      </div>
      <div class="action-mailpaciente ">
        <a class="waves-effect waves-teal btn-flat"><i class="material-icons left">drafts</i>marcada como lida</a>
        <a class="waves-effect waves-teal btn-flat"><i class="material-icons left">email</i>marcada como não lida</a>
        <a class="waves-effect waves-light btn-flat" title="aceitar e marcar consulta"><i class="material-icons ">done</i></a>
        <a class="waves-effect waves-light btn-flat" title="apagar solicitação"><i class="material-icons ">clear</i></a>
      </div>
    </div> -->
  </div>
  <div class="col m4 l4">
    <div class="card">
    <div class="month">
      <ul>
        <li class="prev">&#10094;</li>
        <li class="next">&#10095;</li>
        <li>
          Dezembro<br>
          <span style="font-size:18px">2017</span>
        </li>
      </ul>
    </div>
    <ul class="weekdays">
      <li>S</li>
      <li>T</li>
      <li>Q</li>
      <li>Q</li>
      <li>S</li>
      <li>S</li>
      <li>D</li>
    </ul>
    <ul class="days">
      <li>1</li>
      <li>2</li>
      <li>3</li>
      <li>4</li>
      <li>5</li>
      <li>6</li>
      <li>7</li>
      <li>8</li>
      <li>9</li>
      <li><span class="active">10</span></li>
      <li>11</li>
      <li>12</li>
      <li>13</li>
      <li><span class="encontro">14</span></li>
      <li>15</li>
      <li>16</li>
      <li>17</li>
      <li>18</li>
      <li>19</li>
      <li>20</li>
      <li>21</li>
      <li>22</li>
      <li>23</li>
      <li>24</li>
      <li>25</li>
      <li>26</li>
      <li>27</li>
      <li>28</li>
      <li>29</li>
      <li>30</li>
      <li>31</li>
    </ul>
    <div class="legenda">
      <p style="text-transform:uppercase;"><i class="material-icons left">find_in_page</i>Legenda</p>
      <div class="divider"></div>
      <ul class="legenda-itens">
        <li><j style="padding: 5px;
        background: #FFA174;
        border-radius:50%;
        color: white !important;margin-right:0.8em;font-weight:600">01</j> data de hoje</li>
        <li><j class="encontro" style="margin-right:0.8em">02</j> consultas marcadas </li>
      </ul>
    </div>
  </div>
  </div>
</div>
<!-- </div> -->
<?php
// include_once '0footer.php';
?>
