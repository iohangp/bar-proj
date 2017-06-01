<?php
/**
 * Verifica chaves de arrays
 *
 * Verifica se a chave existe no array e se ela tem algum valor.
 *
 * @param array  $array O array
 * @param string $key   A chave do array
 * @return string|null  O valor da chave do array ou nulo
 */
function chk_array ( $array, $key ) {
	// Verifica se a chave existe no array
	if ( isset( $array[ $key ] ) && ! empty( $array[ $key ] ) ) {
		// Retorna o valor da chave
		return $array[ $key ];
	}
	
	// Retorna nulo por padrão
	return null;
}

/**
 * Função para carregar automaticamente todas as classes padrão
 * Ver: http://php.net/manual/pt_BR/function.autoload.php.
 * Nossas classes estão na pasta classes/.
 * O nome do arquivo deverá ser class-NomeDaClasse.php.
 * Por exemplo: para a classe iDealHUB, o arquivo vai chamar class-iDealHUB.php
 */
function __autoload($class_name) {
	$file = DIR . '/classes/class-' . $class_name . '.php';
	
	if ( ! file_exists( $file ) ) {
		require_once DIR . '/views/_includes/404.php';
		return;
	}
	
	// Inclui o arquivo da classe
    require_once $file;
}

function getParam($id = null) {
	// Verifica se o parâmetro path foi enviado
	if ( isset( $_GET['path'] ) ) {

		// Captura o valor de $_GET['path']
		$path = $_GET['path'];
		
		// Limpa os dados
        $path = rtrim($path, '/');
        $path = filter_var($path, FILTER_SANITIZE_URL);
        
		// Cria um array de parâmetros
		$path = explode('/', $path);

		if(chk_array( $path, $id)){
			return $path[$id];
		}else{
			return $path;
		}
	}

}
