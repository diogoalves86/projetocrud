<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (!isset($_SESSION['login']) || $_SESSION['logged'] != true):
	session_destroy();
	header("Location:../index.php?pag=home");
endif;
$Exam = new Exam();
$Category = new Category();
$categoriesList = $Category->GetCategories();
$Security = new Security();
$idExam = $Security->SqlSecurity($_GET['idExam']);
$examsList = $Exam->GetExamById($idExam);
$currentCategory = "";
?>
<script assync src="../content/js/editExam.js"></script>
<div id="edit">
	<header>
		<h3>
			Atualização de Exame.
		</h3>
	</header>
	<div id="editExam">
		<br>
		<form method="post" id="formEditExam" name="formEditExam" action="index.php?pag=edit&#38;option=exam">
			<input type="hidden" name="idDoctor" value="<?=$examsList[0]["idDoctor"]; ?>">
			<input type="hidden" name="idExam" value="<?=$examsList[0]["idExam"]; ?>"/>
			<table class="form">
				<tr>
					<th>Nome Completo do Paciente:</th>
					<th>
						<select name="name">
							<option><?=$examsList[0]["namePatient"]; ?></option>
						</select>
					</th>
				</tr>
				<tr>
					<th>CPF:</th>
					<th>
						<select name="cpf">
							<option><?=$examsList[0]["cpfPatient"]; ?></option>
						</select>
					</th>
				</tr>

				<tr>
					<th>Telefone:</th>
					<th>
						<select name="telephone">
							<option><?=$examsList[0]["telephonePatient"]; ?></option>
						</select>
					</th>
				</tr>

				<tr>
					<th>Dia da Consulta:</th>
					<th>
						<input name="scheduled" value='<?=$examsList[0]["scheduledExam"]; ?>' id="birthdayField" type="date" class="formField dateField">
					</th>
				</tr>


				<tr>
					<th>Endereco:</th>
					<th>
						<select name="adress">
							<option><?=$examsList[0]["adressPatient"]; ?></option>
						</select>
					</th>
				</tr>

				<tr>
					<th>Médico Responsável</th>
					<th>
						<select id="doctorsList" name="doctorsList">
						<?php
							for ($c=0; $c < count($examsList); $c++) {
								foreach ($examsList[$c] as $key=>$value) { 
									// Não exibir o id do Exame
									if($key == "nameDoctor"):
										echo "<option>".$value."</option>";
									endif;
								}
							}

						?>
						</select>
					</th>
				</tr>
			</table>
			<br>
			<input value="ATUALIZAR CONSULTA" name="btnNewDoctor" id="btnNewDoctor" type="submit">	

		</form>
	</div>
</div>
