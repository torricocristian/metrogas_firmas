<?php

class Model extends loadClasses {
	
	public $borrado = 0;
	public $categorias_borrar = array();

    function __construct() {
		parent::__construct();
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		
		
    	
	}
	

	public function  configuracion(){}

	

}