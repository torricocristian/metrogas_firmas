<?php
class load extends loadClasses  {

	public function __construct() {
		parent::__construct();
		$dir = "application/models/";
		foreach(glob($dir."*") as $file) {
			include_once($file);
			
			$model = str_replace($dir, "", $file);
			$model = str_replace(".php", "", $model);
			$modelClass = $model."Model";
			
			$this->{$model} = new $modelClass();
		}
		 //include ("application/models/configuracion.php");
		
		
		//var_dump($this->session);
		//$this->login = new loginModel;
		
		
		 
	}
	
	/*public function test(){
		$dir = "library/classes/";
		foreach(glob($dir."*") as $file) {
			include_once($file);
			
			$model = str_replace($dir, "", $file);
			$model = str_replace(".class.php", "", $model);
			$modelClass = $model;
		
			
			var_dump($modelClass);
			$this->{$model} = new $modelClass();
		}
	}*/

	
}

?>
