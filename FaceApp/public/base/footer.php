    </body>
</html>

<?php 
    $msg = $_POST["msg_mural"]; 
    $link_msg = $_POST["link_msg_mural"]; 
    if(isset($msg) && isset($link_msg))$objFBTonLib->setMsgMural($msg, $link_msg);
    else echo "<script> alert('Um dos campos não foi preenchido!'); </script>";
    
    echo "<strong>Exemplo explodir de cidade:</strong><br>"; print_r($objFBTonLib->facebook->api('107800539249675'));
?>

<?php 
    //Parte do banco de dados
    include_once "config/clearDB/testes_bd.php";   
    
    
?>