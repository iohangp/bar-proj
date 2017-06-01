<?php



// Evita que usuários acesse este arquivo diretamente
if ( ! defined('DIR')) exit;
 
// Inicia a sessão
session_start();

// Verifica o modo para debugar
if (!defined('DEBUG') || DEBUG === false ) {
	error_reporting(0);
	ini_set("display_errors", 0); 
	
}else{
	error_reporting(E_ALL);
	ini_set("display_errors", 1); 
}

// Funções globais
require_once DIR . '/functions/global-functions.php';


// Carrega a aplicação
$manager = new Manager();



