<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (!isset($_SESSION['login']) || $_SESSION['logged'] != true):
	session_destroy();
	header("Location:../index.php?pag=home");
endif;
?>

<div id="showData">

<?php
	switch ($_GET['option']) {
		case 'exams':
			$Exam = new Exam();
			$examsList = $Exam->GetExams();
?>

<h3>Lista de Exames marcados.</h3>
<table class="listData">
<tr>
  <th>Nome do Paciente</th>	
  <th>Médico responsável</th>
  <th>Data Marcada</th>
  <th>Ação</th>
</tr>
<tr>
  <?php
	for ($c=0; $c < count($examsList); $c++) {
		echo '<tr>';
		foreach ($examsList[$c] as $key=>$value) { 
			// Não exibir o id do Exame
			if($key != "idExam"):
				echo "<td>".$value."</td>";
			endif;
		}
		echo '<td>';
		echo '<a href="index.php?pag=editExam&idExam='.$examsList[$c]["idExam"].'"><img src="../content/images/editIcon.png"></a>';
		echo '<a href="index.php?pag=delete&option=exam&id='.$examsList[$c]["idExam"].'"><img src="../content/images/deleteIcon.png"></a>';
		echo '</td>';
		echo '</tr>';
	}

	echo '</tr>';
	echo '<p>Foram encontrados '.count($examsList)." resultados para sua consulta</p>";
	break;
	
	case 'doctors':
		$Doctor = new Doctor();
		$doctorsList = $Doctor->GetDoctors();
	?>
<h3>Lista de Médicos cadastrados no sistema.</h3>
<table class="listData">
<tr>
	<th>Nome Completo</th>
	<th>Telefone</th>
	<th>Data Nascimento</th>
	<th>Ação</th>

</tr>
<tr>
  <?php	
	for ($c=0; $c < count($doctorsList); $c++) {

		echo '<tr>';
		foreach($doctorsList[$c] as $key=>$value) { 
			if($key != "id"):
				echo "<td>".$value."</td>";
			endif;
		}

		echo '<td>';
		echo '<a href="index.php?pag=editDoctor&idDoctor='.$doctorsList[$c]["id"].'"><img src="../content/images/editIcon.png"></a>';
		echo '<a href="index.php?pag=delete&option=doctor&id='.$doctorsList[$c]["id"].'"><img src="../content/images/deleteIcon.png"></a>';
		echo '</td>';
		echo '</tr>';
	}
	echo '</tr>';
	echo '<p>Foram encontrados '.count($doctorsList)." resultados para sua consulta</p>";
	break;
	case 'users':
		$User = new User();
		$usersList = $User->GetUsers();
?>

<h3>Lista de Usuarios cadastrados no sistema.</h3>
<table class="listData">
<tr>	
  <th>Nome Completo</th>
  <th>E-mail</th>
  <th>Login</th>
  <th>Ações</th>
</tr>
<tr>
  <?php
    //var_dump($usersList);
	
	for ($c=0; $c < count($usersList); $c++) {

		echo '<tr>';
		foreach ($usersList[$c] as $key=>$value) { 
			if($key != "id"):
				echo "<td>".$value."</td>";
			endif;
		}
		echo '<td>';
		echo '<a href="index.php?pag=editUser&idUser='.$usersList[$c]["id"].'"><img src="../content/images/editIcon.png"></a>';
		echo '<a href="index.php?pag=delete&option=user&id='.$usersList[$c]["id"].'"><img src="../content/images/deleteIcon.png"></a>';
		echo '</td>';
		echo '</tr>';
	}
	echo '</tr>';
	echo '<p>Foram encontrados '.count($usersList)." resultados para sua consulta</p>";
			break;
	}// Fecha a chave do SWITCH

?>
</table>


</div>