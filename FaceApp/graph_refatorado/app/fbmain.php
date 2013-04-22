<?php

    //Arquivo com funcionalidade de ser o "processador" principal dos dados do facebook
    
    //fbconfig é uma variável global que contem as configurações do App que está no facebook.
    $fbconfig['appid' ] = "151508438353837";
    $fbconfig['secret'] = "62cdf6050480386936cc4266376e5694";
    
    //Base URL é aonde fica o início do App (tela de assinatura do App) na URL a ser carregada no canvas
    $fbconfig['baseUrl'] = "https://shrouded-earth-6459.herokuapp.com/Graph-API-EXEMPLO/";
    
    //appBaseURL é a URL do App no facebook
    $fbconfig['appBaseUrl'] = "http://apps.facebook.com/api_face_app";
    
    /* 
     * se o usuário não estiver autenticado ele é jogado na baseUrl (URL de assinatura de App)
     * Se o código for correto ele é redirecionado ao appBase (aonde está o app em si)
     */
    if (isset($_GET['code'])){
        header("Location: " . $fbconfig['appBaseUrl']);
        exit;
    }
    
    //Requests IDs é se o usuário veio por meio de convite
    if (isset($_GET['request_ids'])){
        //user comes from invitation
        //track them if you need
    }
    
    //Este é nulo para validar mais pra frente se em algum momento ele foi setado
    $user =   null; //facebook user uid

    include_once "config/lib/facebook/facebook.php";
    
    // Create instância da aplicação
    $meu_face_app = new Facebook(array(
      'appId'  => $fbconfig['appid'],
      'secret' => $fbconfig['secret'],
      'cookie' => true,
    ));
    
    //Autenticação com facebook
    $user = $meu_face_app->getUser();
    
    //Array com as permissões de acessos da conta do facebook
    $permissoes_usuario = array("email", "publish_stream", "user_birthday", "user_location", "user_work_history", "user_about_me", "user_hometown");
    
    //getLoginUrl retorna uma URL que, ao ser clicada no lado cliente, torna o usuário do face um assinante da aplicação.
    //scope é o escopo da aplicação (o que, do usuário, ela abrange)
    $loginUrl   = $meu_face_app->getLoginUrl(
            array(
                'scope' => 'email,publish_stream,user_birthday,user_location,user_work_history,user_about_me,user_hometown'
            )
    );
    
?>
