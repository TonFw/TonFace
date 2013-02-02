<?php 
    /**
     * Primeiro é necessário distinguir entre três tipos de usuários
     * 1- Usuário logado no face e que tem o app autorizado;
     * 2- Usuário logado no face e que não tem o app autorizado;
     * 3- Usuário quem não está logado no facebook.
     * 
     * Se direcionar o usuário 1 para o "Dialogo de Login" ele será redirecionado para o App.
     * Se direcionar o usuário 2 para o mesmo Dialogo ele vai ter que aceitar o App e depois jogado no mesmo que o 1.
     * Para o 3 ele vai ter que primeiro logar e depois segue um dos dois acima.
     * 
     **/

     // Se tiver um id para o $user, isso significa que o usuário está loggado no facebook, mas nós não sabemos se o token dele é válido.
    // Um token de acesso é válido se o usuário deslogou no Face.

?>

<?php 
    include 'config/lib/facebook/facebook.php';
    $facebook = new Facebook(array(
      'appId'  => '476796465713332',
      'secret' => 'c9fa9efc628c335959af7614f45ca627',
    ));

    $user = $facebook->api("/ilton.garcia");
    
    echo $user['name'] . "<br><br>";
    echo print_r($user);
 ?>



<?php
/*
include 'public/base/header.php';
    include 'public/content_home.php';
include 'public/base/footer.php'; */?>
