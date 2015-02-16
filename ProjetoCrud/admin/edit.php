<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (!isset($_SESSION['login']) || $_SESSION['logged'] != true):
	session_destroy();
	die();
	header("Location:../index.php?pag=home");
endif;
$Crud = new Crud();
$Security = new Security();
$option = $Security->SqlSecurity($_GET['option']);


switch ($option) {
	case 'doctor':
		$id = $Security->SqlSecurity($_POST['idDoctor']);
		$name = $Security->SqlSecurity($_POST['name']);
		$telephone = $Security->SqlSecurity($_POST['telephone']);
		$birthday = $Security->SqlSecurity($_POST['birthday']);
		$Doctor = new Doctor();

		if($Doctor->EditDoctor($id, $name, $telephone, $birthday)):
			echo "<script>alert('Médico atualizado com sucesso!'); location.href='index.php?pag=show&option=doctors';</script>";

		else:
			echo "<script>alert('Erro ao atualizar Médico!'); location.href='index.php?pag=show&option=doctors';</script>";
		endif;

		break;
	
	case 'exam':
		$Exam = new Exam();
		$Category = new Category();
		$Doctor = new Doctor();
		$idExam = $Security->SqlSecurity($_POST['idExam']);
		$idDoctor = $Doctor->GetDoctorByName($_POST['doctor'][0]);
		$name = $Security->SqlSecurity($_POST['name']);
		$cpf = $Security->SqlSecurity($_POST['cpf']);
		$scheduled = $Security->SqlSecurity($_POST['scheduled']);
		$adress = $Security->SqlSecurity($_POST['adress']);

		if($Exam->UpdateExam($idExam, $scheduled)):
			echo "<script>alert('Exame atualizado com sucesso!'); location.href='index.php?pag=show&option=exams';</script>";
		else:
			echo "<script>alert('Erro ao atualizar, tente novamente.'); location.href='index.php?pag=show&option=exams';</script>";
		endif;

		break;
	
	case 'user':
		$User = new User();
		$id = $Security->SqlSecurity($_POST['idUser']);
		$name = $Security->SqlSecurity($_POST['name']);
		$email = $Security->SqlSecurity($_POST['email']);
		$login = $Security->SqlSecurity($_POST['login']);
		$password = $Security->SqlSecurity($_POST['password']);
		
		if($User->EditUser($id, $name, $email, $login, $password)):
			echo "<script>alert('Usuário atualizado com sucesso!'); location.href='index.php?pag=show&option=users';</script>";
		else:
			echo "<script>alert('Erro ao atualizar usuário, tente novamente.'); location.href='index.php?pag=show&option=users';</script>";
		endif;
		break;
}
?>