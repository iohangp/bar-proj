<?php
/**
 * Configuração geral
 */

// Caminho para a raiz
define( 'DIR', dirname( __FILE__ ) );
define( 'URL', 'http://localhost/bar-proj' );
define( 'IMG', URL."/views/_images/");
define( 'JS', URL."/views/_js/");
define( 'CSS', URL."/views/_css/");

//dados do banco - MYSQL
define( 'DB_HOSTNAME', 'localhost' );
define( 'DB_NAME', 'barproj' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_CHARSET', 'utf8' );


//variavel para debugar
define( 'DEBUG', true);


// Carrega o loader, que vai carregar a aplicação inteira
require_once DIR . '/loader.php';
?>