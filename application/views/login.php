<div class="page-header">
  <h1>Generador de Firmas</h1>
</div>
<!-- <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
    <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span> Atención</div>
    <div class="panel-body">
     <p>Usted llevará adelante un trámite que tiene CARÁCTER DE DECLARACIÓN JURADA en lo que exprese, valide e informe a MetroGAS, dándose por notificado de este CARÁCTER con la mera realización del trámite.</p>
    </div>
    </div>
  </div>
</div> -->
<div class="row">
  <div class="col-md-12">
    <h2>Login</h2>
    <div class="alert alert-danger errorLogin">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <p class="messageResult">
        
      </p>
    </div>
    <div class="col-md-6">
      <br>
      <br>
      <form id="formLogin" action="javascript:" method="post">
        <div class="form-group">
          <label for="identity">USUARIO:</label>
          <input type="text" name="f_dni" value="" id="f_dni" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="password">CONTRASE&Ntilde;A:</label>
          <input type="password" name="f_password" value="" id="f_password" class="form-control showpassword"/>
        </div>
        <p>
          <input type="submit" name="submit" value="Ingresar" class="btn btn-primary" id="btnLogin"/>
        </p>
      </form>
    </div>
  </div>
</div>