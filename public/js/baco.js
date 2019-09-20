var notificaciones = new notificaciones();


function actualizarImagenes(imagen){
	var actuales = $('#imagenes').val();
	$('#imagenes').val(actuales + "," + imagen);
}

$(document).on('click', '.ui-lightbox',function(e){
	e.preventDefault();	
  var popupSRC = $(this).attr("href");
  $.magnificPopup.open({
      items: {
          src: popupSRC,
      },
      type: 'image'
  });
});



$('.eliminar').click(function(e) {
		e.preventDefault();					
		$('#eliminar').modal();	
		$("#id_cliente").val($(this).attr("id"))
    });
	
	$('.confirmar-eliminar').click(function(e){		
		window.location = "../eliminar/"+$("#id_cliente").val();
    });


$(document).on('blur', '.cambiarPrecio',function(e){
	/*e.preventDefault();	
  	$.ajax({
    // la URL para la petición
    url : URL+'contenidos/cambiarPrecio/'+$(this).attr("id"),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
    data : { precio : $(this).val() },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'json',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función
    success : function(json) {
       
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
       notificaciones.ok();
    }
	});*/
});

$(document).on("click", '.eliminar-imagen-nuevo', function(e) {
	e.preventDefault();	
	
	$("#tr-listado-imagenes-"+$(this).attr("value")).remove();		
	
	
});

$(document).on('click', '.cambiar-orden-imagen', function(e) {
	e.preventDefault();			
	
	var id = $(this).attr("id");
	var orden_actual = $('#tr-orden-'+id).val();
	
	if($(this).hasClass("sumar"))
		$('#tr-orden-'+id).val(parseInt(orden_actual)+(1));
	else
		if(parseInt(orden_actual)>1)
			$('#tr-orden-'+id).val(parseInt(orden_actual)-(1));
	//$(this).marcarCheckbox();
	//$('.formulario-listado').changeAction("cambiarOrden", "/"+$(this).attr("id")+"/"+$(this).attr("orden"));	
	//$('.formulario-listado').action();
});



