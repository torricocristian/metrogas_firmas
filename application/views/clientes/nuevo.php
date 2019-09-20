<form action="<?=_URL_ADMIN?>clientes/editando" method="post" class=""  method="POST">
  
  <div class="content-header">
      <h2 class="content-header-title">Preview</h2>              
  
</div>

<input type="hidden" name="id" value="<?php if(isset($cliente)) echo $cliente['id_cliente']?>">
<?php HTMLTituloBotonesNuevo($grupo, $this->registry->router->controller, $papelera, $contenido['id_contenido_articulo']);?>

<input type="hidden" name="editando" id="id_contenido_grupo" value="0" >
<?php if(isset($usuario)): ?><input type="hidden" name="id_usuario" value="<?=$usuario['id_usuario']?>" ><?php endif; ?>

      
     <div class="row">

        <div class="col-md-3 col-sm-4">
      
          <ul id="myTab" class="nav nav-pills nav-stacked">
            <li class="active">
              <a href="#informacion" data-toggle="tab">
                  <i class="fas fa-user"></i>
                 	Editar información
              </a>
            </li>
            
          </ul>

          <br>

        </div> <!-- /.col -->

        <div class="col-md-9 col-sm-8">

          <div class="tab-content stacked-content">

            <div class="tab-pane fade active in" id="informacion">
            
            
            
              <div class="portlet">
                
                    <div class="portlet-header">
        
                      <h3>
                       
                      <i class="fas fa-user"></i>
                 Editar información
                      </h3>
        
                    </div> <!-- /.portlet-header -->
        
                    <div class="portlet-content">
        
            
                

                <div class="form-group">

                  <label class="col-md-3">Fecha</label>

                  <div class="col-md-9">
                    <input type="text" name="Fecha" readonly="" class="form-control" required="" value="<?php if(isset($cliente)) echo convertirFechaMostrar($cliente['fecha'])?>">
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->  


                <div class="form-group">

                  <label class="col-md-3">Sponsor</label>

                  <div class="col-md-9">
                    <input type="text" name="Sponsor" readonly="" class="form-control" required="" value="<?php if(isset($cliente)) echo $cliente['agente']?>">
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->  



                <div class="form-group">

                  <label class="col-md-3">Vendedor</label>

                  <div class="col-md-9">
                    <input type="text" name="Vendedor" readonly="" class="form-control" required="" value="<?php if(isset($cliente)) echo $cliente['codigo_vendedor']?>">
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->  


                <div class="form-group">

                  <label class="col-md-3">Sucursal </label>

                  <div class="col-md-9">
                    <input type="text" name="Sucursal" readonly="" class="form-control" required="" value="<?php if(isset($cliente)) echo $cliente['sucursal']?>">
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->  


                <div class="form-group">

                  <label class="col-md-3">Producto  </label>

                  <div class="col-md-9">
                    <input type="text" name="Producto " readonly="" class="form-control" required="" value="<?php if(isset($cliente)) echo $cliente['producto']?>">
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->  
				
                
                  
                <div class="form-group">

                  <label class="col-md-3">Apellido</label>

                  <div class="col-md-9">
                    <input type="text" name="apellido" class="form-control" required="" value="<?php if(isset($cliente)) echo $cliente['apellido']?>">
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->  
                

                <div class="form-group">

                  <label class="col-md-3">Nombre</label>

                  <div class="col-md-9">
                    <input type="text" name="nombre" class="form-control" required="" value="<?php if(isset($cliente)) echo $cliente['nombre']?>">
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->


                <div class="form-group">
                 
                  <label class="col-md-3">Documento</label> 
                  
                  <div class="col-md-9">
                    <div class="row">
                     
                      <div class="col-md-5">
                         <select class="form-control" name="tipo_documento" required="">
                          <?php foreach($documentos as $q):?>
                            <option value="<?=$q['codigo']?>" <?php if($q['codigo'] == $cliente['tipo_doc']): ?> selected <?php endif; ?>><?=$q['nombre']?></option>
                          <?php endforeach?>                         
                        </select>
                      </div>
                      
                      <div class="col-md-7 ">
                        <input type="number"  pattern="[0-9]*" name="numero_documento" id="numero_documento" class="form-control" placeholder="Documento"  <?php if($cliente['numero_documento']): ?>value="<?=$cliente['numero_documento']?>"<?php else: ?> value="0" <?php endif; ?>>
                      </div>
                     
                    </div>
                  </div>
                </div>
              


                <div class="form-group">
                 
                  <label class="col-md-3">Teléfono</label> 
                  
                  <div class="col-md-9">
                    <div class="row">
                     
                      <div class="col-md-4">
                         <select class="form-control" name="tipo_telefono" required="">
                          <?php foreach($telefonos as $q):?>
                            <option value="<?=$q['codigo']?>" <?php if($q['id_cliente_tel'] == $cliente['tipo_tel']): ?> selected <?php endif; ?>><?=$q['nombre']?></option>
                          <?php endforeach?>                         
                        </select>
                      </div>
                      
                      <div class="col-md-2 ">
                        <input type="number"  pattern="[0-9]*" name="prefijo_telefono" required="" id="prefijo_telefono" class="form-control" placeholder="Prefijo Teléfono"  <?php if($cliente['prefijo_telefono']): ?>value="<?=$cliente['prefijo_telefono']?>"<?php else: ?> value="0" <?php endif; ?>>
                      </div>

                      <div class="col-md-6 ">
                        <input type="number"  pattern="[0-9]*" name="telefono" required="" id="telefono" class="form-control" placeholder="Teléfono"  <?php if($cliente['telefono']): ?>value="<?=$cliente['telefono']?>"<?php else: ?> value="0" <?php endif; ?>>
                      </div>
                     
                    </div>
                  </div>
                </div>


                
                <div class="form-group">

                  <label class="col-md-3">Email</label>

                  <div class="col-md-9">
                    <input type="text" name="email" class="form-control" value="<?php if(isset($cliente)) echo $cliente['email']?>">
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->


                <div class="form-group">

                  <label class="col-md-3">Estado</label>

                  <div class="col-md-9">
                    <select class="form-control" name="estado" required=""> 
                          <option value="0" <?php if($cliente['estado'] == 0): ?> selected <?php endif; ?>>Sin contacto</option>
                          <option value="1" <?php if($cliente['estado'] == 1): ?> selected <?php endif; ?>>No contesta</option>
                          <option value="2" <?php if($cliente['estado'] == 2): ?> selected <?php endif; ?>>Pendiente</option>
                          <option value="3" <?php if($cliente['estado'] == 3): ?> selected <?php endif; ?>>No venta</option>
                          <option value="4" <?php if($cliente['estado'] == 4): ?> selected <?php endif; ?>>Venta</option>
                      </select>
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->


               
                 <div class="form-group">

                  <label class="col-md-3">Observaciones</label>

                  <div class="col-md-9">
                     <textarea class="" name="observaciones" style="width:100%; height:200px"><?php if(isset($cliente)) echo $cliente['observaciones']?></textarea>
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->
             
                
              
                 
              
           
                </div>
                </div>
    
                


        
			   

               

              </form>


            </div> <!-- /.tab-pane --> 
          
             <!-- /.tab-pane -->


               <!-- /.tab-pane -->
              
              
              
              
              

             

          </div> <!-- /.tab-content -->

        </div> <!-- /.col -->

      </div>

  </form>
  
