<!DOCTYPE html> 
<html> 
  <head> 
    <title>Crear Orden de Entrada</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <script type="text/javascript" src="<?php echo base_url()?>public/jquery/jquery-3.1.1.min.js"></script>
    <script  type="text/javascript"  src="<?php echo base_url()?>public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>
 </head>

<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 90%; height:50%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Registrar Orden de Entrada </STRONG>
		            </div>
				    <form id="frmCreaOrdenEntrada" >
				             <?php if(!empty($codcliente)){ ?>
						        <input type="hidden" name="codcliente" id="codcliente"  value="<?php echo $codcliente?>" > 
						     <?php }?>
						    
						     <div class="form-group">
									      <div  class='col-xs-8'>
									                <a href="#" class="btn btn-primary"  id="ser" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
														    Serie:
															<label id="serie"  style="background-color: white; color:rgb(0,128,255);font-size:12px;" ><?php echo $serie?></label>
												    </a>		
												    <a href="#" class="btn btn-primary"  id="num" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
															N&uacute;mero:
															 <label id="numero"  style="background-color: white; color:rgb(0,128,255);font-size:12px;" ><?php echo $numero?></label>
													</a>
									      </div>
										  
										  <div  class='col-xs-4'>
												    <a href="#" class="btn btn-primary"  id="fech" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
																 Fecha
																 <label id="numero"  style="background-color: white; color:rgb(0,128,255);font-size:12px;" >dd/mm/yyyy </label>
													</a>
										  </div>
						    </div>
						    <br/>
						    <br/> 
						    <br/>
						   
						   <div class="form-group">
							         <div  class='col-xs-8'>
								         <a href="#" class="btn btn-primary"  id="fech" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
								             Cliente
										    <?php if(!empty($nomb_cliente)){ ?>
											      <label id="cliente"  style="background-color: white; color:rgb(0,128,255);font-size:12px;"><?php echo $nomb_cliente?></label>   
											<?php }?>
											<?php if(empty($nomb_cliente)){ ?>
											      <label id="cliente"  style="background-color: white; color:rgb(0,128,255);font-size:12px;">_____________________________________________________________________</label>   
											<?php }?>
									     </a>
								     </div>   
								    
							         <div  class='col-xs-4'>
							              <a href="<?php echo base_url()?>consCliente_c/mostrar_Seleccion_Cliente" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" >
								   				    Buscar
										        	<img src="<?php echo base_url()?>public/images/BUSCAR.png">
										  </a>
								     </div>
							         
						     </div>
						        
						    <br/>
						    <br/>
						    
						     <div class="form-group">  
							         <div  class='col-xs-2'>
								         <a href="#" class="btn btn-primary"  id="fech" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
								             Documento Cliente
										      <?php if(!empty($doc_cliente)){ ?>
										             <label id="cliente"  style="background-color: white; color:rgb(0,128,255);font-size:12px;"><?php echo $doc_cliente?></label>
								              <?php }?>
								              
								              <?php if(empty($doc_cliente)){ ?>
								                 
										            <label id="cliente"  style="background-color: white; color:rgb(0,128,255);font-size:12px;">_______________________________</label>
								                  
								              <?php }?>
								         
								         </a>
								     </div>   
						     </div>
						     <br/>
						     <br/>
						    
	               			   		     <br/>
								         <div class="form-group">
								         		   <a class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_mostrar();" >
												   		   Agregar
												          <img src="<?php echo base_url()?>public/images/add.png">
												   </a>
										  </div>
								          <div class="form-group">
							   		   			<div class='col-xs-1'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
							   			   			 CANTIDAD 
							   					</div> 
							   		    		<div class='col-xs-3'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
							   			     		 PRODUCTO
							   			 		</div>
							   			 		<div class='col-xs-3'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
							   			     		 OBSERVACI&Oacute;N DE PRODUCTO
							   			 		</div>
							   			 		<div class='col-xs-1'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
							   			     		 PRECIO
							   			 		</div>
							   			 		<div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
							   			     		 IMPORTE
							   			 		</div>
							   			 		<div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
							   			     		  ACCIONES
							   			 		</div>
							   			  </div>	  
							   		      <div id="tabla"> </div> 
						   
						    <br/>
						    <br/>
						    
						    <div class="form-group">
						         <span style="color:rgb(0,128,255);">Comentario</span>
						          <textarea id="comentario" rows="5" cols="80" class="form-control" placeholder="observaciòn">
						          </textarea>
						    </div>	
						 
						    <br/>
						    <br/> 
						  
						    
						     <div class="form-group">
						     	  <a href="#" class="btn btn-primary pull-right"  id="fech" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
								          Total
										  <label id="igv"  style="background-color: white; color:rgb(0,128,255);font-size:12px;">_______</label>
								  </a>
							 </div>	
						 
						    <br/>
						    <br/> 
						    
						    <div class="form-group">
									   <a class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="guardar();" >
									   		   Guardar
									           <img src="<?php echo base_url()?>public/images/GUARDAR.png">
									   </a>
									     
									   <a href="<?php echo base_url()?>ConsOrdenEntrada_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
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
          				<a href="<?php echo base_url()?>MantSerieOrden_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consSerieOrden_c/"  class="btn btn-danger">Cerrar</a>
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
          		<a href="<?php echo base_url()?>MantSerieOrden_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consSerieOrden_c/"  class="btn btn-danger">Cerrar</a>
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


  <div class="modal fade" id="mostrar_add" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
			           <div class="modal-header btn-primary" style="background-color:rgb(0,128,255);">
			                  <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                   <h4>Agregar Producto</h4>
			           </div>
		          
		               <div class="modal-body">
		                	<form>
		                	     <div class="form-group">
		            	               <a href="<?php echo base_url()?>consProducto_c/mostrar_Seleccion_Producto" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" >
								   				    Buscar
										        	<img src="<?php echo base_url()?>public/images/BUSCAR.png">
									    </a>
		            	         </div>
		            	         
		            	         <div class="form-group">
								      <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">Producto</span></h4>
								      <label style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" class="form-control"></label>
							    
							           
								  </div>  
							    
					             <div class="form-group" style="width:50%;">
									      <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">Precio</span></h4>
									      <label style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" class="form-control"></label>
								 </div> 
				             
				              	 <div class="form-group" style="width:50%;">
								       <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">Cantidad</span></h4>
								      <input id="cantidad" type="text" class="form-control" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
							     </div>
						    </form>
		          </div>
          <div class="modal-footer">
          			<a class="btn btn-primary"  id="aceptar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_add();" >
						Agregar
					</a>
					<a class="btn btn-primary"  id="cerrar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_cerrar();" >
						Salir
					</a>
           </div>
       </div>
   </div>
