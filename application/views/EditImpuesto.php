<!DOCTYPE html> 
<html> 
  <head> 
    <title>Editar Impuesto</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <script type="text/javascript" src="<?php echo base_url()?>public/jquery/jquery-3.1.1.min.js"></script>
    <script  type="text/javascript"  src="<?php echo base_url()?>public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>
</head>

 

<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 45%; height:50%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Editar Impuesto</STRONG>
		            </div>
				    <form id="frmEditarImpuesto"  action="<?php echo base_url()?>mantImpuesto_c/insertar" method="POST">
					       
					       <div class="form-group">
						          <input id="nombre" type="text" class="form-control" placeholder="Nombre de Impuesto" value="<?php echo $nombre?>">
						   </div>
						   
						   <div class="form-group">
						          <input id="abreviatura" type="text" class="form-control" placeholder="Abreviatura" value="<?php echo $abrev?>" >
						   </div>
						   
						   <div class="form-group">
						          <input id="valor" type="text" class="form-control" placeholder="Valor" value="<?php echo $valor?>">
						   </div>
						   
					       
						   <div class="form-group">
							 
							   <a class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_editar();" >
							   				Guardar
							        	<img src="<?php echo base_url()?>public/images/GUARDAR.png">
							   </a>
							     
							   <a href="<?php echo base_url()?>ConsImpuesto_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
							        Cancelar
							        <img src="<?php echo base_url()?>public/images/CANCELAR.png">
							   </a>
						 
						  </div>   
			 </form>
   </div>

   <div class="modal fade" id="mostrarmodal_ok" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
               <h3>Edici&oacute;n de Impuesto</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se edito correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantImpuesto_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consImpuesto_c/"  class="btn btn-danger">Cerrar</a>
           </div>
       </div>
   </div>
</div>


 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edici&oacute;n de Impuesto</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al editar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantImpuesto_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consImpuesto_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="mostrarmodal_error_campos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edici&oacute;n de Impuesto</h3>
           </div>
           <div class="modal-body">
          		 
          		<div class="alert alert-warning">
          		    Alerta<br/>
          		    <div id="mensaje"></div>
          		</div>
           </div>
      </div>
   </div>
</div>




 <script  type="text/javascript"> 


 function validarDatos()
 {	 var v_nombre=$("#nombre").val();
     var v_abrev=$("#abreviatura").val();
     var v_valor=$("#valor").val();

 	var Msg="";
 	
 	if(v_nombre==''  || v_nombre === null)
       {     Msg = Msg + "- Ingrese Nombre de Impuesto </br>" ;
       }

 	if( v_abrev==''  ||  v_abrev === null)
     {     Msg = Msg + "- Ingrese Abreviatura de Impuesto </br>" ;
     }

 	if(v_valor==''  || v_valor === null)
     {     Msg = Msg + "- Ingrese Valor de Impuesto </br>" ;
     }

     return Msg;
 }


function fn_editar()
{ var msg=validarDatos();
 
 /* alert('msg'+msg);*/
if (msg=='')
  { editar();   
  }
  else
  {   
	  $("#mensaje").html(msg);
	  $("#mostrarmodal_error_campos").modal("show");
   }	  

}



function editar()
{ 
	 var cod=<?php echo $codimp?>;
	 var v_nombre=$("#nombre").val();
     var v_abrev=$("#abreviatura").val();
     var v_valor=$("#valor").val();
    
$.ajax({
	    url:  "<?php echo base_url()?>mantImpuesto_c/editar",
	    type: 'post',//metodo
	    data: { codigo:cod, 
		        nombre:v_nombre,
                abreviatura:v_abrev,
                valor:v_valor
               }, //parametros
	   success: function(respuesta) { 
		       if(respuesta==1)
		       {  $("#mostrarmodal_ok").modal("show");
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



function inicializa_combo(id)
{	var combo=document.getElementById(id);
    combo.selectedIndex=0;
}


function fn_procesar(op,cod) 
{  	$("#operacion").val(op);
	$("#codigo").val(cod);
    $("#frmCreaConfigAcceso").submit();
}

/*insert por ajax*/

</script>

</body>
</html>