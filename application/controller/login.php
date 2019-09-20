<?php

class loginController extends baseController {
	
	public function ajaxExistUser() {  

		echo $this->login->checkUsuarioExisteEmail($_POST);  
	}
	
	public function index() {  
	
	
		//echo $this->configuracion->checkUsuarioExiste();
		if(count($_POST)) {
						
			//$V = new Validation();
			$this->validation->setRules("email", 'Please enter your email', array('required'));
			$this->validation->setRules("password", 'Please enter your password', array('required'));
			$this->validation->validate();
			$validate = $this->validation->getErrors();
			
			if($validate) 
				$this->registry->__set("error", 1);
			else{
				if($this->login->login($_POST) == 0) 
					$this->registry->__set("error",2);
				elseif($this->login->login($_POST) == 2)
					$this->registry->__set("error",3);
				else{
					if(is_numeric($_POST['return']))
							header("Location: "._URL_ADMIN."clientes/editar/".$_POST['return']);
						else
							header("Location: "._URL_ADMIN."signatures/");
				}
			}
			
			
		}
		
		if(isset($this->param->param1)) $this->registry->__set("return",$this->param->param1);
		
		$this->registry->template->show('login/index');
			


	}


	public function indexFront() {  
	
	
		//echo $this->configuracion->checkUsuarioExiste();
		if(count($_POST)) {
			
			
			echo $this->login->checkUsuarioExiste($_POST);
			
			
		}
		
			
	}


	public function nuevoUsuario() {  
	
	
		//echo $this->configuracion->checkUsuarioExiste();
		if(count($_POST)) {
			
			
			echo $this->login->nuevoUsuario($_POST);
			
			
		}
		
			
	}


	public function editarUsuario() {  
	
	
		//echo $this->configuracion->checkUsuarioExiste();
		if(count($_POST)) {
			
			
			echo $this->login->editarUsuario($_POST);
			
			
		}
		
			
	}
	
	
	public function logout() {  
	
	
		$this->session->deleteAll();
		header("Location: index.php");	
	}
	
	

}

?>