$(document).ready(function(e) {

	$(".cambiarestado a").click(function(e) { 
	  	e.preventDefault();	
		$('.estadovisible-'+$(this).attr("id")).html($(this).text());
	  $.ajax({
	    // la URL para la petición
	    url : $(this).attr("href"),
	 
	    // la información a enviar
	    // (también es posible utilizar una cadena de datos)
	   // data : { precio : $(this).val() },
	 
	    // especifica si será una petición POST o GET
	    type : 'POST',
	 
	    // el tipo de información que se espera de respuesta
	    dataType : 'json',
	 
	    // código a ejecutar si la petición es satisfactoria;
	    // la respuesta es pasada como argumento a la función
	    success : function(json) {
	    },
	 
	    // código a ejecutar si la petición falla;
	    // son pasados como argumentos a la función
	    // el objeto de la petición en crudo y código de estatus de la petición
	    error : function(xhr, status) {
	       
	    },
	 
	    // código a ejecutar sin importar si la petición falló o no
	    complete : function(xhr, status) {
	       notificaciones.ok();
	       $('.estadovisible-'+$(this).attr("id")).html($(this).text())
	    }
		});
	  
	});	

	
    $('input[type=number]').keypress(function(e) {

        var keycode = (e.charCode) ? e.charCode : ((e.which) ? e.which : e.keyCode);
        var fieldLength = this.value.length;

        var id = $(this).attr('id');

        if(id == 'codigo_vendedor'){
            if( fieldLength >= 4 ){
                return false
            }
        }

        if(id == 'sucursal'){
            if( fieldLength >= 3 ){
                return false
            }
        }

        if(id == 'prefijo_telefono'){
            if( fieldLength >= 5 ){
                return false
            }
        }

        if(id == 'telefono'){
            if( fieldLength >= 10 ){
                return false
            }
        }


        if(id == 'numero_documento'){
            if( fieldLength >= 11 ){
                return false
            }
        }




        if (!(keycode >= 48 && keycode <= 57) ) {

            if (keycode == 8) {}else{
                return false;
            }              

        }

    });




	
	
	$(".ruta-imagen").change(function() { 
	    if (this.files && this.files[0]) {
	    var reader = new FileReader();

	    reader.onload = function(e) {
	      $('#imagen-sin').attr('href', e.target.result);
	      $('#imagen-sin img').attr('src', e.target.result);
	    }

	    reader.readAsDataURL(this.files[0]);
	  }
	});	
		
	

	$(".manejostock select").change(function() { 
	    if($(this).val() == 0) $('.cantidad-stock').show();
	     else $('.cantidad-stock').hide();
	  
	});	


	
	$('.preimagenes').on("click", '.eliminar-imagen',function(e) {
		e.preventDefault();	
		var actuales = $('#imagenes').val();
		var varlo_eliminar = $(this).attr("ruta");
			
		actuales = actuales.replace(varlo_eliminar, "");
		
		$('#imagenes').val(actuales);	
		$(this).parent().remove();		
		
		
    });
	
	
    $('.duplicar').click(function(e) {
		e.preventDefault();					
		$(this).marcarCheckbox();
		
		if($('.icheck-input:checked').length){
			$('#categorias').modal();
			crearArbolCategorias(0);
			$('.confirmar-duplicar').show();
			$('.confirmar-mover').hide();
			//$('.formulario-listado').action("duplicar");			
		}
		else notificaciones.itemVacio();	
		
    });
	
	
	
	$('.mover').click(function(e) {
		e.preventDefault();					
		$(this).marcarCheckbox();
		
		if($('.icheck-input:checked').length){
			$('#categorias').modal();
			
		
			
			crearArbolCategorias(1);
			$('.confirmar-mover').show();
			$('.confirmar-duplicar').hide();
			//$('.formulario-listado').action("duplicar");			
		}
		else notificaciones.itemVacio();	
		
    });
	
	$('.confirmar-duplicar').click(function(e) {	
		var categorias = '';
		var cats = $('.arbol').jstree("get_selected", true);
		var i = 1;
		$.each(cats, function() {
			categorias = categorias + (this.id);
			if(cats.length!=i) categorias = categorias + "-";
			i++;
		});
		
		$('#ids_categorias').val(categorias);
		$('.formulario-listado').changeAction("duplicar");
		$('.formulario-listado').action();	
    });
	
	$('.confirmar-mover').click(function(e) {	
		var categorias = '';
		var cats = $('.arbol').jstree("get_selected", true);
		var i = 1;
		$.each(cats, function() {
			categorias = categorias + (this.id);
			if(cats.length!=i) categorias = categorias + "-";
			i++;
		});
		if(categorias.length == 0) {
			notificaciones.itemVacio();
			e.preventDefault();
			return;
		}
		
		$('#ids_categorias').val(categorias);
		$('.formulario-listado').changeAction("mover");	
		$('.formulario-listado').action();
    });
	
	$('.cambiar-estado').click(function(e) {
		e.preventDefault();					
		$(this).marcarCheckbox();
		
		if($('.icheck-input:checked').length){
			$('.formulario-listado').changeAction("cambiarEstado", "/"+$(this).attr("id")+"/"+$(this).attr("estado"));	
			$('.formulario-listado').action();		
		}
		else notificaciones.itemVacio();	
		
    });
	
	$('.cambiar-destacado').click(function(e) {
		e.preventDefault();					
		$(this).marcarCheckbox();
		
		if($('.icheck-input:checked').length){ 
			$('.formulario-listado').changeAction("cambiarDestacado", "/"+$(this).attr("id")+"/"+$(this).attr("estado"));	
			$('.formulario-listado').action();		
		}
		else notificaciones.itemVacio();	
		
    });
	
	
	$('.recuperar').click(function(e) {
		e.preventDefault();					
		$(this).marcarCheckbox();
		
		if($('.icheck-input:checked').length){			
			$('.formulario-listado').changeAction("recuperar");	
			$('.formulario-listado').action();		
		}
		else notificaciones.itemVacio();	
    });
	
	
	
	
	
	$('.eliminar-fisico').click(function(e) {	
		e.preventDefault();					
		$(this).marcarCheckbox();
		
		if($('.icheck-input:checked').length) {
			$('#eliminar-fisico').modal();
		}
		else notificaciones.itemVacio();			
    });
	
	$('.confirmar-eliminar-fisico').click(function(e) {	
		$('.formulario-listado').changeAction("eliminarFisico", "/papelera");	
		$('.formulario-listado').action();	
    });
	
	

 
	
	$('.cambiar-orden').click(function(e) {
		e.preventDefault();			
		$(this).marcarCheckbox();
		$('.formulario-listado').changeAction("cambiarOrden", "/"+$(this).attr("id")+"/"+$(this).attr("orden"));	
		$('.formulario-listado').action();		
    });
	
	$('.guardar-orden').click(function(e) {
		e.preventDefault();			
		$('.formulario-listado').changeAction("guardarOrden");	
		//$('.formulario-listado').action();		
    });
	
	
	
	$('.guardar').click(function(e) {
		e.preventDefault();	
		categorias='';		
		var cats = $('.arbol').jstree("get_selected", true);
		var i = 1;
		$.each(cats, function() {
			categorias = categorias + (this.id);
			if(cats.length!=i) categorias = categorias + "-";
			i++;
		});
		
		$("#redirect").val($(this).attr("tipo-redirect"));
		
		if(categorias) $('#ids_categorias').val(categorias);
			
		/*if($('#editando').length==0) $('.formulario').changeAction("creando");	
		else $('.formulario').changeAction("editando");*/
		$('#guardar-submit').click();			 
    });
	
	
	$('input:checkbox, input:radio').iCheck({
		checkboxClass: 'icheckbox_minimal-blue',
		radioClass: 'iradio_minimal-blue',
		inheritClass: true
	 });
	
	
});























