<?php
/**
 * Created by PhpStorm.
 * User: Luiz Mário
 * Date: 18/07/2015
 * Time: 18:29
 */

    require_once('libs/function.php');
    require_once('config.php');

    $modulo = isset($_GET['m']) ? tString($_GET['m']) : "inicial";

    $app = new Application();

    switch($modulo){
        case "post": $site = $app->loadModel("Site");
                     $obj   = $site->getPost($app->connection, (int)base64_decode($_GET['id']));
                     $posts = $obj->fetchAll(PDO::FETCH_ASSOC);

                     $obj        = $site->getCategoria($app->connection);
                     $categorias = $obj->fetchAll(PDO::FETCH_ASSOC);

                     $app->renderizaPaginaInicial($app, $posts, $categorias);
                    break;
        case "categoria": $site = $app->loadModel("Site");

                          $obj   = $site->getPostCategoria($app->connection, 1, (int)base64_decode($_GET['id']));
                          $posts = $obj->fetchAll(PDO::FETCH_ASSOC);

                          $obj        = $site->getCategoria($app->connection);
                          $categorias = $obj->fetchAll(PDO::FETCH_ASSOC);

                          $app->renderizaPaginaInicial($app, $posts, $categorias);
                          break;
        default : $site = $app->loadModel("Site");
                  $obj   = $site->getPosts($app->connection, 1);
                  $posts = $obj->fetchAll(PDO::FETCH_ASSOC);

                  $obj       = $site->getCategoria($app->connection);
                  $categorias = $obj->fetchAll(PDO::FETCH_ASSOC);

                  $app->renderizaPaginaInicial($app, $posts, $categorias);
                  break;
    }

