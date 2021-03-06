<?php 
/**
 * Modelo para gerenciar produtos
 *
 * @package TutsupMVC
 * @since 0.1
 */
class UsersModel
{

	/**
	 * Construtor para essa classe
	 *
	 * Configura o DB, o controlador, os parâmetros e dados do usuário.
	 *
	 * @since 0.1
	 * @access public
	 * @param object $db Objeto da nossa conexão PDO
	 * @param object $controller Objeto do controlador
	 */
	public function __construct( $db = false,$mongo = false, $controller = null ) {
		// Configura o DB (PDO)
		$this->db = $db;

		$this->mongo = $mongo;
		
		// Configura o controlador
		$this->controller = $controller;

		// Configura os parâmetros
		$this->parametros = $this->controller->parametros;

		// Configura os dados do usuário
		$this->userdata = $this->controller->userdata;
	}
	
	/**
	 * Listar produtos
	 *
	 * @since 0.1
	 * @access public
	 * @return array Os dados da base de dados
	 */
	public function listarProdutos ($idMarketplace = null) {
	
		$sql = "SELECT * FROM produtos where id = ?";
		
		// Faz a consulta
		$query = $this->db->query($sql,array($idMarketplace));
		
		// Retorna
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
}