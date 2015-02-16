<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once '../protected/autoload.php';
session_start();
$User = new User();
$User->Logout();
?>