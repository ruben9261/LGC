$(document).ready(function() {
	$.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function (element) {
            $(element)
                .closest('.form-group')
                .addClass('has-error');
        },
        unhighlight: function (element) {
            $(element)
                .closest('.form-group')
                .removeClass('has-error');
        },
        errorPlacement: function (error, element) {
            if (element.prop('type') === 'checkbox') {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
	});
	$("#TablaGestionCobros").DataTable({
		"pageLength": 5,
			//  data: myData,
			aoColumns: [
			{ mData: 'COD_DOC_COBRO' },
			{ mData: 'USU' },
			{ mData: 'DESC_CAJA' },						
			{ mData: 'NOM_TIPOCOBRO'},
			{ mData: 'NOMBRE'},
			{ mData: 'ACCIONES'}
			
		]
	});

	
} );

function fn_eliminar(COD_DOC_COBRO) 
{  $.ajax({
		    url:  "/mantGestionCobros_c/eliminar",
	    	type: 'post',//metodo
	    	data: { COD_DOC_COBRO:  COD_DOC_COBRO
	    		  }, //parametros
	    	success: function(respuesta) {
                debugger;

            respuesta = JSON.parse(respuesta);
            
       		if(respuesta)
       		{  
                $("#mostrarmodal_ok").modal("show");
            }
       		else
            {  
                $("#mostrarmodal_error").modal("show");
            }    
	      }, 
	       error: function() { alert('Se ha producido un error'); }
	    });
	  return false;
}


$(function(){
$("#txt_fecha").keypress(function(e) {
   if(e.which == 13) {
         // Acciones a realizar, por ej: enviar formulario.
	    bus_OrdenEntrada();
	   return false;
     }
   
  });
  
});

$(function(){
	$("#txt_serie").keypress(function(e) {
	   if(e.which == 13) {
	         // Acciones a realizar, por ej: enviar formulario.
		    bus_OrdenEntrada();
		   return false;
	     }
	   
	  });
});


$(function(){
	$("#txt_numero").keypress(function(e) {
	   if(e.which == 13) {
	         // Acciones a realizar, por ej: enviar formulario.
		    bus_OrdenEntrada();
		   return false;
	     }
	   
	  });
});


$(function(){
	$("#txt_cliente").keypress(function(e) {
	   if(e.which == 13) {
	         // Acciones a realizar, por ej: enviar formulario.
		    bus_OrdenEntrada();
		   return false;
	     }
	   
	  });
});


$(function(){
	$("#txt_documento").keypress(function(e) {
	   if(e.which == 13) {
	         // Acciones a realizar, por ej: enviar formulario.
		    bus_OrdenEntrada();
		   return false;
	     }
	   
	  });
});



$(function(){
  $("#btnbuscar").click(function(){
	   bus_OrdenEntrada();
	return false;
  });
});




/*-alinear para que todo el mantenimiento sea por ajax*/


