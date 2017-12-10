<!DOCTYPE html> 
<html> 
  <head> 
    <title>Editar Contacto</title> 
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
		                 <STRONG>Editar Contacto</STRONG>
		            </div>
				    <form id="frmEditarContacto"  action="<?php echo base_url()?>mantContacto_c/insertar" method="POST">
					       <div class="form-group">
						          <input id="nombre" type="text" class="form-control" placeholder="Nombre de Contacto" value="<?php echo $nombre?>" >
						   </div>
						   
						   <div class="form-group">
						          <input id="tlfn1" type="text" class="form-control" placeholder="Primer Telefono" value="<?php echo $tlfn1?>">
						   </div>
						  
						   <div class="form-group">
						          <input id="tlfn2" type="text" class="form-control" placeholder="Segundo Telefono "value="<?php echo $tlfn2?>" >
						   </div>
						  
						   <div class="form-group">
						          <input id="correo" type="text" class="form-control" placeholder="Correo" value="<?php echo $correo?>" >
						   </div>
						  
						  <div class="form-group">
						          <input id="domicilio" type="text" class="form-control" placeholder="Correo" value="<?php echo $domicilio?>" >
						   </div>
						  
						  
						  
						   <div class="form-group">
						           <input id="orden" type="text" class="form-control" placeholder="Orden" value="<?php echo $orden?>">
						   </div>
						  						   
						   <div class="form-group">
							 
							   <a class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_editar();" >
							   				Guardar
							        	<img src="<?php echo base_url()?>public/images/GUARDAR.png">
							   </a>
							     
							   <a href="<?php echo base_url()?>ConsContacto_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
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
               <h3>Edici&oacute;n de Contacto</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se edito correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantContacto_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consContacto_c/"  class="btn btn-danger">Cerrar</a>
           </div>
       </div>
   </div>
</div>


 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edici&oacute;n de Contacto</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al editar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantContacto_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consContacto_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="mostrarmodal_error_campos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edici&oacute;n de Contacto</h3>
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
 {	var v_nombre=$("#nombre").val();
 	var v_tlfn1=$("#tlfn1").val();
 	var v_tlfn2=$("#tlfn2").val();
 	var v_correo=$("#correo").val();
 	var v_domicilio=$("#domicilio").val();
 	var v_orden=$("#orden").val();
    
     var Msg="";
 	if(v_nombre==''  || v_nombre === null)
       {     Msg = Msg + "- Ingrese Nombre de Contacto </br>" ;
       }

 	if(v_tlfn1==''  || v_tlfn1 === null)
     {     Msg = Msg + "- Ingrese Primer Telefono </br>" ;
     }
    
 	if(v_tlfn2==''  || v_tlfn2 === null)
     {     Msg = Msg + "- Ingrese Segundo Telefono </br>" ;
     }

 	
 	if(v_correo==''  || v_correo === null)
    {     Msg = Msg + "- Ingrese Correo </br>" ;
    }
  
 	if(v_domicilio==''  || v_domicilio === null)
    {     Msg = Msg + "- Ingrese Domicilio </br>" ;
    }
  


 	
 	if(v_orden==''  || v_orden === null)
     {     Msg = Msg + "- Ingrese nùmero de orden de Contacto </br>" ;
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
	var cod=<?php echo $codContacto?>;
	var v_nombre=$("#nombre").val();
	var v_tlfn1=$("#tlfn1").val();
	var v_tlfn2=$("#tlfn2").val();
	var v_correo=$("#correo").val();
	var v_domicilio=$("#domicilio").val();
	var v_orden=$("#orden").val();
$.ajax({
	    url:  "<?php echo base_url()?>mantContacto_c/editar",
	    type: 'post',//metodo
	    data: { codigo:cod, 
		    	nombre: v_nombre,	
	            tlfn1:  v_tlfn1,
	            tlfn2:  v_tlfn2,
	            correo: v_correo,
	            domicilio:v_domicilio,
		    	orden: v_orden   	        
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



</script>

</body>
</html>