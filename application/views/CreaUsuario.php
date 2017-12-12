<!DOCTYPE html> 
<html> 
  <head> 
    <title>Crear Usuario</title> 
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
		                 <STRONG>Registrar Usuario</STRONG>
		            </div>
				    <form id="frmCreaUsuario"  action="<?php echo base_url()?>mantUsuario_c/insertar" method="POST">
					        <div class="form-group">
						          <input id="usuario" name="usuario"   type="text" class="form-control" placeholder="Usuario" autocomplete="off">
						    </div>
						   
						    <div class="form-group">
						        <div class="row">
								        <div class="col-xs-9">
								               <input id="clave" name="clave" type="password" class="form-control" placeholder="Clave" autocomplete="off">
								        </div>
								        <a  id="ver"  class="control-label col-xs-3">
								             <img src="<?php echo base_url()?>public/images/ver1.png">  
								             ver
								        </a> 
						        </div>
						    </div>
						    
						   
						    <div class="form-group">
						       <select  id="nivel" name="nivel"  class="form-control">
								    <option value="">
											SELECCIONAR NIVEL
								     </option>
								     
										<?php foreach ($niveles as $nivel): ?>
										     <option value="<?php echo "".$nivel->COD_NIVEL?>">
											     <?php echo "".$nivel->DESC_NIVEL?>
										    </option>
							          <?php  endforeach ?>
							   </select>
						   </div>
						    
						   <div class="form-group">
						         <input id="nom_usu" name="nom_usu" type="text" class="form-control" placeholder="Nombre">
						    </div>
						    
						    <div class="form-group">
						         <input id="ape_usu" name="ape_usu"  type="text" class="form-control" placeholder="Apellido">
						    </div>
						    
						    <div class="form-group">
						        <input id="cargo" name="cargo" type="text" class="form-control" placeholder="Cargo">
						    </div>
						    
						    <div class="form-group">
							 
							<button class="btn btn-primary" type="submit"  id="Guardar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
							Guardar
						 <img src="<?php echo base_url()?>public/images/GUARDAR.png">
								</button>
							     
							   <a href="<?php echo base_url()?>ConsUsuario_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
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
               <h3>Registro de Usuario</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se registro correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantUsuario_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consUsuario_c/"  class="btn btn-danger">Cerrar</a>
           </div>
       </div>
   </div>
</div>


 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Usuario</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al registrar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantUsuario_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consUsuario_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="mostrarmodal_error_campos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Usuario</h3>
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
$("#frmCreaUsuario").validate({
        rules: {
            usuario: {
                required: true,
                lettersonly: true
            },
            clave: {
                required: true
            },
            nivel: {
                required: true
            },
            nom_usu: {
                required: true,
                lettersonly: true
            },
            ape_usu: {
                required: true,
                lettersonly: true
            },
            cargo: {
                required: true
            }
        }, messages: {
            usuario: {
                required: "Ingrese Usuario",
				lettersonly:"Ingrese Letras"
            },
            clave: {
                required: "Ingrese Clave"
            },
            nivel: {
                required: "Seleccione un nivel"
            },
            nom_usu: {
                required: "Ingrese Nombre",
                lettersonly: "Ingrese Letras"
            },
            ape_usu: {
                required: "Ingrese apellido",
                lettersonly: "Ingrese letras"
            },
            cargo: {
                required: "Ingrese Cargo"
            }
        },
        submitHandler: function (form) {
            e.preventDefault();
            insertar();
        }
	});
});

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



function validarDatos()
{
	 var usu=$("#usuario").val();
	 var clave=$("#clave").val();
	 var nivel=$("#nivel").val();
	 var nom=$("#nom_usu").val();
     var ape=$("#ape_usu").val();
     var cargo=$("#cargo").val();
     
   	var Msg="";
    if(usu==''  || usu === null)
      {     Msg = Msg + "- Ingrese Usuario </br>" ;
      }

    if(clave==''  || clave === null)
    {     Msg = Msg + "- Ingrese Clave </br>" ;
    }

    if(nivel==0 || nivel === null)
    {     Msg = Msg + "- Seleccione Nivel  </br>" ;
    }

    if(nom==''  || nom === null)
    {     Msg = Msg + "- Ingrese Nombre </br>" ;
    }

    if(ape=='' || ape === null)
    {     Msg = Msg + "- Ingrese Apellido </br>" ;
    }
   
    if(cargo=='' || cargo === null)
    {     Msg = Msg + "- Ingrese Cargo </br>" ;
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
	 var usu=$("#usuario").val();
	 var clave=$("#clave").val();
	 var nivel=$("#nivel").val();
	 var nom=$("#nom_usu").val();
     var ape=$("#ape_usu").val();
     var cargo=$("#cargo").val();

$.ajax({
	    url:  "<?php echo base_url()?>MantUsuario_c/insertar",
	    type: 'post',//metodo
	    data: { usuario:usu,
		        clave:clave,
		        nivel:nivel,
                nom_usu:nom,
                ape_usu:ape,  
		        cargo: cargo
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


$(function($){
   var $clave_val = $("#clave");
   $("#ver").on('mouseup mousedown', function(resposta1){
       if ($clave_val.attr('type') == 'password') {
			   $clave_val.attr("type", "text");
           }else{
        	   $clave_val.attr('type', 'password');
           }
        });
});




$(document).ready( function(){

	   $('#show').attr('checked', false);

	   $('#show').click(function(){

	      name = $('#password').attr('name');
	      value = $('#password').attr('value');
	      if($(this).attr('checked'))
	      {
	         html = '<input type="text" name="'+ name + '" value="' + value + '" id="password"/>';
	         $('#password').after(html).remove();
	      }
	      else
	      {
	         html = '<input type="password" name="'+ name + '" value="' + value + '" id="password"/>';
	         $('#password').after(html).remove();
	      }
	   });
	});



</script>

</body>
</html>