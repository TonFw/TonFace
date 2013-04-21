<?php
    //facebook application configuration -mahmud
    $fbconfig['appid' ] = "151508438353837";
    $fbconfig['secret'] = "62cdf6050480386936cc4266376e5694";

    //Base URL é aonde fica o inicio do App (tela de assinatura do App)
    $fbconfig['baseUrl']    =   "https://shrouded-earth-6459.herokuapp.com/Graph-API-EXEMPLO/";// "http://thinkdiff.net/demo/newfbconnect1/iframe/sdk3";
    
    //appBaseURL é a URL real do App
    $fbconfig['appBaseUrl'] =   "http://apps.facebook.com/api_face_app";// "http://apps.facebook.com/thinkdiffdemo";

    
    /* 
     * se o usuário não estiver autenticado ele é jogado na baseUrl (URL de assinatura de App)
     * Se o código for correto ele é redirecionado ao appBase (aonde está o app em si)
     */
    if (isset($_GET['code'])){
        header("Location: " . $fbconfig['appBaseUrl']);
        exit;
    }
    //~~
    
    //Requests IDs é se o usuário veio por meio de convite
    if (isset($_GET['request_ids'])){
        //user comes from invitation
        //track them if you need
    }
    
    $user =   null; //facebook user uid

    include_once "facebook.php";

    // Create our Application instance.
    $facebook = new Facebook(array(
      'appId'  => $fbconfig['appid'],
      'secret' => $fbconfig['secret'],
      'cookie' => true,
    ));

    //Facebook Authentication part
    $user = $facebook->getUser();
    
    // We may or may not have this data based 
    // on whether the user is logged in.
    // If we have a $user id here, it means we know 
    // the user is logged into
    // Facebook, but we don’t know if the access token is valid. An access
    // token is invalid if the user logged out of Facebook.
    $loginUrl   = $facebook->getLoginUrl(
            array(
                'scope' => 'email,publish_stream,user_birthday,user_location,user_work_history,user_about_me,user_hometown'
            )
    );

    if ($user) {
      try {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
      } catch (FacebookApiException $e) {
        //you should use error_log($e); instead of printing the info on browser
        d($e);  // d is a debug function defined at the end of this file
        $user = null;
      }
    }

    if (!$user) {
        echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
        exit;
    }
    
    //get user basic description
    $userInfo           = $facebook->api("/$user");

    function d($d){
        echo '<pre>';
        print_r($d);
        echo '</pre>';
    }
?>
