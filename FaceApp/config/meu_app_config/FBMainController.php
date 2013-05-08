<?php

require_once "app-config.php";
require_once "config.php";
require_once "config/facebook/facebook.php";

/**
 * Classe responsável por abstrair as funcionalidades (deixar o código mais claro do que as chamadas do facebook)
 */
class FBMainController {
    /** Armazena a instância da aplicação no facebook **/
    public $facebook = NULL;
    /** Armazena a instância do usuário facebook (se assinante, ou não e se for seus dados das permissões) **/
    public $user = NULL;
    /** Dados do usuário que foram liberados pelas permissões **/
    public $userData = NULL;
    /** Lista de amigos **/
    public $friends = array();
    /** String com a lista de permissões do aplicativo **/
    private $escopo_permissoes = "";
    /** String com a URL do App no facebook **/
    public $urlApp = "";
    
    //Atributos privados de auxílio
    public $sent = false, $ligado = 1, $desligado = 0;

    /** Método que retorna a instância do FBMain, já que o construtor é privado para economizar memória (singleton) **/
    public static function getInstance($fb_app_id, $fb_secret, $fb_app_escopo_permissoes, $fb_app_url, $fb_app_domain) {
        return new FBMainController($fb_app_id, $fb_secret, $fb_app_escopo_permissoes, $fb_app_url, $fb_app_domain);
    }//fim getInstance
    
    private function __construct($fb_app_id, $fb_secret, $fb_app_escopo_permissoes, $fb_app_url, $fb_app_domain) {
        //Create facebook application instance.
        $this->facebook = new Facebook(array(
          'appId'  => $fb_app_id,
          'secret' => $fb_secret,
          'cookie' => true,
          'domain' => $fb_app_domain
        ));
        
        $this->urlApp = $fb_app_url;
        $this->user = $this->facebook->getUser();
        $this->escopo_permissoes = $fb_app_escopo_permissoes;
        
        //Varifica se veio usuário, isto é, se o usuário está logado no face e assina a aplicação
        if ($this->user) $this->getUserData();
        
    }//fim construtor
    
    /** Retorno do objeto usuário do facebook **/
    private function getUserData(){
        try {
            $this->userData = $this->facebook->api('/me');
        } catch (FacebookApiException $e) {
            print_r($e); exit;
        }//fim catch
    }//fim getUserData
    
    /** Método responsável por criar o array de configuração das permissões do app **/
    public function getURLAssinarApp(){
        //Cai aqui se o usuário não for assinante da aplicação
	 return $this->facebook->getLoginUrl(array(
            'canvas' => $this->ligado,
            'fbconnect' => $this->desligado,
            'scope' => $this->escopo_permissoes, //neste caso o escopo é apenas a publicação no mural
             'redirect_uri' => $this->urlApp
	));
    }//fim do redirecAssinarApp


    /** Retorna a lista de objs facebook dos amigos da pessoa
     *  @param int $qtdFriends quantidade de amigos a serem capturados para a array **/
    public function getFriends($qtdFriends = 5){
        try {
            $friendsTmp = $this->facebook->api('/' . $this->userData['id'] . '/friends');
            shuffle($friendsTmp['data']);
            array_splice($friendsTmp['data'], $qtdFriends);
            $this->friends = $friendsTmp['data'];
	} catch (FacebookApiException $e) {
            print_r($e); exit;
	}//fim catch
    }//fim do getFriends
    
    /** Método responsável por enviar mensável ao mural
     *  @param string $mapp_message passar a mensagem do post por: $_POST['mapp_message']**/
    public function setMsgMural($mapp_message){
        //Postar a mensagem no mural
        try {
            $this->facebook->api('/me/feed', 'POST', array(
            'message' => $mapp_message
            ));
            $sent = true;
        } catch (FacebookApiException $e) {
            print_r($e); exit;
        }//fim catch
    }//fim setMsgMural   
    
}//fim da classe FBMain

$objFBMain = FBMainController::getInstance($fb_app_id, $fb_secret, $fb_app_escopo_permissoes, $fb_app_url, $fb_app_domain);

if($objFBMain->user) { }
//Caso não seja um usuário válido então ele manda para o local aonde a pessoa possa assinar a aplicação.
else echo '<script type="text/javascript"> top.location ="' . $objFBMain->getURLAssinarApp() . '" </script>';

?>