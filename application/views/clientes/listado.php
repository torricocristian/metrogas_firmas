

<div class="row titulolistado">
        <div class="col-md-10 col-sm-10">
         <h2 class="content-header-title">Contactos</h2>   
        </div>
        <div class="col-md-2 col-sm-2" style="text-align: right;">
          <a class="btn   btn-success" href="<?=_URL_ADMIN?>clientes/excel/">
               Exportar Excel
            </a>  
        </div>
</div>


<div class="table-responsive">
  <table 
    class="table table-striped listado-clientes table-bordered table-hover table-highlight table-checkable" 
    data-provide="datatable" 
    data-display-rows="25"
    data-info="true"
    data-search="true"
    data-length-change="true"
    data-paginate="true"
  >
      <thead>
        <tr>
          <th data-filterable="true" data-sortable="false" class="footerfiltro">Fecha</th> 
          <th data-filterable="true" data-sortable="false" class="footerfiltro" style="width: 150px; min-width: 150px">Nombre y apellido</th>    
          <th data-filterable="true" data-sortable="false" class="footerfiltro" style="width: 120px; min-width: 120px">Compañía</th>     
          <th data-filterable="true" data-sortable="false" class="footerfiltro">Email</th> 
          <th data-filterable="true" data-sortable="false" class="footerfiltro">Teléfono</th> 
          <th data-filterable="true" data-sortable="false" class="footerfiltro">Motivo</th>           
          <th data-filterable="true" data-sortable="false" class="footerfiltro">Mensaje</th> 
          <th data-filterable="true" data-sortable="false" class="footerfiltro" style="width:50px">Estado</th>
          <th data-filterable="true" data-sortable="false" class="" style="width:50px; display: none">Estado</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($clientes as $q):?>
        <tr>
        
          <td><?=convertirFechaMostrar($q['fecha'])?></td>
          <td><?=$q['nombre-apellido']?></td>
          <td><?=$q['compania']?></td>
          <td><?=$q['email']?></td>
          <td><?=$q['telefono']?></td>
          <td><?=$q['motivo']?></td> 
          <td><div class="cortarmensaje">
            <?php
           echo $q['mensaje'];
            
            ?></div></td>                  
          <td style="display: none">
            <?php 
                        if($q['estado'] == 0) echo "Sin contacto";
                        if($q['estado'] == 1) echo "No contesta";
                        if($q['estado'] == 2) echo "Pendiente";
                        if($q['estado'] == 3) echo "No venta";
                        if($q['estado'] == 4) echo "Venta";
                        ?>
          </td>
          <td class=" center">
         
          <div class="btn-group">
                      <button type="button" class="btn btn-default dropdown-toggle btn-xs " data-toggle="dropdown" >
                        <span class="estadovisible-<?=$q['id_cliente']?>"><?php 
                        if($q['estado'] == 0) echo "Sin contacto";
                        if($q['estado'] == 1) echo "No contesta";
                        if($q['estado'] == 2) echo "Pendiente";
                        if($q['estado'] == 3) echo "No venta";
                        if($q['estado'] == 4) echo "Venta";
                        ?></span>
                        <span class="caret"></span>
                      </button>
                    <ul class="dropdown-menu cambiarestado">
                       <li><a href="<?= _URL_ADMIN?>clientes/estado/<?=$q['id_cliente']?>/0" id="<?=$q['id_cliente']?>">Sin contacto</a></li>
                       <li><a href="<?= _URL_ADMIN?>clientes/estado/<?=$q['id_cliente']?>/1" id="<?=$q['id_cliente']?>">No contesta</a></li>
                       <li><a href="<?= _URL_ADMIN?>clientes/estado/<?=$q['id_cliente']?>/2" id="<?=$q['id_cliente']?>">Pendiente</a></li>
                       <li><a href="<?= _URL_ADMIN?>clientes/estado/<?=$q['id_cliente']?>/3" id="<?=$q['id_cliente']?>">No venta</a></li>
                       <li><a href="<?= _URL_ADMIN?>clientes/estado/<?=$q['id_cliente']?>/4" id="<?=$q['id_cliente']?>">Venta</a></li>
                  </div>
          </td>
        </tr>
        <?php endforeach?>
       
      </tbody>
      
    </table>
  </div>
