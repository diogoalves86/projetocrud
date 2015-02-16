<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
function __autoload($diretorio){

	//$diretorio = dirname(__FILE__);
	require_once $diretorio.'.class.php';
}

?>