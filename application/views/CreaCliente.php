<!DOCTYPE html> 
<html> 
  <head> 
    <title>Crear Cliente</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <script type="text/javascript" src="<?php echo base_url()?>public/jquery/jquery-3.1.1.min.js"></script>
    <script  type="text/javascript"  src="<?php echo base_url()?>public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>

    <style>
	#content{
		position: relative;
		min-height: 50%;
		width: 100%;
		top: 22%;
		font-size:12px;
	   text-align: center;
		
	}

	.selected{
		cursor: pointer;
	}
	.selected:hover{
		background-color: #0585C0;
		color: white;
	}
	.seleccionada{
		background-color: #0585C0;
		color: white;
	}
   </style>
 
</head>




<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 70%; height:65%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Registrar Cliente</STRONG>
		            </div>
				    <form id="frmCreaCliente" >
					         <div class="form-group">
								         <div id="row">
									               <div class='col-xs-6' >
													          <select  id="contacto" name="contactos"  class="form-control">
																       <option value="">
																	      SELECCIONAR CONTACTO
																   </option>
																	<?php foreach ($contactos as $contacto): ?>
																	      <option value="<?php echo "".$contacto->CLAVE?>">
																						 <?php echo "".nl2br($contacto->VALOR);?>
																		  </option>
																     <?php  endforeach ?>
														   </select>
												  
												   </div>
												   
												   <div class='col-xs-2' >
												        <!-- <button type="submit"  id="crea_contact" class="btn btn-default"   >Crear</button>  --> 
												           <a id="crea_contact" href="<?php echo base_url()?>ConsContacto_c/" class="btn btn-primary"   style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
														      Crear
														  </a>
												  </div>
												   
												   <div class='col-xs-2' >
												      <!--    <button id="add_contact" class="btn btn-default">Agregar</button>  -->   
												        <a  id="add_contact" href="#" class="btn btn-primary"  id="crea_contact" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
														     Agregar
														</a>
												   </div>
												   
												   <div class='col-xs-2'>
												    <!-- <button id="del_contact" class="btn btn-default">Eliminar</button>-->
												 	     <a  id="del_contact" href="#" class="btn btn-primary"  id="crea_contact" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
															   Eliminar
														 </a>
												   </div>
											</div>
						   	   	         
						       </div>
						        <div class="form-group">
								         <label class="label label-info" >LISTA DE CONTACTOS</label>
								         <select name="lisContacto"  id="lisContacto" class="form-control" size="6" ></select>
							   </div>	
						      
						     <div class="form-group">
						             <div id="row">
						                     <div class='col-xs-7' >
										                <select  id="actividad" name="actividades"  class="form-control">
												   	       <option value="">SELECCIONAR ACTIVIDAD</option>
															      <?php foreach ($actividades as $actividad): ?>
															            <option value="<?php echo "".$actividad->CLAVE?>">
																		  		       <?php echo "".$actividad->VALOR?>
														               </option>
														            <?php  endforeach ?>
												        </select>
										   </div>
										   																			
										   <div class='col-xs-2' >
												      <!--    <button id="add_contact" class="btn btn-default">Agregar</button>  -->   
												        <a  id="add_act" href="#" class="btn btn-primary"  id="crea_contact" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
														     Agregar
														</a>
											</div>
												   
											<div class='col-xs-3'>
												    <!-- <button id="del_contact" class="btn btn-default">Eliminar</button>-->
												     <a  id="del_act" href="#" class="btn btn-primary"  id="crea_contact" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
														     Eliminar
													 </a>
											</div> 
									</div>
						     </div>
						    
						      <br/>
						      <br/>
						      <div class="form-group">
								         <label class="label label-info" >LISTA DE ACTIVIDADES</label>
								         <select name="lisActividad"  id="lisActividad" class="form-control" size="6" ></select>
							   </div>	
						  						    
					        <div class="form-group">
						          <input id="razon_social" name="nombre" type="text" class="form-control" placeholder="RAZON SOCIAL">
						    </div>
						   
						    <div class="form-group">
						       <select  id="tipo" name="tipo"  class="form-control">
								    <option value="">
											SELECCIONAR TIPO DOCUMENTO
								     </option>
								     
										<?php foreach ($tipodoc as $tipo): ?>
										     <option value="<?php echo "".$tipo->CLAVE?>">
											     <?php echo "".$tipo->VALOR?>
										    </option>
							          <?php  endforeach ?>
							   </select>
							    <script type="text/javascript">
							          $("#tipo option[value="+"1" +"]").attr("selected",true);
								</script>   
							   
							   
						   </div>
						   
						    <div class="form-group">
						         <input id="documento"  name="documento" type="text" class="form-control" placeholder="Documento" onkeyup="fn_copiar_udr()">
						    </div>
						    
						   <div class="form-group">
						         <input id="udr" name="udr" type="text" class="form-control">
						    </div>
						    
						    <div class="form-group">
						       <select  id="regimen" name="regimen"  class="form-control">
								    <option value="">
											SELECCIONAR REGIMEN
								     </option>
										<?php foreach ($regimenes as $regimen): ?>
										     <option value="<?php echo "".$regimen->CLAVE?>">
											     <?php echo "".$regimen->VALOR?>
										    </option>
							          <?php  endforeach ?>
							   </select>
						   </div>
						    
						    <div class="form-group">
						       <select  id="estado" name="estado"  class="form-control">
								    <option value="">
											SELECCIONAR ESTADO
								     </option>
								     
										<?php foreach ($estados as $estado): ?>
										     <option value="<?php echo "".$estado->CLAVE?>">
											     <?php echo "".$estado->VALOR?>
										    </option>
							          <?php  endforeach ?>
							   </select>
							    
						   </div>
						    
						    <div class="form-group">
						       <select  id="clasificacion" name="clasificacion"  class="form-control">
								    <option value="">
											SELECCIONAR CLASIFICACION
								     </option>
								     
										<?php foreach ($clasificaciones as $clasificacion): ?>
										     <option value="<?php echo "".$clasificacion->CLAVE?>">
											     <?php echo "".$clasificacion->VALOR?>
										    </option>
							          <?php  endforeach ?>
							   </select>
							   
						   </div>
						     
						   <div class="form-group">
						         <input id="usuario_sol" name="usu_sol"  type="text" class="form-control" placeholder="Usuario SOL" >
						   </div>
						  
						   <div class="form-group">
						        <input id="clave_sol" name="clave_sol"    type="text" class="form-control" placeholder="Clave SOL" >
							</div>
						
							<div class="form-group">
								 <input id="pregunta"  name="pregunta"  type="text" class="form-control" placeholder="Pregunta" >
							</div>
							
							<div class="form-group">    
							     <input id="respuesta"  name="respuesta"  type="text" class="form-control" placeholder="Respuesta" >
						    </div>
						   
						    
						   <div class="form-group">
						        <input id="usuario_afp"  name="usu_afp"  type="text" class="form-control" placeholder="Usuario AFP">
						    </div>
						
						   <div class="form-group">
							   	<input id="clave_afp"    name="clave_afp"  type="text" class="form-control" placeholder="Clave AFP" >
						   </div>
						   
						   
							<div class="form-group">
								 <input id="nrocuenta"  name="nrocuenta"  type="text" class="form-control" placeholder="N&uacute;mero de cuenta" >
							</div>
							
						   
						   <div class="form-group">
						         <input id="usuario_bn"   name="usu_bn"  type="text" class="form-control" placeholder="Usuario BN">
						   </div>
						  
						   <div class="form-group">
						        <input id="clave_bn"     name="clave_bn"  type="text" class="form-control" placeholder="Clave BN" >
							</div>
						  <div class="form-group">
						  <button class="btn btn-primary" type="submit"  id="Guardar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
						  Guardar
					   <img src="<?php echo base_url()?>public/images/GUARDAR.png">
			                  </button>
						
							     <?php if(!empty($band_SelCliente)){ ?>
								      <a href="<?php echo base_url()?>ConsCliente_c/mostrar_Seleccion_Cliente" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
							  	          Cancelar <img src="<?php echo base_url()?>public/images/CANCELAR.png">
						            </a>
						          <?php }?>
								
								  <?php if(empty($band_SelCliente)){ ?>
									   <a href="<?php echo base_url()?>ConsCliente_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">   
                                          Cancelar <img src="<?php echo base_url()?>public/images/CANCELAR.png">
							           </a>
						          <?php }?>
							     
						    <!--    <a href="<?php echo base_url()?>ConsCliente_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
							      -->
							  
						 </div>   
			 </form>
   </div>

   <div class="modal fade" id="mostrarmodal_ok" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
               <h3>Registro de Cliente</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se registro correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantCliente_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consCliente_c/"  class="btn btn-danger">Cerrar</a>
           </div>
       </div>
   </div>
