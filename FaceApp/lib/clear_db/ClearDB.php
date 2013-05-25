<?php
    require_once "ClearDBInterface.php";
    echo "Entrou no ClearDB!<br>";
    
    /** Classe responsável pela conexão com o ClearDB **/
    class ClearDB {
        /** Usuário de acesso ao banco **/
        private $usuarioNome;
        /** Senha de acesso ao banco **/
        private $senha;
        
        /** Referência do servidor de banco de dados **/
        private $serverHost;
        /** Banco de dados (referência do banco) **/
        public $banco;
        /** URL do Banco de dados **/
        private $url;
        
        // Guarda uma instância da classe p/ o SINGLETON
        private static $instancia;
        
        /** Conexão com o banco de dados **/
        private $conexao;

        //Construtor
        private function __construct(){
            $this->url = parse_url(getenv(ClearDBInterface::HEROKU_CLEARDB_URL));
            
            $this->conectar();
            $this->banco = $this->selecionarBanco();
            echo mysql_errno("<br>TesteDB --> " . $this->testeDB) . ": " . mysql_error($this->testeDB). "<br><br>";
            
            var_dump($this->banco);
            
            if(!isset($this->usuarioNome) || !isset($this->senha) || !isset($this->serverHost) || !isset($this->banco) || !isset($this->url))
                echo "Algum dos atributos não foi setado corretamente para conexão com o Banco de Dados.";
        }//fim construtor
        
        /** Método de auxílio ao SINGLETON **/
        public static function getInstance(){
            if (!isset(self::$instancia)) {
                $classe = __CLASS__;
                self::$instancia = new $classe;
            }//fim validação da existência da instância
            
            return self::$instancia;
        }//fim getInstance

        /** Função responsávle por conectar ao banco de dados **/
        private function conectar(){
            $this->conexao = mysql_connect(
                                            $this->serverHost = $this->url[ClearDBInterface::HEROKU_CLEARDB_HOST],
                                            $this->usuarioNome = $this->url[ClearDBInterface::HEROKU_URL_CLEARDB_USER],
                                            $this->senha = $this->url[ClearDBInterface::HEROKU_URL_CLEARDB_PASSWORD]
                                          );
        }//fim conectar

        /** Função responsável por selecionar o banco de interesse **/
        public function selecionarBanco() {
            return mysql_select_db(substr($this->url[ClearDBInterface::HEROKU_URL_CLEARDB_PATH],1), $this->conexao);
        }//fim selecionarBanco

        public function select($tabela, $campos, $order = NULL) {
                $sql = "SELECT $campos FROM $tabela ";
                
                if($order)
                    $sql .= " ORDER BY " . $order;
                
                $dados = mysql_query($sql);
                $arDados = array();

                while($linha = mysql_fetch_array($dados)){

                        $arCampos = array();
                        foreach($linha as $chave => $valor)
                                if(!is_numeric($chave))
                                        $arCampos[$chave] = $valor;
                                
                        $arDados[] = $arCampos;
                }//fim while

                return $arDados;
        }

        public function inserir($tabela, $campos, $dados) {
            $sql = "INSERT INTO $tabela ($campos) VALUES ($dados)";
            
            mysql_query($sql, $this->conexao);
            echo "<br>*Test mysql_query: " . mysql_errno($this->conexao) . ": " . mysql_error($this->conexao) . "<br>";
            
            var_dump($dados);
            echo "<br><br><strong>passou no insert!</strong><br>";
            return mysql_insert_id();
        }//Fim inserir
        
        public function testeDBHeroku() {
            $url=parse_url(getenv("CLEARDB_DATABASE_URL"));

            $server = $url["host"];
            $username = $url["user"];
            $password = $url["pass"];
            $db = substr($url["path"],1);

            $link = mysql_connect($server, $username, $password);
            $conexao_erro = mysql_errno($link);
            
            if(!$conexao_erro) echo "<br>ClearDB Conectado com sucesso!";
            else echo "<br>deu merda!";
            
            mysql_select_db("zuado", $link);
            $conexao_erro = mysql_errno($link);
            
            if(!$conexao_erro) echo "<br>Banco zuado encontrado na conexão!";
            else echo "<br>Deu merda no Banco zuado!";
            
            mysql_select_db($db, $link);
            $conexao_erro = mysql_errno($link);
            
            if(!$conexao_erro) echo "<br>Banco sério encontrado na conexão!";
            else echo "<br>Deu merda no Banco sério!";
            
            $query_retorno = mysql_query("SELECT * FROM usuariofacebook", $link);
            if (!$query_retorno) {
                echo "<br>Pala na query, não teve retorno!";
                echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
            }  else {
                echo "<br><br>Print do que tem no banco: <br>";
                while($row = mysql_fetch_assoc($query_retorno))
                    echo "Nome: " . $row["nome"] . "<br>";
            }

        }//fim testeDBHeroku
        
    }//fim classe
    
    
?>
