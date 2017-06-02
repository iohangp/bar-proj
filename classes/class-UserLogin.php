<?php
/**
 * UserLogin - Manipula os dados de usuários
 *
 * Manipula os dados de usuários, faz login e logout, verifica permissões e 
 * redireciona página para usuários logados.
 *
 * @package TutsupMVC
 * @since 0.1
 */
class UserLogin
{
	/**
	 * Usuário logado ou não
	 *
	 * Verdadeiro se ele estiver logado.
	 *
	 * @public
	 * @access public
	 * @var bol
	 */
	public $logged_in;

	/**
	 * Verifica se o login é feito a partir da API
	 *
	 * @public
	 * @access public
	 * @var array
	 */
	public $api_login;
	
	
	/**
	 * Dados do usuário
	 *
	 * @public
	 * @access public
	 * @var array
	 */
	public $userdata;
	
	/**
	 * Mensagem de erro para o formulário de login
	 *
	 * @public
	 * @access public
	 * @var string
	 */
	public $login_error;
	
	/**
	 * Verifica o login
	 *
	 * Configura as propriedades $logged_in e $login_error. Também
	 * configura o array do usuário em $userdata
	 */
	public function check_userlogin () {


		if(isset($_SESSION['usuario']) && !isset($_POST['user'])){
			$this->userdata = $_SESSION['usuario'];
			$this->logged_in = true;
			$this->login_error = null;
		}else if(isset($_POST['user']) && isset($_POST['pass'])){
			$user = $_POST['user'];
			$senha = $_POST['pass'];

			// Verifica se o usuário existe na base de dados
			$query = $this->db->query( 
				'SELECT id, nome_usuario, login_usuario, permissao_usuario
					FROM usuarios u
					
				WHERE login_usuario = ? and senha = md5(?) LIMIT 1', 
				array( $user, $senha) 
			);

			$fetch = $query->fetch(PDO::FETCH_ASSOC);
			$userID = (int) $fetch['id'];

			if($userID > 0){
				//usuario logado
				$_SESSION['usuario']['id'] = $fetch['id'];
				$_SESSION['usuario']['nome'] = $fetch['nome_usuario'];
				$_SESSION['usuario']['login'] = $fetch['login_usuario'];
				$_SESSION['usuario']['session_id'] = session_id();
				$_SESSION['usuario']['permissoes'] = explode(",", $fetch['permissao_usuario']);

				$this->userdata = $_SESSION['usuario'];
				$this->logged_in = true;
				$this->login_error = null;

				if($_POST['user'] && $_POST['pass']){
					unset($_POST['user']);
					unset($_POST['pass']);

					$url = URL;
					echo '<script type="text/javascript">window.location.href = "' . $url . '";</script>';
				}

				return true;
			}else{
				// O usuário não está logado
				$this->logged_in = false;
				$this->login_error = 'Usuário ou senha inválidos!';
				$this->logout(true);
			
				return;
			}
		}else{

			if(getParam(0)=="freight" && getParam(1)=="calculate"){
				$this->logged_in = true;
		    	return true;
		    }else{
		    	// O usuário não está logado
				$this->logged_in = false;
				$this->login_error = 'Usuário ou senha inválidos!';
				$this->logout(true);
			
				return;
		    }


			

		}

		
	}
	
	/**
	 * Logout
	 *
	 * Desconfigura tudo do usuárui.
	 *
	 * @param bool $redirect Se verdadeiro, redireciona para a página de login
	 * @final
	 */
	protected function logout($redirect=false) {
		$_SESSION['usuario'] = array();
		unset( $_SESSION['usuario'] );
		session_regenerate_id();

		if($redirect && (getParam(0) != "login" || getParam(1) == "logoff")){
			$this->goto_login();
		}
	}
	
	/**
	 * Vai para a página de login
	 */
	protected function goto_login(){
		// Verifica se a URL da HOME está configurada
		if ( defined( 'URL' ) ) {
			// Configura a URL de login
			$login_uri  = URL . '/login/';
			
			// A página em que o usuário estava
			$_SESSION['goto_url'] = urlencode( $_SERVER['REQUEST_URI'] );
			
			// Redireciona
			echo '<meta http-equiv="Refresh" content="0; url=' . $login_uri . '">';
			echo '<script type="text/javascript">window.location.href = "' . $login_uri . '";</script>';
			// header('location: ' . $login_uri);
			
		}
		
		return;
	}
	
	
	/**
	 * Verifica permissões
	 *
	 * @param string $required A permissão requerida
	 * @param array $user_permissions As permissões do usuário
	 * @final
	 */
	final protected function check_permissions($required = 'any') {
		$usuario_permissao = $this->userdata['permissoes'];

		if (!is_array( $usuario_permissao ) ) {
			return false;
		}

		// Se o usuário não tiver permissão
		if ( ! in_array( $required, $usuario_permissao ) ) {
			// Retorna falso
			return false;
		} else {
			return true;
		}
	}
}