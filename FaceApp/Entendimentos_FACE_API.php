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


<?php

    /**
     * As fun��es de: permiss�es, autentica��o e logout s�o usadas em conjunto com o SDK de Javascript do Face.
     * O SDK PHP pode compartilhar a sess�o do usu�rio cruzando cliente e servidor. 
     * Se um usu�rio est� logado no Face e tem este app na lsita de autorizados ent�o:
     * O Javascript pode inicializar a sess�o de usu�rio e persistir tal em um cookie que o PHP SDK l� sem qualquer interven��o na imeplenta��o servidora.
     * --> Para abilitar tal funcionalidade tem que colocar o JS SDK e inicializ�-lo. 
     * --> Necess�rio setar ambos os parametros (status e cookie) do objeto passado para FB.init() para true. 
     **/
    
?>


<?php 

    /**
     * 
     * 
     **/

?>







