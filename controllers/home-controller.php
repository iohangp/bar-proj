<?php
/**
 * home - Controller de exemplo
 *
 * @package TutsupMVC
 * @since 0.1
 */
class HomeController extends MainController
{

	/**
	 * Carrega a página "/views/home/index.php"
	 */
    public function index() {
		// Título da página
		$this->title = 'Home - Painel';
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
		
		// /views/_includes/header.php
        require DIR . '/views/_includes/header.php';
		
		// /views/home/home-view.php
        require DIR . '/views/home/home-index.php';
		
		// /views/_includes/footer.php
        require DIR . '/views/_includes/footer.php';
		
    } // index
	
} // class HomeController