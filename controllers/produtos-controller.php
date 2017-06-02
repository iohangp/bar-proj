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

    public function edit($parametros){
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
	        $modelo = $this->load_model('products/products-model');

	        $modeloCat = $this->load_model('categories/categories-model');

	        if($_POST){
	        	

	        	$idProduto['_id'] = new MongoDB\BSON\ObjectId($_POST['_id']);
	        	unset($_POST['_id']);

	        	
	        	
	        	$_POST['price'] = str_replace('.','',$_POST['price']);
	        	$_POST['price'] = (float)str_replace(',', '.', $_POST['price']);
	        	$_POST['promotional_price'] = str_replace('.','',$_POST['promotional_price']);
	        	$_POST['promotional_price'] = (float)str_replace(',', '.', $_POST['promotional_price']);
	        	$_POST['cost'] = str_replace('.','',$_POST['cost']);
	        	$_POST['cost'] = (float)str_replace(',', '.', $_POST['cost']);

	        	$paramUpdate['$set'] = $_POST;

	        	if($_POST['categories']){
	        		foreach ($_POST['categories'] as $key => $cats) {
	        			$filter['api_key'] = $_SESSION['usuario']['api_key'];
						$filter['code'] = (int)$cats;
						
						$dadosCategoria = $modeloCat->selectCategorias($filter);
						//sempre limpar o filtro após usar
						unset($filter);
						foreach ($dadosCategoria as $getCat) {
							
							$categorias['categories'][$key]['code'] = $getCat->code;
							$categorias['categories'][$key]['name'] = $getCat->name;
						}
		        		
	        		}

	        		$paramUpdate['$set']['categories'] = $categorias['categories'];		
					
	        	}
				
	        	$paramUpdate = (object)$paramUpdate;         	
				$modelo->updateProduto($paramUpdate,$idProduto);

	        }
	        
			
			// /views/produtos/produtos-view.php
	        include DIR . '/views/products/products-edit.php';
		}

       
		// /views/_includes/footer.php
        require DIR . '/views/_includes/footer.php';
    }

    public function post($parametros = null, $function = null){
		
		if(@$function['funcao'] == 'variations'){
		   return $this->addVariations($parametros,$function['rota']);
		}else
		   return $this->addProduct($parametros);

		
	}


	public function put($parametros = null,$route){
		$retorno = new stdClass();
		$modelo = $this->load_model('products/products-model');
		
		$parametros = json_decode($parametros);

		
		//Valida o formato do JSON;	
		if(!@$parametros->name)
			$retorno->error->message[] = 'O Nome do produto é obrigatório!';	
		if(!@$parametros->price)
			$retorno->error->message[] = 'O Preço do produto é obrigatório!';
		if(!@$parametros->ean)
			$retorno->error->message[] = 'O Ean do produto é obrigatório!';	
		
		if(@$retorno->error->message)
			echo json_encode($retorno);
		else{	

			$filter['sku'] = $route;
			$filter['api_key'] = $_GET['api_key'];

			$getProd =  $modelo->selectProdutos($filter);
			$existe = false;
			foreach ($getProd as $prod) {

				if($prod){
					$idProduto['_id'] = $prod->_id;	
					$existe = true;
					
				}
				
			}
			
			
			if($existe){	

				//Verifica se foi enviado a categoria para inserir na colection de categorias.
				if(@$parametros->categories){
					foreach($parametros->categories as $cats){
						$modeloCat = $this->load_model('categories/categories-model');

						$filtroCat['code'] = (int)$cats->code;
						$filtroCat['api_key'] = $_GET['api_key'];

						$getCat = $modeloCat->selectCategorias($filtroCat);
						$existeCat = false;
						foreach ($getCat as $cat) {						
							if($cat){
								$existeCat = true;
								
							}						
						}
						
						if(!$existeCat){
							$cats->api_key = $_GET['api_key'];						
							$dadosCategoria = $modeloCat->inserirCategoria($cats);		
						}

						
					}
				}

				$parametros->api_key = $_GET['api_key'];
				//Caso o SKU venha no PUT, é retirado para não atualizar.
				unset($parametros->sku);
				$paramUpdate['$set'] = $parametros; 
				$modelo->updateProduto($paramUpdate,$idProduto);
			}else{
				$retorno->error->message[] = 'O SKU do produto ou das variações não existe.';
				echo json_encode($retorno);
			}
		}		
		
	}

	public function delete($route){

		$retorno = new stdClass();
		$modelo = $this->load_model('products/products-model');
		
		
		$filter['sku'] = $route;
		$filter['api_key'] = $_GET['api_key'];
		$getProd = $modelo->selectProdutos($filter);
		
		$existe = false;
		foreach ($getProd as $prod) {
			
			if($prod){
				$idProduto['_id'] = $prod->_id;				
				$existe = true;
				
			}
			
		}
		
		if($existe){			
			$dadosCategoria = $modelo->deleteProduto($idProduto);
		}else{
			$retorno->error->message[] = 'O produto informado não existe.';
			echo json_encode($retorno);
		}	
	}

	public function get($route = null){
		
		if($route)
		  return $this->getById($route);
		else
		  return $this->getAll(); 	
		   
	}

	private function addProduct($parametros){

		$retorno = new stdClass();
		$modelo = $this->load_model('products/products-model');
		
		$parametros = json_decode($parametros);

		//Valida o formato do JSON;	
		if(!@$parametros->sku)
			$retorno->error->message[] = 'O SKU do produto é obrigatório!';
		if(!@$parametros->name)
			$retorno->error->message[] = 'O Nome do produto é obrigatório!';	
		if(!@$parametros->price)
			$retorno->error->message[] = 'O Preço do produto é obrigatório!';
		if(!@$parametros->ean)
			$retorno->error->message[] = 'O Ean do produto é obrigatório!';	
		
		if(@$retorno->error->message)
			echo json_encode($retorno);
		else{	

			$filter['$or'][]['sku'] = $parametros->sku;
			$filter['$or'][]['variations.sku'] = $parametros->sku;
			$filter['api_key'] = $_GET['api_key'];

					
			$getProd = $modelo->selectProdutos($filter);

			$existe = false;
			foreach ($getProd as $prod) {

				if($prod){
					$existe = true;
					
				}
				
			}
			
			//Verifica os SKUs das varações.
			if($parametros->variations){
				foreach($parametros->variations as $variations){
					unset($filter);
					$filter['$or'][]['sku'] = $variations->sku;
					$filter['$or'][]['variations.sku'] = $variations->sku;
					$filter['api_key'] = $_GET['api_key'];
					
					$getProd = $modelo->selectProdutos($filter);

					foreach ($getProd as $prod) {

						if($prod){
							$existe = true;						
						}
						
					}
				}

			}
			
			if(!$existe){	

				//Verifica se foi enviado a categoria para inserir na colection de categorias.
				if($parametros->categories){
					foreach($parametros->categories as $cats){
						$modeloCat = $this->load_model('categories/categories-model');

						$filtroCat['code'] = (int)$cats->code;
						$filtroCat['api_key'] = $_GET['api_key'];

						$getCat = $modeloCat->selectCategorias($filtroCat);
						
						$existeCat = false;
						foreach ($getCat as $cat) {						
							if($cat){
								$existeCat = true;
								
							}						
						}
						
						if(!$existeCat){
							$cats->api_key = $_GET['api_key'];						
							$dadosCategoria = $modeloCat->inserirCategoria($cats);		
						}

						
					}
				}

				$parametros->api_key = $_GET['api_key'];
				$parametros->create_date = date('Y-m-d h:i:s');
				$dadosCategoria = $modelo->inserirProduto($parametros);
			}else{
				$retorno->error->message[] = 'O SKU do produto ou das variações já existe.';
				echo json_encode($retorno);
			}
		}		

	}

	private function addVariations($parametros,$sku){
		
		$retorno = new stdClass();
		$modelo = $this->load_model('products/products-model');
		
		$parametros = json_decode($parametros);

		$filter['sku'] = $sku;
		$filter['api_key'] = $_GET['api_key'];

		$getProd =  $modelo->selectProdutos($filter);
		$existe = false;
		foreach ($getProd as $prod) {

			if($prod){
				$idProduto['_id'] = $prod->_id;	
				$existe = true;
				
			}
			
		}
		
		//Valida o formato do JSON;	
		if(!@$parametros->variations)
			$retorno->error->message[] = 'Nenhuma variação foi enviada!';
		if(!$existe)
			$retorno->error->message[] = 'Não existe nenhum produto com o ID '.$sku.'!';
	
		if(@$retorno->error->message)
			echo json_encode($retorno);
		else{	


			
			
			//Verifica os SKUs das varações.
			$existe = false;
			foreach($parametros->variations as $variations){
				unset($filter);
				$filter['$or'][]['sku'] = $variations->sku;
				$filter['$or'][]['variations.sku'] = $variations->sku;
				$filter['api_key'] = $_GET['api_key'];
				
				$getProd = $modelo->selectProdutos($filter);

				foreach ($getProd as $prod) {

					if($prod){
						$existe = true;						
					}
					
				}
			}

			
			
			if(!$existe){	

				foreach($parametros->variations as $var){
					$paramVariations['$addToSet']['variations'] = $var;
					
					$modelo->updateProduto($paramVariations,$idProduto);
				}
			}else{
				$retorno->error->message[] = 'O SKU das variações já existe.';
				echo json_encode($retorno);
			}
		}		
	}

	private function getAll(){

		$retorno = new stdClass();
		$modelo = $this->load_model('products/products-model');

		
		$parametros['api_key'] = $_GET['api_key'];
		$order['sort']['name'] = 1;

		if(@$_GET['filters']){
			
			foreach ($_GET['filters'] as $key => $filtro) {

				if($key == 'qty_from')
					$parametros['qty']['$gte'] = (int)$filtro;
				elseif($key == 'qty_to')
					$parametros['qty']['$lte'] = (int)$filtro;
				else{

					if($key == 'sku'){
					   $parametros['$or'][]['variations.sku']['$regex'] = $filtro;		
					   $parametros['$or'][]['sku']['$regex'] = $filtro;	
					}else
					   $parametros[$key]['$regex'] = $filtro;

				}
					
			}
		 

		}

		$dadosProd = $modelo->selectProdutos($parametros,$order);

		foreach ($dadosProd as $key => $produtos) {
		 	unset($produtos->_id);
		 	unset($produtos->api_key);
		 	$retorno->products[] = $produtos;
     
        }
        $retorno->total = count($retorno->products);
        
        echo json_encode($retorno); 

	}

	private function getById($route){


		$retorno = new stdClass();
		$modelo = $this->load_model('products/products-model');

		
		$parametros['api_key'] = $_GET['api_key'];
		$order['sort']['name'] = 1;
		$parametros['sku'] = $route;

		$dadosProd = $modelo->selectProdutos($parametros,$order);

		foreach ($dadosProd as $key => $produtos) {
		 	unset($produtos->_id);
		 	unset($produtos->api_key);
		 	$retorno = $produtos;
     
        }
        
        echo json_encode($retorno); 

	}
	
}