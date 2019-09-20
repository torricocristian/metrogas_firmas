<?php

class Template {

/*
 * @the registry
 * @access private
 */
private $registry;

/*
 * @Variables array
 * @access private
 */
private $vars = array();
private $js = array();
private $modals = array();
/**
 *
 * @constructor
 *
 * @access public
 *
 * @return void
 *
 */
function __construct($registry) {
	$this->registry = $registry;

}


 /**
 *
 * @set undefined vars
 *
 * @param string $index
 *
 * @param mixed $value
 *
 * @return void
 *
 */
 public function __set($index, $value)
 {
        $this->vars[$index] = $value;
 }
 
 public function __put_js($value)
 {
        $this->js[] = $value;
 }
  public function __put_modals($value)
 {
        $this->modals[] = $value;
 }
 
 
 public function __mostrar_js()
 {
	 	if(count($this->js)){
			echo "<script type='text/javascript'>";
			foreach($this->js as $q){
				echo $q."\n";
			}
			echo "</script>";
		}
 }
 
 public function __mostrar_modals()
 {
	 	if(count($this->modals)){
			foreach($this->modals as $q){
				include_once(_PATH . '/application/views/_template/modals/'.$q.'.php');
			}
		}
 }

public function show($name) { 

	$path = _PATH . '/application/views' . '/_template/head.php';
	$this->showViews($path);
		
	if($name != 'login/index'){
		$path = _PATH . '/application/views' . '/_template/top.php';
		$this->showViews($path);
		
		$path = _PATH . '/application/views' . '/_template/menu.php';
		
		$this->showViews($path);
		$path = _PATH . '/application/views' . '/_template/centro_top.php';
		$this->showViews($path);
	}
	
	$path = _PATH . '/application/views' . '/' . $name . '.php';
	
	$this->showViews($path);
	
	if($name != 'login/index'){
		$path = _PATH . '/application/views' . '/_template/centro_bottom.php';
		$this->showViews($path);
		$path = _PATH . '/application/views' . '/_template/footer.php';
		$this->showViews($path);		
	}
	
	$path = _PATH . '/application/views' . '/_template/endbody.php';
	$this->showViews($path);
}

function showViews($path) {
	global $registry;
	
	//$path = _PATH . '/application/views' . '/' . $name . '.php';
	
	if (file_exists($path) == false)
	{
		throw new Exception('Template not found in '. $path);
		return false;
	}

	// Load variables
	foreach ($this->registry->__getAll() as $key => $value)
	{ 
		$$key = $value;
	}
	
	require ($path);               
}


}

?>
