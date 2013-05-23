<?php
    require_once "ClearDBInterface.php";
    
    /** Classe responsável pela conexão com o ClearDB **/
    class ClearDBConnection {
        /** Usuário de acesso ao banco **/
        private $usuarioNome;
        /** Senha de acesso ao banco **/
        private $senha;
        
        /** Referência do servidor de banco de dados **/
        private $serverHost;
        /** Banco de dados (referência do banco) **/
        private $banco;
        /** URL do Banco de dados **/
        private $url;
        
        // Guarda uma instância da classe p/ o SINGLETON
        private static $instanciaDB;

        //Construtor
        private function __construct(){
            $this->url=parse_url(getenv(ClearDBInterface::HEROKU_CLEARDB_URL));
            $this->conectar();
            $this->banco = $this->selecionarBanco();
        }//fim construtor
        
        /** Método de auxílio ao SINGLETON **/
        public static function getInstance(){
            if (!isset(self::$instance)) {
                $classe = __CLASS__;
                self::$instance = new $classe;
            }//fim validação da existência da instância

            return self::$instance;
        }//fim getInstance

        /** Função responsávle por conectar ao banco de dados **/
        private function conectar(){
            mysql_connect(
                            $this->serverHost = $this->url[ClearDBInterface::HEROKU_CLEARDB_HOST],
                            $this->usuarioNome = $this->url[ClearDBInterface::HEROKU_URL_CLEARDB_USER],
                            $this->senha = $this->url[ClearDBInterface::HEROKU_URL_CLEARDB_PASSWORD]
                          );
        }//fim conectar

        /** Função responsável por selecionar o banco de interesse **/
        public function selecionarBanco(){
            ClearDBInterface::$instanciaDB = substr($this->url[ClearDBInterface::HEROKU_URL_CLEARDB_PATH],1);
            return mysql_select_db(ClearDBInterface::$instanciaDB);
        }//fim selecionarBanco

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
