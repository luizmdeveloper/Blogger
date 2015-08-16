<?php
	class Usuario {
		function listarUsuarios($app,$admin=null,$msg=""){
			if($admin==null)
				$admin = $app->loadModel("Admin");

			$usuarios = $admin->getUsuario($app->connection);
			
			$param = array("titulo"=>$app->nome_cms,
						   "pagina" => "listarusuarios",
						   "dados" => array(
								"usuarios" => $usuarios,
								"msg" => $msg
							)
						   );
							 
			$app->loadView("Admin",$param);
		}
		
		function alterarUsuario($app){
			$usuarioid = (int)base64_decode($_GET["id_usuario"]);
			
			$admin = $app->loadModel("Admin");
			
			$obj = $admin->getUsuarioById($app->connection, $usuarioid);
					
			$param = array("titulo"=>$app->nome_css,
						   "pagina" => "formusuario",
						   "dados" => array(
								"tituloform" => "Alterar usuário",
								"action"=>"execAlterarUsuario",
								"usuariouser"=>$obj["login_usuario"],
								"usuarionome"=>$obj["usuario_nome"],
								"labelbtnsubmit"=>"Alterar Registro",
								"auxusuario"=>"disabled='disabled'",
								"usuarioid"=>$obj["id_usuario"],
								"auxsenha"=>""
							)
						   );
							 
			$app->loadView("Admin",$param);
		}
		
		function execAlterarUsuario($app){
			$admin = $app->loadModel("Admin");
			$nome = tStr($_POST['nome']);
			
			// lembrando que a senha pode vir vazia
			$senha = tStr($_POST['senha']);
			
			$usuarioid = (int)$_POST["usuarioid"];
			
			$obj = $admin->alteraDadosUsuario($app->connection, $usuarioid, $nome, $senha);

            $mensagem = $obj ?  "Alteração efetuada com sucesso!" : "Alteração falhou!";
					
			$this->listarUsuarios($app,$admin,$mensagem);
		}
		
		function excluirUsuario($app){
			$admin = $app->loadModel("Admin");
			
			$usuarioid = (int)$_GET["id"];
			
			$obj = $admin->excluirUsuario($app->connection, $usuarioid);
			
			if($obj) {
				$mensagem = "Exclusão efetuada com sucesso!";
			} else {
				$mensagem = "Exclusão falhou!";
			}
					
			$this->listarUsuarios($app,$admin,$mensagem);
		}
		
		function cadastrarUsuario($app){			
			$param = array("titulo"=>$app->nome_cms,
						   "pagina" => "formusuario",
						   "dados" => array(
								"tituloform" => "Cadastrar novo usuário",
								"action"=>"execCadastrarUsuario",
								"login_usuario"=>"",
								"nome_usuario"=>"",
								"labelbtnsubmit"=>"Cadastrar usuário",
								"auxusuario"=>"",
								"id_usuario"=>"",
								"auxsenha"=>"required"
							)
						   );
							 
			$app->loadView("Admin",$param);
		}
		
		function execCadastrarUsuario($app){
			$admin = $app->loadModel("Admin");
			
			$usuario = tStr($_POST["usuario"]);
			$nome = tStr($_POST["nome"]);
			$senha = tStr($_POST["senha"]);
			
			$obj = $admin->cadastrarUsuario($app->connection, $usuario, $nome, $senha);
			
			if($obj) {
				$mensagem = "Cadastro efetuado com sucesso!";
			} else {
				$mensagem = "Cadastro falhou!";
			}
					
			$this->listarUsuarios($app,$admin,$mensagem);
		}
}