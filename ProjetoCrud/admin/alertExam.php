<?php
error_reporting(E_ALL);
ini_set("display_errors", "1");
include_once("/var/www/html/ProjetoCrud/protected/autoload.php");
$Exam = new Exam();
$examsList = $Exam->GetExams();
$today = date("d-m-Y");
echo $today."    ";
var_dump($examsList);
for ($i=0; $i < count($examsList); $i++) { 
	foreach ($examsList[$i] as $key => $value) {
		//Pegando as datas para comparar
		if($key == "scheduledExam"):
			echo "é scheduled";
			if($value == $today):
				//echo "          Mesma data           ";
			endif;

		else:
			echo $value."/r/n";
		endif;
	}
}

try{
	$to      = 'd.alves@personare.com.br';
	$subject = 'Assunto Teste';
	$message = 'hello';
	$headers = 'From: webmaster@example.com' . "\r\n" .
	    'Reply-To: webmaster@example.com' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);
	echo "<br>Email enviado!";
}
catch(Exception $e){echo $e->getMessage();}
?>