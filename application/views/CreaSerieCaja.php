<!DOCTYPE html> 
<html> 
  <head> 
    <title>Crear Serie Caja</title> 
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
		                 <STRONG>Registrar Serie Caja</STRONG>
		            </div>
				    <form id="frmCreaSerie">
					       
					        <div class="form-group">
						       <select  id="caja" name="caja"  class="form-control">
								    <option value="">
											SELECCIONAR CAJA
								     </option>
								     
										<?php foreach ($cajas as $caja): ?>
										     <option value="<?php echo "".$caja->COD_CAJA?>">
											     <?php echo "".$caja->VALOR?>
										    </option>
							          <?php  endforeach ?>
							   </select>
						   </div>
						    
						   <div class="form-group">
						         <input id="serie" name="serie" type="text" class="form-control" placeholder="Serie">
						    </div>
						    
						    <div class="form-group">
						         <input id="numero"   name="numero" type="text" class="form-control" placeholder="N&uacute;mero">
						    </div>
						   
						   <div class="form-group">
							   
						   <button class="btn btn-primary" type="submit"  id="Guardar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
						   Guardar
						<img src="<?php echo base_url()?>public/images/GUARDAR.png">
							   </button>
							     
							   <a href="<?php echo base_url()?>ConsSerieCaja_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
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
               <h3>Registro de Serie</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se registro correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantSerieCaja_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consSerie_c/"  class="btn btn-danger">Cerrar</a>
           </div>
       </div>
   </div>
</div>


 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Serie</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al registrar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantSerieCaja_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consSerieCaja_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="mostrarmodal_error_campos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Serie</h3>
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
$("#frmCreaSerie").validate({
        rules: {
            caja: {
                required: true
            },
            serie: {
                required: true
            },
            numero: {
                required: true,
                number: true
            }
        }, messages: {
            caja: {
                required: "Seleccione Caja",
               
            },
            serie: {
                required: "Ingrese Serie"
            },
            numero: {
                required: "Ingrese Numero",
                number: "Ingrese Digitos"
            }
        },
        submitHandler: function (form) {
            e.preventDefault();
            insertar();
        }
	});
});


function validarDatos()
{
	 var v_caja=$("#caja").val();
	 var v_serie=$("#serie").val();
	 var v_numero=$("#numero").val();
     
	var Msg="";
    if(v_caja==0  || v_caja === null)
      {     Msg = Msg + "- Seleccione Caja </br>" ;
      }

    if(v_serie==''  || v_serie === null)
    {     Msg = Msg + "- Ingrese Serie </br>" ;
    }

    if(v_numero=='' || v_numero === null)
    {     Msg = Msg + "- Ingrese n&uacuet;mero  </br>" ;
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
{ var v_caja=$("#caja").val();
  var v_serie=$("#serie").val();
  var v_numero=$("#numero").val();

$.ajax({
	    url:  "<?php echo base_url()?>MantSerieCaja_c/insertar",
	    type: 'post',//metodo
	    data: { caja:   v_caja,
		        serie:  v_serie,
		        numero: v_numero		        
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