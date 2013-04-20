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
 * EXTREMAMENTE IMPORTANTE: criar uma subdiretório, na raiz, da pasta App com o nome de inc. 
 * Dentro de inc colocar uma arquivo .inc
 * Este arquivo serve como um .h global, ou seja, definir itens que podem ser acessados, globalmente, aonde for chamado.
 * No FaceDev isso serve para guardar os elementos gerais de setagem do app, como secret key, por exemplo.
 */

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
     * O USER ID do facebook permite a pesquisa pelo usuário mediante seu ID.
     * O USER facebook é o usuário logado no facebook, este só muda se outro for logado.
     * O CALL BACK é quando o facebook anuncia que alguém assinou ou desassinou a aplicação.
     * 
     * 
     */
    
?>






<?php 
    //Facebook Object

    /**
     * 

    
     * api (FQL = SPARQL) --> https://developers.facebook.com/docs/reference/php/facebook-api/
    Call a Graph API method, FQL Query, or (DEPRECATED) REST API using the PHP SDK.
    
     * getAccessToken --> https://developers.facebook.com/docs/reference/php/facebook-getAccessToken/
    Get the current access token being used by the SDK.
    
     * getApiSecret --> https://developers.facebook.com/docs/reference/php/facebook-getAppSecret/
    Get the App secret that the SDK is currently using.
    
     * getAppId --> https://developers.facebook.com/docs/reference/php/facebook-getAppId/
    Get the App ID that the SDK is currently using.
    
     * getLoginStatusUrl --> https://developers.facebook.com/docs/reference/php/facebook-getLoginStatusUrl/
    Returns a URL based on the user?s login status on Facebook.
    
     * getLoginUrl --> https://developers.facebook.com/docs/reference/php/facebook-getLoginUrl/
    Get a URL that the user can click to login, authorize the app, and get redirected back to the app.
    
     * getLogoutUrl --> https://developers.facebook.com/docs/reference/php/facebook-getLogoutUrl/
    This method returns a URL that, when clicked by the user, will log them out of their Facebook session and then redirect them back to your application.
    
     * getSignedRequest --> https://developers.facebook.com/docs/reference/php/facebook-getSignedRequest/
    Get the current signed request being used by the SDK.
    
     * getUser --> https://developers.facebook.com/docs/reference/php/facebook-getUser/
    This method returns the Facebook User ID of the current user, or 0 if there is no logged-in user.
    
     * setAccessToken --> https://developers.facebook.com/docs/reference/php/facebook-setAccessToken/
    Set the current access token being used by the SDK.
    
     * setApiSecret --> https://developers.facebook.com/docs/reference/php/facebook-setAppSecret/
    Set the App secret that the SDK is currently using.
    
     * setAppId --> https://developers.facebook.com/docs/reference/php/facebook-setAppId/
    Set the App ID that the SDK is currently using.
    
     * setFileUploadSupport --> https://developers.facebook.com/docs/reference/php/facebook-setFileUploadSupport/
    Set file upload support in the SDK.
    
     * useFileUploadSupport --> https://developers.facebook.com/docs/reference/php/facebook-getFileUploadSupport/
    Get whether file upload support has been enabled in the SDK.
    
     //FacebookApiException

    
     * getResult --> https://developers.facebook.com/docs/reference/php/exception-getResult/
    Get the object that is the result of the error or exception returned by the server.
    
     * getType --> https://developers.facebook.com/docs/reference/php/exception-getType/
    Get the type for the error or exception, e.g. OAuthException.

     * Permissões --> https://developers.facebook.com/docs/reference/login/#permissions
     
     FACE LOGIN --> https://developers.facebook.com/docs/concepts/login/

     Design social (projetando pensando na forma social) --> https://developers.facebook.com/socialdesign/
     
     Plugind sociais (ações da rede social: curtir, mandar msg, follow e etc..)
     
     Dialogs --> São os alertas, telas de login, tela para envio de mensagem e etc...

     Open Graph --> É aquela parte que a pessoa pode expressar a experiencia com um app, e também a publicação, via app no mural.
     
     PROMOÇÃO DA APLICAÇÃO --> https://developers.facebook.com/promote/
     **/

?>







