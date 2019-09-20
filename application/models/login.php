<?php

class loginModel extends Model {
	
	
	
	public function login($data) { 	
	
		$Q = $this->db->get_row("
		SELECT *
		FROM usuarios u 	
		WHERE email='".$this->db->filter($data['email'])."' AND password != '' AND password='".sha1($this->db->filter($data['password']))."' ".$_priv." AND u.borrado=0 AND u.estado=1");


		
		if($Q){
			$this->session->put("ID", $Q['id_usuario']);
				$this->session->put("nombre", $Q['nombre']);
				$this->session->put("apellido", $Q['apellido']);				
				$this->session->put("email", $Q['email']);
				$this->session->put("privilegio", $Q['id_privilegio']);
			
			return 1;
		}
		else {

			$cantidad_intentos = $this->checkIpsLogin($_SERVER['REMOTE_ADDR']);

			if(count($cantidad_intentos) > 4) {
				save_block_admin($data['email'], $data['password']);
				return 2;
			}
			
			$this->db->query("INSERT INTO `usuarios_ips` (`ip`, `email`, `password`) VALUES ('".$_SERVER['REMOTE_ADDR']."', '".$data['email']."', '".$data['password']."')");

			return 0;
		}
		 
			
	}

	public function checkSession(){
		return $this->session->exists('ID');
	}

	private function checkIpsLogin($ip) { 
	
		$horau = date("H"); 
		$diau = date("d"); 
		$mes = date("m");
		$aniou = date("Y"); 

		$ips = $this->db->get_results("
			SELECT * 
			FROM usuarios_ips
			WHERE YEAR(date) = ".$aniou." AND MONTH(date) = ".$mes." AND DAY(date) = ".$diau." AND HOUR(date) = ".$horau." AND ip LIKE '".$ip."' ");

		return $ips; 

	}

	public function editarUsuario($data) { 	
		if($data['password'] != '') $pass = ", `password`='".sha1($this->db->filter($data['password']))."'";

		$Q = $this->db->query("UPDATE `usuarios` SET `nombre`='".$this->db->filter($data['nombres'])."', `apellido`='".$this->db->filter($data['apellidos'])."', `movil`='".$this->db->filter($data['telefono'])."', `direccion`='".$this->db->filter($data['direccion'])."' ".$pass." WHERE  `id_usuario`=".$this->db->filter($data['id_usuario']));

		
		if($Q)	{
			
			$this->session->put("nombre", $data['nombres']);
			$this->session->put("apellido", $data['apellidos']);
			$this->session->put("movil", $data['telefono']);
			$this->session->put("direccion", $data['direccion']);
			return 1;
		}
		else return 0;
		
		
			
	}
	
	

}

?>
