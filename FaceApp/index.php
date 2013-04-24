<?php
/*
    include_once './config/lib/facebook/facebook.php';
    
    // Create our Application instance.
    $facebook = new Facebook(array(
        'appId'  => '151508438353837',
        'secret' => '62cdf6050480386936cc4266376e5694',
        'cookie' => true,
    ));

    //Facebook Authentication part 
    $user = $facebook->getUser();
    
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
        echo $e;  // d is a debug function defined at the end of this file
        $user = null;
      }
    }

    if (!$user) {
        echo "<script type='text/javascript'>alert('Nenhum usuário encontrado');</script>";
        exit;
    }
    
        //get user basic description
    $userInfo  = $facebook->api("/$user");

    function d($d){
        echo '<pre>';
        print_r($d);
        echo '</pre>';
    }
*/
?>
