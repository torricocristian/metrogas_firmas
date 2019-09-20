<?php

class clientesModel extends Model {
	
	
	public function nuevo($data){

		if($data['motivo'] == 1) $data['motivo'] = "Reunión presentación";
		if($data['motivo'] == 2) $data['motivo'] = "Contacto telefónico";
		if($data['motivo'] == 3) $data['motivo'] = "Ampliar información";
		if($data['motivo'] == 4) $data['motivo'] = "Recibir casos de éxitos";

		$Q = $this->db->query("INSERT INTO `clientes` (
			`nombre-apellido`, 
			`compania`, 
			`motivo`, 
			`email`, 
			`telefono`, 
			`mensaje`) VALUES 
			(
				'".$data['nombre']."',
				'".$data['compania']."',
				'".$data['motivo']."',
				'".$data['email']."',
				'".$data['telefono']."',
				'".$data['mensaje']."'
			)");
		
		$id = $this->db->lastid();
		if($Q) return $id;
		else return false;

		
		
	}


	public function clientePorId($id) {  
		return $this->db->get_row("
			SELECT *
			FROM clientes c
			WHERE id_cliente=".$id);
		
	} 


	public function listado() { 
		
		return $this->db->get_results("
		SELECT *
		FROM clientes		
		WHERE borrado = 0
		ORDER BY id_cliente DESC");
		
	}

	
	public function estado($id, $estado) { 
		
		return $this->db->query("UPDATE `clientes` SET `estado`=".$estado." WHERE  `id_cliente`=".$id);
		
	}
	
	public function eliminar($id) { 
		
		return $this->db->query("UPDATE `clientes` SET `borrado`='1' WHERE  `id_cliente`=".$id);
		
	}
	

	
}

?>