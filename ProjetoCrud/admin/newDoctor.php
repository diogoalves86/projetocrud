<?php
if (!isset($_SESSION['login']) || $_SESSION['logged'] != true):
	session_destroy();
	header("Location:../index.php?pag=home");
endif;
// Coletando os dados do médico para marcar a consulta
$Category = new Category();
$categoriesList = $Category->GetCategories();
?>
<div id="new">
	<header>
		<h3>
			Cadastro de Médicos no Sistema.
		</h3>
		<p>Através deste formulário é possível cadastrar novos médicos ao sistema.</p>
		<p>Este novo médico criado poderá ter cadastradas consultas no sistema.</p>
	</header>
	<div id="newDoctor">
		<br>
		<form method="post" id="formNewDoctor" name="formNewDoctor" action="index.php?pag=insert&amp;option=doctor">
			<table class="form">
				<tr>
					<th>Nome Completo:</th>
					<th>
						<input name="name" required placeholder="Digite o nome:" id="nameField" class="formField">
					</th>
				</tr>

				<tr>
					<th>Telefone:</th>
					<th>
						<input name="telephone" required id="telephoneField" class="formField telephoneField">
				</tr>

				<tr>	
					<th>Especialidade</th>
					<th>	
						<select name="especiality">
							<?php
							for ($i=0; $i <count($categoriesList); $i++) { 
								foreach ($categoriesList[$i] as $key => $value) {
									if($key != "idCategory"):
										echo "<option value='".$value."'>".$value."</option>";
									endif;

								}
							}
							?>
						</select>

					</th>	
				</tr>

				<tr>
					<th>Data de Nascimento:</th>
					<th>
						<input name="birthday" required placeholder="Data" id="birthdayField" type="date" class="formField dateField">
					</th>
				</tr>
			</table>
			<br>
			<input value="CADASTRAR" name="btnNewDoctor" id="btnNewDoctor" type="submit">	
		</form>
	</div>
</div>