</div>


 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Cliente</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al registrar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantCliente_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consCliente_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="mostrarmodal_error_campos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Cliente</h3>
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
$("#frmCreaCliente").validate({
        rules: {
            contactos: {
                required: true
            },
            actividades: {
                required: true
            },
            nombre: {
                required: true
            },
            tipo: {
                required: true
            },
            documento: {
				required: true,
				number: true
            },
            regimen: {
                required: true
            },
            estado: {
                required: true
            },
            clasificacion: {
                required: true
            },
            usu_sol: {
                required: true
            },
            clave_sol: {
                required: true
            },
            pregunta: {
                required: true
            },
            respuesta: {
                required: true
            },
            usu_afp: {
                required: true
            },
            clave_afp: {
                required: true
            },
            nrocuenta: {
                required: true,
				number: true
            },
            usu_bn: {
                required: true
            },
            clave_bn: {
                required: true
            }
        }, messages: {
            contactos: {
                required: "Seleccione contactos"
            },
            actividades: {
                required: "Seleccione actividades"
            },
            nombre: {
                required: "Ingrese Nombre"
            },
            tipo: {
                required: "Ingrese Tipo"
            }
			,
            documento: {
				required: "Ingrese Documento",
				number: "Ingrese Digitos"
				
			}
			,
            regimen: {
                required: "Ingrese Regimen"
			}
			,
            estado: {
                required: "Ingrese Estado"
			}
			,
            clasificacion: {
                required: "Ingrese Clasificacion "
            },
            usu_sol: {
                required: "Ingrese Usuario Sol"
            },
            clave_sol: {
                required: "Ingrese Clave Sol "
            },
            pregunta: {
                required: "Ingrese Pregunta"
            },
            respuesta: {
                required: "Ingrese Respuesta"
            },
            usu_afp: {
                required: "Ingrese Usuario AFP"
            },
            clave_afp: {
                required: "Ingrese Clave AFP"
            },
            nrocuenta: {
				required: "Ingrese Numero de Cuenta",
				number: "Ingrese Digitos"
            },
            usu_bn: {
                required: "Ingrese Usuario BN"
            },
            clave_bn: {
                required: "Ingrese Clave BN"
            }
        },
        submitHandler: function (form) {
            e.preventDefault();
            insertar();
        }
	});
});



               
				



 var lstActividad=[];//lista de codigos para validar si actividad ya fue ingresado
 var lstContactos=[];//lista de codigos para validar si contacto ya fue ingresado

