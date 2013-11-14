<?php
/**
 * Description of UserController
 *
 * @author ilton_garcia
 */
require_once "config/lib-fb-config.php";
require_once "TONLIB_INTERFACE.php";
require_once "lib/facebook/facebook.php";

/**
 * Classe responsável por abstrair as funcionalidades (deixar o código mais claro do que as chamadas do facebook)
 */
class TonLibFB {
    /** Armazena a instância da aplicação no facebook **/
    public $facebook = NULL;
    /** Armazena a instância do usuário facebook (se assinante, ou não e se for seus dados das permissões) **/
    public $user = NULL;
    /** Dados do usuário que foram liberados pelas permissões **/
    public $userData = NULL;
    /** String com a lista de permissões do aplicativo **/
    private $escopo_permissoes = "";
    /** Variável de auxílio na criação do post **/
    private $postURL = "";
    /** String de Token de acesso da aplicação **/
    public $accessToken = NULL;
    /** String com a URL do App no facebook **/
    public $urlApp = "";
    
    //Atributos privados de auxílio
    public $sent = false, $ligado = 1, $desligado = 0;

    /** Método que retorna a instância do FBMain, já que o construtor é privado para economizar memória (singleton) **/
    public static function getInstance($ton_app_id, $ton_secret, $ton_app_escopo_permissoes, $ton_app_url, $ton_app_domain) {
        return new TonLibFB($ton_app_id, $ton_secret, $ton_app_escopo_permissoes, $ton_app_url, $ton_app_domain);
    }//fim getInstance
    
    private function __construct($ton_app_id, $ton_secret, $ton_app_escopo_permissoes, $ton_app_url, $ton_app_domain) {
        //Create facebook application instance.
        $this->facebook = new Facebook(array(
          'appId'  => $ton_app_id,
          'secret' => $ton_secret,
          'cookie' => true,
          'domain' => $ton_app_domain
        ));
        
        $this->urlApp = $ton_app_url;
        $this->user = $this->facebook->getUser();
        $this->postURL = "https://graph.facebook.com/$ton_app_id/feed";
        $this->escopo_permissoes = $ton_app_escopo_permissoes;
        $this->accessToken = $this->facebook->getAccessToken();
        
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
            if($qtdFriends == "all") array_slice($friendsTmp['data'], 1);
            return $friendsTmp['data'];
	} catch (FacebookApiException $e) {
            print_r($e); exit;
	}//fim catch
    }//fim do getFriends
    
    /** Método responsável por enviar mensável ao mural
     *  @param String $msgMural => mensagem a ser enviada ao mural do usuário
     *  @param String $linkPoster => link de quem está postando a mensagem (dono do app/item que está postando).
     *  @param String $usuarioDonoMural  "me" = meu mural,  "friend" = mural do meu amigo
     *  @return id referente ao post gerado
     */
    public function setMsgMural($msgMural, $linkPoster, $usuarioDonoMural="me"){
        //Postar a mensagem no mural
        try {
            $post = $this->facebook->api('/me/feed', 'POST', array(
                                                            'link' => $linkPoster,
                                                            'message' => $msgMural
                                                        ));
            
             return $post['id'];
        } catch (FacebookApiException $e) {
            print_r($e); exit;
        }//fim catch
    }//fim setMsgMural
    
    /**
     * Método que faz o login no facebook e retorna a sessão com o login do face
     * @return SESSION login_face
     */
    public function login(){
     return $this->facebook->api('/me');   
    }
    
    /**
     * Função estática que retorna a foto do perfil do usuário
     * @param type $ton_user = objeto retornado pelo facebook api()
     * @param type $tipo = saber se é o usuário assinante ou se é o amigo do usuário (RECOMENDÁVEL USAR AS CONSTANTES DE TONLIB_INTERFACE) */
    public static function getFotoPerfil($ton_user, $tipo=0){
      if($tipo==0) echo '<img src="https://graph.facebook.com/' . $ton_user[username] . '/picture" />';
      else if($tipo==1) return '<img src="https://graph.facebook.com/' . $ton_user[id] . '/picture" />';
    }
    
}//fim da classe FBMain

$objTonLibFB = TonLibFB::getInstance($ton_app_id, $ton_secret, $ton_app_escopo_permissoes, $ton_app_url, $ton_app_domain);

$user;
function redirect_face(){
    if($objTonLibFB->user) { $user = $objTonLibFB->user; }
    //Caso não seja um usuário válido então ele manda para o local aonde a pessoa possa assinar a aplicação.
    else echo '<script type="text/javascript"> top.location ="' . $objTonLibFB->getURLAssinarApp() . '" </script>';
}
?>
