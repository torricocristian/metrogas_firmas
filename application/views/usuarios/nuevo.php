<form action="<?=_URL_ADMIN?><?=$this->registry->router->controller?>/editando" method="post" class="<?php if(isset($contenido)) echo "formulario-editar formulario"; else echo "formulario-nuevo formulario";?>"  enctype="multipart/form-data" method="POST">
<?php HTMLHiddenInput($this->registry->router->controller, $papelera, $grupo, $cat_input);?>
  
  <div class="content-header">
      <h2 class="content-header-title">Usuarios</h2>              
  
</div>
<?php //HTMLTitulo("Usuarios");?>
<?php HTMLTituloBotonesNuevo($grupo, $this->registry->router->controller, $papelera, $contenido['id_contenido_articulo']);?>


<input type="hidden" name="editando" id="id_contenido_grupo" value="0" >
<?php if(isset($usuario)): ?><input type="hidden" name="id_usuario" value="<?=$usuario['id_usuario']?>" ><?php endif; ?>

      
     <div class="row">

        <div class="col-md-3 col-sm-4">
      
          <ul id="myTab" class="nav nav-pills nav-stacked">
            <li class="active">
              <a href="#informacion" data-toggle="tab">
                  <i class="fas fa-user"></i>
                 	Información del usuario
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
                  Información del usuario
                      </h3>
        
                    </div> <!-- /.portlet-header -->
        
                    <div class="portlet-content">
        
            
              
				
                
                
                

                <div class="form-group">

                  <label class="col-md-3">Nombre</label>

                  <div class="col-md-9">
                    <input type="text" name="nombre" class="form-control"  required="" value="<?php if(isset($usuario)) echo $usuario['nombre']?>">
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->
                
                <div class="form-group">

                  <label class="col-md-3">Apellido</label>

                  <div class="col-md-9">
                    <input type="text" name="apellido" class="form-control" value="<?php if(isset($usuario)) echo $usuario['apellido']?>">
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->


                
                <div class="form-group">

                  <label class="col-md-3">Email</label>

                  <div class="col-md-9">
                    <input type="text" name="email" class="form-control"  required="" value="<?php if(isset($usuario)) echo $usuario['email']?>">
                  </div> <!-- /.col -->

                </div> <!-- /.form-group -->


               
                
                
                <div class="form-group">

                  <label class="col-md-3">Contraseña</label>

                  <div class="col-md-9">
                    <input type="text" name="password" class="form-control" value=""  required="">
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
  
