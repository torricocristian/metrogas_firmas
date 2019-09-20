<?php  

function mostrarEstado($estado){
  if($estado == 1) echo '<i class="fa fa-check-circle check"></i>';
  else echo '<i class="fa fa-ban uncheck"></i>';
}



function id($id){
  return str_pad($id, 4, '0', STR_PAD_LEFT);
}




function save_block_admin($email, $pass){

	$ip = $_SERVER['REMOTE_ADDR']; //Se captura la IP
    $fecha = date("d-m-Y h:i:s"); //se captura la hora donde se ingresaron los datos
    $f = fopen("_log_block_admin.txt", "a"); //se abre un archivo, si no existe lo crea
    $info = _URL.' :: '.$ip.' - '.$fecha.' - '.$email.' - '.$pass."\n";
    fwrite ($f, $info); //Se escribe en el archivo los datos de las variables
    fclose($f); //se cierra el archivo
}




function isChecked($carac, $val){
	if($carac[$val]==1)	 return "checked";
}



function fechaReducida($date){
	$fecha = explode(" ", $date);
	$fecha = explode("-", $fecha[0]);
	
	return $fecha[2]."/".$fecha[1]."/".$fecha[0];
}

function convertirFechaMostrar($date){
	$date = explode(" ", $date);
	$fecha = explode("-", $date[0]);
	
	return $fecha[2]."/".$fecha[1]."/".$fecha[0];	
	
}
function convertirFechaMostrarC($date){
	$date = explode(" ", $date);
	$fecha = explode("-", $date[0]);
	
	return $fecha[2]."/".$fecha[1]."/".$fecha[0]. " ".$date[1];	
	
}
function convertirFechaGuardarDB($date){
	if($date=='') return '';
	
	$fecha = explode("/", $date);
	
	return $fecha[2]."-".$fecha[1]."-".$fecha[0];	
	
}

function fechaUnix($date){

	return strtotime($date);
}

?>
