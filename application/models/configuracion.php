<?php

class configuracionModel extends Model {
	
	
	public function contenido($data){

		if($_FILES['logo']['tmp_name']!='') {
			$ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
			$_FILES['logo']['name'] = "logo.png";
			$__archivo = "`logo`='".$_FILES['logo']['name']."',";
		}

		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['nombre']."' WHERE  `id_configuracion`=1");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['email_admin']."' WHERE  `id_configuracion`=2");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['color1']."' WHERE  `id_configuracion`=3");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['color2']."' WHERE  `id_configuracion`=4");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['metatag_title']."' WHERE  `id_configuracion`=5");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['metatag_desc']."' WHERE  `id_configuracion`=6");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['metatag_keyword']."' WHERE  `id_configuracion`=7");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['contacto_telefono']."' WHERE  `id_configuracion`=8");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['contacto_telefono2']."' WHERE  `id_configuracion`=9");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['contacto_celular']."' WHERE  `id_configuracion`=10");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['contacto_whatsapp']."' WHERE  `id_configuracion`=11");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['contacto_whatsapp_link']."' WHERE  `id_configuracion`=33");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['contacto_email']."' WHERE  `id_configuracion`=12");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['contacto_email2']."' WHERE  `id_configuracion`=13");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['contacto_direccion']."' WHERE  `id_configuracion`=14");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['contacto_ciudad']."' WHERE  `id_configuracion`=15");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['redes_facebook']."' WHERE  `id_configuracion`=16");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['redes_twitter']."' WHERE  `id_configuracion`=17");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['redes_instagram']."' WHERE  `id_configuracion`=18");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['redes_linkedin']."' WHERE  `id_configuracion`=19");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['redes_google']."' WHERE  `id_configuracion`=20");

		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['metodo_pago_mp']."' WHERE  `id_configuracion`=21");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['metodo_pago_banco']."' WHERE  `id_configuracion`=22");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['metodo_pago_efectivo']."' WHERE  `id_configuracion`=23");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['mercadopago_id']."' WHERE  `id_configuracion`=24");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['mercadopago_key']."' WHERE  `id_configuracion`=25");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['datos_banco']."' WHERE  `id_configuracion`=26");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['datos_efectivo']."' WHERE  `id_configuracion`=27");

		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['tipo_sitio']."' WHERE  `id_configuracion`=28");

		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['metodo_envio']."' WHERE  `id_configuracion`=29");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['metodo_envio_domicilio']."' WHERE  `id_configuracion`=30");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['metodo_envio_persona']."' WHERE  `id_configuracion`=31");
		$this->db->query("UPDATE `configuracion` SET `valor`='".$data['metodo_envio_persona_comentarios']."' WHERE  `id_configuracion`=32");
		

		if($_FILES['logo']['name']!='') {	

			$file_info = new finfo(FILEINFO_MIME_TYPE);
			$mime_type = $file_info->buffer(file_get_contents($_FILES['logo']['tmp_name']));


			$allowed =  array('gif','png' ,'jpg' ,'jpeg');
			$allowedMime =  array('image/jpeg','image/gif' ,'image/png');	

			$doble_extension = explode(".",$_FILES['logo']['name']);			

			$filename = $_FILES['logo']['name'];			
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
		
			if(in_array($ext,$allowed) and  in_array($mime_type,$allowedMime) and count($doble_extension) == 2) {

			    move_uploaded_file($_FILES['logo']['tmp_name'], _PUBLIC."img/".$_FILES['logo']['name']);

			    

			}	
			
		}



		if($_FILES['favicon']['name']!='') {	

			$file_info = new finfo(FILEINFO_MIME_TYPE);
			$mime_type = $file_info->buffer(file_get_contents($_FILES['favicon']['tmp_name']));


			$allowed =  array('gif','png' ,'jpg' ,'jpeg','ico');
			$allowedMime =  array('image/jpeg','image/gif' ,'image/png', 'image/x-icon');	

			$doble_extension = explode(".",$_FILES['favicon']['name']);			

			$filename = $_FILES['favicon']['name'];			
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
		
			if(in_array($ext,$allowed) and  in_array($mime_type,$allowedMime) and count($doble_extension) == 2) {

			    move_uploaded_file($_FILES['favicon']['tmp_name'], _PUBLIC."img/favicon.ico");

			    

			}	
			
		}


	}



	public function configuracion() {  
		return $this->db->get_results("SELECT * FROM configuracion");
	}

	public function reset() { 
		$this->db->query("TRUNCATE `usuarios_ips`;");
		$this->db->query("TRUNCATE `contenido_grupos_carac`;");
		$this->db->query("TRUNCATE `contenido_grupos`;");
		$this->db->query("TRUNCATE `contenido_campos`;");
		copy(_PUBLIC."img/logo_ORIGINAL.png", _PUBLIC."img/logo.png");
		$this->db->query("UPDATE `configuracion` SET `valor`='Cyma Soluciones' WHERE  `id_configuracion`=1");
		$this->db->query("UPDATE `configuracion` SET `valor`='#4186C6' WHERE  `id_configuracion`=3");
		$this->db->query("UPDATE `configuracion` SET `valor`='#26669B' WHERE  `id_configuracion`=4");
	}


	public function resetContenidos() { 
		$this->db->query("TRUNCATE `contenido_articulos_categorias`;");
		$this->db->query("TRUNCATE `contenido_articulos`;");
		$this->db->query("TRUNCATE `contenido_campos_valores`;");
		$this->db->query("TRUNCATE `contenido_categorias`;");
		$this->db->query("ALTER TABLE contenido_categorias AUTO_INCREMENT = 2");		
		$this->db->query("TRUNCATE `contenido_imagenes`;");
		$this->db->query("TRUNCATE `tienda_pedidos`;");
		$this->db->query("TRUNCATE `tienda_pedido_productos`;");
		$this->db->query("DELETE FROM `usuarios` WHERE  `email`!='admin';");		
	}
	
	

}

?>
