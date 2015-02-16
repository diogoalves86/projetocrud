<?php
/**
* 
*/
class Doctor
{
	private $conn, $connection, $crud, $columnCount;
	public function __construct(){
		$this->conn = new Database();
		$this->connection = $this->conn->Connect();
	}

	public function NewDoctor($name, $idCategory, $telephone, $birthday){
		$this->crud = new Crud();
		if($this->crud->Insert('Doctor' , 'name, id_category, telephone, birthday', '"'.$name.'", '.$idCategory["idCategory"][0].', "'.$telephone.'", "'.$birthday.'"')):
			return true;
		else:
			return false;
		endif;
	}

	public function EditDoctor($id, $name, $telephone, $birthday){
		$this->crud = new Crud();
		if($this->crud->Update("Doctor", "name='".$name."', telephone='".$telephone."', birthday='".$birthday."'", "id=".$id)):
			return true;
		else:
			return false;	
		endif;

	}

	public function GetDoctors(){
		$this->crud = new Crud();
		$this->crud->Select("id, name, telephone, birthday", "Doctor", true);
		return $this->crud->ReturnLine();
	}

	public function GetDoctorById($idDoctor){
		$this->crud = new Crud();
		$Security = new Security();
		$Security->SqlSecurity($idDoctor);
		$this->crud->Select("id idDoctor, name nameDoctor, id_category idCategory, telephone telephoneDoctor, birthday birthdayDoctor", "Doctor", false, "id=".$idDoctor);
		return $this->crud->ReturnLine();
	}

	public function GetDoctorByName($nameDoctor){
		$this->crud = new Crud();
		$Security = new Security();
		$Security->SqlSecurity($nameDoctor);
		$this->crud->Select("id", "Doctor", false, "name='".$nameDoctor."'");
		return $this->crud->ReturnLine();
	}

	public function DeleteDoctor($idDoctor){
		$this->crud = new Crud();
		if($this->crud->Delete("Doctor", "id='".$idDoctor."'")):
			return true;
		else:
			return false;
		endif;
	}

}
?>