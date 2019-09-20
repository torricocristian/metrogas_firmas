<?php

class clientesController extends baseController {
	
	
	/*LISTADO*/
	public function listado() { 		
		 
		
		$clientes = $this->clientes->listado();

		$this->registry->__set("clientes",$clientes);
			
		$this->registry->template->show('clientes/listado');
			
	}

	


	public function eliminar(){	

		$this->clientes->eliminar($this->param->param1);		
		header('Location: ' . $_SERVER['HTTP_REFERER']);				
	}

	public function estado(){	

		$this->clientes->estado($this->param->param1, $this->param->param2);		
		//header('Location: ' . $_SERVER['HTTP_REFERER']);				
	}



	public function excel(){

		if (PHP_SAPI == 'cli')
			die('This example should only be run from a Web Browser');

		/** Include PHPExcel */
		require_once  _PATH.'library/excel/PHPExcel.php';


		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Creative Thinkers")
									 ->setLastModifiedBy("Creative Thinkers")
									 ->setTitle("Creative Thinkers")
									 ->setSubject("Creative Thinkers")
									 ->setDescription("Creative Thinkers")
									 ->setKeywords("Creative Thinkers")
									 ->setCategory("Creative Thinkers");


		// Add some data

		$clientes = $this->clientes->listado();

		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A1', 'Fecha')
		            ->setCellValue('B1', 'Nombre y apellido')
		            ->setCellValue('C1', 'Compañía')
		            ->setCellValue('D1', 'Email')
		            ->setCellValue('E1', 'Teléfono')
		            ->setCellValue('F1', 'Estado')
		            ->setCellValue('G1', 'Motivo')
		            ->setCellValue('H1', 'Mensaje')
		            ;
		
		$i = 2;

		foreach($clientes as $q){
			if($q['estado'] == 0) $estado = "Sin contacto";
	        if($q['estado'] == 1) $estado = "No contesta";
	        if($q['estado'] == 2) $estado = "Pendiente";
	        if($q['estado'] == 3) $estado = "No venta";
	        if($q['estado'] == 4) $estado = "Venta"; 
			$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A'.$i, convertirFechaMostrar($q['fecha']))
		            ->setCellValue('B'.$i, $q['nombre-apellido'])
		            ->setCellValue('C'.$i, $q['compania'])
		            ->setCellValue('D'.$i, $q['email'])
		            ->setCellValue('E'.$i, $q['telefono'])
		            ->setCellValue('F'.$i, $estado)
		            ->setCellValue('G'.$i, $q['motivo'])
		            ->setCellValue('H'.$i, $q['mensaje']);

		    $i++;
		}

	

		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Creative Thinkers');


		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename=Creative Thinkers.xlsx');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}


}

?>
