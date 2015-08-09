<div class="container marginTop">
	<div class="row">
		<div class="col-xs-12">
		
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Título</th>
						<th width="200">Data/Hora</th>
						<th width="40"></th>
						<th width="40"></th>
					</tr>
				</thead>
				
				<tbody>
					<?php foreach($tpl["dados"]["posts"] as $post) { ?>
					<?php $date = new DateTime($post["data_post"]); ?>
					<tr>
						<td><?=$post["titulo_post"]?></td>
						<td><?=$date->format('d/m/Y H:i:s')?></td>
						<td>
							<a href="index.php?m=admin&c=alterarPost&id=<?=$post["id_post"]?>" class="btn btn-primary">Alterar</a>
						</td>
						<td>
							<a href="index.php?m=admin&c=excluirPost&id=<?=$post["id_post"]?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir o post ?')">Excluir</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
				
			</table>
		
		</div>
	</div>
</div>