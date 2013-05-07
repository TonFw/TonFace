    <script type="text/javascript" src="./public/js/jquery.js"></script>
    <script type="text/javascript" src="./public/js/minhas_funcoes_js.js"></script>
    
    <h1>TonGarcia - FaceApp (Testes API)</h1> 
    <p>
        <!-- Se não for um usuário cadastrado é para mandar ele para o facebook, na página da aplicação -->
        <strong id="xpto"><a id="link_a" href="<?php echo $objFBMain->getURLAssinarApp(); ?>" target="_top">Allow this app to interact with my profile</a></strong>
        <br /><br />
        This is just a simple app for testing/demonstrating some facebook graph API calls usinf php-sdk library. After allowing this application, 
        it can be used to post messages on your wall. Also it will list 5 of your randomly picked friends.
        
        <script type="text/javascript">
            set_pagina_assinatura_app("#link_a");
        </script>
            
    <h1>Passou aqui também</h1>
    </p>
</html>
