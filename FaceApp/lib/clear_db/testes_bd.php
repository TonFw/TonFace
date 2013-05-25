<meta charset="UTF-8">
<h2>Heroku teste!</h2>


<?php
    
    require_once "ClearDB.php";
    
    $clearDB = ClearDB::getInstance();
    
    if(!isset($clearDB->banco))    
        echo "Deu merda no banco de dados!!";
    else    
        echo "<br><br>Banco de dados carregado corretamente!<br>";
    
    $fb_user_name = $fb_user_me["name"];
    $fb_user_email = $fb_user_me["email"];
    $fb_user_id = $fb_user_me["id"];
    echo "<br><br>Testes de recuperação dos atributos do usuário: $fb_user_name, $fb_user_email, $fb_user_id";
    
    
    $tabela = "usuariofacebook";
    $campos = "nome, email, id_facebook";
    $dados = "'$fb_user_name', '$fb_user_email', '$fb_user_id'";
    $clearDB->inserir($tabela, $campos, $dados);
    //$clearDB->testeDB();
    $clearDB->testeDBHeroku();
?>