</div>

 <!-- 
*****************************************************************************
*			Inicio formulario  modal para seleccionar cliente   			*
*****************************************************************************
 -->

  <div class="modal fade" id="frm_modal_sel_cliente" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
			 <div class="modal-header btn-primary" style="background-color:rgb(0,128,255);">
			                  <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                   <h4>Seleccionar Cliente</h4>
			  </div>
		          
		      <div class="modal-body">
		                	<form>
		                	     <div class="form-group">
		            	               <a href="<?php echo base_url()?>consProducto_c/mostrar_Seleccion_Producto" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" >
								   				    Buscar
										        	<img src="<?php echo base_url()?>public/images/BUSCAR.png">
									    </a>
		            	         </div>
		            	         
		            	         <div class="form-group">
								      <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">Producto</span></h4>
								      <label style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" class="form-control"></label>
							    
							           
								  </div>  
							    
					             <div class="form-group" style="width:90%;">
									      <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">Precio</span></h4>
									      <label style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" class="form-control"></label>
								 </div> 
				             
				              	 <div class="form-group" style="width:90%;">
								       <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">Cantidad</span></h4>
								      <input id="cantidad" type="text" class="form-control" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
							     </div>
				   </form>
		  </div>
          <div class="modal-footer">
          			<a class="btn btn-primary"  id="aceptar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_add();" >
						Agregar
					</a>
					<a class="btn btn-primary"  id="cerrar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_cerrar();" >
						Salir
					</a>
           </div>
       </div>
   </div>
