<?php 

    require_once 'FBMainController.php';
    $fb_user_me = $objFBMain->facebook->api('/me');
    var_dump($fb_user_me);
    
    function getFotoPerfil($fb_user, $tipo=0){
      if($tipo==0) echo '<img src="http://graph.facebook.com/' . $fb_user['username'] . '/picture" />';
      else if($tipo==1) return '<img src="http://graph.facebook.com/' . $fb_user['id'] . '/picture" />';
    }
    
    function listaAmigos($objFBMain){
        $fb_user_amigos_random = $objFBMain->getFriends();

        echo "<ol>";
            foreach ($fb_user_amigos_random as $amigo) echo "<li> " . getFotoPerfil($amigo, FBMainController::$FB_TIPO_USUARIO_ASSINANTE_FRIEND) . " " . $amigo[name] . " - " . $amigo[id];
        echo "</ol>";
    }
    
?>
