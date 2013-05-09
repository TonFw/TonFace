    </body>
</html>

<?php 
    $msg = $_POST["msg_mural"]; 
    $link_msg = $_POST["link_msg_mural"]; 
    if(isset($msg) && isset($link_msg))$objFBMain->setMsgMural($msg, $link_msg);
    else echo "<script> alert('Um dos campos não foi preenchido!'); </script>" 
?>
