<div class="container">

<div class="blog-header">
<h1 class="blog-title">Blog PHP</h1>
<p class="lead blog-description">Blog desenvolvimento pelo curso básico de PHP / Devmedia</p>
</div>

<div class="row">

<div class="col-sm-8 blog-main">

	<?php foreach($tpl["inicial"]["posts"] as $post) { ?>

  <div class="blog-post">
	<h2 class="blog-post-title"><?=$post["titulo"]?></h2>
	<p class="blog-post-meta">00/00/0000 por NOME</p>
	<p>texto texto texto texto texto texto texto texto texto texto texto texto texto texto</p>
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
	  <li><a href="#">categoria</a></li>
	  <li><a href="#">categoria</a></li>
	  <li><a href="#">categoria</a></li>
	  <li><a href="#">categoria</a></li>
	  <li><a href="#">categoria</a></li>
	  <li><a href="#">categoria</a></li>
	</ol>
  </div>
  
</div><!-- /.blog-sidebar -->

</div><!-- /.row -->

</div><!-- /.container -->

<div class="blog-footer">
	<p>Rodapé</p>
</div>