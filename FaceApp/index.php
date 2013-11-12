<?php

    //require_once "SDK/TonFace/tonlib_fb/test_fb_main.php";
    require 'SDK/Slim/Slim.php';
    
    \Slim\Slim::registerAutoloader();
    
    //Instância do Slim com o Debug desligado para que a mensagem personalizada apareça
    $app = new \Slim\Slim(array(
        'debug' => false
    ));
    
    //Método de retorno do JSON com erro, caso algum ocorra, um teste é chamar uma classe que não existe
    $app->error(function(Exception $e) use ($app){
        $erroObj = new stdClass();
        $erroObj->message = $e->getMessage();
        //$erroObj->trace = $e->getTraceAsString();
        $erroObj->file = $e->getFile();
        $erroObj->line = $e->getLine();

        echo "{'erro':".json_encode($erroObj)."}";
    });
    
    // GET route
    $app->get('/:controler(/:action)(/:parameter)',
        function ($controler, $action=null, $parameter=null) {
            $controler .= 'Controller';
            echo "controler: $controler, action: $action, param: $parameter" . "<br>";

            //var_dump($objTonLibFB);
            include_once "app/controllers/{$controler}.php";
            $classe = new $controler();
            //$retorno = call_user_func_array(array($classe, $action), array($parameter));
            /*
            include_once "classes/{$controler}.php";
            $classe = new $controler();
            $retorno = call_user_func_array(array($classe, $action), array($parameter));

            echo '{"result":'.json_encode($retorno).'}';
            */
        }
    );
    
    $app->run();
?>