    <script type="text/javascript" src="./public/js/jquery.js"></script>
    <script type="text/javascript" src="./public/js/minhas_funcoes_js.js"></script>
    
    <h1>TonGarcia - FaceApp (Testes API)</h1> 
    <p>
        Olá <strong><i><?php echo $fb_user_me['name']; ?></strong></i>, tudo bem?
    </p>
    <h2><strong>Lista randomica de 5 amigos:</strong></h2>
    <p>
        <?php listaAmigos($objFBMain); ?>
    </p>
    <p>
        <?php echo "Nick: " . $fb_user_me['username'] . "<br>"; ?>
        <strong>Imagem do perfil: <?php getFotoPerfil($fb_user_me); ?> </strong>
    </p>
    
    <form action="#" method="post">
        <input id="msg" type="text" name="msg_mural" placeholder="Mensagem a ser postada no mural">
        <input id="link_msg" type="text" name="link_msg_mural" placeholder="Link da mensagem">
        <input id="submit_btn" type="submit" value="Submit">
    </form>