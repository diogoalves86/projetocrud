<?php
if (!isset($_SESSION['login']) || $_SESSION['logged'] != true):
	session_destroy();
	header("Location:../index.php?pag=home");
endif;
?>
<div id="new">
	<header>
		<h3>
			Cadastro de Usuários no Sistema.
		</h3>
		<p>Através deste formulário é possível cadastrar novos administradores ao sistema.</p>
		<p>Este novo usuário criado poderá cadastrar médicos e consultas no sistema.</p>
	</header>
	<div id="newUser">
		<br>
		<form method="post" id="formNewUser" name="formNewUser" action="index.php?pag=insert&#38;option=user">
			<table class="form">
				<tr>
					<th>Nome:</th>
					<th>
						<input name="name" required id="nameField" class="formField">
					</th>
				</tr>
				<tr>
					<th>E-mail</th>
					<th>
						<input type="email" required name="email" id="emailField" class="formField">
					</th>
				</tr>

				<tr>
					<th>Usuário:</th>
					<th>
						<input name="login" required id="loginField" class="formField">
					</th>
				</tr>

				<tr>
					<th>Senha:</th>
					<th>
						<input name="password" required id="passwordField" type="password" class="formField">
					</th>
				</tr>
			</table>
			<br>
			<input value="CADASTRAR" name="btnSubmit" id="btnNewUser" type="submit">	
		</form>
	</div>
</div>