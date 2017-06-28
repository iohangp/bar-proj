<?php 
/**
 * Modelo para gerenciar produtos
 *
 * @package TutsupMVC
 * @since 0.1
 */
class ProdutosModel
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
	public function __construct( $db = false, $controller = null ) {
		// Configura o DB (PDO)
		$this->db = $db;
		
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
	public function listarProdutos() {
	
		$sql = "SELECT p.*, c.nome_categoria,  DATE_FORMAT(p.data_cadastro,'%d/%m/%Y %H:%i:%S') as cadastro_format 
			 	  FROM produtos p
		         inner join categorias c on c.id = p.id_categoria;
		         ";
		
		// Faz a consulta
		$query = $this->db->query($sql);
		
		// Retorna
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getProduto($id){

		$sql = "select  p.*, c.nome_categoria  from produtos p
				 inner join categorias c on c.id = p.id_categoria
				where p.id = ?";
	
		// Faz a consulta
		$query = $this->db->query($sql, array($id));
		
		// Retorna
		return $query->fetchAll(PDO::FETCH_ASSOC);

	}

	public function editProduto($dados){

		
		$param = array();

		$param[0] = $dados['name'];
		$param[1] = $dados['description'];
		$param[2] = number_format(str_replace(',', '.', $dados['preco_custo']),2);
		$param[3] = number_format(str_replace(',', '.', $dados['preco_venda']),2);
		$param[4] = $dados['qty'];
		$param[5] = $dados['ean'];
		$param[6] = $dados['categories'][0];
		$param[7] = (@$dados['situacao'] ? $dados['situacao'] : 0);
		$param[8] = $dados['_id'];

		
		$sql = "update produtos p
				set p.nome_produto = ?,
				    p.descricao_produto = ?,
				    p.preco_custo = ?,
				    p.preco_venda = ?,
				    p.estoque = ?,
				    p.codigo = ?,
				    p.id_categoria = ?,
				    p.situacao_produto = ?
				where p.id = ?";

	//	$result = $this->db->query($sql, $param);


		if($this->db->query($sql, $param))
			return true;
		else
			return false;



	}

	public function inserirProduto($dados){

		
		$param = array();


		
		$data['nome_produto'] = $dados['name'];
		$data['descricao_produto'] = $dados['description'];
		$data['preco_custo'] = $dados['preco_custo'];
		$data['preco_venda'] = $dados['preco_venda'];
		$data['estoque'] = $dados['qty'];
		$data['situacao_produto'] = ($dados['situacao'] ? $dados['situacao'] : 0);
		$data['id_categoria'] = $dados['categories'][0];
		$data['codigo'] = $dados['ean'];

		$result = $this->db->insert('produtos',$data);
	
		if ( $result )
			return $this->db->last_id;
		else
			return false;

	}

	public function excluirProduto($idProduto){


		$result = $this->db->delete('produtos','id',$idProduto);
	
		if ( $result )
			return true;
		else
			return false;
		


	}

	
}