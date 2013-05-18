<?php
    
    echo "<BR>ENTROU NO CLEAR_DB";

    class ClearDBConnection {

            private $host;
            private $banco;
            private $usuario;
            private $senha;

            public function __construct($banco = "tw", $host = "localhost", $usuario = "root", $senha = ""){
                    $this->host = $host;
                    $this->usuario 	= $usuario;
                    $this->senha 	= $senha;
                    $this->banco 	= $banco;

                    $this->conectar();
                    $this->selecionarBanco();
            }

            public function conectar(){
                $url=parse_url(getenv($this->host));
                $server = $url["host"];
                $username = $url["user"];
                $password = $url["pass"];
                $db = substr($url["path"],1);
                mysql_connect($server, $username, $password);
                return mysql_select_db($db);
            }

            public function selecionarBanco(){
                return mysql_select_db($this->banco);
            }

            public function select($tabela, $campos, $order = NULL){
                    $sql = "SELECT $campos FROM $tabela ";
                    if($order){
                            $sql .= " ORDER BY " . $order;
                    }
                    $dados = mysql_query($sql);
                    $arDados = array();

                    while($linha = mysql_fetch_array($dados)){

                            $arCampos = array();
                            foreach($linha as $chave => $valor){
                                    if(!is_numeric($chave)){
                                            $arCampos[$chave] = $valor;
                                    }
                            }
                            $arDados[] = $arCampos;
                    }

                    return $arDados;
            }

            public function inserir($tabela, $campos, $dados){
                    $sql = "INSERT INTO $tabela ($campos) VALUES ($dados)";
                    $dados = mysql_query($sql);
                    return mysql_insert_id();
            }
    }//fim classe
    
    
    
?>
