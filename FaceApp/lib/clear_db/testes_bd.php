<meta charset="UTF-8">

<?php 
    
    teste_mysqli();
    //teste_mysql_connect();

    function teste_mysql_connect() {
        //Definição das constantes
        define ('DB_USER','b689511cd8bc36');
        define ('DB_PASSWORD','bd06a621');
        define ('DB_HOST','us-cdbr-east.cleardb.com');
        define ('DB_DATABASE','heroku_ea52e0cde3e240c');
        
        $url=parse_url(getenv("mysql://b689511cd8bc36:bd06a621@us-cdbr-east-03.cleardb.com/heroku_ea52e0cde3e240c"));
        print_r($url);
        
    }

    function teste_mysqli(){
        //Definição das constantes
        define ('DB_USER','b689511cd8bc36');
        define ('DB_PASSWORD','bd06a621');
        define ('DB_HOST','us-cdbr-east.cleardb.com'); 
        //define ('DB_HOST','us-cdbr-east-03.cleardb.com/heroku_ea52e0cde3e240c');
        define ('DB_DATABASE','heroku_ea52e0cde3e240c');

        $instance = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, "3306");
    }
    
    /*
    
    $cleardb_url = "mysql://". DB_USER .":". DB_PASSWORD ."@us-mm-auto-dca-01.cleardb.com/". DB_DATABASE ."?reconnect=true";
    
    echo $cleardb_url . "<br>";
    $url=parse_url(getenv($cleardb_url));
    
    print_r($url);
    
    $server = $url[DB_HOST];
    $username = $url[DB_USER];
    $password = $url[DB_PASSWORD];
    $db = substr($url["path"],1);

    mysql_connect($server, $username, $password);
    
    mysql_select_db($db);
    */
?>


<?php
/*
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
*/
    /*
    //Inserção dos amigos do usuário
    $tabela = "Amigo";
    $campos = "id_amigo_facebook, nome_amigo, $id_facebook";
    
    //Pegar todos os amigos
    $fb_all_friends = $objTonLibFB->getFriends("all");
    foreach ($fb_all_friends as $amigo) 
        $objTonLibFB->inserir($tabela, $campos, "$amigo[name], $amigo[id]");
    */  
?>
