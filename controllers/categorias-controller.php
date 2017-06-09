<?php
/**
 * produtosController - Controller de exemplo
 *
 * @package TutsupMVC
 * @since 0.1
 */
class categoriasController extends MainController
{

	/**
	 * Carrega a página "/views/produtos/index.php"
	 */
    public function index() {
		// Título da página
		$this->title = 'Categorias';
		$this->permission_required = "listar-categorias";

		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

		// /views/_includes/header.php
        require DIR . '/views/_includes/header.php';

        // Verifica se o usuário tem a permissão para acessar essa página
		if (!$this->check_permissions($this->permission_required)) {
			require DIR . '/views/_includes/permission.php';
		}else{
			
			// Carrega o modelo para este view
	        $modelo = $this->load_model('categorias/categorias-model');
			

			// /views/produtos/produtos-view.php
	        require DIR . '/views/categorias/categorias-index.php';
		}
		
		// /views/_includes/footer.php
        require DIR . '/views/_includes/footer.php';
		
    } // index

    public function editar($parametros){
    	$this->title = 'Editar Categorias';
		$this->permission_required = "editar-categorias";
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();



		// /views/_includes/header.php
        require DIR . '/views/_includes/header.php';

        // Verifica se o usuário tem a permissão para acessar essa página
		if (!$this->check_permissions($this->permission_required)) {
			require DIR . '/views/_includes/permission.php';
		}else{
			// Carrega o modelo para este view
	        $modelo = $this->load_model('categorias/categorias-model');
	       
	        if($_POST){
	        	    	
				$response = $modelo->editCategoria($_POST);

				if($response){
					$mensagem = "<script>
									$(document).ready(function() {

									  $.notify({
										title: '<strong>Edição de Categorias</strong><br>',
										message: 'Categoria alterada com sucesso!'
									  },{
											type: 'success'
									  });

									});
								</script>";
				}else{

					$mensagem = "<script>
									$(document).ready(function() {

									  $.notify({
										title: '<strong>Edição de Categorias</strong><br>',
										message: 'Erro inesperado ao editar a categoria'
									  },{
											type: 'danger'
									  });

									});
								</script>";
				}


	        }
	        
			
			// /views/produtos/produtos-view.php
	        include DIR . '/views/categorias/categorias-edit.php';
				
		}

       
		// /views/_includes/footer.php
        require DIR . '/views/_includes/footer.php';
    }

    public function inserir(){
    	$this->title = 'Inserir Categorias';
		$this->permission_required = "editar-categorias";
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

        // Verifica se o usuário tem a permissão para acessar essa página
		if (!$this->check_permissions($this->permission_required)) {

			// /views/_includes/header.php
        	require DIR . '/views/_includes/header.php';

			require DIR . '/views/_includes/permission.php';
		}else{
			// Carrega o modelo para este view
	        $modelo = $this->load_model('categorias/categorias-model');
	        
	        if($_POST){
	        	
				$idCategoria = $modelo->inserirCategoria($_POST);
				
				if(is_numeric($idCategoria)){
					header("Location: ".URL."/categorias/editar/".$idCategoria); 
					exit;
				}

	        }
	        
			// /views/_includes/header.php
        	require DIR . '/views/_includes/header.php';
			// /views/produtos/produtos-view.php
	        include DIR . '/views/categorias/categorias-edit.php';
		}

       
		// /views/_includes/footer.php
        require DIR . '/views/_includes/footer.php';
    }



	
}