var notificaciones = new notificaciones();



$('.detalle').click(function() {
					
	$('#detalle-'+$(this).attr("id")).modal();	
});

	

    if ($.fn.dataTable) {
      $('[data-provide="datatable"]').each (function () { 
        $(this).addClass ('dataTable-helper')    
        var defaultOptions = {
            paginate: false,
            search: false,
            info: false,
            lengthChange: false,
            displayRows: 10
          },
          dataOptions = $(this).data (),
          helperOptions = $.extend (defaultOptions, dataOptions),
          $thisTable,
          tableConfig = {}

        tableConfig.iDisplayLength = helperOptions.displayRows
        tableConfig.bFilter = true
        tableConfig.bSort = true
        tableConfig.bPaginate = false
        tableConfig.bLengthChange = false  
        tableConfig.bInfo = false

        if (helperOptions.paginate) { tableConfig.bPaginate = true }
        if (helperOptions.lengthChange) { tableConfig.bLengthChange = true }
        if (helperOptions.info) { tableConfig.bInfo = true }       
        if (helperOptions.search) { $(this).parent ().removeClass ('datatable-hidesearch') }       

        tableConfig.aaSorting = []
        tableConfig.aoColumns = []

        $(this).find ('thead tr th').each (function (index, value) {
          var sortable = ($(this).data ('sortable') === true) ? true : false
          tableConfig.aoColumns.push ({ 'bSortable': sortable })

          if ($(this).data ('direction')) {
            tableConfig.aaSorting.push ([index, $(this).data ('direction')])
          }
        })   
       
        // Create the datatable
        $thisTable = $(this).dataTable (tableConfig)

        if (!helperOptions.search) {
          $thisTable.parent ().find ('.dataTables_filter').remove ()
        }

        var filterableCols = $thisTable.find ('thead th').filter ('[data-filterable="true"]')

        if (filterableCols.length > 0) {
          var columns = $thisTable.fnSettings().aoColumns,
            $row, th, $col, showFilter
            
          $row = $('<tr>', { cls: 'dataTable-filter-row' }).appendTo ($thisTable.find ('tfoot'))

          for (var i=0; i<columns.length; i++) {
            $col = $(columns[i].nTh.outerHTML)
            showFilter = ($col.data ('filterable') === true) ? 'show' : 'hide'

            th = '<th class="' + $col.prop ('class') + '">'
            th += '<input type="text" class="form-control input-sm ' + showFilter + '" placeholder="' + $col.text () + '">'
            th += '</th>'
            $row.append (th)
          }

          $row.find ('th').removeClass ('sorting sorting_disabled sorting_asc sorting_desc sorting_asc_disabled sorting_desc_disabled')

          $thisTable.find ('tfoot input').keyup( function () {
            $thisTable.fnFilter( this.value, $thisTable.oApi._fnVisibleToColumnIndex( 
              $thisTable.fnSettings(), $thisTable.find ('tfoot input[type=text]').index(this) ) )
          })

          $thisTable.addClass ('datatable-columnfilter')
        }
      })

      $('.dataTables_filter input').prop ('placeholder', 'Ingrese su búsqueda...')
    }



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

