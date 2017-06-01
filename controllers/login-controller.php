<?php
/**
 * produtosController - Controller de exemplo
 *
 * @package TutsupMVC
 * @since 0.1
 */
class loginController extends MainController
{

	/**
	 * Carrega a página "/views/produtos/index.php"
	 */
    public function index() {
		// /views/produtos/produtos-view.php
        require DIR . '/views/home/home-login.php';
    }

    public function logoff() {
		$this->logout(true);
    }
}