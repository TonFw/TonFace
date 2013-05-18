<?php 

    require_once 'FBTonLib.php';
    $fb_user_me = $objFBTonLib->facebook->api('/me');
    print_r($fb_user_me);
    
    function getFotoPerfil($fb_user, $tipo=0){
      if($tipo==0) echo '<img src="http://graph.facebook.com/' . $fb_user[username] . '/picture" />';
      else if($tipo==1) return '<img src="http://graph.facebook.com/' . $fb_user[id] . '/picture" />';
    }
    
    function listaAmigos($objFBTonLib){
        $fb_user_amigos_random = $objFBTonLib->getFriends();
        
        echo "<ol>";
            foreach ($fb_user_amigos_random as $amigo) echo "<li> " . getFotoPerfil($amigo, FBTonLib::$FB_TIPO_USUARIO_ASSINANTE_FRIEND) . " " . $amigo[name] . " - " . $amigo[id];
        echo "</ol>";
    }
    
?>
