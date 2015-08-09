<?php
class Admin {

	public function getUsuarioLoginSenha($pdo, $usuario, $senha){
		$obj = $pdo->prepare("SELECT id_usuario,
								     login_usuario,
								     nome_usuario
							FROM usuario
							WHERE login_usuario = ?
							  AND senha_usuario = ? ");
		
		$obj->bindParam(1,$usuario);
		$obj->bindParam(2,$senha);
		
		return ($obj->execute()) ? $obj->fetch(PDO::FETCH_OBJ) : false;
	}
}