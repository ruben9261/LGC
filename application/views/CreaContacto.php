<!DOCTYPE html> 
<html> 
  <head> 
    <title>Crear Contacto</title> 
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
		                 <STRONG>Registrar Contacto</STRONG>
		            </div>
				    <form id="frmCreaContacto"  action="<?php echo base_url()?>mantContacto_c/insertar" method="POST">
					       <div class="form-group">
						          <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre de Contacto" >
						   </div>
						  
						   <div class="form-group">
						          <input id="tlfn1" name="tlfn1" type="text" class="form-control" placeholder="Primer Telefono" >
						   </div>
						  
						   <div class="form-group">
						          <input id="tlfn2" name="tlfn2" type="text" class="form-control" placeholder="Segundo Telefono " >
						   </div>
						  
						   <div class="form-group">
						          <input id="correo" name="correo" type="text" class="form-control" placeholder="Correo" >
						   </div>
						   
						   <div class="form-group">
						          <input id="domicilio" name="domicilio" type="text" class="form-control" placeholder="Domicilio" >
						   </div>
						   
						  
						   <div class="form-group">
						           <input id="orden" name="orden" type="text" class="form-control" placeholder="Orden" >
						   </div>
						  
						   <div class="form-group">
							 
						   <button class="btn btn-primary" type="submit"  id="Guardar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
						   Guardar
						<img src="<?php echo base_url()?>public/images/GUARDAR.png">
							   </button>
								     
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
               <h3>Registro de Contacto</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se registro correctamente 
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
                <h3>Registro de Contacto</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al registrar la informaci&oacute;n
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
                <h3>Registro de Contacto</h3>
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




<script type="text/javascript" src="/public/jquery/jquery.validate.js"></script>
<script  type="text/javascript"> 
jQuery.validator.addMethod("decimal", function(value, element) {
    return this.optional(element) || /^\d{0,10}(\.\d{0,2})?$/i.test(value);
}, "You must include two decimal places");
jQuery.validator.addMethod("lettersonly", function(value, element) {
return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Only alphabetical characters");
$(function () {
   $.validator.setDefaults({
	   errorClass: 'help-block',
	   highlight: function (element) {
		   // $(element)
		   //     .closest('.form-group')
		   //     .addClass('has-error');
		   $(element).parent().removeClass('has-success').addClass('has-error');
	   },
	   unhighlight: function (element) {
		   // $(element)
		   //     .closest('.form-group')
		   //     .removeClass('has-error');
		   $(element).parent().removeClass('has-error').addClass('has-success');
	   },
	   errorPlacement: function (error, element) {
		   if (element.prop('type') === 'checkbox') {
			   error.insertAfter(element.parent());
		   } else {
			   error.insertAfter(element);
		   }
	   }
   });



});

$( "#Guardar" ).click(function( e ) {
$("#frmCreaContacto").validate({
        rules: {
            nombre: {
                required: true,
				lettersonly:true
            },tlfn1: {
                required: true,
				number:true
            },tlfn2: {
                required: true,
				number:true
            },correo: {
                required: true,
				email:true
            },domicilio: {
                required: true
            },orden: {
                required: true
            }
        }, messages: {
            nombre: {
                required: "Ingrese Nombre",
				lettersonly:"Ingrese Letras"
            },tlfn1: {
                required: "Ingrese Telefono 1",
				number:"Ingrese Digitos"
            },tlfn2: {
                required: "Ingrese Telefono 2",
				number:"Ingrese Digitos"
            },correo: {
                required: "Ingrese Correo",
				email:"Ingrese Correo Valido"
            },domicilio: {
                required: "Ingrese Domicilio"
            },orden: {
                required: "Ingrese Orden"
            }
        },
        submitHandler: function (form) {
            e.preventDefault();
            insertar();
        }
	});
});

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
    {     Msg = Msg + "- Ingrese n�mero de orden de Contacto </br>" ;
    }
    return Msg;
}


function guardar()
{ var msg=validarDatos();
  if (msg=='')
    { insertar(); }
  else
    { $("#mensaje").html(msg);
	  $("#mostrarmodal_error_campos").modal("show");
    }	  

}



function insertar()
{ 
	var v_nombre=$("#nombre").val();
	var v_tlfn1=$("#tlfn1").val();
	var v_tlfn2=$("#tlfn2").val();
	var v_correo=$("#correo").val();
	var v_domicilio=$("#domicilio").val();
	var v_orden=$("#orden").val();
	

$.ajax({
	    url:  "<?php echo base_url()?>mantContacto_c/insertar",
	    type: 'post',//metodo
	    data: { nombre:    v_nombre,	
                tlfn1:     v_tlfn1,
                tlfn2:     v_tlfn2,
                correo:    v_correo,
                domicilio: v_domicilio,
		    	orden:     v_orden        
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