function validarDatos()
{	
	
    var v_nombre=$("#razon_social").val();
    var v_tipo=$("#tipo").val();
	var v_docu=$("#documento").val();
	var v_regimen=$("#regimen").val();
	var v_estado=$("#estado").val();
	var v_clasificacion=$("#clasificacion").val();
    var v_usuario_sol=$("#usuario_sol").val();
    var v_clave_sol=$("#clave_sol").val();
    var v_pregunta=$("#pregunta").val();
    var v_respuesta=$("#respuesta").val();
    var v_usuario_afp=$("#usuario_afp").val();
    var v_clave_afp=$("#clave_afp").val();
    var v_nrocuenta=$("#nrocuenta").val();
    var v_usuario_bn=$("#usuario_bn").val();
    var v_clave_bn=$("#clave_bn").val();

    
	var Msg='';
    if(lstContactos.length==0)
      {     Msg = Msg + "- Ingrese lista de contactos </br>" ;
      }

    if(lstActividad.length==0)
    {     Msg = Msg + "- Ingrese lista de actividades   </br>" ;
    }

     if(v_nombre==''  || v_nombre === null)
    {     Msg = Msg + "- Ingrese Raz&oacute;n Social de cliente </br>" ;
    }

    if(v_tipo==0 || v_tipo === null)
    {     Msg = Msg + "- Seleccione tipo de documento  </br>" ;
    }

    if(v_docu==''  || v_docu === null)
    {     Msg = Msg + "- Ingrese n&uacute;mero de documento </br>" ;
    }

    if( v_regimen==0 ||  v_regimen === null)
    {     Msg = Msg + "- Seleccione regimen de cliente </br>" ;
    }
   
    if(v_estado==0 || v_estado === null)
    {     Msg = Msg + "- Seleccione estado de cliente </br>" ;
    }

    if(v_clasificacion==0 || v_clasificacion === null)
    {     Msg = Msg + "- Seleccione clasificaci&oacute;n de cliente </br>" ;
    }
   
    if(v_usuario_sol=='' || v_usuario_sol === null)
    {     Msg = Msg + "- Ingrese usuario de cuenta sol </br>" ;
    }

    if(v_clave_sol=='' || v_clave_sol === null)
    {     Msg = Msg + "- Ingrese clave de cuenta sol </br>" ;
    }

    if(v_pregunta=='' || v_pregunta === null)
    {     Msg = Msg + "- Ingrese pregunta de cuenta sol </br>" ;
    }

    if(v_respuesta=='' || v_respuesta === null)
    {     Msg = Msg + "- Ingrese respuesta de cuenta sol </br>" ;
    }

    if(v_usuario_afp=='' || v_usuario_afp === null)
    {     Msg = Msg + "- Ingrese usuario de cuenta afp </br>" ;
    }

    if(v_clave_afp=='' || v_clave_afp === null)
    {     Msg = Msg + "- Ingrese clave de cuenta afp </br>" ;
    }
    

    if(v_nrocuenta=='' || v_nrocuenta === null)
    {     Msg = Msg + "- Ingrese n&uacute;mnero de cuenta </br>" ;
    }

    if(v_usuario_bn=='' || v_usuario_bn === null)
    {     Msg = Msg + "- Ingrese usuario del banco de la Naci&oacute;n </br>" ;
    }

    if(v_clave_bn=='' ||v_clave_bn === null)
    {     Msg = Msg + "- Ingrese clave del banco de la Naci&oacute;n </br>" ;
    }
    
     return Msg;
     
}


