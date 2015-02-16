
<?php
require('protected/autoload.php');
?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="content/css/login.css">
	<script src="content/js/jquery.js"></script>
	<script src="content/js/formValidation.js"></script>
	<title>Sistema de Agendamento de Consultas - Login</title>
</head>
<body>
<main id="mainWrapper">
	<div id="login">
		<header>
			<h1>Sistema de Agendamento de Consultas</h1>
		</header>
		<div id="formLogin">
			<br>
			<form method="post" id="formLogin" name="formLogin" action="loga.php">
				<p>Login</p>
				<input name="login" id="loginField" class="formField">
				<br>
				<p>Senha</p>
				<input name="password" id="passwordField" type="password" class="formField">
				<br><br>
				<input value="LOGIN" name="btnLogin" id="btnLogin" type="submit">
				<br>
			</form>
		</div>
	</div>
</main>
</body>
</html>