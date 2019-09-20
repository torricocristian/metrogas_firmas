<?php

class usuariosModel extends Model {
	
	public function listado($privilegio = '') {  

		$Qquery = '';
		if($privilegio != '') $Qquery = "u.id_privilegio=".$privilegio." AND";

		return $this->db->get_results("
		SELECT u.*
		FROM usuarios u
		WHERE ".$Qquery." borrado = 0
		ORDER BY u.id_usuario DESC");
	}

	public function checkUsuarioExisteEmail($email) { 	
	
		$Q = $this->db->get_row("
		SELECT u.id_usuario
		FROM usuarios u 
	
		WHERE email='".$email."'   AND u.borrado=0");

		
		if($Q)	{	
			return 1;
		}
		else return 0;
		
		
			
	}
	

	public function contenido($data) { 	

		if($data['email'] == '') return 0;
		if($this->checkUsuarioExisteEmail($data['email'])) {
			return 0;
		}

		
		if(!isset($data['id_usuario'])){
			$this->db->query("INSERT INTO `usuarios` (`id_privilegio`) VALUES (2)");
			$data['id_usuario'] = $this->db->lastid();
		}

		if($data['password']!=''){
			$_pass = ", `password`='".sha1($this->db->filter($data['password']))."'";
		}

		

		$Q = $this->db->query("UPDATE `usuarios` SET 
			`nombre`='".$data['nombre']."', 
			`apellido`='".$data['apellido']."', 
			`email`='".$data['email']."', 
			`password`='".sha1($data['password'])."' 
			".
			$_pass." 
			WHERE  `id_usuario`=".$data['id_usuario']);


		if($Q)
			return 1;		
		else 
			return "0";	

	}

	
	public function usuarioPorId($id) {  
		return $this->db->get_row("SELECT * FROM usuarios WHERE id_usuario=".$id);
		
	}  
	

	

	public function cambiarEstado($id, $estado) { 
		return $this->db->query("UPDATE `usuarios` SET `estado`='".$estado."' WHERE  `id_usuario`=".$id);
				
	}


	public function eliminar($id) { 
		return $this->db->query("UPDATE `usuarios` SET `borrado`=1 WHERE  `id_usuario`=".$id);
				
	}
	

}

?>
