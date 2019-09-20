<?php

class usuariosController extends baseController {

	/*LISTADO*/
	public function listado() {  

		// $result = $this->usuarios->new();
		$usuarios = $this->usuarios->listado();
		$this->registry->__set("usuarios",$usuarios);	
		if($this->param->param1 == "error") $this->registry->template->__put_js("notificaciones.error();");	
		$this->registry->template->show('usuarios/listado');
			
	}

	public function editando() { 
	
		$result = $this->usuarios->contenido($_POST);	
		
		if(!$result) header('Location: ../usuarios/listado/error');
		else header('Location: ../usuarios/listado/ok');
	}
	



	public function editar() { 

		if($this->param->param1){
			$usuario = $this->usuarios->usuarioPorId($this->param->param1);

			$this->registry->__set("usuario",$usuario);	
		}
			
		$this->registry->template->show('usuarios/nuevo');

			
	}

	public function estado() { 		
		
		$this->usuarios->cambiarEstado($this->param->param1, $this->param->param2);	
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
			
	}


	public function eliminar() { 		
		
		$this->usuarios->eliminar($this->param->param1);	
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
			
	}

}

?>