</div>

 <!-- 
*****************************************************************************
*			fin formulario  modal para seleccionar cliente   				*
*****************************************************************************
 -->



 <!-- 
*****************************************************************************
*			Inicio formulario  modal para seleccionar Producto  			*
*****************************************************************************
 -->




 <!-- 
*****************************************************************************
*			fin formulario  modal para seleccionar Producto 				*
*****************************************************************************
 -->














 <script  type="text/javascript"> 


function validarDatos()
{
	 var v_oficina=$("#oficina").val();
	 var v_tipo=$("#tipo").val();
	 var v_serie=$("#serie").val();
	 var v_numero=$("#numero").val();
     
	var Msg="";
    if(v_oficina==0  || v_oficina=== null)
      {     Msg = Msg + "- Seleccione Oficina </br>" ;
      }
    var Msg="";
    if(v_tipo==0  || v_tipo === null)
      {     Msg = Msg + "- Seleccione Tipo de Serie </br>" ;
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
{ var v_oficina=$("#oficina").val();
var v_tipo=$("#tipo").val();
var v_serie=$("#serie").val();
var v_numero=$("#numero").val();

$.ajax({
	    url:  "<?php echo base_url()?>MantSerieOrden_c/insertar",
	    type: 'post',//metodo
	    data: { oficina: v_oficina,
	    		tipo:   v_tipo,
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


$(document).ready(function(){

	$('#agregar').click(function(){
		//alert('agregar');
		fn_mostrar();
		return false;
	});

	$('#quitar').click(function(){
			//alert('quitar');
			fn_del(2);
			return false;
	});


});

function fn_mostrar()
{  $("#mostrar_add").modal("show");
}


function fn_del(id)
{
	$('#'+id).remove();

}

function existe_en_lista(dato,lista)
 {  var verdad=false;
	for(var i=0;i<lista.length;i++)
	{    if(dato==lista[i])
	     {   verdad=true;
			i=lista.length;
		}
	}
	return verdad;
 }


function mostrar_array(lista)
{   alert('lista.length'+lista.length);
	for(var i=0;i<lista.length;i++)
	{    alert('lista['+i+']='+lista[i]);}
}

function fn_add()
{   
   var vide=$("#ide").val();
   var Vprod=$("#producto").val();


	 var sb="";
     sb=sb+"<div id='"+vide+"' class='row'>";  
     sb=sb+"<div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>"; 
     sb=sb+"10";
   	 sb=sb+"</div>";
     sb=sb+" <div class='col-xs-6'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'> ";
  	 sb=sb+ Vprod;
 	 sb=sb+"</div>";
	 sb=sb+"<div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>";
     sb=sb+"  20";
	 sb=sb+"</div>";
 	 sb=sb+" <div class='col-xs-1'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>";
 	 sb=sb+"200";
	 sb=sb+"  </div>";
	 sb=sb+"  <div class='col-xs-1'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>";
	 sb=sb+"     <a href='#' onclick=fn_del('"+vide+"')>";
	 sb=sb+"        Eliminar&nbsp";
	 sb=sb+"      <img src='<?php echo base_url()?>public/images/ELIMINAR.png'>";
	 sb=sb+"     </a> ";
	 sb=sb+"  </div>";
	 sb=sb+"</div>"; 
     $('#tabla').append(sb);
     $("#mostrar_add").modal("hide");
}


function fn_cerrar()  
{ 
	$("#mostrar_add").modal("hide");
}


</script>

</body>
</html>