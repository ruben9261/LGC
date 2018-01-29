
function fn_eliminar(COD_GUIAREM) 
{  $.ajax({
		    url:  "/mantGuiaRemision_c/eliminar",
	    	type: 'post',//metodo
	    	data: { COD_GUIAREM:  COD_GUIAREM
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
	$("#btnbuscar").click(function(){
		bus_GuiRemision();
	  return false;
	});
  });
  

/*-alinear para que todo el mantenimiento sea por ajax*/
function bus_GuiRemision()
{   
	
    var Filtros = new Object();




	Filtros.FECHA_EMISION= $("#FECHA_EMISION").val();
	Filtros.FECHA_TRASLADO= $("#FECHA_TRASLADO").val();
   Filtros.NRO_COMPROBANTE= $("#NRO_COMPROBANTE").val();

	debugger;
    Filtros.Pagina = -1;
    $('#processing-modal').modal('show');
    $.ajax({
  		type: "POST",
  		data:{ Filtros:Filtros
			 },
  		url: "/mantGuiaRemision_c/obt_datos",
  		success: function(objJson){
              debugger;
              $('#processing-modal').modal('hide');
  	           var array= objJson;
               //var listpaginas=array["totalpaginas"];
               //var registro=listpaginas;
               var lista=array["lista"];
                 

                //alert('tpaginas'+registro["totpag"].toString());

                tpaginas=array["totalpaginas"];
                totpaginas=tpaginas;
               // alert('tpaginas'+tpaginas);
      		    npagina=1;

      		    $("#tpagina").val(tpaginas);
      		    $("#pactual").val(npagina);
      		
				  debugger;
      			if (tpaginas >0)
          		  { var contendiopag="";
        			contendiopag="<span>Guias de Remisión :</span><br>";
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
   	
   					   sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
 					   sb=sb+" 	   EMISION";
 					   sb=sb+" 	  </div>";
   					   sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
   					   sb=sb+" 	    TRASLADO";
   					   sb=sb+" 	  </div>";
   				       sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
					   sb=sb+" 	    NRO_COMPROBANTE";
					   sb=sb+" 	  </div>";

					   sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
					   sb=sb+" 	    RUC_EMPRESA";
					   sb=sb+" 	  </div>";  	
					   sb=sb+" 	  <div class='col-xs-4'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
					   sb=sb+" 	    Acciones";
					   sb=sb+" 	  </div>"		   
   					   sb=sb+" </div>";	
						  
								
						  
					
            	  	       for(var i=0;i<lista.length;i++)
						  {  var fila=lista[i];
							//fila["FECHA_EMISION"];
					     	//fila["FECHA_TRASLADO"];
							var fecha= fila["FECHA_EMISION"];
							var fecha2= fila["FECHA_TRASLADO"];

							var new_date = moment(fecha).format('YYYY/MM/DD');
							var new_date2 = moment(fecha2).format('YYYY/MM/DD');
							
                             sb=sb+"<div class='row'>";   
                     
          	  	          	  sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:10px;'>";
      	  	    	 	 	  sb=sb+new_date;
      	  	    	      	  sb=sb+"   </div>";
          	  	      	 	  sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
          	  	    	 	  sb=sb+new_date2;
						      sb=sb+"   </div>";
							  sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
          	  	    	 	  sb=sb+fila["NRO_COMPROBANTE"].toString();
							  sb=sb+"   </div>";
 
							  sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
							  sb=sb+fila["RUC_EMPRESA"];
						       sb=sb+"   </div>"; 
          	  	    	  	 // sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
      	  	    	 	  	 // sb=sb+fila["COD_PROD"].toString();
							//  sb=sb+"   </div>";
					          sb=sb+"  <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'>";
   	                          sb=sb+"	<a href='/mantGuiaRemision_c/mantGuiaRemision/"+fila['COD_GUIAREM'].toString()+"'>";
      	  			    	  sb=sb+"	   Editar&nbsp";
      	  					  sb=sb+"	   <img src='/public/images/EDITAR.png'>";
      	  					  sb=sb+"	</a>"; 
	   	  			 	      sb=sb+"  </div>";
	   	  			 	      sb=sb+"  <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'>";
	   	  			 	      sb=sb+"	    <a href='#' onclick=fn_eliminar('"+fila["COD_GUIAREM"].toString()+"')>";
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
	Filtros.FECHA_EMISION= $("#FECHA_EMISION").val();
	Filtros.FECHA_TRASLADO= $("#FECHA_TRASLADO").val();
	Filtros.NRO_COMPROBANTE= $("#NRO_COMPROBANTE").val();

    Filtros.Pagina = npagina;

   $.ajax({
		type: "POST",
		 data:{  Filtros:Filtros
			    },
  		async: true,
  		url: "/mantGestionPagos_c/obt_datos",
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
		
					sb=sb+" 	  <div class='col-xs-1'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
				  sb=sb+" 	   EMISION";
				  sb=sb+" 	  </div>";
					sb=sb+" 	  <div class='col-xs-1'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
					sb=sb+" 	    TRASLADO";
					sb=sb+" 	  </div>";
					sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
				 sb=sb+" 	    NRO_COMPROBANTE";
				 sb=sb+" 	  </div>";

				 sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
				 sb=sb+" 	    RUC_EMPRESA";
				 sb=sb+" 	  </div>";  
				 sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
				 sb=sb+" 	    Acciones";
				 sb=sb+" 	  </div>"; 			   
					sb=sb+" </div>";		

  					   
          	  	
                    for(var i=0;i<lista.length;i++)
                    {  var fila=lista[i];
						//fila["FECHA_EMISION"];
					     	//fila["FECHA_TRASLADO"];
							 var fecha= fila["FECHA_EMISION"];
							 var fecha2= fila["FECHA_TRASLADO"];
 
							 var new_date = moment(fecha).format('YYYY/MM/DD');
							 var new_date2 = moment(fecha2).format('YYYY/MM/DD');
							 
							  sb=sb+"<div class='row'>";   
	
									 sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:10px;'>";
									 sb=sb+new_date;
									 sb=sb+"   </div>";
									  sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
									sb=sb+new_date2;
							   sb=sb+"   </div>";
							   sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
									sb=sb+fila["NRO_COMPROBANTE"].toString();
							   sb=sb+"   </div>";
					 
							   sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
							   sb=sb+fila["RUC_EMPRESA"];
								sb=sb+"   </div>"; 
									// sb=sb+"  <div class='col-xs-2' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
									 // sb=sb+fila["COD_PROD"].toString();
							 //  sb=sb+"   </div>";
							   sb=sb+"  <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'>";
								  sb=sb+"	<a href='/mantGuiaRemision_c/mantGuiaRemision/"+fila['COD_GUIAREM'].toString()+"'>";
								   sb=sb+"	   Editar&nbsp";
								   sb=sb+"	   <img src='/public/images/EDITAR.png'>";
								   sb=sb+"	</a>"; 
									 sb=sb+"  </div>";
									 sb=sb+"  <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'>";
									 sb=sb+"	    <a href='#' onclick=fn_eliminar('"+fila["COD_GUIAREM"].toString()+"')>";
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