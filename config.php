<?php
/**
 * Created by PhpStorm.
 * User: Luiz Mário
 * Date: 18/07/2015
 * Time: 18:23
 */

    class Application {

        public $host     = "127.0.0.1";
        public $user     = "root";
        public $pass     = "root";
        public $name     = "blogger";
        public $nome_cms = "Blogger PHP";



        function __construct(){
            $param = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
            try{
                $this->connection = new PDO('mysql:dbname='.$this->name.';host='.$this->host, $this->user, $this->pass, $param);
            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }

        function loadModel($model){
            include("app/model/".strtolower($model).".class.php");
            return new $model();
        }

        function loadView($view, $tpl){
            include("app/view/".strtolower($view).".tpl.php");
        }

    }