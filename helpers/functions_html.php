<?php  




function HTMLHiddenInput($controlador_actual, $papelera, $grupo, $cat_input=''){
	$controladores = array("contenidos" => 
							array("tabla" => "contenido_articulos", "label" => "id_contenido"),
						   "categorias" => 
							array("tabla" => "contenido_categorias", "label" => "id_categoria"),
							"grupos" => 
							array("tabla" => "contenido_grupos", "label" => "id_grupo")
					 );
	
	?> 
    <input type="hidden" name="label" value="<?php echo $controladores[$controlador_actual]['label']?>">
	<input type="hidden" name="tabla" value="<?php echo $controladores[$controlador_actual]['tabla']?>">
    <input type="hidden" name="id_grupo" id="id_grupo" value="<?=$grupo['id_grupo']?>">
    <input type="hidden" name="ids_categorias" id="ids_categorias" value="<?php echo $cat_input?>">
    <input type="hidden" name="redirect" id="redirect" value="1">
    <?php if(isset($papelera)):?>
    <input type="hidden" name="papelera" id="papelera" value="1">
    
    <?php endif?>
    <?php
	
	
}


function HTMLTitulo($titulo){
	
	?>
    <div class="content-header">
        <h2 class="content-header-title"><?=$titulo?>
       
        </h2>
    </div> <!-- /.content-header -->
    <?php
	
}

function HTMLTituloBotonesNuevo($grupo, $controlador_actual,  $papelera, $id='', $titulo_opcional = ''){
	if($grupo['nombre']=='') $grupo['nombre'] = $titulo_opcional;
	?>
    <div class="content-header">
        <h2 class="content-header-title"><?=$grupo['nombre']?>
        <?php if(isset($papelera)):?>
        
        <?php endif?>
        </h2>
       
        <?php HTMLbotonAccionNuevo($grupo, $papelera, $controlador_actual, $id);?>
        
    </div> <!-- /.content-header -->
    <?php
	
}



function HTMLTituloBotones($grupo, $controlador_actual,  $papelera){
	
	?>
    <div class="content-header">
        <h2 class="content-header-title"><?php if($grupo['nombre']=='') echo "Grupos"; else echo $grupo['nombre']?>
        <?php if(isset($papelera)):?>        
           
        <?php endif?>
        </h2>
        <?php if($controlador_actual != 'grupos'):?>
       
        <?php endif?>
        <?php HTMLbotonAccionListado($grupo, $papelera, $controlador_actual);?>
        
    </div> <!-- /.content-header -->
    <?php
	
}




function HTMLbotonAccion($id, $block=0, $id_grupo, $papelera=0, $controlador, $grupo){
	$permido_prefijo = '';
	if($controlador=="categorias") $permido_prefijo = "_cat";
	
	if(is_null($grupo))  {
		$grupo['permitir_nuevo'] = 1;
	 	$grupo['permitir_eliminar'] = 1;
		$grupo['permitir_papelera'] = 0;
		$id_grupo = $id;
	}
	?>
    <div class="btn-group">
      <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
        Editar
        <span class="caret"></span>
      </button>
      <?php if(!$papelera):?>
      <ul class="dropdown-menu">
        <li><a href="<?=_URL_ADMIN?><?=$controlador?>/editar/<?=$id_grupo?>/<?=$id?>">Editar</a></li>
        <?php if($grupo['permitir_duplicar'] == 1):?>
        <li><a href="<?=_URL_ADMIN?><?=$controlador?>/duplicar/<?=$id?>/<?=$id_grupo?>" class="duplicar" id="<?=$id?>">Duplicar</a></li>
        <li><a href="<?=_URL_ADMIN?><?=$controlador?>/mover/<?=$id?>/<?=$id_grupo?>" class="mover" id="<?=$id?>">Mover</a></li>
        <?php endif?>
        <?php if($grupo['permitir_eliminar'] == 1):?><li><a href="#eliminar" pepe="<?=_URL_ADMIN?><?=$controlador?>/eliminar/<?=$id?>/<?=$id_grupo?>" data-toggle="modal" class="eliminar" id="<?=$id?>">Eliminar</a></li><?php endif?>
      </ul>
      <?php else:?>
      <ul class="dropdown-menu">
        <li><a href="<?=_URL_ADMIN?><?=$controlador?>/recuperar/<?=$id?>/<?=$id_grupo?>" id="<?=$id?>" class="recuperar">Recuperar</a></li>
        <?php if(!$block):?><li><a href="#eliminar-fisico" controler="<?=$controlador?>"  data-toggle="modal" class="eliminar-fisico" id="<?=$id?>" >Eliminar (definitivamente)</a></li><?php endif?>
      </ul>
      <?php endif?>
    </div>
    <?php
}

function HTMLbotonAccionImagenes($id, $block=0, $id_grupo, $controlador){
	?>
  <!--  <div class="btn-group">
    	<button type="button" class="btn btn-primary btn-xs eliminar-imagen-nuevo">Eliminar</button>-->
     <!-- <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
        <i class="fa fa-cog"></i>   &nbsp; 
        <span class="caret"></span>
      </button>
   
      <ul class="dropdown-menu">
       
        <?php if(!$block):?><li><a href="#eliminar" pepe="<?=_URL_ADMIN?><?=$controlador?>/eliminar/<?=$id?>/<?=$id_grupo?>" data-toggle="modal" class="eliminar" id="<?=$id?>">Eliminar</a></li><?php endif?>
      </ul>
     -->
    <!--</div>-->
    <?php
}




