<!DOCTYPE html> 
<html> 
  <head> 
    <title>Editar Cliente</title> 
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
   
   
 <script  type="text/javascript"> 


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
  {    editar();  }
  else
  {   $("#mensaje").html(msg);
	  $("#mostrarmodal_error_campos").modal("show");
   }	  
}


function editar()
{   var v_cod_cliente=<?php echo $cod_Cliente?>;
	var v_cod_cta_sol=<?php echo $cod_cta_sol?>;
	var v_cod_cta_afp=<?php echo $cod_cta_afp?>; 
	var v_cod_detraccion=<?php echo $cod_detraccion?>; 
	var v_contactos=lstContactos.toString();
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
	    url:  "<?php echo base_url()?>MantCliente_c/editar",
	    type: 'post',//metodo
	    data: { 
                cod_cliente:    v_cod_cliente,
                cod_cta_sol:    v_cod_cta_sol,
                cod_cta_afp:    v_cod_cta_afp, 
                cod_detraccion: v_cod_detraccion,  
		        contactos:	    v_contactos,
			    actividades:    v_actividades,
		        nombre:         v_nombre,
		        tipo:           v_tipo,
		        documento:      v_docu,  
		        regimen:     	v_regimen,
				estado:		  	v_estado,
				clasificacion:	v_clas,				
                usu_sol:	  	v_usu_sol,
                clave_sol:	  	v_clave_sol,
                pregunta:     	v_pregunta,
 				respuesta:    	v_respuesta,  
                usu_afp:      	v_usu_afp,  
                clave_afp:    	v_clave_afp,
                nrocuenta:    	v_nrocuenta,
                usu_bn:       	v_usu_bn,   
	        	clave_bn:    	v_clave_bn 
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

</script>
</head>

<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 70%; height:65%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Editar Cliente</STRONG>
		            </div>
				    <form id="frmCreaCliente" >
					         <div class="form-group">
								         <div id="row">
									               <div class='col-xs-6' >
													          <select  id="contacto" name="contacto"  class="form-control">
																    <option value="0">
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
												        <!-- <button type="submit"  id="crea_contact" class="btn btn-default"   >Editar</button>  --> 
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
						         	   <label class="label label-info">LISTA DE CONTACTOS</label>
								  	   <select name="lisContacto"  id="lisContacto" class="form-control" size="6" >  </select>
							           <script type="text/javascript">
										         $('#lisContacto').html('');
										         lstContactos.length=0;
										         lstContactos=[];
									   </script>
							           <?php foreach ($listcontactos as $campos): ?>
							          		  <script type="text/javascript">
							                		 lstContactos[lstContactos.length]=<?php echo "".$campos->CLAVE?>;
							                 		 fn_agregarOpcion('lisContacto','<?php echo "".$campos->CLAVE?>','<?php echo "".$campos->VALOR?>');
							                 		 $('#lisContacto option:selected').prop("selected", ""); 
									          </script>
									   <?php  endforeach ?>
							   </div>	
						      
						     <div class="form-group">
						             <div id="row">
						                     <div class='col-xs-7' >
										                <select  id="actividad" name="actividad"  class="form-control">
												   	       <option value="0">SELECCIONAR ACTIVIDAD</option>
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
								         <script type="text/javascript">
										         $('#lisActividad').html('');
										     	 lstActividad.length=0;
										     	  lstActividad=[];
										 </script>
								         <?php foreach ($listactividades as $campos): ?>
							          		  <script type="text/javascript">
							          		         lstActividad[lstActividad.length]=<?php echo "".$campos->CLAVE?>;
							                 		 fn_agregarOpcion('lisActividad','<?php echo "".$campos->CLAVE?>','<?php echo "".$campos->VALOR?>');
							                 		 $('#lisActividad option:selected').prop("selected", "");
									          </script>
									       <?php  endforeach ?>
							  </div>	
							  				    
					        <div class="form-group">
						          <input id="razon_social" type="text" class="form-control" placeholder="RAZON SOCIAL" value="<?php echo $nombre?>" >
						    </div>
						   
						    <div class="form-group">
						       <select  id="tipo" name="tipo"  class="form-control">
								    <option value="0">
											SELECCIONAR TIPO DOCUMENTO
								     </option>
								     
										<?php foreach ($tipodoc as $tipo): ?>
										     <option value="<?php echo "".$tipo->CLAVE?>">
											     <?php echo "".$tipo->VALOR?>
										    </option>
							          <?php  endforeach ?>
							   </select>
							    <script type="text/javascript">
							          $("#tipo option[value="+"<?php echo $codtipo?>" +"]").attr("selected",true);
								</script>   
							   
							   
						   </div>
						   
						    <div class="form-group">
						         <input id="documento" type="text" class="form-control" placeholder="Documento" onkeyup="fn_copiar_udr()" value="<?php echo $nrodoc?>">
						    </div>
						    
						   <div class="form-group">
						         <input id="udr" type="text" class="form-control" placeholder="UDR" value="<?php echo $udr?>" >
						    </div>
						    
						    <div class="form-group">
						       <select  id="regimen" name="regimen"  class="form-control">
								    <option value="0">
											SELECCIONAR REGIMEN
								     </option>
										<?php foreach ($regimenes as $regimen): ?>
										     <option value="<?php echo "".$regimen->CLAVE?>">
											     <?php echo "".$regimen->VALOR?>
										    </option>
							          <?php  endforeach ?>
							   </select>
							    <script type="text/javascript">
							          $("#regimen option[value="+"<?php echo $codreg?>" +"]").attr("selected",true);
								</script>   
							   
						   </div>
						    
						    <div class="form-group">
						       <select  id="estado" name="estado"  class="form-control">
								    <option value="0">
											SELECCIONAR ESTADO
								     </option>
								     
										<?php foreach ($estados as $estado): ?>
										     <option value="<?php echo "".$estado->CLAVE?>">
											     <?php echo "".$estado->VALOR?>
										    </option>
							          <?php  endforeach ?>
							   </select>
							     <script type="text/javascript">
							          $("#estado option[value="+"<?php echo $codest?>" +"]").attr("selected",true);
								</script>
						   </div>
						    
						    <div class="form-group">
						       <select  id="clasificacion" name="clasificacion"  class="form-control">
								    <option value="0">
											SELECCIONAR CLASIFICACION
								     </option>
								     
										<?php foreach ($clasificaciones as $clasificacion): ?>
										     <option value="<?php echo "".$clasificacion->CLAVE?>">
											     <?php echo "".$clasificacion->VALOR?>
										    </option>
							          <?php  endforeach ?>
							   </select>
							     <script type="text/javascript">
							          $("#clasificacion option[value="+"<?php echo $codclas?>" +"]").attr("selected",true);
								</script>
						   </div>
						     
						   <div class="form-group">
						         <input id="usuario_sol"  type="text" class="form-control" placeholder="Usuario SOL" value="<?php echo $usu_sol?>">
						   </div>
						  
						   <div class="form-group">
						        <input id="clave_sol"    type="text" class="form-control" placeholder="Clave SOL" value="<?php echo $clave_sol?>">
							</div>
						
							<div class="form-group">
								 <input id="pregunta" type="text" class="form-control" placeholder="Pregunta" value="<?php echo $pregunta?>">
							</div>
							
							<div class="form-group">    
							     <input id="respuesta" type="text" class="form-control" placeholder="Respuesta"  value="<?php echo $respuesta?>">
						    </div>
						   
						    
						   <div class="form-group">
						        <input id="usuario_afp" type="text" class="form-control" placeholder="Usuario AFP" value="<?php echo $usu_afp?>">
						    </div>
						
						   <div class="form-group">
							   	<input id="clave_afp"   type="text" class="form-control" placeholder="Clave AFP" value="<?php echo $clave_afp?>">
						   </div>
						   
						   
							<div class="form-group">
								 <input id="nrocuenta" type="text" class="form-control" placeholder="N&uacute;mero de cuenta"  value="<?php echo $nrocuenta?>">
							</div>
							
						   
						   <div class="form-group">
						         <input id="usuario_bn"  type="text" class="form-control" placeholder="Usuario BN" value="<?php echo $usu_bn?>">
						   </div>
						  
						   <div class="form-group">
						        <input id="clave_bn"    type="text" class="form-control" placeholder="Clave BN" value="<?php echo $clave_bn?>">
							</div>
						  <div class="form-group">
							   <a class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="guardar();" >
						          Guardar <img src="<?php echo base_url()?>public/images/GUARDAR.png">
							   </a>
							     
							   <a href="<?php echo base_url()?>ConsCliente_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
							      Cancelar <img src="<?php echo base_url()?>public/images/CANCELAR.png">
							   </a>
						 </div>   
			 </form>
   </div>

   <div class="modal fade" id="mostrarmodal_ok" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
               <h3>Edici&oacute;n de Cliente</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se edito correctamente 
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
                <h3>Edici&oacute;n de Cliente</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al editar la informaci&oacute;n
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
                <h3>Edici&oacute;n  de Cliente</h3>
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


</body>
</html>