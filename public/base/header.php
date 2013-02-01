<!DOCTYPE html>
<html>
<head>
	<title>Untitled Page</title>
	<link rel="stylesheet" href="public/style.css" type="text/css" />
	<?php include "public/base/includes-js.php" ?>
        
	<script type="text/javascript">
		
	</script>
	
</head>
<body>
    <!-- Div preferencias body serve como se fosse o body, j� que pode ser que o face n�o permita que coloquemos nossa p�gina inteira dentro do canvas -->
    <div id="preferencias_body">
        <div id="header" class="navbar">
            <div class="navbar-inner">
              <div class="container">

                <!-- .btn-navbar � o bot�o usado para mostrar e esconder o menu -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target="#barra_navegacao">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>
                
                <!-- Colocamos aqui a marca e esta ficar� exposta junto com o bot�o -->
                <a class="brand" href="#">Project name</a>
                
                <!-- Feito aqui o callpse, o collpase � aquele efeito sanfona que serve para sumir com algo -->
                <div id="barra_navegacao" class="nav-collapse nav-collapse navbar-responsive-collapse in collapse">
                    <!-- Nave��o -->
                    <ul class="nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">P�gina 1</a></li>
                        <li><a href="#">P�gina 2</a></li>
                    </ul>
                </div>

              </div>
            </div>
      </div>