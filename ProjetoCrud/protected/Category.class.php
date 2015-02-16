<?php
class Category
{
	private $crud;

	public function __construct(){
		$this->crud = new Crud();

	}
	public function GetCategories(){
		$this->crud->Select("id idCategory, name categoryName", "Category", true);
		return $this->crud->ReturnLine();
	}	

	public function GetCategoryByName($nameCategory){
		$this->crud->Select("id idCategory", "Category", false, "name='".$nameCategory."'");
		echo $this->crud->ReturnLine()["idCategory"];
		return $this->crud->ReturnLine();
	}

	public function GetCategoryById($idCategory){
		$this->crud->Select("name nameCategory", "Category", false, "id=".$idCategory);
		return $this->crud->ReturnLine();
	}

	public function GetCategoryByDoctor($nameDoctor){
		$this->crud->Select("id_category idCategory", "Doctor", false, "name='".$nameDoctor."'");
		return $this->crud->ReturnLine();
	}
}

?>