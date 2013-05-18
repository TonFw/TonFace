<?php
    echo "ENTROU NO TESTE BD";
    include_once "config/facebook_tongarcia_api/config.php";
    require_once "ClearDBConnection.php";
    
    $objBD = new ClearDBConnection($fb_cleardb_banco, $fb_cleardb_host, $fb_cleardb_username, $fb_cleardb_password);
    
    echo "<h1><pre>";
        print_r($objBD); die;
    echo "</h1></pre>";
        
    //Dados usuário facebook
    $nome = $fb_user_me["name"];
    $email = $fb_user_me["email"];
    $id_facebook = $fb_user_me["id"];
    
    echo "<h1>Dados do usuario: nome- $nome, email- $email, id_facebook- $id_facebook </h1>";

    //Inserção do usuário que assinou o App
    $tabela = "usuariofacebook";
    $campos = "nome, email, id_facebook";
    $objBD->inserir($tabela, $campos, "`$nome`, `$email`, `$id_facebook`");

    /*
    //Inserção dos amigos do usuário
    $tabela = "Amigo";
    $campos = "id_amigo_facebook, nome_amigo, $id_facebook";
    
    //Pegar todos os amigos
    $fb_all_friends = $objFBTonLib->getFriends("all");
    foreach ($fb_all_friends as $amigo) 
        $objFBTonLib->inserir($tabela, $campos, "$amigo[name], $amigo[id]");
    */
    
    
?>
