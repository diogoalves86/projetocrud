<?php
/**
* 		
*/
class Patient
{

	public function ShowPatients(){
		$this->crud = new Crud();
		$this->crud->Select("cpf, name, adress, birthday, telephone", "Patient", true);
		return $this->crud->ReturnLine();
	}

	public function NewPatient($cpf, $name, $adress, $birthday, $telephone){
		$this->crud = new Crud();
		if($this->crud->Insert("Patient", "cpf, name, adress, birthday, telephone", "'".$cpf."', '".$name."', '".$adress."', '".$birthday."', '".$telephone."'")):
			return true;
		else:
			return false;
		endif;
	}

	public function GetPatientById($idPatient){
		$this->crud = new Crud();
		$this->crud->SelectInnerJoin("name", "Patient", array("Exam"), array("Patient.cpf=Exam.id_patient"), true, "Exam.id_patient=".$idPatient);
		$this->line = $this->crud->ReturnLine();
		return $this->line;
	}

	public function GetPatientByName($namePatient){
		$Security = new Security();
		$Security->SqlSecurity($namePatient);
		$this->crud->Select("cpf", "Patient", "name='".$nameCategory."'");
		return $this->crud->ReturnLine();
	}
}

?>