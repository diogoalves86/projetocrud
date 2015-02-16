<?php
require '../protected/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

if (!isset($_GET['pag'])):
	header("Location:index.php?pag=home");
endif;
// Verifica se o usuario preencheu o formulario.
if (!isset($_SESSION['login']) || $_SESSION['logged'] != true):
	session_destroy();
	header("Location:../index.php?pag=home");
endif;
$Page = new Page();
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../content/css/painel2.css" />
	<link rel="stylesheet" href="../content/css/intlTelInput.css" />
    <link rel="stylesheet" href="../content/css/demo.css" />
	<script src="../content/js/jquery.js"></script>
	<script src="../content/js/maskedTextbox.js"></script>
	<script>
		jQuery(function($){
   			$(".telephoneField").mask("(99)9999-9999");
   			$(".dateField").mask("99-99-9999");
   			$(".cpfField").mask("999.999.999-99");
		});
	</script>	
	<title>Sistema de Agendamento de Consultas</title>
</head>
<body>
	<div id="mainWrapper">
		<nav id="topMenu">
			<ul>
				<li><a href="index.php?pag=home">INÍCIO</a></li>
				<li>
					<a href="#">ADMINISTRAÇÃO</a>
					<ul>
						<li><a href="index.php?pag=newUser">CADASTRAR USUÁRIO</a></li>
						<li><a href="index.php?pag=show&#38;option=users">LISTAR USUÁRIOS</a></li>
					</ul>
				</li>
				<li><a href="index.php?pag=show&#38;option=exams">CONSULTAS MARCADAS</a></li>
				<li><a href="index.php?pag=newExam">MARCAR CONSULTA</a></li>
				<li><a href="index.php?pag=newDoctor">ADICIONAR MÉDICO</a></li>
				<li><a href="index.php?pag=show&#38;option=doctors">LISTAR MÉDICOS</a></li>
				<li><a href="logout.php">SAIR</a></li>
			</ul>
		</nav>

		<main id="content">
			<?php 
			// Carregando as paginas dinamicamente.
			if (isset($_GET['pag'])):
				$Page->IncludePage($_GET['pag']); 
			endif;
			?>
		</main>
	</div>
	<footer id="footer">TODOS OS DIREITOS RESERVADOS.</footer>
</body>	
</html>