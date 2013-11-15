<?php 

    require_once "TonLibFB.php";
    
    $fb_user_me = $ton_fb->facebook->api('/me');
    print_r($fb_user_me);
    
    function listaAmigos($ton_fb, $qtd_amigos_retorno = 5){
        $fb_user_amigos_random = $ton_fb->getFriends($qtd_amigos_retorno);
        
        echo "<ol>";
            foreach ($fb_user_amigos_random as $amigo) echo "<li> " . TonLibFB::getFotoPerfil($amigo, TonLibInterface::FB_TIPO_USUARIO_ASSINANTE_FRIEND) . " " . $amigo[name] . " - " . $amigo[id];
        echo "</ol>";
        
    }
    
?>
