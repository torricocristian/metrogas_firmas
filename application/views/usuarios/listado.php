<div class="content-header">
      <h2 class="content-header-title">Usuarios</h2>              
      <div class="buttons-menu well" style="  margin-top: -65px;  margin-right: -9px;">
        
          <div style="margin-top:-10px;margin-bottom:-10px">              
                         
             <a class="btn   btn-success" href="<?=_URL_ADMIN?>usuarios/editar/">
                 Nuevo
              </a>  
            
      </div>
   </div>
          
</div>


    <div class="table-responsive">    
  <table 
    class="table table-striped table-bordered table-hover table-highlight table-checkable" 
    data-provide="datatable" 
    data-display-rows="25"
    data-info="true"
    data-search="true"
    data-length-change="true"
    data-paginate="true"
  >
      <thead>
        <tr>          
         
          <th data-filterable="true" data-direction="desc" data-sortable="true" style="width:20px">ID</th>
          <th  data-filterable="true" data-sortable="true" style="width:350px">Email</th> 
          <th  data-filterable="true" data-sortable="true">Nombre y apellido</th>          
               
          <th data-sortable="false"  class="colWidthCOLUM" style="text-align: center">Estado</th>
          <th data-filterable="false" data-sortable="false"  class="colWidthCOLUM"></th>
        </tr>
      </thead>
      <tbody>
      		<?php foreach($usuarios as $q): if($q['id_privilegio']==1) continue;?>
   	   		<tr>
              	
                <td class="center"><a href="<?=_URL_ADMIN?>usuarios/editar/<?=$q['id_usuario']?>"  class="linklistado">#<?=id($q['id_usuario'])?></a></td>      
                 <td><a href="<?=_URL_ADMIN?>usuarios/editar/<?=$q['id_usuario']?>"  class="linklistado"><?=$q['email']?></a></td>              
                <td><?=$q['nombre']?> <?=$q['apellido']?></td>    
               
                <td class="center fontcero" >
                  <a href="<?=_URL_ADMIN?>usuarios/estado/<?=$q['id_usuario']?>/<?php if($q['estado']): ?>0<?php else: ?>1<?php endif; ?>">
                    <?php 
                    mostrarEstado($q['estado'])?>
                  </a>
                </td>
                <td class="center">
                  
                   <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
                        Acción
                        <span class="caret"></span>
                      </button>
                    <ul class="dropdown-menu">
                       <li><a href="<?= _URL_ADMIN?>usuarios/editar/<?=$q['id_usuario']?>">Editar</a></li>
                       <li><a href="<?= _URL_ADMIN?>usuarios/eliminar/<?=$q['id_usuario']?>">Eliminar</a></li>
                  </div>

                </td>
            </tr>
            <?php endforeach?>
       
      </tbody>
      
    </table>
  </div>

  
