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
     **/

     // Se tiver um id para o $user, isso significa que o usuário está loggado no facebook, mas nós não sabemos se o token dele é válido.
    // Um token de acesso é válido se o usuário deslogou no Face.
    
?>


<?php

    /**
     * As funções de: permissões, autenticação e logout são usadas em conjunto com o SDK de Javascript do Face.
     * O SDK PHP pode compartilhar a sessão do usuário cruzando cliente e servidor. 
     * Se um usuário está logado no Face e tem este app na lsita de autorizados então:
     * O Javascript pode inicializar a sessão de usuário e persistir tal em um cookie que o PHP SDK lê sem qualquer intervenção na imeplentação servidora.
     * --> Para abilitar tal funcionalidade tem que colocar o JS SDK e inicializá-lo. 
     * --> Necessário setar ambos os parametros (status e cookie) do objeto passado para FB.init() para true. 
     **/
    
?>


<?php 

    /**
     * 
     * 
     **/

?>