function bus_OrdenEntrada()
{   
	$('#TablaGestionCobros').dataTable().fnClearTable();

    var Filtros = new Object();
	Filtros.COD_DOC_COBRO= $("#COD_DOC_COBRO").val();
    Filtros.DOC_COBRO_FECHA= $("#DOC_COBRO_FECHA").val();
    Filtros.COD_OFI= $("#COD_OFI").val();
    Filtros.COD_USU= $("#COD_USU").val();
    Filtros.COD_CLI= $("#COD_CLI").val();
    Filtros.COD_TIPOCOBRO= $("#COD_TIPOCOBRO").val();
    Filtros.Pagina = -1;
    $('#processing-modal').modal('show');
    $.ajax({
  		type: "POST",
  		data:{ Filtros:Filtros
			 },
  		url: "/mantGestionCobros_c/obt_datos",
  		success: function(objJson){
              debugger;
              $('#processing-modal').modal('hide');
			 // var respuesta=JSON.parse(objJson);
			  var listCobros = objJson.lista;
			  var TableData = new Array();
			  var Cobros = null;
			  if(listCobros.length>0){
				  $.each(listCobros, function(index, value){
					  var cols = "";

					  Cobros = new Object;
					  Cobros.COD_DOC_COBRO = value.COD_DOC_COBRO;
					  Cobros.USU = value.USU;
					  Cobros.DESC_CAJA = value.DESC_CAJA;
					  Cobros.NOM_TIPOCOBRO = value.NOM_TIPOCOBRO;
					  Cobros.NOMBRE = value.NOMBRE;
					  //Cobros.ACCIONES = value.COD_DOC_COBRO;
					  
					  ///Cobros.Acciones = '<i class="btn glyphicon glyphicon-ok" href=/mantGestionCobros_c/CreaDocumentoCobro/'+value.COD_DOC_COBRO+'></i>';
					  Cobros.ACCIONES = '<a class="btn glyphicon glyphicon-edit" href="/mantGestionCobros_c/CreaDocumentoCobro/'+value.COD_DOC_COBRO+'"></a>'+
					  '<i class="btn glyphicon glyphicon-remove" onclick="fn_eliminar('+""+value.COD_DOC_COBRO+""+');"></i>';
					
					  //'<i class="btn glyphicon glyphicon-ok" onclick="fn_eliminar('+"'"+value.COD_DOC_COBRO+"');"+'></i>';
			        TableData.push(Cobros);
				  });
			  }
			  // $("#TabalClientes").DataTable({
			  // 			"pageLength": 5
			  // });
			  //listClientes = JSON.stringify(listClientes);
			  $('#TablaGestionCobros').dataTable().fnAddData(TableData);

                
  		}
  		,error: function(e)
        {   debugger;
            $('#processing-modal').modal('hide');
  			  $('#cuadro_paginacion').html('');
 	  		  $('#tabla').html('No existen Registros');
  	  		 // alert('Se ha producido un error al cargar ');
	     }

	});  
}


