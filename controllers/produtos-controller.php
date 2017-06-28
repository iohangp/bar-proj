<?php
/**
 * produtosController - Controller de exemplo
 *
 * @package TutsupMVC
 * @since 0.1
 */
class produtosController extends MainController
{

	/**
	 * Carrega a página "/views/produtos/index.php"
	 */
    public function index() {
		// Título da página
		$this->title = 'Produtos';
		$this->permission_required = "listar-produtos";

		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

		// /views/_includes/header.php
        require DIR . '/views/_includes/header.php';

        // Verifica se o usuário tem a permissão para acessar essa página
		if (!$this->check_permissions($this->permission_required)) {
			require DIR . '/views/_includes/permission.php';
		}else{
			
			// Carrega o modelo para este view
	        $modelo = $this->load_model('produtos/produtos-model');
			

			// /views/produtos/produtos-view.php
	        require DIR . '/views/produtos/produtos-index.php';
		}
		
		// /views/_includes/footer.php
        require DIR . '/views/_includes/footer.php';
		
    } // index

    public function editar($parametros){
    	$this->title = 'Produtos';
		$this->permission_required = "editar-produtos";
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();



		// /views/_includes/header.php
        require DIR . '/views/_includes/header.php';

        // Verifica se o usuário tem a permissão para acessar essa página
		if (!$this->check_permissions($this->permission_required)) {
			require DIR . '/views/_includes/permission.php';
		}else{
			// Carrega o modelo para este view
	        $modelo = $this->load_model('produtos/produtos-model');
	        $modeloCat = $this->load_model('categorias/categorias-model');
	       
	        if($_POST){
	        	//  echo'<pre>';print_r($_POST);echo'</pre>'; exit;  	
				$response = $modelo->editProduto($_POST);

				if($response){
					$status = "success";
					$mensagem = "A categoria foi salva com sucesso!";
				}
				else{
					$status = "danger";
					$mensagem = "Erro ao salvar categoria!";
				}



	        }
	        
			
			// /views/produtos/produtos-view.php
	        include DIR . '/views/produtos/produtos-edit.php';
				
		}

       
		// /views/_includes/footer.php
        require DIR . '/views/_includes/footer.php';
    }

    public function inserir(){
    	$this->title = 'Inserir Produtos';
		$this->permission_required = "editar-produtos";
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

        // Verifica se o usuário tem a permissão para acessar essa página
		if (!$this->check_permissions($this->permission_required)) {

			// /views/_includes/header.php
        	require DIR . '/views/_includes/header.php';

			require DIR . '/views/_includes/permission.php';
		}else{
			// Carrega o modelo para este view
	        $modelo = $this->load_model('produtos/produtos-model');
	        $modeloCat = $this->load_model('categorias/categorias-model');
	        
	        if($_POST){
	        	
				$idProduto = $modelo->inserirProduto($_POST);
				
				if(is_numeric($idProduto)){
					header("Location: ".URL."/produtos/editar/".$idProduto."?status=success"); 
					exit;
				}

	        }
	        
			// /views/_includes/header.php
        	require DIR . '/views/_includes/header.php';
			// /views/produtos/produtos-view.php
	        include DIR . '/views/produtos/produtos-edit.php';
		}

       
		// /views/_includes/footer.php
        require DIR . '/views/_includes/footer.php';
    }

    public function excluir($parametros){
    	$this->title = 'Excluir Produtos';
		$this->permission_required = "editar-produtos";
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
		
        // Verifica se o usuário tem a permissão para acessar essa página
		if (!$this->check_permissions($this->permission_required)) {
			// /views/_includes/header.php
        	require DIR . '/views/_includes/header.php';

			require DIR . '/views/_includes/permission.php';
		}else{
			// Carrega o modelo para este view
	        $modelo = $this->load_model('produtos/produtos-model');
	      
	        	    	
			$response = $modelo->excluirProduto($parametros[0]);

	        if($response){
				header("Location: ".URL."/produtos/?status=success"); 
				exit;
			}
				
		}

       
		// /views/_includes/footer.php
        require DIR . '/views/_includes/footer.php';
    }


	
}