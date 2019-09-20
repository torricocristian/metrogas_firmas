

</div>
</div>

<div style="padding-top:120px;"></div>

<!-- Modal -->
<div class="modal fade" id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="modalAlertsLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalAlertsLabel"> <i class="fa fa-exclamation-triangle"></i> ATENCION!</h4>
      </div>
      <div class="modal-body">
        ...

      </div>
      <div class="modal-footer">
        
      </div>

    </div>
  </div>
</div>



<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 

 <!-- <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script> -->
  <script src="assets/js/jquery.min.js"></script>  
	<script src="assets/js/jquery.validate.min.js"></script>	
  <script src="assets/js/bootstrap.min.js"></script>     


<script type="text/javascript">

/*  function malert(message,redirect) {
    if(typeof redirect != 'undefined') {
      $('.modal-footer').html('<a href="'+redirect+'" type="button" class="btn btn-primary" >Aceptar</a>');
    } else {
      $('.modal-footer').html('<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>');
    }
      $('.modal-body').html(message);
      $('#modalAlert').modal('show');
  }
*/

$( document ).ready(function() {


$(".showpassword").each(function(index,input) {
        var $input = $(input);
        $('<label class="showpasswordlabel"/>').append(
            $("<input type='checkbox' class='showpasswordcheckbox' />").click(function() {
                var change = $(this).is(":checked") ? "text" : "password";
                var rep = $("<input type='" + change + "' />")
                    .attr("id", $input.attr("id"))
                    .attr("name", $input.attr("name"))
                    .attr('class', $input.attr('class'))
                    .val($input.val())
                    .insertBefore($input);
                $input.remove();
                $input = rep;
             })
        ).append($("<span/>").text("Mostrar contraseña")).insertAfter($input);
    });

  $('#btnLogin').click(function() {
  
    $.ajax({
          type: "POST",
          url: BASE_URL+'ajax/checkLogin',
          dataType: "json",
          data: {
            dni:$('#f_dni').val(),
            password:$('#f_password').val()
          }
        }).done(function(data) {
          //alert(data.status);
          console.log(data.message);
           if(data.status) {
            $(location).attr('href',BASE_URL+'signatures');
           } else {
            $('.messageResult').html(data.message);
            $('.errorLogin').show();
           }
      });
  });
});
</script>
<script>
 
function doCanvas(nombreApellido, puesto, direccion, codigoPostal, provincia, telefono, email) {    

    var canvas = document.getElementById("myCanvas");
    var content = canvas.getContext("2d");
    var fontDefault = "13px Century Gothic";
    var fontDefaultTelEmail = "13px Century Gothic";
    var colorDefault = "black";
    var img = new Image();
    var marginTextDefault = 25;
    var distancia = 115;
    //var distancia = 120; // para logo_25_anos.png
    var distanciaConst = 15;

    content.scale(1,1);
    content.clearRect(0, 0, canvas.width, canvas.height);
    img.src = '<?php echo base_url(); ?>assets/img/metrogas-logo.png';
    //img.src = '<?php echo base_url(); ?>assets/img/logo_25_anos.png';
    img.onload = function()
    {       
        content.drawImage(img, 25, 10);
        //content.drawImage(img, -7, 10);// para logo_25_anos.pmg
    }    

    if(nombreApellido.length > 0){
      content.font = "16px Century Gothic";
      content.fillStyle = colorDefault;
      content.fillText(nombreApellido.toUpperCase(), marginTextDefault, distancia);
    }

    if(puesto.length > 0){
      content.font = "12px Century Gothic";
      content.fillText(puesto.toUpperCase(), marginTextDefault, distancia=distancia+distanciaConst);
    }

    distancia = distancia+8;
    content.font = fontDefault;

    if(direccion.length > 0){
      content.fillText(direccion, marginTextDefault, distancia=distancia+distanciaConst);      
    }

    if(codigoPostal.length > 0){
      content.fillText(codigoPostal, marginTextDefault, distancia=distancia+distanciaConst);      
    }

    if(provincia.length > 0){
      provincia = provincia+', Argentina';
      content.fillText(provincia, marginTextDefault, distancia=distancia+distanciaConst);
    }

    content.font = fontDefaultTelEmail;

    if(telefono.length > 0){
      content.fillText(telefono, marginTextDefault, distancia=distancia+distanciaConst);
    }

    if(email.length > 0){
      content.fillStyle = 'blue';
      content.fillText(email, marginTextDefault, distancia=distancia+distanciaConst);      
    }

    return true;
  
}

