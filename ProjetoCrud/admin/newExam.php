<?php
if (!isset($_SESSION['login']) || $_SESSION['logged'] != true):
	session_destroy();
	header("Location:../index.php?pag=home");
endif;
$Category = new Category();
$Doctor = new Doctor();
$categoriesList = $Category->GetCategories();
$doctorsList = $Doctor->GetDoctors();
?>
<script assync src="../content/js/newExam.js"></script>
<div id="new">
	<header>
		<h3>
			Cadastro de Consultas no Sistema.
		</h3>
	</header>
	<div id="newExam">
		<br>
		<form method="post" id="formNewExam" name="formNewExam" action="index.php?pag=insert&#38;option=exam">
			<table class="form">
				<tr>
					<th>Nome Completo do Paciente:</th>
					<th>
						<input name="name" required id="nameField" class="formField">
					</th>
				</tr>
				<tr>
					<th>CPF:</th>
					<th>
						<input name="cpf" required id="cpfField" class="formField cpfField">
					</th>
				</tr>

				<tr>
					<th>Telefone:</th>
					<th>
						<input type="tel" required name="telephone" id="telephoneField" class="formField telephoneField">
					</th>
				</tr>

				<tr>
					<th>Data de Nascimento:</th>
					<th>
						<input name="birthday" required id="birthdayField" type="date" class="formField dateField">
					</th>
				</tr>

				<tr>
					<th>Dia da Consulta:</th>
					<th>
						<input name="scheduled" required id="scheduledField" type="date" class="formField dateField">
					</th>
				</tr>


				<tr>
					<th>Endereço:</th>
					<th>
						<input name="adress" required id="adressField" class="formField">
					</th>
				</tr>

				<tr>
					<th>Médico responsável:</th>
					<th>
						<select required name="doctorsList" id="doctorsList">
							<option>Selecione uma opção</option>
							<?php
							for($i=0; $i < count($doctorsList); $i++) { 
								foreach($doctorsList[$i] as $key=>$value){
									if($key == "name"):
										echo "<option value='".$doctorsList[$i]["id"]."'>".$value."</option>";
									endif;
								}
							}
							?>
						</select>
					</th>
				</tr>
			</table>
			<br>
			<input value="CADASTRAR" name="btnNewPatient" id="btnNewPatient" type="submit">	

		</form>
	</div>
</div>
