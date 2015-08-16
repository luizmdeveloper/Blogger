<div class="container marginTop">
	<div class="row">
		<div class="col-lg-12">
			<a href="index.php?m=admin&c=usuarios&a=cadastrarUsuario" class="btn btn-primary btn-large">Cadastrar novo usuário</a>
			
			<?php if($tpl["dados"]["msg"] != "") { ?>
				<div class="alert alert-info marginTop">
					<strong><?=$tpl["dados"]["msg"]?></strong>
				</div>
			<?php } ?>
			
			<table class="table table-striped table-bordered table-hover marginTop">
				<thead>
					<tr>
						<th width="40">ID</th>
						<th>Login</th>
						<th>Nome</th>
						<th width="40"></th>
						<th width="40"></th>
					</tr>
				</thead>
				
				<tbody>
					<?php foreach($tpl["dados"]["usuarios"] as $usuario) { ?>
										
					<tr>
						<td><?=$usuario["id_usuario"]?></td>
						<td><?=$usuario["login_usuario"]?></td>
						<td><?=$usuario["nome_usuario"]?></td>
						<td>
							<a href="index.php?m=admin&c=usuarios&a=alterarUsuario&id=<?=base64_encode($usuario["id_usuario"])?>" class="btn btn-primary">Alterar</a>
						</td>
						<td>
							<a href="index.php?m=admin&c=usuarios&a=excluirUsuario&id=<?=base64_encode($usuario["id_usuario"])?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir o usuario?')">Excluir</a>
						</td>
					</tr>
					
					<?php } ?>
				</tbody>
				
			</table>
		
		</div>
	</div>
</div>