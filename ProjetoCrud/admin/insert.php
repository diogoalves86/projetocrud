<?php
require_once '../protected/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (!isset($_SESSION['login']) || $_SESSION['logged'] != true):
	session_destroy();
	exit();
	header("Location:../index.php?pag=home");
endif;
$Security = new Security();
$option = $Security->SqlSecurity($_GET['option']);
$Category = new Category();


switch ($option) {
	case 'doctor':
		$Doctor = new Doctor();
		$name = $Security->SqlSecurity($_POST['name']);
		$telephone = $Security->SqlSecurity($_POST['telephone']);
		$idCategory = $Category->GetCategoryByName($_POST['especiality']);
		$birthday = $Security->SqlSecurity($_POST['birthday']);
		if($Doctor->NewDoctor($name, $idCategory, $telephone, $birthday)):
			echo "<script>alert('Médico cadastrado com sucesso!'); location.href='index.php?pag=show&option=doctors';</script>";
		else:
			echo "<script>alert('Erro ao cadastrar!'); location.href='index.php?pag=newDoctor';</script>";
		endif;
		break;
	
	case 'user':

		if (isset($_POST['name']) && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])):
			# code...
		
			$name = $Security->SqlSecurity($_POST['name']);
			$login = $Security->SqlSecurity($_POST['login']);
			$email = $Security->SqlSecurity($_POST['email']);
			$password = $Security->SqlSecurity($_POST['password']);

			$User = new User();

			if($User->NewUser($name, $email, $login, $password)):
				echo '<script>alert("Usuario Cadastrado com sucesso!"); location.href="index.php?pag=show&option=users";</script>';
			else:
				echo '<script>alert("Erro ao cadastrar Usuario, tente novamente.");</script>';
			endif;
			break;

		else:
				echo '<script>location.href="index.php?pag=show&option=users";</script>';
			endif;

			
		case 'exam':
			$Exam = new Exam();
			$Doctor = new Doctor();
			$Patient = new Patient();
			$Category = new Category();
			// Pegando e filtrando os dados do formulário
			$name = $Security->SqlSecurity($_POST['name']);
			$cpf = $Security->SqlSecurity($_POST['cpf']);
			$telephone = $Security->SqlSecurity($_POST['telephone']);
			$scheduled = $Security->SqlSecurity($_POST['scheduled']);
			$birthday = $Security->SqlSecurity($_POST['birthday']);
			$adress = $Security->SqlSecurity($_POST['adress']);
			$idDoctor = $Doctor->GetDoctorByName($_POST['doctor']);

			if($Patient->NewPatient($cpf, $name, $adress, $birthday, $telephone)):
				$Exam->NewExam($cpf, $idDoctor, $scheduled);
				echo "<script>alert('Exame Cadastrado com sucesso!'); location.href='index.php?pag=show&option=exams';</script>";
				//echo "foi";
			else:
				echo "<script>alert('Erro ao atualizar, tente novamente.'); location.href='index.php?pag=show&option=exams';";
			endif;	
			
			break;
	default:
		# code...
		break;
}
?>