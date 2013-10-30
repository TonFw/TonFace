<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

// Instância do App
$restful = new \Slim\Slim(array(
   'debug' => false 
));

// Resposta default para um caso de problema na aplicação
$restful->error(function(Exception $e) use ($restful){
   $erro_obj = new stdClass();
   $erro_obj->message = $e->getMessage();
   $erro_obj->file = $e->getFile();
   $erro_obj->line = $e->getLine();
   
   echo "{'error':".json_encode($erro_obj)."}";
});

// Definição da rota para o GET
$restful->get('', function(){
    
});

// Definição da rota para o POST
$restful->post('', function(){
    
});

// Definição da rota para o PUT
$restful->put('', function(){
    
});

// Definição da rota para o DELET
$restful->delete('', function(){
    
});

// Definição da rota para recuperar um arquivo
$restful->patch('', function(){
    
});

?>
