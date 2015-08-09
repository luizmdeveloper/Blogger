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
        case "admin" :// verifica se está logado
                        session_start();

                        if(isset($_SESSION["usuario"])){
                            renderizaAdminInicial($app);
                        } else {
                            renderizaLogin($app);
                        }

                        break;
        case "doLogin": $admin   = $app->loadModel("Admin");
                        $usuario = tString($_POST["usuario"]);
                        $senha   = md5(tString($_POST["senha"]));

                        $obj = $admin->getUsuarioLoginSenha($app->connection, $usuario, $senha);

                        if($obj){
                            // efetuou login
                            session_start();
                            $_SESSION["id_usuario"]    = $obj->id_usuario;
                            $_SESSION["login_usuario"] = $obj->login_usuario;
                            $_SESSION["nome_usuario"]  = $obj->nome_usuario;
                            renderizaAdminInicial($app);
                        } else {
                            // login falhou
                            echo "<script>alert('Login ou senha incorreto(s)');</script>";
                            renderizaLogin($app);
                        }

                        break;
        case "logout" : session_start();
                        session_destroy();
                        renderizaLogin($app);
                        break;
        case "fale-conosco" : $site     = $app->loadModel("Site");
                              $mensagem = "";
                              $classe   = "";

                                // inicia envio formulário
                                if(isset($_POST["frm_enviar"])){

                                    $nome  = tString($_POST["nome"]);
                                    $email = tString($_POST["email"]);
                                    $msg   = $_POST["mensagem"];

                                    $headers='';
                                    $headers.="MIME-Version: 1.0 \r\n";
                                    $headers.="Content-type: text/html; charset=\"UTF-8\" \r\n";
                                    $headers.= "From: ".$nome." <".$email.">";

                                    $mensagem  = "Nome: ".$nome."<br/>";
                                    $mensagem .= "Email: ".$email."<br/>";
                                    $mensagem .= "Mensagem: ".$msg;

                                    include("libs/SMTPconfig.php");
                                    include("libs/SMTPclass.php");

                                    // Servidor, Porta, Usuario, Senha, FROM (DE), TO (PARA), titulo, mensagem, headers
                                    $SMTPMail = new SMTPClient(
                                        $SmtpServer,
                                        $SmtpPort,
                                        $SmtpUser,
                                        $SmtpPass,
                                        $SmtpUser,
                                        $SmtpUser,
                                        "E-mail enviado atraves do site",
                                        $mensagem,
                                        $headers
                                    );
                                    // se enviar o email, mostra sucesso, senão, mostra falha
                                    if($SMTPMail->SendMail()){
                                        $classe = "alert-success";
                                        $mensagem = "O Email foi enviado com sucesso!";
                                    } else {
                                        $classe = "alert-danger";
                                        $mensagem = "O enviou falhou";
                                    }
                                }
                                $param = array("titulo"=>$app->nome_cms,
                                    "pagina" => "contato",
                                    "contato" => array(
                                        "mensagem" => $mensagem,
                                        "classe"=> $classe
                                    ));

                                $app->loadView("Site",$param);

                                break;
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

    function renderizaAdminInicial($app){
        $site = $app->loadModel("Site");

        // vamos carregar os posts
        $obj = $site->getPosts($app->connection);
        $posts = $obj->fetchAll(PDO::FETCH_ASSOC);

        $param = array( "titulo"=>$app->nome_cms,
                        "pagina" => "inicialadmin",
                        "dados" => array(
                            "posts" => $posts
                        )
        );

        $app->loadView("Admin",$param);
    }

    function renderizaLogin($app){
        $param = array("titulo"=>$app->nome_cms);
        $app->loadView("Login",$param);
    }

    function renderizaPaginaInicial($app, $categorias, $posts){
        $param = array("titulo"=>$app->nome_cms,
                        "pagina" => "inicial",
                        "inicial" => array(
                            "posts" => $posts,
                            "categorias" => $categorias
                        ));

        $app->loadView("Site",$param);
    }

