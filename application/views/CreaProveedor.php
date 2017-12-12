<!DOCTYPE html> 
<html> 
  <head> 
    <title>Crear Proveedor</title> 
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
		                 <STRONG>Registrar Proveedor</STRONG>
		            </div>
				    <form id="frmCreaProveedor"  action="<?php echo base_url()?>mantProveedor_c/insertar" method="POST">
					        <div class="form-group">
						          <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" >
						    </div>
						   
						    <div class="form-group">
						         <input id="documento" name="documento" type="text" class="form-control" placeholder="Documento">
						    </div>
						   
						    <div class="form-group">
						       <select  id="oferta" name="oferta"  class="form-control">
								    <option value="">
											SELECCIONAR OFERTA
								     </option>
								     
										<?php foreach ($ofertas as $oferta): ?>
										     <option value="<?php echo "".$oferta->COD_OFER?>">
											     <?php echo "".$oferta->NOMB_OFERTA?>
										    </option>
							          <?php  endforeach ?>
							   </select>
						   </div>
						    
						   <div class="form-group">
						         <input id="tlfn1"  name="tlfn1"   type="text" class="form-control" placeholder="Primer Telefono">
						    </div>
						    <br>
						    <div class="form-group">
						         <input id="tlfn2"    name="tlfn2"   type="text" class="form-control" placeholder="Segundo Telefono">
						    </div>
                            <br>
						    <div class="form-group">
						        <input id="correo1"  name="correo1"   type="text" class="form-control" placeholder="Primer Correo">
						    </div>
                            <br>
						    <div class="form-group">
						         <input  id="correo2"   name="correo2"   type="text" class="form-control" placeholder="Segundo Correo">
						    </div>
                            <br>
						    <div class="form-group">
						        <textarea id="comentario" name="comentario" rows="10" cols="80" class="form-control" placeholder="Comentario"></textarea>
						        <!--
						         <input  type="tel" class="form-control" placeholder="Comentario">
						        
						          -->
						         
						    </div>
						  
						  <div class="form-group">
							 
                          <button class="btn btn-primary" type="submit"  id="Guardar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
						  Guardar
					   <img src="<?php echo base_url()?>public/images/GUARDAR.png">
			                  </button>
							     
							   <a href="<?php echo base_url()?>ConsProveedor_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
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
               <h3>Registro de Proveedor</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se registro correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantProveedor_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
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
                <h3>Registro de Proveedor</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al registrar la informaci&oacute;n
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
                <h3>Registro de Proveedor</h3>
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
$("#frmCreaProveedor").validate({
        rules: {
            nombre: {
                required: true,
                lettersonly: true
            },
            documento: {
                required: true
            },
            oferta: {
                required: true
            },
            tlfn1: {
                required: true,
                number: true
            },
            tlfn2: {
                required: true,
                number: true
            },
            correo1: {
                required: true,
                email: true
            },
            correo2: {
                required: true,
                email: true
            },
            comentario: {
                required: true
            }
        }, messages: {
            nombre: {
                required: "Ingrese Nombre",
                lettersonly: "Ingrese Letras"
            },
            documento: {
                required: "Seleccione Documento"
            },
            oferta: {
                required: "Seleccione Oferta"
            },
            tlfn1: {
                required: "Ingrese Telf 1",
                number: "Ingrese Digitos"
            },
            tlfn2: {
                required: "Ingrese Telf 2",
                number: "Ingrese Digitos"
            },
            correo1: {
                required: "Ingrese Correo 1",
                email: "Ingrese Correo"
            },
            correo2: {
                required: "Ingrese Correo 2",
                email: "Ingrese Correo"
            },
            comentario: {
                required: "Ingrese Comentario"
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
	var nomb= $("#nombre").val();
	var docu= $("#documento").val();
	var ofert= $("#oferta").val();
    var tlf1= $("#tlfn1").val();
    var tlf2= $("#tlfn2").val();
    var cor1= $("#correo1").val();
    var cor2= $("#correo2").val();
    var com=$("#comentario").val();
	

$.ajax({
	    url:  "<?php echo base_url()?>MantProveedor_c/insertar",
	    type: 'post',//metodo
	    data: { nombre:  nomb,
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