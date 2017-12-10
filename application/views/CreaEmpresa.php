<!DOCTYPE html> 
<html> 
  <head> 
    <title>Crear Empresa</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <script type="text/javascript" src="<?php echo base_url()?>public/jquery/jquery-3.1.1.min.js"></script>
    <script  type="text/javascript"  src="<?php echo base_url()?>public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>
    <<script type="text/javascript" src="<?php echo base_url()?>public/jquery.validate"></script>
</head>
<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 45%; height:50%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Registrar Empresa</STRONG>
		            </div>
				    <form id="frmCreaEmpresa"  action="<?php echo base_url()?>mantEmpresa_c/insertar" method="POST">
					        <div class="form-group">
						          <input id="nombre" type="text" class="form-control" placeholder="Nombre" >
						    </div>
						   
						    <div class="form-group">
						         <input id="domicilio" type="text" class="form-control" placeholder="Domicilio Fiscal">
						    </div>
						   
						   <div class="form-group">
						         <input id="ruc" type="text" class="form-control" placeholder="Ruc">
						    </div>
						   
						    
						   <div class="form-group">
						         <input id="tlfn" type="text" class="form-control" placeholder="Tele&acute;fono">
						    </div>
						    
						    <div class="form-group">
						        <input id="correo" type="text" class="form-control" placeholder="Correo">
						    </div>
						    
						    
						   <div class="form-group">
							 
							   <a class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="guardar();" >
							   				Guardar
							        	<img src="<?php echo base_url()?>public/images/GUARDAR.png">
							   </a>
							     
							   <a href="<?php echo base_url()?>ConsEmpresa_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
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
               <h3>Registro de Empresa</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se registro correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantEmpresa_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consEmpresa_c/"  class="btn btn-danger">Cerrar</a>
           </div>
       </div>
   </div>
</div>


 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Empresa</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al registrar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantEmpresa_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consEmpresa_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="mostrarmodal_error_campos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Empresa</h3>
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
	 var domi=$("#domicilio").val();
	 var ruc=$("#ruc").val();
     var tlf=$("#tlfn").val();
     var cor=$("#correo").val();
    
	var Msg="";
    if(nomb==''  || nomb === null)
      {     Msg = Msg + "- Ingrese Nombre </br>" ;
      }

    if(domi==''  || domi === null)
    {     Msg = Msg + "- Ingrese Domicilio Fiscal </br>" ;
    }

    if(ruc=='' || ruc === null)
    {     Msg = Msg + "- Seleccione Ruc  </br>" ;
    }

    if(tlf==''  || tlf === null)
    {     Msg = Msg + "- Ingrese  Telefono </br>" ;
    }
   
    if(cor=='' || cor === null)
    {     Msg = Msg + "- Ingrese Correo </br>" ;
    }

    return Msg;
     
}


function guardar(){ 
var msg=validarDatos();
 /* alert('msg'+msg);*/
if (msg=='')
  { insertar();   
  }
  else
  {   
	  $("#mensaje").html(msg);
	  $("#mostrarmodal_error_campos").modal("show");
   }	  

}

function insertar()
{ 
	var nomb= $("#nombre").val();
	var domi= $("#domicilio").val();
	var ruc= $("#ruc").val();
    var tlf= $("#tlfn").val();
    var cor= $("#correo").val();
   
	

$.ajax({
	    url:  "<?php echo base_url()?>MantEmpresa_c/insertar",
	    type: 'post',//metodo
	    data: { nombre:  nomb,
		        domicilio:domi,
		        ruc:  ruc,
                tlfn:   tlf,
                correo: cor		        
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