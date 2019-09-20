<?php

class router extends load  {

	private $registry;
	
	private $path;
	
	private $args = array();
	
	public $file;
	
	public $controller;
	
	public $action = array(); 
	
	public $param = array(); 
	
	function __construct($registry) { 
		$this->registry = $registry;
		parent::__construct();
		
	}

 
	function setPath($path) {		
		if (is_dir($path) == false)	{
			throw new Exception ('Invalid controller path: `' . $path . '`');
		}		
		$this->path = $path;
	}


public function loader(){
	$this->getController();
	
	if (is_readable($this->file) == false){
		$this->file = $this->path.'/error404.php';
				$this->controller = 'error404';
	}
	
	include $this->file;
	
	
	$class = $this->controller . 'Controller';
	$classModel = $this->controller . 'Model';
	
	
	$controller = new $class($this->registry);
	
	if (is_callable(array($controller, $this->action)) == false){
		$action = 'index';
	}
	else{
		$action = $this->action;
	}
	
	$controller->$action();

}
 
 public function loadModel($name) {
        
	$path = 'models/' . $name;
	
	if (file_exists($path)) {
		require $modelPath .$name.'_model.php';
		
		$modelName = $name . '_Model';
		
		$this->model = new $modelName();
	}        
}


 /**
 *
 * @get the controller
 *
 * @access private
 *
 * @return void
 *
 */
private function getController() {

	/*** get the route from the url ***/
	$route = (empty($_GET['rt'])) ? '' : $_GET['rt'];
	
	if(!$this->session->get("ID")  and $route != "login/ajaxExistUser" and $route != "login/nuevoUsuario"  and $route != "login/editarUsuario"and $route != "login/indexFront/" ){

		$parts = explode('/', $route);
			$this->controller = $parts[0];
			unset($parts[0]);
			
			if(count($parts)){
				$i=0;
				$_temp_array = array();
				foreach($parts as $q){
					if($i==0) $this->action = $q;
					$_temp_array['param'.$i] = $q;
					//$this->action->${'param'.$i} = $q; 
					$i++;
				}
				$parts = (object) $_temp_array;
				
				$this->param=$parts;
				
			}

			
		$route = 'login/index';
		$this->controller = 'login';
		$this->action = "index";
		
	}else{
		if (empty($route))
		{
			
			$route = 'index';
		}
		else
		{
			/*** get the parts of the route ***/

			
			$parts = explode('/', $route);
			$this->controller = $parts[0];
			unset($parts[0]);
			
			if(count($parts)){
				$i=0;
				$_temp_array = array();
				foreach($parts as $q){
					if($i==0) $this->action = $q;
					$_temp_array['param'.$i] = $q;
					//$this->action->${'param'.$i} = $q; 
					$i++;
				}
				$parts = (object) $_temp_array;
				
				$this->param=$parts;
				
			}
			/*if(isset( $parts[1]))
			{
				$this->action = $parts[1];
			}*/
		}	
		
		
		if (empty($this->controller))
		{
			$this->controller = 'index';
		}
	
		
	}
	
	$this->loadModel($this->controller);
	
	/*** Get action ***/
	if (empty($this->action))
	{
		$this->action = 'index';
	}
	
	

	

	/*** set the file path ***/
	$this->file = $this->path . '/' . $this->controller . '.php';
}


}

?>
