<div class="container">
<div class="row">
<div class="col-sm-8 blog-main">

	<?php foreach($tpl["inicial"]["posts"] as $post) { ?>
	<?php 
		$date = new DateTime($post["data_post"]);
	?>
  <div class="blog-post">
	<h2 class="blog-post-title"><?=$post["titulo_post"]?></h2>
	<p class="blog-post-meta"><?=$date->format('d/m/Y H:i:s')?> por <?=$post["nome_usuario"]?>. Categoria: <strong><?=$post["descricao_categoria"]?></strong></p>
	<p><?=$post["text_post"]?></p>
  </div><!-- /.blog-post -->
	
	<?php } ?>
	
  
</div><!-- /.blog-main -->

<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
	<h4>Sobre</h4>
	<p>Luiz Mário Estudante de Ciência da Computação</p>
      <br/>
    <p>Desenvolvedor web Info Rio</p>
  </div>
  <div class="sidebar-module">
	<h4>Categorias</h4>
	<ol class="list-unstyled">
	  <?php foreach($tpl["inicial"]["categorias"] as $categoria) { ?>
		<li><a href="index.php?m=categoria&id=<?=$categoria["id_categoria"]?>"><?=$categoria["descricao_categoria"]?></a></li>
	  <?php } ?>
	</ol>
  </div>
  
</div><!-- /.blog-sidebar -->
</div><!-- /.row -->
</div><!-- /.container -->