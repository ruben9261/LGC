<!DOCTYPE html> 
<html> 
  <head> 
    <title>Editar Configuraci&oacute;n de Caja </title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <script type="text/javascript" src="<?php echo base_url()?>public/jquery/jquery-3.1.1.min.js"></script>
    <script  type="text/javascript"  src="<?php echo base_url()?>public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>
</head>

 

<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 60%; height:50%;">
		            <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Editar Configuraci&oacute;n de Caja</STRONG>
		            </div>
				   <form  id="frmCreaConfigCaja"  action="<?php echo base_url()?>mantConfigCaja_c/insertar" method="POST"> 
						       <div class="form-group">
								       <select class="form-control" id="usuario" name="usuario" >
								    	         <option value="0">
										                 SELECCIONAR USUARIO
										         </option>
										         <?php foreach ($usuarios as $usuario): ?>
										            <option value="<?php echo "".$usuario->clave?>">
										                    <?php echo "".$usuario->valor?>
										            </option>
										         <?php  endforeach ?>
								       </select>
								         <script type="text/javascript">
							         		 $("#usuario option[value="+"<?php echo $codusuario?>" +"]").attr("selected",true);
										</script>   
							           
							  </div>
							  <div class="form-group">
								     <select class="form-control" id="caja" name="caja">
								          <option value="0">
								                        SELECCIONAR CAJA
										   </option>
								    	    <?php foreach ($cajas as $campos): ?>
								                <option value="<?php echo "".$campos->COD_CAJA?>">
								                    <?php echo "".$campos->CAJA?>
								                </option>
								             <?php  endforeach ?>
								      </select>
								        <script type="text/javascript">
							        		  $("#caja option[value="+"<?php echo $codcaja?>" +"]").attr("selected",true);
										</script>   
								      
							  </div>
							   <div class="form-group">
							       <a class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="guardar();" >
							   				Guardar
							        	    <img src="<?php echo base_url()?>public/images/GUARDAR.png">
							        </a>
							     
						            <a href="<?php echo base_url()?>consConfigCaja_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
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
               <h3>Edici&oacute;n de configuraci&oacute;n de Caja</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se Edito correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantConfigCaja_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consConfigCaja_c/"  class="btn btn-danger">Cerrar</a>
           </div>
       </div>
   </div>
</div>


 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edici&oacute;n de configuraci&oacute;n de Caja</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al Editar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantConfigCaja_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consConfigCaja_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="mostrarmodal_error_campos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edici&oacute;n de configuraci&oacute;n de Caja</h3>
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
{	 var v_usu= $("#usuario").val();
	 var v_caja= $("#caja").val();
	

	var Msg="";
    if(v_usu==0)
      {     Msg = Msg + "- seleccione Usuario </br>" ;
      }

    if(v_caja==0)
    {     Msg = Msg + "- seleccione Caja </br>" ;
    }
    return Msg;
}


function guardar()
{ var msg=validarDatos();
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
{  var cod=<?php echo $cod_conf_caja?>;
   var v_usu= $("#usuario").val();
   var v_caja= $("#caja").val();

   $.ajax({
	    url:  "<?php echo base_url()?>mantConfigCaja_c/editar",
	    type: 'post',//metodo
	    data: { codigo:  cod, 
		        usuario: v_usu,
		        caja:    v_caja 
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



</script>

</body>
</html>