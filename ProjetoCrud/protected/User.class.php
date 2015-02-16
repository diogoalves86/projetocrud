<?php
/**
* Classe responsável por armazenar todos os métodos e atributos do usuário logado.
*/
class User
{
	private $conn, $crud;

	public function __construct(){
		$connection = new Database();
		$this->conn = $connection->Connect();
	}

	public function Login($login, $password){
		$this->crud = new Crud();
		$this->crud->Select('*','Admin',false,'login="'.$login.'" AND password="'.$password.'"', null);
		
		// Verifica se o Array linha foi preenchido. Se for preenchido, usuário está logado.
		if ($this->crud->ReturnLine() != null):
			return $this->crud->ReturnLine();
		else:
			return false;
		endif;

	}


	public function NewUser($name, $email, $login, $password){
		$this->crud = new Crud();
		if($this->crud->Insert('Admin','name, email, login, password','"'.$name.'", "'.$email.'", "'.$login.'", "'.$password.'"')):
			return true;
		else:
			return false;

		endif;
	}

	public function EditUser($idUser, $name, $email, $login, $password){
		$this->crud = new Crud();
		
		if($this->crud->Update("Admin", "name='".$name."', email='".$email."', login='".$login."', password='".$password."'", "id=".$idUser)):
			return true;
		else:
			return false;
		endif;

	}

	public function DeleteUser($idUser){
		$this->crud = new Crud();
		if($this->crud->Delete("Admin", "id='".$idUser."'")):
			return true;
		else:
			return false;
		endif;
	}

	public function GetUsers(){
		$this->crud = new Crud();
		//Contanto o número de colunas para posteriormente ler a matriz no loop...
		$this->crud->Select("id,name,email,login", "Admin", true);
		return $this->crud->ReturnLine();
	}

	public function GetUserById($idUser){
		$this->crud = new Crud();
		$this->crud->Select("id idUser, name nameUser, email emailUser, login loginUser", "Admin", false, "Admin.id=".$idUser);
		return $this->crud->ReturnLine();
	}

	public function Logout(){
		if($_SESSION['logged']):
			unset($_SESSION["login"]);
			unset($_SESSION["password"]);
			session_destroy();
			echo '<script>location.href="../index.php";</script>';
		endif;
			echo '<script>location.href="../index.php";</script>';
		
	}
}
?>