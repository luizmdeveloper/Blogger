<?php
/**
 * Created by PhpStorm.
 * User: Luiz Mário
 * Date: 18/07/2015
 * Time: 18:29
 */

    require_once('libs/function.php');
    require_once('config.php');

    $modulo = isset($_GET['m']) ? $_GET['m'] : "inicial";

    $app = new Application();

    switch($modulo){
        default : $site = $app->loadModel("Site");
                  $param = array("titulo" =>$app->nome_cms,
                                 "pagina" => "inicial",
                                 "inicial" => array(
                                          "posts" => array(
                                              array("titulo" => "My Title"),
                                              array("titulo" => "My Title"),
                                              array("titulo" => "My Title")
                                          ),
                                 "categorias" => array(
                                                    array("titulo" => "category 1"),
                                                    array("titulo" => "category 2"),
                                                    array("titulo" => "category 3")
                                                    )
                                 ));
                  $app->loadView("Site", $param);
                  break;
    }

