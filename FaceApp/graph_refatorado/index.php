<?php

    include_once './app/fbmain.php';
    
    if(primeiroAcesso())
        echo "� o primeiro acesso";
    else
        echo "N�o � o primeiro acesso";
    
    
?>