function notificaciones(){ 
	
	this.ok=function(){ 
		$.howl ({
		  type: 'success'
		  , title: 'Su solicitud fue realizada correctamente.'
		  , lifetime: 5000
		});
	} 
	
	this.okImagen=function(){ 
		$.howl ({
		  type: 'success'
		  , title: 'IMAGEN CARGADA CORRECTAMENTE.<br><br>¿Desea cargar alguna imagen mas?<br> En caso de que no pulse CERRAR.'
		  , lifetime: 10000
		});
		$('.howl').addClass("blanco");
	}
	
	this.error=function(){ 
		$.howl ({
		  type: 'danger'
		  , title: 'El email ingresado ya existe en la base.'
		  , lifetime: 5000
		});
	} 
	
	this.itemVacio=function(){ 
		$.howl ({
		  type: 'warning'
		  , title: 'Por favor seleccione algún item.'
		  , lifetime: 5000
		});
	} 
}





//Cambio action de los form
(function( $ ){
   $.fn.action = function() {
	    //if (typeof param1 === 'undefined') param1 = '';
    	//var urlAction = $('.formulario').attr("action");
		//urlAction = urlAction.replace("listado", action);		
		//$('.formulario').attr("action", urlAction+param1);
		$('.formulario').submit();
   }; 
})( jQuery );

(function( $ ){
   $.fn.changeAction = function(param1, param2) {
	   
	    if (typeof param2 === 'undefined') param2 = '';		
		
    	var urlAction = $('.formulario').attr("action");
		urlAction = urlAction.replace("listado", param1);		
		$('.formulario').attr("action", urlAction+param2);
		//$('.formulario').submit();
   }; 
})( jQuery );


//Auto marco checkbox antes de enviar
(function( $ ){
   $.fn.marcarCheckbox = function() {
    	var id = $(this).attr("id");
		$('.item-'+id).attr("checked", "checked");	
   }; 
})( jQuery );