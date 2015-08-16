<div class="container marginTop">
	<div class="row">
		<div class="col-xs-12">
			<div class="well well-small">
				<h4><?=$tpl["dados"]["tituloform"]?></h4>
			</div>
		</div>
	</div>
	<form method="POST" action="index.php?m=admin&c=usuarios&a=<?=$tpl["dados"]["action"]?>">
		<div class="row">
			<div class="col-xs-2">
					<strong>Usuário:</strong>
			</div>
			<div class="col-xs-10">
					<input type="text" name="usuario" class="col-xs-12 form-control" value="<?=$tpl["dados"]["login_usuario"]?>" <?=$tpl["dados"]["auxusuario"]?> autofocus required />
			</div>
		</div>
		<div class="row marginTop">
			<div class="col-xs-2">
					<strong>Nome:</strong>
			</div>
			<div class="col-xs-10">
					<input type="text" name="nome" class="col-xs-12 form-control" value="<?=$tpl["dados"]["nome_usuario"]?>" autofocus required/>
			</div>
		</div>
		
		<div class="row marginTop">
			<div class="col-xs-2">
					<strong>Senha:</strong>
			</div>
			<div class="col-xs-10">
					<input type="password" name="senha" class="col-xs-12 form-control" value="" <?=$tpl["dados"]["auxsenha"]?> />
			</div>
		</div>
		<div class="row">
			<div class="col-xs-2">
					<input type="submit" value="<?=$tpl["dados"]["labelbtnsubmit"]?>" class="btn btn-primary btn-large" />
			</div>
		</div>
		<input type="hidden" value="<?=$tpl["dados"]["id_usuario"]?>" name="id_usuario" />
	</form>
</div>