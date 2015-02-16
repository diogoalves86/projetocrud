<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (!isset($_SESSION['login']) || $_SESSION['logged'] != true):
	session_destroy();
	header("Location:../index.php?pag=home");
endif;
$User = new User();
$Security = new Security();
$Category = new Category();
$idUser = $Security->SqlSecurity($_GET['idUser']);
$usersList = $User->GetUserById($idUser);
?>
<div id="edit">
	<header>
		<h3>
			Atualização de Usuário.
		</h3>
	</header>
	<div id="editUser">
		<br>
		<form method="post" id="formEditUser" name="formEditUser" action="index.php?pag=edit&#38;option=user">
			<input type="hidden" name="idUser" value="<?=$usersList["idUser"]; ?>"/>
			<table class="form">
				<tr>
					<th>Nome Completo do Usuário:</th>
					<th>
						<input name="name" value='<?=$usersList["nameUser"]; ?>' class="formField">
					</th>
				</tr>

				<tr>
					<th>E-mail:</th>
					<th>
						<input name="email" value='<?=$usersList["emailUser"]; ?>' class="formField">
					</th>
				</tr>

				<tr>
					<th>Login:</th>
					<th>
						<input name="login" value='<?=$usersList["loginUser"]; ?>' class="formField">
					</th>
				</tr>

				<tr>
					<th>Nova Senha:</th>
					<th>
						<input name="password" type="password" class="formField">
					</th>
				</tr>
			</table>
			<br>
			<input value="ATUALIZAR USUÁRIO" name="btnNewUser" id="btnNewUser" type="submit">	

		</form>
	</div>
</div>
