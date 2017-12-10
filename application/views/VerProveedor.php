<!DOCTYPE html> 
<html> 
  <head> 
    <title>Ver Proveedor</title> 
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
		                 <STRONG>Ver Proveedor</STRONG>
		            </div>
				    <form id="frmVerProveedor">
				           <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">NOMBRE</span></h4>
						         <label class="form-control"  ><?php echo $nombre?></label>
						     
						    </div>
						    
						   <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">DOCUMENTO</span></h4>
						         <label class="form-control"  ><?php echo $documento?></label>
						     
						    </div>
						   <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">OFERTA</span></h4>
						         <label class="form-control"  ><?php echo $oferta?></label>
						     
						    </div>
						   
						   <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">PRIMER TEL&Eacute;FONO</span></h4>
						         <label class="form-control"  ><?php echo $tlfn1?></label>
						     
						    </div>
						   
						   
						   <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">SEGUNDO TEL&Eacute;FONO</span></h4>
						         <label class="form-control"  ><?php echo $tlfn2?></label>
						     
						    </div>
						    
						     <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">PRIMER CORREO</span></h4>
						         <label class="form-control"  ><?php echo $correo1?></label>
						     
						    </div>
						    
						    
						    <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">SEGUNDO CORREO</span></h4>
						         <label class="form-control"  ><?php echo $correo2?></label>
						     
						    </div>
						    
						    <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">COMENTARIO</span></h4>
						         <label class="form-control"  ><?php echo $comentario?></label>
						     
						    </div>
						    
						   <div class="form-group">
							 
							  <a href="<?php echo base_url()?>ConsProveedor_c/mostrar_Consulta" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
							        Regresar
							        <img src="<?php echo base_url()?>public/images/REGRESAR.png" class="dropdown">
							   </a>
							</div>   
			 </form>
   </div>

   <div class="modal fade" id="mostrarmodal_ok" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
               <h3>Edici&oacute;n de Proveedor</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se edito correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>mantProveedor_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consProveedor_c/"  class="btn btn-danger">Cerrar</a>
           </div>
       </div>
   </div>
</div>


 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edici&oacute;n de Proveedor</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al editar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantProveedor_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consProveedor_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="mostrarmodal_error_campos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edici&oacute;n de Proveedor</h3>
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
{
	 var nomb=$("#nombre").val();
	 var docu=$("#documento").val();
	 var ofert=$("#oferta").val();
     var tlf1=$("#tlfn1").val();
     var tlf2=$("#tlfn2").val();
     var cor1=$("#correo1").val();
     var cor2=$("#correo2").val();
     var com=$("#comentario").val();

	var Msg="";
    if(nomb==''  || nomb === null)
      {     Msg = Msg + "- Ingrese Nombre </br>" ;
      }

    if(docu==''  || docu === null)
    {     Msg = Msg + "- Ingrese Documento </br>" ;
    }

    if(ofert==0 || ofert === null)
    {     Msg = Msg + "- Seleccione Oferta  </br>" ;
    }

    if(tlf1==''  || tlf1 === null)
    {     Msg = Msg + "- Ingrese Primer Telefono </br>" ;
    }

    if(tlf2=='' || tlf2 === null)
    {     Msg = Msg + "- Ingrese Segundo Telefono </br>" ;
    }
   
    if(cor1=='' || cor1 === null)
    {     Msg = Msg + "- Ingrese Primer Correo </br>" ;
    }

    if(cor2=='' || cor2 === null)
    {     Msg = Msg + "- Ingrese Segundo Correo </br>" ;
    }
   
    if(com=='' || com === null)
    {     Msg = Msg + "- Ingrese Comentario </br>" ;
    }
     return Msg;
     
}


function fn_editar()
{ var msg=validarDatos();
  if (msg=='')
  { editar(); }
  else
  {   
	  $("#mensaje").html(msg);
	  $("#mostrarmodal_error_campos").modal("show");
   }	  

}



function editar()
{   var cod=<?php echo $codprov?>;
	var nomb= $("#nombre").val();
	var docu= $("#documento").val();
	var ofert= $("#oferta").val();
	var tlf1= $("#tlfn1").val();
	var tlf2= $("#tlfn2").val();
	var cor1= $("#correo1").val();
	var cor2= $("#correo2").val();
	var com=$("#comentario").val();
  
$.ajax({
	    url:  "<?php echo base_url()?>mantProveedor_c/editar",
	    type: 'post',//metodo
	    data: { cod_prov:cod,
		        nombre:  nomb,
		        documento:docu,
		        oferta:  ofert,
	            tlfn1:   tlf1,
	            tlfn2:   tlf2,  
		        correo1: cor1,
		        correo2: cor2,
				comentario:com		
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