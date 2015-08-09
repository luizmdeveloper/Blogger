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

