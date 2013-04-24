<?php

    include_once './app/fbmain.php';
    
    if(primeiroAcesso())
        echo "É o primeiro acesso";
    else
        echo "Não é o primeiro acesso";
    
    
?>
