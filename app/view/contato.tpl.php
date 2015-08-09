<div class="container">
<div class="row">
  <form role="form" action="index.php?m=fale-conosco" method="post" >
    <div class="col-lg-6">
	
		<?php if($tpl["contato"]["mensagem"] != "") { ?>
		<div class="alert <?=$tpl["contato"]["classe"]?>">
			<strong><?=$tpl["contato"]["mensagem"]?></strong>
		</div>
		<?php } ?>

     <div class="well well-sm">
		<strong>* Campo obrigatório</strong>
	  </div>

	  <div class="form-group">
          <label for="InputName">Seu nome:</label>
            <div class="input-group">
              <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o seu nome" required>
              <span class="input-group-addon">*</span>
            </div>
      </div>
      <div class="form-group">
        <label for="InputEmail">Seu e-mail:</label>
        <div class="input-group">
          <input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu e-mail" required>
          <span class="input-group-addon">*</span>
		  </div>
      </div>
      <div class="form-group">
        <label for="InputMessage">Mensagem:</label>
        <div class="input-group">
          <textarea name="mensagem" id="mensagem" class="form-control" rows="5" required></textarea>
          <span class="input-group-addon">*</span>
		  </div>
      </div>
      <input type="hidden" name="frm_enviar" value="s" />
      <input type="submit" name="submit" id="submit" value="Enviar" class="btn btn-info">
    </div>
  </form>
  
</div>

</div>