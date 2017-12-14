<!DOCTYPE html> 
<html> 
  <head> 
    <title>Crear Banco</title> 
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
		                 <STRONG>Registrar Banco</STRONG>
		            </div>
				    <form id="frmCreaBanco">
					       <div class="form-group">
						          <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre de Banco" >
						   </div>
						   
						   <div class="form-group">
							 
                           <button class="btn btn-primary" type="submit"  id="Guardar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
						   Guardar
						<img src="<?php echo base_url()?>public/images/GUARDAR.png">
							   </button>
							     
							   <a href="<?php echo base_url()?>ConsBanco_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
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
               <h3>Registro de Banco</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se registro correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantBanco_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consBanco_c/"  class="btn btn-danger">Cerrar</a>
           </div>
       </div>
   </div>
</div>


 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Banco</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al registrar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantBanco_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consBanco_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="mostrarmodal_error_campos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Banco</h3>
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
$("#frmCreaBanco").validate({
        rules: {
            nombre: {
                required: true
            }
        }, messages: {
            nombre: {
                required: "Ingrese Nombre"
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
	var Msg="";
	if(v_nombre==''  || v_nombre === null)
      {     Msg = Msg + "- Ingrese Nombre de Banco </br>" ;
      }

    return Msg;
}


function guardar()
{ var msg=validarDatos();
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
	var v_nombre=$("#nombre").val();
	

$.ajax({
	    url:  "<?php echo base_url()?>mantBanco_c/insertar",
	    type: 'post',//metodo
	    data: { nombre:  v_nombre		        
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