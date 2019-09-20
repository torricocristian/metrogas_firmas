<?php
class loadClasses  {

	public function __construct() {
	
		$dir = _PATH."library/classes/";
		
		foreach(glob($dir."*") as $file) {
			include_once($file);
			
			$model = str_replace($dir, "", $file);
			$model = str_replace(".class.php", "", $model);
			$modelClass = $model;
		
			$this->{$model} = new $modelClass();
		}
	
		 
	}

	
}

?>
