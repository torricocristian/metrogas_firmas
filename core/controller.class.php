<?php
abstract class baseController extends load  {

/*
 * @registry object
 */
protected $registry;
public $param;
public $borrado = 0;
public $configuracion = array();

function __construct($registry) {
	parent::__construct();
	$this->registry = $registry;
	$this->param = $this->registry->router->param;


	$this->configuracion();	
	
	
	$this->registry->__set("email_loged",$this->session->get("email"));
	$this->registry->__set("privilegio",$this->session->get("privilegio"));
	



	if(isset($this->param->param2) or isset($this->param->param3) or isset($this->param->param1)) {
		if(@$this->param->param2=='ok' or @$this->param->param3=='ok' or @$this->param->param1=='ok') $this->registry->template->__put_js("notificaciones.ok();");
		if(@$this->param->param2=='error' or @$this->param->param3=='error') $this->registry->template->__put_js("notificaciones.error();");
	}
	
	 
}

	
	


	public function index(){}

	public function configuracion(){
		 global $configuracion;
		 $configuracion = array();
		 foreach($this->configuracion->configuracion() as $q){
		 	$configuracion[$q['nombre']] = $q['valor'];
		 }
		 
		 $configuracion = $configuracion;
		 
		 $this->session->put("configuracion", $configuracion);
		 $this->registry->__set("configuracion",$configuracion);	
	}


	public function redirect($error=0, $tipo=0, $id=0){
		if($error == 0) $tipo_mensaje = "ok"; else $tipo_mensaje = "error";
		if($this->param->param1=='papelera') $papelera = '/papelera';
		else $papelera = '';
		//var_dump($this->param->param1);die();
		/*if($this->grupo['id_grupo']==''){
			header("Location: "._URL_ADMIN.$this->registry->router->controller."/listado/2/".$tipo_mensaje);
			die();
		}*/
			
		if($tipo==2)
			header("Location: "._URL_ADMIN.$this->registry->router->controller."/editar/".$this->grupo['id_grupo']."/".$id."/".$tipo_mensaje);
		elseif($tipo==3)
			header("Location: "._URL_ADMIN.$this->registry->router->controller."/nuevo/".$this->grupo['id_grupo']."/".$tipo_mensaje);
		elseif($tipo==4)
			header("Location: "._URL_ADMIN.$this->registry->router->controller."/duplicar/".$this->grupo['id_grupo']."/".$id."/".$tipo_mensaje);
		elseif($tipo==5)
			header("Location: ".$_SERVER['HTTP_REFERER']."/".$tipo_mensaje);
		else{
			header("Location: "._URL_ADMIN.$this->registry->router->controller."/listado/2/".$tipo_mensaje);
			//header("Location: "._URL_ADMIN.$this->registry->router->controller."/listado/".$this->grupo['id_grupo'].$papelera."/".$tipo_mensaje);	
		}
	}
	
	
}



?>
