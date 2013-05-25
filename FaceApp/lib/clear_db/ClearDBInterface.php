<?php

echo "Entrou no ClearDBInterface!<br>";

/** Interface para uso do ClearDB **/
interface ClearDBInterface {
    
    /** Constante HEROKU referência URL do ClearDB_BANCO **/
    const HEROKU_CLEARDB_URL = "CLEARDB_DATABASE_URL";
    /** Constante HEROKU referência HOST do ClearDB_BANCO **/
    const HEROKU_CLEARDB_HOST = "host";
    /** Constante HEROKU referência USUÁRIO do ClearDB_BANCO **/
    const HEROKU_URL_CLEARDB_USER = "user";
    /** Constante HEROKU referência SENHA do ClearDB_BANCO **/
    const HEROKU_URL_CLEARDB_PASSWORD = "pass";
    /** Constante HEROKU referência PARTE_NOME_BANCO do ClearDB_BANCO **/
    const HEROKU_URL_CLEARDB_PATH = "path";
    
    
}//fim interface

?>