function downloadCanvas(link, canvasId, filename) {
    link.href = document.getElementById(canvasId).toDataURL();    
    link.download = filename;
}
    
document.getElementById('downloadImg').addEventListener('click', function() {
    downloadCanvas(this, 'myCanvas', 'firma.jpg');
}, false);

$('#btnDoBase64').click(function() {
    $('#base64Content').show().val(document.getElementById('myCanvas').toDataURL());
});

function downloadHtml(name, type) {
  $('#generateHtml').hide();
  $('#downloadHtml').show();
  var a = document.getElementById("downloadHtml");
  var canvas = document.getElementById('myCanvas').toDataURL();
  var aFileParts = ['<html><body><img src="'+canvas+'"/></body></html>'];
  var file = new Blob(aFileParts, {type: type});
  a.href = URL.createObjectURL(file);
  a.download = name;
}

function validateLength (text) {
  if(text.length < 1){
    return true;
  }
  return false;
}

function validateEmailMgas (email) {
  var regex = /([a-zA-Z0-9_.+-])+\@metrogas\.com\.ar/;
  if(regex.test(email)){
    return false;
  }
  return true;
}



$('#generateImg').click(function() {
  //var form = $('#formInfoCanvas');
    var nombreApellido = $('#f_nombreApellido').val();
    var puesto = $('#f_puesto').val();
    var direccion = $('#f_direccion').val();
    var codigoPostal = $('#f_codigoPostal').val();
    var provincia = $('#f_provincia').val();
    var telefono = $('#f_telefono').val();
    var email = $('#f_email').val();
    var errorMessageLarge =  'Por favor complete este campo.';
    var errorMessageEmailMgas = 'Por favor ingrese un email con el dominio metrogas.com.ar.';
   

    $('.contenedorBtnDownload').hide();
    $('#base64Content').hide().val();
    $('#generateHtml').show();
    $('#downloadHtml').hide();

    $('.messageError').remove();
    process = false;

    if(validateLength(nombreApellido)){
        $('#f_nombreApellido').focus().after('<p class="text-danger messageError">'+errorMessageLarge+'</p>');
        return false;
    } else if(validateLength(puesto)){
        $('#f_puesto').focus().after('<p class="text-danger messageError">'+errorMessageLarge+'</p>');
        return false;       
    } else if(validateLength(direccion)){
        $('#f_direccion').focus().after('<p class="text-danger messageError">'+errorMessageLarge+'</p>');
        return false;
    } else if(validateLength(codigoPostal)){
        $('#f_codigoPostal').focus().after('<p class="text-danger messageError">'+errorMessageLarge+'</p>');
        return false;
    } else if(validateLength(provincia)){
        $('#f_provincia').focus().after('<p class="text-danger messageError">'+errorMessageLarge+'</p>');
        return false;
    } else if(validateLength(telefono)){
        $('#f_telefono').focus().after('<p class="text-danger messageError">'+errorMessageLarge+'</p>');
        return false;
    } else if(validateLength(email)){
        $('#f_email').focus().after('<p class="text-danger messageError">'+errorMessageLarge+'</p>');
        return false;
    } else if(validateEmailMgas(email)){
        $('#f_email').focus().after('<p class="text-danger messageError">'+errorMessageEmailMgas+'</p>');
        return false;
    } else {
      if(doCanvas(nombreApellido, puesto, direccion, codigoPostal, provincia, telefono, email)){
        $('.contenedorBtnDownload').show();
      }      
    }
});

</script>
  </body>
</html>