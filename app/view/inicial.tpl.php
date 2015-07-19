<div class="container">
<div class="row">
<div class="col-sm-8 blog-main">

	<?php foreach($tpl["inicial"]["posts"] as $post) { ?>

  <div class="blog-post">
	<h2 class="blog-post-title"><?=$post["titulo"]?></h2>
	<p class="blog-post-meta">00/00/0000 bye NAME</p>
	<p>text</p>
  </div><!-- /.blog-post -->
	
	<?php } ?>
	
  
</div><!-- /.blog-main -->

<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
	<h4>Sobre</h4>
	<p>Fale um pouco sobre você</p>
  </div>
  <div class="sidebar-module">
	<h4>Categorias</h4>
	<ol class="list-unstyled">
	  <?php foreach($tpl["inicial"]["categorias"] as $categoria) { ?>
		<li><a href="#"><?=$categoria["titulo"]?></a></li>
	  <?php } ?>
	</ol>
  </div>
  
</div><!-- /.blog-sidebar -->
</div><!-- /.row -->
</div><!-- /.container -->