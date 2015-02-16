<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (!isset($_SESSION['login']) || $_SESSION['logged'] != true):
	session_destroy();
	header("Location:../index.php?pag=home");
endif;
$Security = new Security();
$option = $Security->SqlSecurity($_GET['option']);

switch ($option) {
	case 'user':
		$User = new User();
		$idUser = $Security->SqlSecurity($_GET['id']);

		if($User->DeleteUser($idUser)):
			echo "<script>alert('Usuário excluido com sucesso!'); location.href='index.php?pag=show&option=users';</script>";
		else:
			echo "<script>alert('Não foi possível apagar, tente novamente.'); location.href='index.php?pag=show&option=users';</script>";
		endif;

		break;
	
	case 'doctor':
		$Doctor = new Doctor();
		$idDoctor =$Security->SqlSecurity($_GET['id']);
		if($Doctor->DeleteDoctor($idDoctor)):
			echo "<script>alert('Médico excluido com sucesso!'); location.href='index.php?pag=show&option=doctors';</script>";

		else:
			echo "<script>alert('Não foi possível apagar, tente novamente.'); location.href='index.php?pag=show&option=doctors';</script>";
		endif;

	case 'exam':
		$Exam = new Exam();
		$idExam = $Security->SqlSecurity($_GET['id']);
		if($Exam->DeleteExam($idExam)):
			echo "<script>alert('Consulta apagada com sucesso!'); location.href='index.php?pag=show&option=exams';</script>";
		else:
			echo "<script>alert('Não foi possível apagar, tente novamente.'); location.href='index.php?pag=show&option=exams';</script>";
			endif;
		break;
	default:
		# code...
		break;
}


?>