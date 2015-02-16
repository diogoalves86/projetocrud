<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (!isset($_SESSION['login']) || $_SESSION['logged'] != true):
	session_destroy();
	header("Location:../index.php?pag=home");
endif;
$Doctor = new Doctor();
$Security = new Security();
$Category = new Category();
$idDoctor = $Security->SqlSecurity($_GET['idDoctor']);
$doctorsList = $Doctor->GetDoctorById($idDoctor);
?>
<div id="edit">
	<header>
		<h3>
			Atualização de Médico.
		</h3>
	</header>
	<div id="editDoctor">
		<br>
		<form method="post" id="formEditDoctor" name="formEditDoctor" action="index.php?pag=edit&#38;option=doctor">
			<input type="hidden" name="idCategory" value="<?=$doctorsList["idCategory"]; ?>"/>
			<input type="hidden" name="idDoctor" value="<?=$doctorsList["idDoctor"]; ?>"/>
			<table class="form">
				<tr>
					<th>Nome Completo do Médico:</th>
					<th>
						<input name="name" value='<?=$doctorsList["nameDoctor"]; ?>' class="formField">
					</th>
				</tr>

				<tr>
					<th>Telefone:</th>
					<th>
						<input name="telephone" value='<?=$doctorsList["telephoneDoctor"]; ?>' class="formField telephoneField">
					</th>
				</tr>


				<tr>
					<th>Data de nascimento:</th>
					<th>
						<input name="birthday" value='<?=$doctorsList["birthdayDoctor"]; ?>' class="formField dateField">
					</th>
				</tr>

				<tr>
					<th>Categoria:</th>
					<th>
						<select>
						<?php
						$category = $Category->GetCategoryById($doctorsList["idCategory"]);
							echo "<option value='".$category["nameCategory"]."'>".$category["nameCategory"]."</option>";

						?>
						</select>
					</th>
				</tr>
			</table>
			<br>
			<input value="ATUALIZAR MÉDICO" name="btnNewDoctor" id="btnNewDoctor" type="submit">	

		</form>
	</div>
</div>
