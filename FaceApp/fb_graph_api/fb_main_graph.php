<?php
    
    /** Arquivo que servirar como CALLBACK do facebook (atender a callbakcs do face).   **/
    
    //Gerando o Loggin
    $loginUrl   = $facebook->getLoginUrl(
            array(
                'scope'         => 'email,offline_access,publish_stream,user_birthday,user_location,user_work_history,user_about_me,user_hometown',
                'redirect_uri'  => $fbconfig['baseurl']
            )
    );
 
    $logoutUrl  = $facebook->getLogoutUrl();
    
    
    
?>

