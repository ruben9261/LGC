<!DOCTYPE html> 
<html> 
  <head> 
    <title>Editar Producto</title> 
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
		                 <STRONG>Editar Producto</STRONG>
		            </div>
				    <form id="frmEditProducto">
					        
					         <div class="form-group">
						          <input id="descripcion" type="text" class="form-control" placeholder="Descripcion" value="<?php echo $descripcion?>">
						    </div>
						   
					
						    <div class="form-group">
						       <select  id="tipo_prod" name="tipo_prod"  class="form-control">
								    <option value="0">
											SELECCIONAR TIPOS
								     </option>
								     
										<?php foreach ($tipos as $tipo): ?>
										     <option value="<?php echo "".$tipo->CLAVE?>">
											     <?php echo "".$tipo->VALOR?>
										    </option>
							          <?php  endforeach ?>
							   </select>
							    <script type="text/javascript">
										         $("#tipo_prod option[value="+"<?php echo $codtipo?>" +"]").attr("selected",true); 
								</script>     
							   
						   </div>
						    
					     	<div class="form-group">
						         <input id="precio" type="text" class="form-control" placeholder="Precio" value="<?php echo $precio?>">
						    </div>
						   
						  
						   <div class="form-group">
							 
							   <a class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);"  onClick="fn_editar();" >
							   		Guardar
							        <img src="<?php echo base_url()?>public/images/GUARDAR.png">
							   </a>
							     
							   <a href="<?php echo base_url()?>ConsProducto_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
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
               <h3>Edici&oacute;n de Producto</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se edito correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantProducto_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consProducto_c/"  class="btn btn-danger">Cerrar</a>
           </div>
       </div>
   </div>
</div>


 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edici&oacute;n de Producto</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al editar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantProducto_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consProducto_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="mostrarmodal_error_campos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edici&oacute;n de Producto</h3>
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
 {   var v_desc=$("#descripcion").val();
 	 var v_tipo=$("#tipo_prod").val();
 	 var v_precio=$("#precio").val();
   
 	 var Msg="";
     if(v_desc==''  || v_desc === null)
       {     Msg = Msg + "- Ingrese Descripcion </br>" ;
       }

     if(v_tipo==0  || v_tipo === null)
     {     Msg = Msg + "- Seleccione Tipo </br>" ;
     }

     if(v_precio==''  ||  v_precio === null)
     {     Msg = Msg + "- Ingrese Precio </br>" ;
     }

      return Msg;
      
 }




 
function fn_editar()
{
	var msg=validarDatos();
	  if (msg=='')
	  { editar(); }
	  else
	  {   
		  $("#mensaje").html(msg);
		  $("#mostrarmodal_error_campos").modal("show");
	   }	  
	  
}




function editar()
{   var cod=<?php echo $codprod?>;
    var v_desc=$("#descripcion").val();
    var v_tipo=$("#tipo_prod").val();
    var v_precio=$("#precio").val();
  
$.ajax({
	    url:  "<?php echo base_url()?>mantProducto_c/editar",
	    type: 'post',//metodo
	    data: { codigo:cod,
		        tipo:  v_tipo,
		        descripcion:v_desc,
		        precio:  v_precio
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