function HTMLbotonAccionListado($grupo, $papelera=0, $controlador){
	
	$permido_prefijo = '';
	if($controlador=="categorias") $permido_prefijo = "_cat";
	if(is_null($grupo))  {
		$grupo['permitir_nuevo'] = 1;
	 	$grupo['permitir_eliminar'] = 1;
		$grupo['permitir_papelera'] = 0;
	}
	?>
    <div class="buttons-menu well" style="  margin-top: -95px;  margin-right: -9px;">
		<?php if(!$papelera):?>
			
            <div style="margin-top:-10px;margin-bottom:-10px">
            	
            <?php if($grupo['listado_estado'] == 1):?>
                <button type="button" class="btn btn-success cambiar-estado " estado="0">
                   <i class="fa fa-check-circle check" style="color:#fff" ></i>
                </button>
                <button type="button" class="btn btn-primary cambiar-estado" estado="1">
                   <i class="fa fa-ban uncheck" style="color:#fff"></i>
                </button>  
               <?php endif?>
			     <?php if($grupo['permitir'.$permido_prefijo.'_nuevo'] == 1):?>
            	<?php if(is_null($grupo['id_grupo'])):?>
                	<a class="btn 	btn-success" href="<?= _URL_ADMIN.$controlador?>/editar">
                <?php else:?>
                	<a class="btn 	btn-success" href="<?= _URL_ADMIN.$controlador?>/editar/<?=$grupo['id_grupo']?>">
                <?php endif?>            
                    Nuevo
                </a>
            <?php endif?>
            
            
            <?php if($grupo['permitir'.$permido_prefijo.'_duplicar'] == 1):?>
            <button type="button" class="btn btn-secondary duplicar">
               Duplicar
            </button> 
            
            <button type="button" class="btn btn-warning mover">
               Mover
            </button> 
            <?php endif?>
            
            
            <?php if($grupo['permitir'.$permido_prefijo.'_eliminar'] == 1):?>
            <button type="button" class="btn btn-primary eliminar">
               Eliminar
            </button>  
            <?php endif?>
            <?php if($grupo['permitir'.$permido_prefijo.'_papelera'] == 1):?>
            <a href="<?=_URL_ADMIN?><?php echo $controlador?>/listado/<?=$grupo['id_grupo']?>/papelera" class="btn btn btn-papelera">
                <i class="fa fa-papelera"></i>
            </a>
            <?php endif?>
            </div>
            
        <?php else:?> 
            <button type="button" class="btn btn-info recuperar">
                Recuperar
            </button> 
			<?php if($grupo['permitir'.$permido_prefijo.'_eliminar'] == 1):?>
            <button type="button" class="btn btn-primary eliminar-fisico">
               Eliminar (definitivamente)
            </button>  
            <?php endif?>            
        <?php endif?> 
        
            
     </div>
    <?php
}



function HTMLbotonAccionNuevo($grupo, $papelera=0, $controlador, $id){
	
	if(is_null($grupo))  {
		
	 	//$grupo['permitir_eliminar'] = 1;
		
	}
	?>
    <div class="buttons-menu well" style="  margin-top: -95px;  margin-right: -9px;">
            
            
            
            <div class="btn-group">
                <button type="button" class="btn btn-success guardar" tipo-redirect="1">Guardar</button>
                <input type="submit" value="guardar" id="guardar-submit" style="display: none">
                <!--<?php if($controlador!='grupos' and $controlador!='configuracion'):?>
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" style="  height: 34px;">
                  <span class="caret"></span>
                </button>
                
                <ul class="dropdown-menu" role="menu">
				<?php if($controlador!='grupos' and $controlador!='configuracion'):?>
                     <li><a href="javascript:;" class="guardar" tipo-redirect="1">Guardar y cerrar</a></li>						  
                     <li><a href="javascript:;" class="guardar"  tipo-redirect="3">Guardar y nuevo</a></li>                      
                     <li><a href="javascript:;" class="guardar"  tipo-redirect="4">Guardar y duplicar</a></li>
                 <?php endif?>
                </ul>
                <?php endif?>-->
           </div>
           <?php if($grupo['permitir_nuevo'] == 1):?>
            
            <button type="button" class="btn btn-warning guardar aplicar" tipo-redirect="2">Aplicar</button>
            <?php endif?>
            <?php if($controlador!='grupos' and $controlador!='configuracion'):?>        	 
             	<a href="<?=_URL_ADMIN.$controlador?>/listado/<?=$grupo['id_grupo']?>" class="btn btn-tertiary">
             <?php else:?>
             	<a href="<?=_URL_ADMIN.$controlador?>/listado" class="btn btn-tertiary">
             <?php endif?>
               Cerrar
            </a>
            
            <?php if($grupo['permitir_eliminar'] == 1 and $id):?>
            <a  href="#eliminar" class="btn btn-primary eliminar"  data-toggle="modal"  id="<?=$id?>">
               Eliminar
            </a> 
            
            <?php endif?>
            
            
         
                       
        
            
     </div>
    <?php
}



function HTMLbotonAccionImagenesGeneral($grupo, $papelera=0, $controlador){
	?>
            <li><button type="button" class="btn btn-primary btn-sm">Eliminar</button></li>
            <li><button type="button" class="btn btn-info btn-sm">Recuperar</button></li>   
    <?php
}



?>
