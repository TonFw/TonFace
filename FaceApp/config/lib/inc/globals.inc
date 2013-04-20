<?php
    
    require_once dirname(__FILE__) . '/../facebook/facebook.php';
    
    //Facebook API Key
    define("FB_API_KEY", "390027847770909");
    
    //Facebook Secret Key
    define("FB_APP_SECRET", "c405c2cae7f8ddaed0778fdc9ccef583");
    
    //Nome do App
    define("FB_APP_NAME", "Proumo");
    
    //Root URL do app no Face
    define("FB_APP_URL", Facebook::get_facebook_url("apps")."/".FB_APP_NAME);
    
    //Variável da URL do WebApp
    $url_webapp = "https://ancient-sea-5665.herokuapp.com/";
    
    //Aplicativo root URL local
    define("LOCAL_APP_URL", $url_webapp . FB_APP_NAME);
    
    
?>