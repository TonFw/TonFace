<?php
include_once "lib/facebook_tonlib/test_fb_main.php";
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

//Instância do Slim com o Debug desligado para que a mensagem personalizada apareça
$restful = new \Slim\Slim(array(
    'debug' => false
));

//Método de retorno do JSON com erro, caso algum ocorra, um teste é chamar uma classe que não existe
$restful->error(function(Exception $e) use ($restful){
    $erroObj = new stdClass();
    $erroObj->message = $e->getMessage();
    //$erroObj->trace = $e->getTraceAsString();
    $erroObj->file = $e->getFile();
    $erroObj->line = $e->getLine();
    
    echo "{'erro':".json_encode($erroObj)."}";
});

// GET route
$restful->get('/:controler/:action(/:parameter)',
    function ($controler, $action, $parameter=null) {
        echo "controler: $controler, action: $action, param: $parameter" . "<br>";
        
        var_dump($objTonLibFB);
        /*
        include_once "classes/{$controler}.php";
        $classe = new $controler();
        $retorno = call_user_func_array(array($classe, $action), array($parameter));
        
        echo '{"result":'.json_encode($retorno).'}';
        */
    }
);



/*
// POST route
$restful->post(
    '/post',
    function () {
        echo 'This is a POST route';
    }
);

// PUT route
$restful->put(
    '/put',
    function () {
        echo 'This is a PUT route';
    }
);

// PATCH route
$restful->patch('/patch', function () {
    echo 'This is a PATCH route';
});

// DELETE route
$restful->delete(
    '/delete',
    function () {
        echo 'This is a DELETE route';
    }
);
*/

$restful->run();
?>