function guardar()
{ var msg=validarDatos();
 if (msg=='')
  {    insertar();  }
  else
  {   $("#mensaje").html(msg);
	  $("#mostrarmodal_error_campos").modal("show");
   }	  
}


function insertar()
{   var v_contactos=lstContactos.toString();
	var v_actividades=lstActividad.toString();
	var v_nombre=$("#razon_social").val();
	var v_tipo=$("#tipo").val();
	var v_docu=$("#documento").val();
	var v_regimen=$("#regimen").val();
	var v_estado=$("#estado").val();
	var v_clas=$("#clasificacion").val();
    var v_usu_sol=$("#usuario_sol").val();
	var v_clave_sol=$("#clave_sol").val();
	var v_pregunta=$("#pregunta").val();
	var v_respuesta=$("#respuesta").val();
	var v_usu_afp=$("#usuario_afp").val();
	var v_clave_afp=$("#clave_afp").val();
	var v_nrocuenta=$("#nrocuenta").val();
	var v_usu_bn=$("#usuario_bn").val();
	var v_clave_bn=$("#clave_bn").val();

$.ajax({
	    url:  "<?php echo base_url()?>MantCliente_c/insertar",
	    type: 'post',//metodo
	    data: { contactos:	  v_contactos,
			    actividades:  v_actividades,
		        nombre:       v_nombre,
		        tipo:         v_tipo,
		        documento:    v_docu,  
		        regimen:      v_regimen,
				estado:		  v_estado,
				clasificacion:v_clas,				
                usu_sol:	  v_usu_sol,
                clave_sol:	  v_clave_sol,
                pregunta:     v_pregunta,
 				respuesta:    v_respuesta,  
                usu_afp:      v_usu_afp,  
                clave_afp:    v_clave_afp,
                nrocuenta:    v_nrocuenta,
                usu_bn:       v_usu_bn,   
	        	clave_bn:     v_clave_bn 
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








$(document).ready(function(){
	
	$('#add_act').click(function(){
		agregar_en_lista('actividad','lisActividad',lstActividad);
		return false;
	});
	
	$('#del_act').click(function(){
		quitar_en_lista('lisActividad',lstActividad);
		return false;
	});

	
	$('#add_contact').click(function(){
		agregar_en_lista('contacto','lisContacto',lstContactos);
		return false;
	});
	
	$('#del_contact').click(function(){
		quitar_en_lista('lisContacto',lstContactos);
		return false;
	});

		  
});


     

function fn_agregarOpcion(id,idvalue,valor)
{ $('#'+id).append('<option value= " '+ idvalue + ' " selected="selected">'+valor+'</option>');  
}


function agregar_en_lista(id_origen,id_destino,lista)
{ var idopcion=$('#'+id_origen).val();
   if(idopcion > 0)
	 {   var valor=$('#'+id_origen+' option:selected').html();
        if(valor != null)
	        { if(!existe_en_lista(idopcion,lista))
	   	    	{  lista[lista.length]=idopcion;
	   	    	  /* lista.lengt++;*/
	   		        fn_agregarOpcion(id_destino,id_origen,valor);
				     $('#'+id_destino+' option:selected').prop("selected", ""); 
			    }
	     	}	            
	  }

		  
}






function quitar_en_lista(id_destino,lista)
{ 	var indice = $('#'+id_destino+' option:selected').index();
    var valor=$('#'+id_destino+' option:selected').html();
     if(valor!=null)
       {  if(indice>-1)
          { lista.splice(indice, 1);}
         $('#'+id_destino+' option:selected').remove();
	  }
}


function existe_en_lista(dato,lista)
{ var verdad=false;
    for(var i=0;i<lista.length;i++)
	 {    if(dato==lista[i])
	      {   verdad=true;
	    	  i=lista.length;
	      }
	 }
  return verdad;	
}


function mostrar_array(lista)
{alert('lista.length'+lista.length);
for(var i=0;i<lista.length;i++)
	{    alert('lista['+i+']='+lista[i]);  
	}

}

function fn_copiar_udr()
{ var v_docu=$("#documento").val();
  var v_udr = v_docu.substring((v_docu.length)-1, v_docu.length);
  $("#udr").val(v_udr);

}



/*
function fn_eliminarOpcion(id,idvalue)
{  $('#'+id).find("option[value="+idvalue+"]").remove();  
}
*/

/*
function agregar_en_lista(id_origen,id_destino,lista,optnum)
{ var idopcion=$('#'+id_origen).val();
   if(idopcion > 0)
	 {   var valor=$('#'+id_origen+' option:selected').html();
        if(valor != null)
	        { if(!existe_en_lista(idopcion,lista))
	   	    	{    switch(optnum)
	   	    	          { case 0:
		   	    	             lista[num_activ]=idopcion;
		   	    	              num_activ++;
                                  break;

      	   	    	        case 1: 
          	   	    	           lista[num_contact]=idopcion;
	    	                       num_contact++;
	    	                       break;
	    	                default:alert('fallo');      
	   	    	            
  	                      }
                    
	   		         fn_agregarOpcion(id_destino,id_origen,valor);
				     $('#'+id_destino+' option:selected').prop("selected", ""); 
			    }
	     	}	            
	  }

		  
}
*/


</script>

</body>
</html>