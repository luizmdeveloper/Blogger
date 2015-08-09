<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$tpl['titulo']?></title>
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	 <link href="assets/css/blog.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
  </head>
  <body class="marginTop">
	 
	<div class="container">
		<div class="row">
			<div class="col-xs-offset-4 col-xs-4">
				<div class="alert alert-info">
					Efetue login para acessar o sistema
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-offset-4 col-xs-4">
				<div class="well well-small">
				<form role="form" method="POST" action="index.php?m=doLogin">
				  <div class="form-group">
					<label for="usuario">Usuário</label>
					<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Informe usuário" required>
				  </div>
				  <div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" id="senha" name="senha" placeholder="Informe sua senha">
				  </div>
				  <button type="submit" class="btn btn-default">Acessar o sistema</button>
				</form>
				</div>
			</div>
		</div>
	</div>
	 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>