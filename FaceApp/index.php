<?php
/*
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
    
    // Aqui deve renderizar a tela para fazer login no face (a que tem aquela de confirmar que assina o App e tals
    $app->post('/', function(){ 
        require_once 'SDK/TonFace/tonlib_fb/TonLibFB.php';
    });
    
    // Aqui deve renderizar a tela com o Perfil do usuário
    $app->get('/:nome_apresentacao', function($nome_apresentacao){
        echo "Index perfil de $nome_apresentacao";
    });
    
    // GET route --> renderiza o retorno da funcionalidade de um dado controller
    $app->get('(/:controller)(/:nome_apresentacao)(/:action)(/:param+)',
        function ($controller, $nome_apresentacao, $action=null, $param=null) {
            //  Verifica o controller a ser chamado
            $controller .= 'Controller';
            
            // Validação dos parametros
            if(!@include_once("app/controllers/{$controller}.php")) render ("app/public/404.php");

            //  Instancia o controller, prepara o dicionário para passar como parametro e recupera o retorno pela call_back
            $objCtrl = new $controller();
            $param_array = array(array('nome_apresentacao' => $nome_apresentacao, 'param' => $param));
            
            if($action) $retorno = call_user_func_array(array($objCtrl, $action), $param_array);
            else render('app/views/perfil.html');
            
            // Retorna o JSON validando se já é um array multidimensional, se não for ele cria uma outra dimensão vazia
            if(count_dimension($retorno)>2) echo json_encode($retorno);
            else echo json_encode(array($retorno));
        }
    );
    
    // POST route
    $app->post('(/:controller)(/:nome_apresentacao)(/:action)(/:param+)',
        function ($controller, $nome_apresentacao, $action=null, $param=null) {
        
        }
    );
    
    // PUT route
    $app->put('(/:controller)(/:nome_apresentacao)(/:action)(/:param+)',
        function ($controller, $nome_apresentacao, $action=null, $param=null) {
        
        }
    );
    
    // DELETE route
    $app->delete('(/:controller)(/:nome_apresentacao)(/:action)(/:param+)',
        function ($controller, $nome_apresentacao, $action=null, $param=null) {
        
        }
    );
    
    $app->run();
*/
?>