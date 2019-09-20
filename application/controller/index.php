<?php

class indexController extends baseController {
	
	
	/*
	
function __construct($registry) {
	$this->registry = $registry;
}
*/
	public function index() {  		
			
			//$this->registry = $registry;
			header("Location: "._URL_ADMIN."signatures");
	}

}

?>
