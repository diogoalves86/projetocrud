<?php
require_once 'protected/autoload.php';

$Security = new Security();
if (!isset($_POST['login']) || !isset($_POST['password'])):
	echo '<script>alert("Preencha todos os campos!"); location.href="index.php";</script>';	

else:
	$login = $Security->SqlSecurity($_POST['login']);
	$password = $Security->SqlSecurity($_POST['password']);

	$User = new User();
	$ObjUser = $User->Login($login, $password);
	if ($ObjUser == false):
		echo '<script>alert("Usuario ou senha invalidos!");location.href="index.php";</script>';
	else:
		session_start();
		session_name("Logged in");
		$_SESSION['login'] = $ObjUser["login"][2];
		$_SESSION['logged'] = true;
		echo '<script>location.href="admin/index.php?pag=home";</script>';

		endif;
endif;

?>