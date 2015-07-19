<?php
/**
 * Created by PhpStorm.
 * User: Luiz Mário
 * Date: 18/07/2015
 * Time: 20:57
 */

class Site {

    public $sql = " SELECT id_post,
                           descricao_categoria,
                           titulo_post,
                           text_post,
                           bloqueado_post,
                           nome_usuario,
                           data_post
                    FROM post
                    LEFT JOIN usuario   ON id_usuario = idusuario_post
                    LEFT JOIN categoria ON id_categoria = idcategoria_post
                    LEFT JOIN imagem    ON id_post = idpost_imagem ";
    public $group_by = " GROUP BY data_post ";

    public function getCategoria($pdo){
        $obj = $pdo->prepare(" SELECT * FROM categoria ");
        return ($obj->execute()) ? $obj : false;
    }

    public function getPosts($pdo, $bloqueado = null){
        $where = $bloqueado != null ? "WHERE bloqueado_post = ".$bloqueado : " ";

        $obj = $pdo->prepare($this->sqlPost.$where.$this->$group_by);
        $obj->execute();
        return $obj;
    }

    public function getPost($pdo, $postid){
        $where = " AND id_post = ? ";
        $obj = $pdo->prepare($this->sqlPost.$where);
        $obj->bindParam(1,$postid);
        return ($obj->execute()) ? $obj->fetch(PDO::FETCH_OBJ) : false;
    }

    public function getPostCategoria($pdo, $idcategoria){
        $where = " AND idcategoria_post = ? ";
        $obj = $pdo->prepare($this->sqlPost.$where);
        $obj->bindParam(1,$idcategoria);
        return ($obj->execute()) ? $obj->fetch(PDO::FETCH_OBJ) : false;
    }

    public function listaImagensPost($pdo, $postid, $destaque = null){

        $sql = "SELECT * FROM imagem WHERE id_imagem = ?  ";
        $where = "";

        if($destaque != null)
            $where = " AND destaque_imagem = ".$destaque;

        $obj = $pdo->prepare($sql.$where);
        $obj->bindParam("1",$postid);
        $obj->execute();
        return $obj;
    }
}