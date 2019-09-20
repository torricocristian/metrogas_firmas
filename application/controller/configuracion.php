<?php

class configuracionController extends baseController {
	
	
	
	public function index() {  
	
		$this->registry->template->show('configuracion/index');
			
	}

	
	
	
	public function reset() {
		$this->configuracion->resetContenidos();
		$this->configuracion->reset();
	}

	public function resetContenidos() {
		$this->configuracion->resetContenidos();
	}

}

?>
