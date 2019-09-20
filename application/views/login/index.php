<body class="account-bg" style="height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;"><!-- /.navbar -->



<div class="account-wrapper">


    <div class="account-body">

      <h3 class="account-body-title">Generador de firmas</h3>


      <form class="form account-form" method="post" action="">
      	<input type="hidden" value="1" name="privilegio">
        <?php if(is_numeric($return)): ?>
          <input type="hidden" value="<?=$return?>" name="return">
        <?php endif; ?>
		<?php 		
		if($error==1) :?>
		<div class="alert alert-danger" style="margin-bottom: 10px">
         
            Por favor complete su correo y contraseña.
   	    </div>
      	<?php endif?>
        <?php 		
		if($error==2) :?>
		<div class="alert alert-danger" style="margin-bottom: 10px">

            El correo o contraseña ingresados son incorrectos. 
   	    </div>
      	<?php endif?>
        <?php     
    if($error==3) :?>
    <div class="alert alert-danger" style="margin-bottom: 10px">
            
            La cuenta quedó bloqueada por <strong>1 hora</strong><br>Se ingresó mal la contraseña reiteradas veces.
        </div>
        <?php endif?>
        <div class="form-group">
          <label for="email" class="placeholder-hidden">Email</label>
          <input type="text" class="form-control" id="email" name="email" value="<?php echo $_POST['email']?>" placeholder="Email" tabindex="1">

        </div> <!-- /.form-group -->

        <div class="form-group">
          <label for="password" class="placeholder-hidden">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" tabindex="2">
        </div> <!-- /.form-group -->

        <!--<div class="form-group clearfix">
          <div class="pull-left">         
            <label class="checkbox-inline">
            <input type="checkbox" class="" value="" tabindex="3">Remember me
            </label>
          </div>

          <div class="pull-right">
            <a href="account-forgot.html">Forgot Password?</a>
          </div>
        </div> --><!-- /.form-group -->

        <div class="form-group">
          <button type="submit" id="boton-login" class="btn btn-success btn-block btn-lg" tabindex="4">
            Iniciar sesión &nbsp; <i class="fa fa-play-circle"></i>
          </button>
        </div> <!-- /.form-group -->

      </form>


    </div> <!-- /.account-body -->

    

  </div> <!-- /.account-wrapper -->