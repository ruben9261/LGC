<!DOCTYPE html> 
<html> 
  <head> 
    <title>Consulta de Caja</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <script type="text/javascript" src="<?php echo base_url()?>public/jquery/jquery-3.1.1.min.js"></script>
    <script  type="text/javascript"  src="<?php echo base_url()?>public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>
    
     <style type="text/css">
		.modal-static { 
		    position: fixed;
		    top: 50% !important; 
		    left: 50% !important; 
		    margin-top: -100px;  
		    margin-left: -100px; 
		    overflow: visible !important;
		}
		.modal-static,
		.modal-static .modal-dialog,
		.modal-static .modal-content {
		    width: 200px; 
		    height: 200px; 
		}
		.modal-static .modal-dialog,
		.modal-static .modal-content {
		    padding: 0 !important; 
		    margin: 0 !important;
		}
		.modal-static .modal-content .icon {
		}
		
		
		
</style>
</head> 
<body> 
	    
    <div class="container">
         <br/>   
         <P class="text-center" style="color:rgb(0,128,255);">CONSULTA CAJA</P>
         <br/>
    	<div class="well" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);">    	     
		    <form   id="frmConsCaja"> 
		          <input type="hidden" name="codigo"> 
		    	  <input type="hidden" id="tpagina">
		    	  <input type="hidden" id="pactual">
		    	
		    	  <div class="form_group">
		    	 	    <a  href="<?php echo base_url()?>login_c/regresar" class="navbar-text pull-right">
							<img src="<?php echo base_url()?>public/images/REGRESAR.png" class="dropdown">
							Regresar
					   </a>
		    	  </div>
		    	  <br/>
		    	  <div class="form_group">
				    	    <input type="text" name="btnbuscar" id="txt_ofi"  class="form-control"  placeholder="Nombre de Oficina"> 
							<input type="text" name="btnbuscar" id="txt_emp"  class="form-control"  placeholder="Nombre de Empresa">
							<input type="text" name="btnbuscar" id="txt_caja" class="form-control"  placeholder="Descripci&oacute;n de Caja">
							<br/>
						
							<button  type="button"  id="btnbuscar"   style="background-color:rgb(255,255,255);color:rgb(0,128,255); border: 1px solid rgb(0,128,255);">
							  <img src="<?php echo base_url()?>public/images/BUSCAR.png">
							  Buscar
							</button>
				 </div>
		    	</form>
		</div>
    </div>
    <div class="container">
		  <div id="cuadro_paginacion"></div>
		 
		  <div id="tabla"></div>
	</div> 
	
	 <div class="container">
		  <div id="respuesta"></div>
	</div> 
	
 
<script type="text/javascript"> 

$(function(){
$("#txt_ofi").keypress(function(e) {
   if(e.which == 13) {
         // Acciones a realizar, por ej: enviar formulario.
	    bus_Caja();
	   return false;
     }
   
  });
  
});

$(function(){
	$("#txt_emp").keypress(function(e) {
	   if(e.which == 13) {
	         // Acciones a realizar, por ej: enviar formulario.
		    bus_Caja();
		   return false;
	     }
	   
	  });
});


$(function(){
	$("#txt_caja").keypress(function(e) {
	   if(e.which == 13) {
	         // Acciones a realizar, por ej: enviar formulario.
		    bus_Caja();
		   return false;
	     }
	   
	  });
});



$(function(){
  $("#btnbuscar").click(function(){
	   bus_Caja();
	  return false;
  });
});


