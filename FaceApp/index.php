<?php 
    /**
     * Primeiro � necess�rio distinguir entre tr�s tipos de usu�rios
     * 1- Usu�rio logado no face e que tem o app autorizado;
     * 2- Usu�rio logado no face e que n�o tem o app autorizado;
     * 3- Usu�rio quem n�o est� logado no facebook.
     * 
     * Se direcionar o usu�rio 1 para o "Dialogo de Login" ele ser� redirecionado para o App.
     * Se direcionar o usu�rio 2 para o mesmo Dialogo ele vai ter que aceitar o App e depois jogado no mesmo que o 1.
     * Para o 3 ele vai ter que primeiro logar e depois segue um dos dois acima.
     **/

     // Se tiver um id para o $user, isso significa que o usu�rio est� loggado no facebook, mas n�s n�o sabemos se o token dele � v�lido.
    // Um token de acesso � v�lido se o usu�rio deslogou no Face.

?>

<?php echo "<h1>It works!</h1><br>"; ?>

<?php //Testes com a API (Livro)
    
    require_once 'lib/inc/globals.inc';
    
    $facebook = new Facebook(FB_API_KEY, FB_APP_SECRET);
    
    if(isset($facebook->fb_params['authorized'])){
        //fazer a inicializa��o de um novo usu�rio
    }else if (isset ($facebook->fb_params['unistall'])){
        //Fazer a limpeza do usu�rio
    }else{
        if( ! $facebook->api_client->added ){
            //Handle para dar um link para instala��o da aplica��o para o usu�rio
            echo "<p>Hello, non-app user!</p>
                <a href='". $facebook->get_add_url() . "'>
                    Click here to add this Application.</a>";
        }else
            echo "<p>Hello, app user
                    <fb:name uid='{$facebook->user}' useyou='false />!</p>";
    }//fim da cadeis
    
?>

<?php /* MEUS TESTES
    include 'config/lib/facebook/facebook.php';
    $my_app_obj = new Facebook(array(
      'appId'  => '390027847770909',
      'secret' => 'c405c2cae7f8ddaed0778fdc9ccef583',
    ));

    $facebook_obj = $my_app_obj->api("/ilton.garcia");
    
    echo $facebook_obj['name'] . "<br><br>";
    echo print_r($facebook_obj); */
 ?>



<?php
/*
include 'public/base/header.php';
    include 'public/content_home.php';
include 'public/base/footer.php'; */?>