function fn_mostrar_pagina(npagina)
{ 	var Filtros = new Object();
	debugger;
	Filtros.COD_DOC_COBRO= $("#COD_DOC_COBRO").val();
    Filtros.DOC_COBRO_FECHA= $("#DOC_COBRO_FECHA").val();
    Filtros.COD_OFI= $("#COD_OFI").val();
    Filtros.COD_USU= $("#COD_USU").val();
    Filtros.COD_TIPOCOBRO= $("#COD_TIPOCOBRO").val();
    Filtros.Pagina = npagina;

   $.ajax({
		type: "POST",
		 data:{  Filtros:Filtros
			    },
  		async: true,
  		url: "/mantGestionCobros_c/obt_datos",
  		beforeSend: function(msg){
  		// AQUI TIENE QUE IR TU POPUP DONDE INICIARIA LA IMAGEN "CARGANDO ..."
  			$('#processing-modal').modal('show');      
  		},
  		success: function(objJson){
  	           var array= objJson;
               //var listpaginas=array["totalpaginas"];
               //var registro=listpaginas[0];
               var lista=array["lista"];
               tpaginas=array["totalpaginas"];
               totpaginas=tpaginas;

               $("#tpagina").val(tpaginas);
       	       $("#pactual").val(npagina);
       				
               
               	if (tpaginas >0)
          		  { var contendiopag="";
        			contendiopag="<span>Resultado:</span>";
          			contendiopag=contendiopag+"<ul class='pagination'>";
          			contendiopag=contendiopag+"<li><a  id='retro' href='#' onclick='fn_retroceder()'>&laquo; Anterior</a></li>"; 

          		   if (tpaginas<=10)
    				    { for(var x=1;x<=tpaginas;x++) 
    				      { contendiopag=contendiopag+"<li><a id='"+x+"' href='#' onclick="+"fn_mostrar_pagina('"+x+"')>"+x+"</a></li>";							   
    				      }
    				    }
    				if (tpaginas>10)
        			    {if (npagina>=1)
            			    {  var id=npagina-5;  	      
    						   for(var x=1; x<=5;x++)
        						   {   id++;
    								     contendiopag=contendiopag+"<li><a id='"+id+"'  href='#' onclick="+"fn_mostrar_pagina('"+id+"'>"+id+"</a></li>";
    							   }
    						     var id=npagina;  	      
    							 for(var x=1; x<=5;x++)
        							 {  id++;
    								    contendiopag=contendiopag+"<li><a id='"+id+"'  href='#' onclick="+"fn_mostrar_pagina('"+id+"'>"+id+"</a></li>";  
    								  } 
    						    			  
    						  }
    								
    					 }

    			   contendiopag=contendiopag+"<li><a id='sgte' href='#' onclick='fn_siguiente()'>Siguiente &raquo;</a></li>";
     			   contendiopag=contendiopag+"</ul>";
     			   $('#cuadro_paginacion').html(contendiopag);
          		  }
    			   


                if(lista.length > 0) 
          	  	 {  
                    var sb="";
                    sb=sb+" <div class='row'>";
                    sb=sb+"   <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
                    sb=sb+"     COD_DOC_COBRO";  
                    sb=sb+" 	  </div>"; 
                    sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
                    sb=sb+" 	   USU";
                    sb=sb+" 	  </div>";
                    sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
                    sb=sb+" 	    DESC_CAJA";
                    sb=sb+" 	  </div>";
                    sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
                    sb=sb+" 	    NOM_TIPOCOBRO";
                    sb=sb+" 	  </div>";
                    sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
                    sb=sb+" 	    NOMBRE CLIENTE";
                    sb=sb+" 	  </div>";			   
                    sb=sb+" </div>";		

  					   
          	  	
                    for(var i=0;i<lista.length;i++)
                    {  var fila=lista[i];
                            sb=sb+"<div class='row'>";   
                            sb=sb+"   <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'> ";
                            sb=sb+fila["COD_DOC_COBRO"].toString();
                            sb=sb+"  </div>";
                            sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:10px;'>";
                            sb=sb+fila["USU"].toString();
                            sb=sb+"   </div>";
                            sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
                            sb=sb+fila["DESC_CAJA"].toString();
                            sb=sb+"   </div>";
                            sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
                            sb=sb+fila["NOM_TIPOCOBRO"].toString();
                            sb=sb+"   </div>";
                            sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
                            sb=sb+fila["NOMBRE"].toString();
                            sb=sb+"   </div>";
                            sb=sb+"  <div class='col-xs-1'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'>";
                            sb=sb+"	<a href='/mantGestionCobros_c/CreaDocumentoCobro/"+fila['COD_DOC_COBRO'].toString()+"'>";
                            sb=sb+"	   Editar&nbsp";
                            sb=sb+"	   <img src='/public/images/EDITAR.png'>";
                            sb=sb+"	</a>"; 
                            sb=sb+"  </div>";
                            sb=sb+"  <div class='col-xs-1'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'>";
                            sb=sb+"	    <a href='#' onclick=fn_eliminar('"+fila["COD_DOC_COBRO"].toString()+"')>";
                            sb=sb+"	       Anular&nbsp";
                            sb=sb+"	      <img src='/public/images/ELIMINAR.png'>";
                            sb=sb+"	    </a>"; 
                            sb=sb+"  </div>";
                            sb=sb+"</div> ";
                        }
           	  	    	 $('#tabla').html('');
              	  	     $('#tabla').append(sb);
              	  	     seleccionar_pagina(npagina);
             	 }

               
  		}
  		,complete: function(data){
  			// AQUI TIENES QUE PONERLE FIN A LA IMAGEN "CARGANDO ..."
  			   $('#processing-modal').modal('hide');  
  			}
  		,error: function()
  		 {   
  			  $('#cuadro_paginacion').html('');
 	  		  $('#tabla').html('No existen Registros');
  	  		 // alert('Se ha producido un error al cargar ');
	     }

	});  


}


function fn_retroceder(){
   var pactual=$("#pactual").val();
   	if(pactual>1){
		pactual--;
		fn_mostrar_pagina(pactual);	
	}
}

function fn_siguiente(){
 var totpaginas= $("#tpagina").val();
 var pactual=$("#pactual").val();
	if(pactual<totpaginas){
		  pactual++;
		  fn_mostrar_pagina(pactual);  
	  }	
}

function seleccionar_pagina(npagina){
 $('#'+npagina ).attr({
	   'style':'color:WHITE; background-color: rgb(0,128,255)'
  });

}