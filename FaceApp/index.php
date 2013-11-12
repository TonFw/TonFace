<?php

    //require_once "SDK/TonFace/tonlib_fb/test_fb_main.php";
    require 'SDK/Slim/Slim.php';
    require_once 'SDK/util.php';
    
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
    $app->get('/:nome_apresentacao(/:controller)(/:action)(/:param+)',
        function ($nome_apresentacao, $controller=null, $action=null, $param=null) {
            //  Verifica o controller a ser chamado
            if(!$controller) $controller = 'UserController';
            else $controller .= 'Controller';

            include_once "app/controllers/{$controller}.php";
            
            //var_dump($objTonLibFB);
            
            //  Instancia o controller, prepara o dicionário para passar como parametro e recupera o retorno pela call_back
            $classe = new $controller();
            $param_array = array(array('param' => $param, 'nome_apresentacao' => $nome_apresentacao));
            $retorno = call_user_func_array(array($classe, $action), $param_array);
            
            // Retorna o JSON validando se já é um array multidimensional, se não for ele cria uma outra dimensão vazia
            if(count_dimension($retorno)>2) echo json_encode($retorno);
            else echo json_encode(array($retorno)); 
        }
    );
    
    // POST route
    $app->post('/:nome_apresentacao(/:controller)(/:action)(/:param+)',
        function ($nome_apresentacao, $controller=null, $action=null, $param=null) {
        
        }
    );
    
    // PUT route
    $app->post('/:nome_apresentacao(/:controller)(/:action)(/:param+)',
        function ($nome_apresentacao, $controller=null, $action=null, $param=null) {
        
        }
    );
    
    // DELETE route
    $app->post('/:nome_apresentacao(/:controller)(/:action)(/:param+)',
        function ($nome_apresentacao, $controller=null, $action=null, $param=null) {
        
        }
    );
    
    $app->run();
?>