/*-alinear para que todo el mantenimiento sea por ajax*/
function bus_Caja()
{     
	var ofi= $("#txt_ofi").val();
    var emp= $("#txt_emp").val();
    var caj= $("#txt_caja").val();

   
   	$.ajax({
  		type: "POST",
  		data:{ oficina:ofi,
               empresa:emp,
               caja:caj, 
               pagina:-1
			 },
  		async: true,
  		url: "<?php echo base_url()?>consCaja_c/obt_datos", 
  		beforeSend: function(msg){
  		// AQUI TIENE QUE IR TU POPUP DONDE INICIARIA LA IMAGEN "CARGANDO ..."
  			$('#processing-modal').modal('show');      
  		},
  		success: function(objJson){
  	           var array= objJson;
               var listpaginas=array["totalpaginas"];
               var registro=listpaginas[0];
               var lista=array["lista"];
                 

                //alert('tpaginas'+registro["totpag"].toString());

                tpaginas=registro["totpag"].toString();
                totpaginas=tpaginas;
               // alert('tpaginas'+tpaginas);
      		    npagina=1;

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
   					   sb=sb+"   <div class='col-xs-4'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
   					   sb=sb+"      OFICINA ";  
   					   sb=sb+" 	  </div>"; 
   					   sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
   					   sb=sb+" 	   EMPRESA ";
   					   sb=sb+" 	  </div>";
   					   sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
   					   sb=sb+" 	   CAJA ";
   					   sb=sb+" 	  </div>";
   					   sb=sb+"   <div class='col-xs-4'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
   					   sb=sb+" 		    OPERACI&Oacute;N";
   					   sb=sb+" 	  </div>";				   
   					   sb=sb+" </div>";	

   					   
           	  	
            	  	       for(var i=0;i<lista.length;i++)
                          {  var fila=lista[i];
                              sb=sb+"<div class='row'>";   
                              sb=sb+"   <div class='col-xs-4'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'> ";
          	  	          	  sb=sb+fila["NOMB_OFICINA"].toString();
          	  	         	  sb=sb+"  </div>";
          	  	      	 	  sb=sb+"  <div class='col-xs-4' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
          	  	    	 	  sb=sb+fila["NOMB_EMPRESA"].toString();
          	  	    	      sb=sb+"   </div>";
          	  			 	  sb=sb+"   <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'>";
          	  			  	  sb=sb+fila["DESC_CAJA"].toString();
          	  			 	  sb=sb+"  </div>";
          	  			      sb=sb+"  <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'>";
   	                          sb=sb+"	<a href='<?php echo base_url('consCaja_c/mostrar_ver')?>"+"/"+fila['COD_CAJA'].toString()+"'>";
      	  			    	  sb=sb+"	   Ver&nbsp";
      	  					  sb=sb+"	   <img src='<?php echo base_url()?>public/images/VER.png'>";
      	  					  sb=sb+"	</a>"; 
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


function fn_mostrar_pagina(npagina)
{ var ofi= $("#txt_ofi").val();
  var emp= $("#txt_emp").val();
  var caja= $("#txt_caja").val();

	$.ajax({
		type: "POST",
		data:{ oficina:ofi,
               empresa:emp,
               caja:caja, 	
			   pagina:npagina
			 },
  		async: true,
  		url: "<?php echo base_url()?>consCaja_c/obt_datos",
  		beforeSend: function(msg){
  		// AQUI TIENE QUE IR TU POPUP DONDE INICIARIA LA IMAGEN "CARGANDO ..."
  		//	$('#processing-modal').modal('show');      
  		},
  		success: function(objJson){
  	           var array= objJson;
               var listpaginas=array["totalpaginas"];
               var registro=listpaginas[0];
               var lista=array["lista"];
               tpaginas=registro["totpag"].toString();
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
  					   sb=sb+"   <div class='col-xs-4'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
  					   sb=sb+"      OFICINA ";  
  					   sb=sb+" 	  </div>"; 
  					   sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
  					   sb=sb+" 	   EMPRESA ";
  					   sb=sb+" 	  </div>";
  					   sb=sb+" 	  <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
  					   sb=sb+" 	   CAJA ";
  					   sb=sb+" 	  </div>";
  					   sb=sb+"   <div class='col-xs-4'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
  					   sb=sb+" 		    OPERACI&Oacute;N";
  					   sb=sb+" 	  </div>";				   
  					   sb=sb+" </div>";	

  					   
          	  	
           	  	       for(var i=0;i<lista.length;i++)
                         {  var fila=lista[i];
                             sb=sb+"<div class='row'>";   
                             sb=sb+"   <div class='col-xs-4'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'> ";
         	  	          	  sb=sb+fila["NOMB_OFICINA"].toString();
         	  	         	  sb=sb+"  </div>";
         	  	      	 	  sb=sb+"  <div class='col-xs-4' style='background-color:#fff; border: 1px solid rgb(0,128,255);font-size:11px;'>";
         	  	    	 	  sb=sb+fila["NOMB_EMPRESA"].toString();
         	  	    	      sb=sb+"   </div>";
         	  			 	  sb=sb+"   <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'>";
         	  			  	  sb=sb+fila["DESC_CAJA"].toString();
         	  			 	  sb=sb+"  </div>";
         	  			      sb=sb+"  <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'>";
  	                          sb=sb+"	  <a href='<?php echo base_url('consCaja_c/mostrar_ver')?>"+"/"+fila['COD_CAJA'].toString()+"'>";
     	  			    	  sb=sb+"	     Ver&nbsp";
     	  					  sb=sb+"	     <img src='<?php echo base_url()?>public/images/VER.png'>";
     	  					  sb=sb+"	  </a>"; 
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


</script> 	
<!-- Static Modal -->
<div class="modal modal-static fade" id="processing-modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <img src="<?php echo base_url()?>public/images/cargar2.gif">
                    <h4>            Procesando... <button type="button" class="close" style="float: none;" data-dismiss="modal" aria-hidden="true">�</button></h4>
                </div>
            </div>
        </div>
    </div>
</div>
		
</body> 
</html> 