<?php
class Exam
{
	private $conn, $crud;
	function __construct()
	{
		$connection = new Database();
		$this->conn = $connection->Connect();
	}
	public function GetExams(){
		$this->crud = new Crud();
		$this->crud->SelectInnerJoin("Exam.id idExam, Patient.name namePatient, Doctor.name nameDoctor, Exam.scheduled scheduledExam", "Exam", array("Doctor", "Patient"), array("Exam.id_doctor=Doctor.id", "Exam.cpf_patient=Patient.cpf"), true);
		$this->line = $this->crud->ReturnLine();
		return $this->line;
	}

	public function UpdateExam($idExam, $scheduled){
		$this->crud = new Crud();
		if($this->crud->Update("Exam", "scheduled='".$scheduled."'", "Exam.id=".$idExam)):
			return true;
		else:
			return false;
		endif;
 
	}

	public function GetExamById($idExam){
		$this->crud = new Crud();
		$this->crud->SelectInnerJoin("Exam.id idExam, Patient.name namePatient, Patient.cpf cpfPatient, Patient.telephone telephonePatient, Patient.birthday birthdayPatient, Patient.adress adressPatient, Doctor.name nameDoctor, Doctor.id idDoctor, Exam.scheduled scheduledExam", "Exam", array("Doctor", "Patient"), array("Exam.id_doctor=Doctor.id", "Exam.cpf_patient=Patient.cpf"), true, "Exam.id='".$idExam."'");
		$this->line = $this->crud->ReturnLine();
		return $this->line;
	}

	public function NewExam($cpf, $idDoctor, $scheduled){
		$this->crud = new Crud();
		if($this->crud->Insert("Exam", "cpf_patient, id_doctor, scheduled", "'".$cpf."', ".$idDoctor["id"].", '".$scheduled."'")):
			return true;
		else:
			return false;
		endif;
	}

	public function DeleteExam($idExam){
		$this->crud = new Crud();
		if($this->crud->Delete("Exam", "id='".$idExam."'")):
			return true;
		else:
			return false;			
			endif;
	}
}
?>