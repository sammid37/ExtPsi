<?php 
// require_once '';
?>
<div class="input-field">
  <div class="row">
    <form class="col s12 m12 l12" action="con_solicitarmensagem.php" method="post">
      <div class="row">
        <div class="input-field col s12 m12 l12">
          <textarea id="solicitar" name="solicitar" class="materialize-textarea" data-length="300" required="required"></textarea>
          <label for="solicitar">Mensagem de Solicitação *</label>
        </div>
      </div>
      <div class="row">
        <div class="center-align">
          <button class="btn waves-effect waves-light blush-orange" type="submit" name="action">Solicitar
            <i class="material-icons right">pan_tool</i>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
