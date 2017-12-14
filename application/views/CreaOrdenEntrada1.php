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
 <!-- *****************************************************************************
              Inicio formulario principal registro de orden de entrada 
  ***************************************************************************** -->
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 90%; height:50%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Registrar Orden de Entrada </STRONG>
		            </div>
				    <form id="frmCreaOrdenEntrada" >
				         <input type="hidden" name="codcliente" id="codcliente"> 
						 <input type="hidden" name="codproducto" id="codproducto"> 
						 <input type="hidden" id="tpagina">
		    	         <input type="hidden" id="pactual">
						
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
																 <label id="fecha"  style="background-color: white; color:rgb(0,128,255);font-size:12px;" ><?php echo $fecha?></label>
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
										     <label id="nomb_cliente"   name="codcliente"  style="background-color: white; color:rgb(0,128,255);font-size:12px;">_____________________________________________________________________</label>   
											
									     </a>
								     </div>   
								    
							         <div  class='col-xs-4'>
							              <a href="#" class="btn btn-primary"  style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_mostrar_modal('modal_seleccionar_cliente');" >
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
										     <label id="doc_cliente"  style="background-color: white; color:rgb(0,128,255);font-size:12px;">_______________________________</label>
								         </a>
								     </div>   
						     </div>
						     <br/>
						     <br/>
						     <br/>
							
							<div class="form-group">
								         		   <a  href="#" class="btn btn-primary"  style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_mostrar();" >
												   		   Agregar
												          <img src="<?php echo base_url()?>public/images/add.png">
												   </a>
							</div>
							
							
								<div class="container">
							
							   		   			
							   		   	 <div class='row'>
							   		   			<div class='col-xs-1'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
							   			   			 CANTIDAD 
							   					</div> 
							   		    		<div class='col-xs-3'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
							   			     		 PRODUCTO
							   			 		</div>
							   			 		<div class='col-xs-1'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
							   			     		 TIPO
							   			 		</div>
							   			 		
							   			 		<div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
							   			     		 OBSERVACI&Oacute;N
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
						
											<div id="tabla" >  </div> 
									
									</div>
						
						    <br/>
						    <br/>
						    
						    <div class="form-group">
						         <span style="color:rgb(0,128,255);">Comentario</span>
						          <textarea id="comentario" name="obs" rows="5" cols="80" class="form-control" placeholder="observaci&oacute;n"></textarea>
						    </div>	
						 
						    <br/>
						    <br/> 
						  
						    
						     <div class="form-group">
						     	  <a href="#" class="btn btn-primary pull-right"  id="fech" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
								          Total
										  <label id="txt_total"  style="background-color: white; color:rgb(0,128,255);font-size:12px;"></label>
								  </a>
							 </div>	
						 
						    <br/>
						    <br/> 
						    
						    <div class="form-group">
							<a class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_registrar_OrdenE();" >
							Guardar
					 <img src="<?php echo base_url()?>public/images/GUARDAR.png">
			</a>
			<button class="btn btn-primary" type="submit"  id="Guardar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
						   Enviar
						<img src="<?php echo base_url()?>public/images/GUARDAR.png">
							   </button>  
									   <a href="<?php echo base_url()?>ConsOrdenEntrada_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
										        Cancelar
										        <img src="<?php echo base_url()?>public/images/CANCELAR.png">
									   </a>
						   </div>   
			   </form>
   </div>
  <!-- *********	 Inicio formulario modal crear orden ok   ************ -->

 <div class="modal fade" id="modal_CreaOrden_reg_ok" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
	        <div class="modal-content">
		           <div class="modal-header">
		               <h3>Registro de Orden de Entrada</h3>
		           </div>
		           <div class="modal-body">
		            	 <div class="alert alert-success">
		     		           La informaci&oacute;n se registro correctamente 
		     		      </div>
		           </div>
		           <div class="modal-footer">
		          		 <a href="<?php echo base_url()?>MantOrdenEntrada_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
		          		 <a href="<?php echo base_url()?>consOrdenEntrada_c/"  class="btn btn-danger">Cerrar</a>
		           </div>
	         </div>
   	  </div>
</div>

 <!--********* fin formulario modal principal ok ********************** -->
 
   <!-- ***********  Inicio formulario modal crear orden error ******************-->

<div class="modal fade" id="modal_CreaOrden_reg_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Orden de Entrada</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al registrar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantOrdenEntrada_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consOrdenEntrada_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>

<!-- ****  Fin formulario modal principal error ******** -->
 
 
 
<!-- ****  Inicio formulario modal principal error  campos ******* -->

<div class="modal fade" id="modal_CreaOrden_msg_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Orden de Entrada</h3>
           </div>
           <div class="modal-body">
          		 
          		<div class="alert alert-warning">
          		    Alerta<br/>
          		    <div id="mensaje_crea_OrdenEntrada"></div>
          		</div>
           </div>
      </div>
   </div>
</div>


<!-- ****  Fin formulario modal principal error campos  ***** -->
  
<!-- *****************************************************************************
**********	 Fin formulario principal registro de orden de entrada  **************
****************************************************************************** -->
	  
<!--*****************************************************************************
*********   Inicio formulario modal a�adir item detalle de orden         ********
***************************************************************************** -->
 
  <div  data-backdrop="static"  class="modal fade" id="modal_add_producto" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
			           <div class="modal-header btn-primary" style="background-color:rgb(0,128,255);">
			                  <button class="close" data-dismiss="modal" aria-hidden="true" onclick="fn_limpiar_modal_add_producto(),fn_ocultar_modal('modal_add_producto');"> &times;</button>
			                   <h4>Agregar Producto</h4>
			           </div>
		          
		               <div class="modal-body">
		                	<form>
		                	     <div class="form-group">
		            	               <a href="#" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_mostrar_modal('modal_seleccionar_producto'); fn_ocultar_modal('modal_add_producto');">
								   				    Buscar
										        	<img src="<?php echo base_url()?>public/images/BUSCAR.png">
									    </a>
		            	         </div>
		            	         
		            	        <div class="form-group">
								      <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">Producto</span></h4>
								      <label id="prod_sel" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" class="form-control"></label>
							    </div>  
							    
							     <div class="form-group">
								      <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">Tipo</span></h4>
								      <label id="tip_prod_sel" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" class="form-control"></label>
							      </div>  
							    
							    
					            
					             <div class="form-group" style="width:50%;">
									      <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">Precio</span></h4>
									      <label id="precio_prod_sel" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" class="form-control"></label>
								 </div> 
				             
				                <div class="form-group" style="width:50%;">
								       <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">Observaci&oacute;n</span></h4>
								      <input id="obs_prod_sel" type="text" class="form-control" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" value="NINGUNA">
							     </div>
							     
				              	 <div class="form-group" style="width:50%;">
								       <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">Cantidad</span></h4>
								      <input id="cant_prod_sel" type="text" class="form-control" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
							     </div>
						    </form>
		          </div>
                  <div class="modal-footer">
          			            			
          					<a class="btn btn-primary"  id="cerrar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_limpiar_modal_add_producto();fn_ocultar_modal('modal_add_producto');" >
								Salir
						   </a>
          		 </div>
       </div>
   </div>
</div>

<!-- *****************************************************************************
*********   Fin formulario modal a�adir item detalle de orden     ********
***************************************************************************** -->



 <!-- *****************************************************************************
*********** Inicio formulario  modal para seleccionar cliente  **************
********************************************************************************* -->

  <div data-backdrop="static"   class="modal fade" id="modal_seleccionar_cliente" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
			 <div class="modal-header btn-primary" style="background-color:rgb(0,128,255);">
			                  <button class="close" data-dismiss="modal" aria-hidden="true" onclick="fn_ocultar_modal('modal_seleccionar_cliente'); fn_limpiar_modal_sel_cliente();">&times;</button>
			                   <h4>Seleccionar Cliente</h4>
			  </div>
		          
		      <div class="modal-body">
		           <form   id="frmSeleccionCliente"  action="<?php echo base_url()?>mantOrdenEntrada_c/procesar_cliente" method="POST">
		                   <input type="hidden" name="codigo"> 
					       <input type="hidden" id="tpagina">
					       <input type="hidden" id="pactual">
					       
	
					    
					       	 <div class="form_group">
					    	 		<a href="#"  class="btn btn-primary"  style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_ocultar_modal('modal_seleccionar_cliente');fn_mostrar_modal('modal_crea_cliente');">
					    	 		    <img src="<?php echo base_url()?>public/images/REGISTRAR.png">
					    	 		    Nuevo
					    	 	   </a>
					    	 </div>
		    	 			
		    	 			 <br/>
					    	
					    	  <div class="form_group">
							        <input type="text" name="btnbuscar" id="txt_nombre"    class="form-control"  placeholder="Nombre Cliente"> 
									<br/>
									<input type="text" name="btnbuscar" id="txt_documento"    class="form-control"  placeholder="Documento"> 
									<br/>
									<button  type="button"  id="btnbuscar"   style="background-color:rgb(255,255,255);color:rgb(0,128,255); border: 1px solid rgb(0,128,255);"  >
									    <img src="<?php echo base_url()?>public/images/BUSCAR.png">
										  Buscar
									</button>
							 </div>
				            
				             <br/>
				            
				             <div class="form_group">
				                  <div id="cuadro_paginacion_sel_cliente" class="form-control"  style="border:0px" > </div>
				             </div>
				            
				             <br/>
				             <br/>
				             <br/>
				            
				             <div class="form_group">
								<div id="tabla_sel_cliente" class="form-control"  style="border:0px"></div>   
							 </div>
				   </form>
		     </div>
             
             <div class="container">
               		  <div id="respuesta"></div>
	         </div> 
	
             
             <div class="modal-footer">
          			<a class="btn btn-primary"  style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_ocultar_modal('modal_seleccionar_cliente'); fn_limpiar_modal_sel_cliente();" >
						Salir
					</a>
            </div>
       </div>
   </div>
</div>
 <!-- *****************************************************************************
*************  Fin formulario  modal para seleccionar cliente  **************
****************************************************************************  -->

 <!-- ************ Inicio formulario  modal para crear cliente  *************** -->

  <div  data-backdrop="static"  class="modal fade" id="modal_crea_cliente" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
			 <div class="modal-header btn-primary" style="background-color:rgb(0,128,255);">
			      <button class="close" data-dismiss="modal" aria-hidden="true" onclick="fn_ocultar_modal('modal_crea_cliente');fn_limpiar_modal_crea_cliente(); fn_mostrar_modal('modal_seleccionar_cliente');">&times;</button>
			                <h4>Crear Cliente</h4>
			  </div>
		          
		      <div class="modal-body">
		           <form id="frmCreaCliente" >
					       
						   <div class="form-group">
						          <input id="txt_razon_social" name="razon_social" type="text" class="form-control" placeholder="RAZON SOCIAL">
						    </div>
						   
						    <div class="form-group">
								       <select  id="tipo_doc"  name="tipo"  class="form-control">
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
									          $("#tipo_doc option[value="+"0" +"]").attr("selected",true);
										</script>   
						   </div>
						   
						    <div class="form-group">
						         <input id="txt_doc_cliente" name="documento" type="text" class="form-control" placeholder="Documento" onkeyup="fn_copiar_udr()">
						    </div>
						    
						   <div class="form-group">
						         <input id="txt_contacto" name="v_contact" type="text" class="form-control" placeholder="Contacto" >
						    </div>
						    <div class="form-group">
						         <input id="txt_direccion" name="domicilio" type="text" class="form-control" placeholder="Direcci&oacute;n" >
						    </div>
						 
						    <div class="form-group">
						         <input id="txt_tlfn" name="tlfn" type="text" class="form-control" placeholder="Telefono" >
						    </div>
						 
						 
						  <div class="form-group">
						  <button class="btn btn-primary" type="submit"  id="GuardarCliente" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
						  Guardar
					   <img src="<?php echo base_url()?>public/images/GUARDAR.png">
							  </button>
							  
							  <a href="#" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);" onclick="fn_ocultar_modal('modal_crea_cliente');fn_limpiar_modal_crea_cliente();fn_limpiar_modal_sel_cliente(); fn_mostrar_modal('modal_seleccionar_cliente');">   
                                   Cancelar <img src="<?php echo base_url()?>public/images/CANCELAR.png">
							  </a>
						         
						
							  
						 </div>   
			 </form>
		     </div>
             
             <div class="container">
               		  <div id="respuesta"></div>
	         </div> 
	
             
             <div class="modal-footer">
          			
            </div>
       </div>
   </div>
</div>

<div class="modal fade" id="modal_creaCliente_reg_ok" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
          	    <a href="#" class="btn btn-danger"  onclick="fn_ocultar_modal('modal_creaCliente_reg_ok');fn_ocultar_modal('modal_crea_cliente');fn_limpiar_modal_crea_cliente(); fn_mostrar_modal('modal_seleccionar_cliente');">Cerrar</a>
           </div>
       </div>
   </div>
</div>




 <div class="modal fade" id="modal_creaCliente_reg_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
          		 <a href="<?php echo base_url()?>consCliente_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="modal_CreaCliente_msg_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Cliente</h3>
           </div>
           <div class="modal-body">
          		 
          		<div class="alert alert-warning">
          		    Alerta<br/>
          		    <div id="mensaje_creaCliente"></div>
          		</div>
           </div>
      </div>
   </div>
</div>

 <!-- ********	Fin formulario  modal para crear cliente ********************-->



 <!-- **********************************************************************
 *			Inicio formulario modal para seleccionar Producto  			   *
 **************************************************************************
 -->
 <div data-backdrop="static"   class="modal fade" id="modal_seleccionar_producto" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
			 <div class="modal-header btn-primary" style="background-color:rgb(0,128,255);">
			                  <button class="close" data-dismiss="modal" aria-hidden="true" onclick="fn_ocultar_modal('modal_seleccionar_producto'),fn_limpiar_modal_sel_producto(),fn_mostrar_modal('modal_add_producto');">&times;</button>
			                   <h4>Seleccionar Producto</h4>
			 </div>
		          
		     <div class="modal-body">
		           <form   id="frmSeleccionProducto">
		                      <input type="hidden" name="codigo"> 
					    	  <input type="hidden" id="tpagina">
					    	  <input type="hidden" id="pactual">
					    	
					    	  <div class="form_group">
					    	 		<a href="#"   class="btn btn-primary"  id="btnNuevo_selproducto" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_ocultar_modal('modal_seleccionar_producto'), fn_mostrar_modal('modal_crea_producto');" >
					    	 		    <img src="<?php echo base_url()?>public/images/REGISTRAR.png">
					    	 		    Nuevo
					    	 	    </a>
					    	  </div>
					    	  <br/>
					    	  <div class="form_group">
							    	    <input type="text"  id="txt_des_producto"    class="form-control"  placeholder="Descripcion"> 
										<br/>
									
										<button   id="btn_bus_producto"   style="background-color:rgb(255,255,255);color:rgb(0,128,255); border: 1px solid rgb(0,128,255);"  >
										  <img src="<?php echo base_url()?>public/images/BUSCAR.png">
										  Buscar
										</button>
							 </div>
				            
				             <br/>
				            
				            <div class="form_group">
				                  <div id="log_sel_producto" class="form-control"  style="border:0px" > </div>
				             </div>
				            
				            
				            
				             <div class="form_group">
				                  <div id="cuadro_paginacion_sel_producto" class="form-control"  style="border:0px" > </div>
				             </div>
				            
				             <br/>
				             <br/>
				             <br/>
				            
				             <div class="form_group">
								<div id="tabla_sel_producto" class="form-control"  style="border:0px"></div>   
							 </div>
				   </form>
		     </div>
             
             <div class="container">
               		  <div id="rpt_sel_producto"></div>
	         </div> 
	
             
             <div class="modal-footer">
          			<a class="btn btn-primar
					  y"  style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_ocultar_modal('modal_seleccionar_producto'), fn_limpiar_modal_sel_producto(),fn_mostrar_modal('modal_add_producto');" >
						Salir
					</a>
            </div>
       </div>
   </div>
</div>
   

 <!-- 
*****************************************************************************
*			Fin formulario  modal para seleccionar Producto 				*
*****************************************************************************
 -->


 <!-- 
*****************************************************************************
*			Inicio formulario modal para crear Producto  			*
*****************************************************************************
 -->
 <div  data-backdrop="static"  class="modal fade" id="modal_crea_producto" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
			 <div class="modal-header btn-primary" style="background-color:rgb(0,128,255);">
			      <button class="close" data-dismiss="modal" aria-hidden="true" onclick="fn_ocultar_modal('modal_crea_producto');fn_limpiar_modal_crea_producto(); fn_mostrar_modal('modal_seleccionar_producto');">&times;</button>
			                <h4>Crear Producto</h4>
			 </div>
		          
		     <div class="modal-body">
		          <form id="frmCreaProducto" >
					    <div class="form-group">
						          <input id="txt_desc_producto" name="descripcion"  type="text" class="form-control" placeholder="Descripcion" >
					    </div>
						   
						<div class="form-group">
						       <select  id="tipo_producto" name="tipo"  class="form-control">
								    <option value="">
											SELECCIONAR TIPO	
								     </option>
								      
								      <?php foreach ($tipo_prod as $tipo): ?>
										     <option value="<?php echo "".$tipo->CLAVE?>">
											     <?php echo "".$tipo->VALOR?>
										    </option>
							          <?php  endforeach ?>
							   </select>
						 </div>
						    
						  <div class="form-group">
						         <input id="txt_precio_producto"  name="precio" type="text" class="form-control" placeholder="Precio">
						  </div>
						    
						   
						  <div class="form-group">
						  <button class="btn btn-primary" type="submit"  id="GuardarProducto" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
						  Guardar
					   <img src="<?php echo base_url()?>public/images/GUARDAR.png">
							  </button>
							     
							   <a href="#" class="btn btn-primary" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);" onclick="fn_ocultar_modal('modal_crea_producto'),fn_limpiar_modal_crea_producto(),fn_limpiar_modal_sel_producto(), fn_mostrar_modal('modal_seleccionar_producto');">
							           Cancelar
							           <img src="<?php echo base_url()?>public/images/CANCELAR.png">
							   </a>
						 </div>     
			       </form>
		     </div>
             
             <div class="container">
               		  <div id="respuesta"></div>
	         </div> 
	         
             <div class="modal-footer"> </div>
       </div>
   </div>
</div>



<div class="modal fade" id="modal_creaProducto_reg_ok" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
               <h3>Registro de Producto</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se registro correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          		<a href="#" class="btn btn-danger"  onclick="fn_ocultar_modal('modal_creaProducto_reg_ok');fn_ocultar_modal('modal_crea_producto');fn_limpiar_modal_crea_producto(); fn_mostrar_modal('modal_seleccionar_producto');">Cerrar</a>
           </div>
       </div>
   </div>
</div>




 <div class="modal fade" id="modal_creaProducto_reg_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Producto</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al registrar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          			<a href="<?php echo base_url()?>consProducto_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="modal_CreaProducto_msg_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Producto</h3>
           </div>
           <div class="modal-body">
          		 
          		<div class="alert alert-warning">
          		    Alerta<br/>
          		    <div id="mensaje_creaProducto"></div>
          		</div>
           </div>
      </div>
   </div>
</div>





 <!-- 
*****************************************************************************
*			Fin formulario modal para crea Producto 				*
*****************************************************************************
 -->

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
	var cod_SerOrden=<?php echo $codserorden?>;
   var serie=<?php echo $serie?>;
   var numero=<?php echo $numero?>;
   var serie=pad(serie,6);
   var numero=pad(numero,6);
   var fecha =$('#fecha').text(); 
   var codcliente=$('#codcliente').val(); 
   var total=$('#txt_total').text(); 
   var obs=$("#comentario").val(); 
   var usuario=<?php echo $codusuario?>;

   var A_detfactura = [];
   for(var i=0;i<A_codproducto.length;i++)
		{  var item = {};
	       item ["codproducto"]= A_codproducto[i];
	       item ["cantidad"]= A_cantidad[i];
	       item ['obs']=  A_observacion[i];
	       item ['precio']= A_precio[i];
	       A_detfactura.push(item);
	   	  
		}
   var detfactura=JSON.stringify(A_detfactura);




 $("#frmCreaOrdenEntrada").validate({
		 rules: {
			cod_SerOrden: {
				 required: true
			 },serie: {
				 required: true
			 },numero: {
				 required: true,
				 number:true
			 },fecha: {
				 required: true
			 },codcliente: {
				 required: true
			 },total: {
				 required: true
			 },obs: {
				 required: true
			 },usuario: {
				 required: true
			 },detfactura: {
				 required: true
			 }
		 }, messages: {
			cod_SerOrden: {
				 required: "Ingrese Codigo de Orden"
			 },serie: {
				 required: "Ingrese Serie"
			 },numero: {
				 required: "Ingrese Numero",
				 number:"Ingrese Digito "
			 },fecha: {
				 required: "Ingrese Fecha"
			 },codcliente: {
				 required: "Ingrese Codigo Cliente"
			 },total: {
				 required: "Ingrese Total"
			 },obs: {
				 required: "Ingrese Observacion"
			 },usuario: {
				 required: "Ingrese Usuario"
			 },detfactura: {
				 required: "Ingrese Detalle Factura"
			 }
		 },
		 submitHandler: function (form) {
			 e.preventDefault();
			 insertar();
		 }
	 });
 });

 $( "#GuardarProducto" ).click(function( e ) {
 $("#frmCreaProducto").validate({
		 rules: {
			descripcion: {
				 required: true
			 },tipo: {
				 required: true
			 },precio: {
				 required: true,
				 decimal:true
			 }
		 }, messages: {
			descripcion: {
				 required: "Ingrese Descripcion"
			 },tipo: {
				 required: "Seleccione Tipo"
			 },precio: {
				 required: "Ingrese Numero",
				 decimal:"Ingrese 2 Decimales "
			 }
		 },
		 submitHandler: function (form) {
			 e.preventDefault();
			 insertar_Producto();
		 }
	 });
 });

 $( "#GuardarCliente" ).click(function( e ) {
 $("#frmCreaCliente").validate({
		 rules: {
			nombre: {
				 required: true
			 },v_contact: {
				 required: true
			 },tlfn: {
				 required: true,
				 number:true
			 },domicilio: {
				 required: true
			 },razon_social: {
				 required: true
			 },tipo: {
				 required: true
			 },documento: {
				 required: true,
				 number:true
			 }
		 }, messages: {
			nombre: {
				 required: "Ingrese Descripcion"
			 },v_contact: {
				 required: "Ingrese Contacto"
			 },tlfn: {
				 required: "Ingrese Telefono",
				 number: "Ingrese Digitos"
			 },domicilio: {
				 required: "Ingrese domicilio",
			 },razon_social: {
				 required: "Ingrese Razon Social",
			 },tipo: {
				 required: "Seleccione tipo",
			 },documento: {
				 required: "Ingrese documento",
				 number: "Ingrese Digitos"
				 
			 }
		 },
		 submitHandler: function (form) {
			 e.preventDefault();
			 insertar_Cliente();
		 }
	 });
 });
//arrays detalle orden
var A_codproducto=[];  	
var A_cantidad=[];     	
var A_producto=[];     	
var A_tipo=[];         
var A_observacion=[];    
var A_precio=[];       
var A_importe=[];      
var op_item=0;	//bandera para controlar operaci�n 0 insertar item 1 actualizar item
 
/*******************utilitarios********************/
 function fn_mostrar_modal(ide)
 {   $('#'+ide).modal("show");
 }

 function fn_ocultar_modal(ide)
 { $('#'+ide).modal("hide");
   
 }
 
/**************************************************/



/**********************inicio selecci�n de cliente **************************/


function fn_limpiar_modal_sel_cliente()
{ $("#txt_nombre").val('');
  $("#txt_documento").val('');
  $("#cuadro_paginacion_sel_cliente").html('');
  $("#tabla_sel_cliente").html('');
}


function fn_set_cliente(codcliente,nombre,documento)
{  $("#codcliente").val(codcliente);
   $("#nomb_cliente").text(nombre);
   $("#doc_cliente").text(documento);
}




$(function(){
$("#txt_nombre").keypress(function(e) {
   if(e.which == 13) {
         // Acciones a realizar, por ej: enviar formulario.
	    bus_Cliente();
	   return false;
     }   
  });
});


$(function(){
	$("#txt_documento").keypress(function(e) {
	   if(e.which == 13) {
	         // Acciones a realizar, por ej: enviar formulario.
		    bus_Cliente(1);
		    return false;
	      }
	  });
});


$(function(){
  $("#btnbuscar").click(function(){
	   bus_Cliente(1);
	return false;
  });
});



function bus_Cliente(npagina)
{	
	var v_nombre=$("#txt_nombre").val();
    var v_documento=$("#txt_documento").val();
	$.ajax({
  		type: "POST",
  		data:{ nombre:v_nombre,
  			   documento:v_documento,	
			   pagina:npagina
			 },
  		async: true,
  		url: "<?php echo base_url()?>consCliente_c/obt_datos",
  		beforeSend: function(msg){
  		// AQUI TIENE QUE IR TU POPUP DONDE INICIARIA LA IMAGEN "CARGANDO ..."
  		//	$('#processing-modal').modal('show');      
  		},
  		success: function(objJson){
  	           var array= objJson;
               var listpaginas=array["totalpaginas"];
               var registro=listpaginas[0];
               var lista=array["lista"];
               tpaginas=registro["totpag"].toString();
               totpaginas=tpaginas;

               $("#tpagina").val(tpaginas);
       	       $("#pactual").val(npagina);

      		    
            
      			if (tpaginas >0)
          		  { var contendiopag="";
        			contendiopag="<span>Resultado:</span>";
          			contendiopag=contendiopag+"<ul class='pagination'>";
          			contendiopag=contendiopag+"<li><a  id='retro' href='#' onclick=fn_retroceder('CLI')>&laquo; Anterior</a></li>"; 



          		   if (tpaginas<=10)
    				    { for(var x=1;x<=tpaginas;x++) 
    				      { contendiopag=contendiopag+"<li><a id='"+x+"' href='#' onclick="+"bus_Cliente('"+x+"')>"+x+"</a></li>";							   
    				      }
    				    }
    				if (tpaginas>10)
        			    {if (npagina>=1)
            			    {  var id=npagina-5;  	      
    						   for(var x=1; x<=5;x++)
        						   {   id++;
    								     contendiopag=contendiopag+"<li><a id='"+id+"'  href='#' onclick="+"bus_Cliente('"+id+"')>"+id+"</a></li>";
    							   }
    						     var id=npagina;  	      
    							 for(var x=1; x<=5;x++)
        							 {  id++;
    								    contendiopag=contendiopag+"<li><a id='"+id+"'  href='#' onclick="+"bus_Cliente('"+id+"')>"+id+"</a></li>";  
    								  } 
    						    			  
    						  }
    								
    					 }

    			   contendiopag=contendiopag+"<li><a id='sgte' href='#' onclick=fn_siguiente('CLI')>Siguiente &raquo;</a></li>";
     			   contendiopag=contendiopag+"</ul>";
     			   $('#cuadro_paginacion_sel_cliente').html(contendiopag);
          		  }

      		   
                if(lista.length > 0) 
          	  	 {  
             	  	   var sb="";
  					   sb=sb+" <div class='row'>";
  					   sb=sb+"   <div class='col-xs-4'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
  					   sb=sb+"          NOMBRE DE CLIENTE";  
  					   sb=sb+" 	  </div>"; 
  					   sb=sb+"   <div class='col-xs-4'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
					   sb=sb+"          DOCUMENTO";  
					   sb=sb+" 	  </div>"; 
					   sb=sb+"    <div class='col-xs-4'  style='background-color:rgb(0,128,255); color:white; font-size:12px;'>";
  					   sb=sb+" 		    OPERACI&Oacute;N";
  					   sb=sb+" 	  </div>";				   
  					   sb=sb+" </div>";	
          	  	
           	  	       for(var i=0;i<lista.length;i++)
                         {   var fila=lista[i];
                             var v_codcli=fila["COD_CLI"].toString();	
							 var v_nombre=fila["NOMBRE"].toString();	
							 var v_nombre=v_nombre.replace(/\s/g,"&nbsp;");	
							 var v_documento=fila["NRO_DOCUMENTO"].toString();
							 var v_documento=v_documento.replace(/\s/g,"&nbsp;");	

							  sb=sb+" <div class='row'>";   
                              sb=sb+"   <div class='col-xs-4'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'> ";
         	  	          	  sb=sb+fila["NOMBRE"].toString();
         	  	         	  sb=sb+"   </div>";
         	  	              sb=sb+"  <div class='col-xs-4'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'> ";
       	  	          	      sb=sb+fila["NRO_DOCUMENTO"].toString();
       	  	         	      sb=sb+"  </div>";
       	  	      	 	  	  sb=sb+"  <div class='col-xs-4'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:11px;'>";
       	  	      	 	      sb=sb+"   <a href='#' onclick=fn_set_cliente("+v_codcli+",'"+v_nombre+"','"+v_documento+"'),fn_ocultar_modal('modal_seleccionar_cliente'),fn_limpiar_modal_sel_cliente();>";
        	  	      	      sb=sb+"      Seleccionar&nbsp";
       	  	      	          sb=sb+"	   <img src='<?php echo base_url()?>public/images/SELECT3.png'>";
       	  	      	          sb=sb+"	</a>"; 
     	  					  sb=sb+"  </div>";
	   	  			          sb=sb+"</div> ";
     	  			      }
					
                        // alert('sb'+sb);
           	  	       
         	  	         $('#tabla_sel_cliente').html('');
              	  	     $('#tabla_sel_cliente').append(sb);
              	  	     seleccionar_pagina(npagina);
             	 }
    			   



                
  		}
  		,complete: function(data){
  			// AQUI TIENES QUE PONERLE FIN A LA IMAGEN "CARGANDO ..."
  			   $('#processing-modal').modal('hide');  
  			}
  		,error: function()
  		 {   
  			  $('#cuadro_paginacion_sel_cliente').html('');
 	  		  $('#tabla_sel_cliente').html('No existen Registros');
  	  		 // alert('Se ha producido un error al cargar ');
	     }

	});  
}




function fn_retroceder(tipo){
   var pactual=$("#pactual").val();
   	if(pactual>1){
		pactual--;
      switch(tipo)
      { case 'CLI'  : {bus_Cliente(pactual);} break;
        case 'PROD' : {bus_producto(pactual);} break;

      }
	}
}

function fn_siguiente(tipo){
var totpaginas= $("#tpagina").val();
 var pactual=$("#pactual").val();
if(pactual<totpaginas){
		  pactual++;
		  switch(tipo)
	      { case 'CLI'  : {bus_Cliente(pactual);} break;
	        case 'PROD' : {bus_producto(pactual);} break;
	      }

	  }	
}

function seleccionar_pagina(npagina){
 $('#'+npagina ).attr({
	   'style':'color:WHITE; background-color: rgb(0,128,255)'
  });

}

/********************* fin selecci�n cliente  ***********************/
 
 
 /**********************  mantenimiento cliente **************************/

function fn_limpiar_modal_crea_cliente()
{ $("#txt_razon_social").val('');
  $("#tipo_doc").val(0);
  $("#tipo_doc option[value="+"0" +"]").attr("selected",true);
  $("#txt_doc_cliente").val('');
  $("#txt_contacto").val('');
  $("#txt_direccion").val('');
  $("#txt_tlfn").val('');
}
 

function validarDatos_cliente()
{	
    var v_rsocial=$("#txt_razon_social").val();
    var v_tipo=$("#tipo_doc").val();
	var v_docu=$("#txt_doc_cliente").val();
	var v_contact=$("#txt_contacto").val();
    var v_dir=$("#txt_direccion").val();
    var v_tlfn=$("#txt_tlfn").val();

    var Msg="";
  
     if(v_rsocial==''  || v_rsocial === null)
    {     Msg = Msg + "- Ingrese Raz&oacute;n Social de cliente </br>" ;
    }

   if(v_tipo==0 || v_tipo === null)
    {     Msg = Msg + "- Seleccione tipo de documento  </br>" ;
    }

   if(v_docu==''  || v_docu === null)
    {     Msg = Msg + "- Ingrese n&uacute;mero de documento </br>" ;
    }

    if( v_contact=='' ||  v_contact === null)
    {     Msg = Msg + "- Ingrese nombre de contacto </br>" ;
    }
 
   
    if(v_dir=='' || v_dir === null)
    {     Msg = Msg + "- Ingrese direcci&oacute;n </br>" ;
    }

    if(v_tlfn=='' || v_tlfn === null)
    {     Msg = Msg + "- Ingrese Tel&eacute;fono </br>" ;
    }

    return Msg;
     
}


function fn_registrar_cliente()
{ var msg=validarDatos_cliente();
   if (msg=='')
      {   insertar_cliente();  }
   else
      {   $("#mensaje_creaCliente").html(msg);
	      $("#modal_CreaCliente_msg_error").modal("show");
      }	    
}


function insertar_cliente()
{       var v_rsocial=$("#txt_razon_social").val();
	    var v_tipo=$("#tipo_doc").val();
		var v_docu=$("#txt_doc_cliente").val();
		var v_contact=$("#txt_contacto").val();
		var v_dir=$("#txt_direccion").val();
		var v_tlfn=$("#txt_tlfn").val();

$.ajax({
	    url:  "<?php echo base_url()?>MantCliente_c/insertar_creaOrdenEntrada",
	    type: 'post',//metodo
	    data: { nombre:	      v_contact,
			    tlfn:         v_tlfn,
		        domicilio:    v_dir,
		        razon_social: v_rsocial,
		        tipo:         v_tipo,
		        documento:    v_docu
	    	  }, //parametros
	    success: function(respuesta) { 

	   if(respuesta==1)
	       {  $("#modal_creaCliente_reg_ok").modal("show");
	       }
	       else
	       {
	      	 $("#modal_creaCliente_reg_error").modal("show");
	       }    
	    }, 
	    error: function() { alert('Se ha producido un error'); }

    });

    return false;
}


/********************* fin mantenimiento cliente  ***********************/
 
/*****************************selecciona producto***************************************/
 
 
  

 $(function(){
 $("#txt_des_producto").keypress(function(e) {
    if(e.which == 13) {
          // Acciones a realizar, por ej: enviar formulario.
 	    bus_producto(1);
 	   return false;
      }
    
   });
   
 });


 $(function(){
   $("#btn_bus_producto").click(function(){
 	   bus_producto(1);
 	return false;
   });
 });

  
 
function bus_producto(npagina)
{       var Descripcion= $("#txt_des_producto").val();
		$.ajax({
			type: "POST",
			data:{  descripcion:Descripcion,
	           		tipo: '',
				    pagina:npagina
				 },
	  		async: true,
	  		url: "<?php echo base_url()?>consProducto_c/obt_datos",
	  		beforeSend: function(msg){
	  		// AQUI TIENE QUE IR TU POPUP DONDE INICIARIA LA IMAGEN "CARGANDO ..."
	  		//	$('#processing-modal').modal('show');      
	  		},
	  		success: function(objJson){
	  	           var array= objJson;
	               var listpaginas=array["totalpaginas"];
	               var registro=listpaginas[0];
	               var lista=array["lista"];
	               tpaginas=registro["totpag"].toString();
	               totpaginas=tpaginas;

	               $("#tpagina").val(tpaginas);
	       	       $("#pactual").val(npagina);
	       				
      		
               // console.log(JSON.stringfy(objJson));
      		    
            
      			if (tpaginas >0)
          		  { var contendiopag="";
        			contendiopag="<span>Resultado:</span>";
          			contendiopag=contendiopag+"<ul class='pagination'>";
          			contendiopag=contendiopag+"<li><a  id='retro' href='#' onclick='fn_retroceder()'>&laquo; Anterior</a></li>"; 



          		   if (tpaginas<=10)
    				    { for(var x=1;x<=tpaginas;x++) 
    				      { contendiopag=contendiopag+"<li><a id='"+x+"' href='#' onclick="+"fn_mostrar_pagina('"+x+"')>"+x+"</a></li>";							   
    				      }
    				    }
    				if (tpaginas>10)
        			    {if (npagina>=1)
            			    {  var id=npagina-5;  	      
    						   for(var x=1; x<=5;x++)
        						   {   id++;
    								     contendiopag=contendiopag+"<li><a id='"+id+"'  href='#' onclick="+"fn_mostrar_pagina('"+id+"')>"+id+"</a></li>";
    							   }
    						     var id=npagina;  	      
    							 for(var x=1; x<=5;x++)
        							 {  id++;
    								    contendiopag=contendiopag+"<li><a id='"+id+"'  href='#' onclick="+"fn_mostrar_pagina('"+id+")'>"+id+"</a></li>";  
    								  } 
    						    			  
    						  }
    								
    					 }

    			   contendiopag=contendiopag+"<li><a id='sgte' href='#' onclick='fn_siguiente()'>Siguiente &raquo;</a></li>";
     			   contendiopag=contendiopag+"</ul>";
     			   $('#cuadro_paginacion_sel_producto').html(contendiopag);
          		  }
    			   

    			 if(lista.length > 0) 
           	  	 {  
              	  	   var sb="";
   					   sb=sb+" <div class='row'>";
   					   sb=sb+"   <div class='col-xs-10'  style='background-color:rgb(0,128,255); color:white; font-size:10px;'>";
   					   sb=sb+"      DESCRIPCI&Oacute;N";  
   					   sb=sb+" 	  </div>"; 
   					   sb=sb+"    <div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:10px;'>";
   					   sb=sb+" 		    OPERACI&Oacute;N";
   					   sb=sb+" 	  </div>";				   
   					   sb=sb+" </div>";	

            	  	    for(var i=0;i<lista.length;i++)
                          {  var fila=lista[i];
                             var v_codprod=fila["COD_PROD"].toString();
                    	  	 var v_producto=fila["DESCRIPCION"].toString();
							 var v_producto=v_producto.replace(/\s/g,"&nbsp;");		
     	  	         	     var v_tipo=fila["DESC_TIPO"].toString();
     	  	         	     var v_tipo=v_tipo.replace(/\s/g,"&nbsp;");	
     	  	    	         var v_precio=fila["PRECIO"].toString();

                              sb=sb+"<div class='row'>";   
                              sb=sb+"   <div class='col-xs-10'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:9px;'> ";
          	  	          	  sb=sb+fila["DESCRIPCION"].toString();
          	  	         	  sb=sb+"  </div>";
          	  	      	 	  sb=sb+"  <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:9px;'>";
	          	  	    	  sb=sb+"      <a href='#' onclick=fn_set_producto("+v_codprod+",'"+ v_producto+"','"+v_tipo+"',"+v_precio+"),fn_ocultar_modal('modal_seleccionar_producto'),fn_mostrar_modal('modal_add_producto');>";
	          	  	    	  sb=sb+"           Seleccionar&nbsp";
     	  	      	          sb=sb+"	        <img src='<?php echo base_url()?>public/images/SELECT3.png'>";
     	  	      	          sb=sb+"	   </a>"; 
	   	  			 	      sb=sb+"  </div>";
	   	  			 	      sb=sb+"</div> ";
      	  			      }

            	  	     //alert('sb'+sb);
                	  	 $('#tabla_sel_producto').html('');
               	  	     $('#tabla_sel_producto').append(sb);
               	  	     seleccionar_pagina(npagina);
              	 }

                

                
  		}
  		,complete: function(data){
  			// AQUI TIENES QUE PONERLE FIN A LA IMAGEN "CARGANDO ..."
  			   $('#processing-modal').modal('hide');  
  			}
  		,error: function()
  		 {   
  			  $('#cuadro_paginacion_sel_producto').html('');
 	  		  $('#tabla_sel_producto').html('No existen Registros');
  	  		 // alert('Se ha producido un error al cargar ');
	     }

	});  
}




function fn_set_producto(codprod,desprod,tipo,precio)
{ $('#codproducto').val(codprod);
  $('#prod_sel').text(desprod);
  $('#tip_prod_sel').text(tipo);
  $('#precio_prod_sel').text(precio);
  
}
 
/*************************fin selecion cliente********************************************/

/*************************  Inicio crea Producto  *****************************/
  
 function fn_mostrar_crea_producto()
 {  $('#modal_crea_producto').modal('show');  
    $('#modal_seleccionar_producto').modal('hide'); 
    $('#modal_add_producto').modal('hide');  
 } 


function fn_limpiar_modal_crea_producto()
{ $("#txt_descproducto").val('');
  $("#tipo_producto").val(0);
  $("#tipo_producto option[value="+"0" +"]").attr("selected",true);
  $("#txt_precio_producto").val('');

}

function fn_limpiar_modal_sel_producto()
{ $("#txt_des_producto").val('');
  $("#cuadro_paginacion_sel_producto").html('');
  $("#tabla_sel_producto").html('');
}

function fn_limpiar_modal_add_producto()
{ $('#codproducto').val(-1);
  $('#prod_sel').text('');
  $('#tip_prod_sel').text('');
  $('#precio_prod_sel').text('');
  $('#cant_prod_sel').val('');
}









function validarDatos_Producto()
{  var v_producto=$("#txt_desc_producto").val();
   var v_tipo=$("#tipo_producto").val();
   var v_precio=$("#txt_precio_producto").val();
   var Msg="";
  
  if(v_producto==''  || v_producto === null)
    {     Msg = Msg + "- Ingrese Descripci&oacute;n de Producto </br>" ; }

   if(v_tipo==0 || v_tipo === null)
    {     Msg = Msg + "- Seleccione tipo de producto  </br>" ; }

   if(v_precio==''  || v_precio === null)
    {     Msg = Msg + "- Ingrese precio de producto </br>" ; }
   
   return Msg;
     
}




function fn_registrar_producto()
{ var msg=validarDatos_Producto();
   if (msg=='')
      {   insertar_Producto();  }
   else
      {   $("#mensaje_creaProducto").html(msg);
	      $("#modal_CreaProducto_msg_error").modal("show");
      }	    
}


function insertar_Producto()
{   var v_producto=$("#txt_desc_producto").val();
	var v_tipo=$("#tipo_producto").val();
    var v_precio=$("#txt_precio_producto").val();

$.ajax({
	    url:  "<?php echo base_url()?>MantProducto_c/insertar",
	    type: 'post',//metodo
	    data: { descripcion:v_producto,
			    tipo:       v_tipo,
		        precio:     v_precio
	    	  }, //parametros
	    success: function(respuesta) { 

	   if(respuesta==1)
	       {  $("#modal_creaProducto_reg_ok").modal("show");
	       }
	       else
	       {
	      	 $("#modal_creaProducto_reg_error").modal("show");
	       }    
	    }, 
	    error: function() { alert('Se ha producido un error'); }

    });

    return false;
}


$(function(){
	$("#cant_prod_sel").keypress(function(e) {
	   if(e.which == 13) {
           switch(op_item) 
           { case 0:{  var v_ide=$("#codproducto").val();
					   var v_cod=parseFloat(v_ide);
					   if(!isNaN(parseFloat(v_cod)) && v_cod!=-1)
					   {	fn_agregar_item();
				       		fn_limpiar_modal_add_producto();
					   		fn_ocultar_modal('modal_add_producto');
					   		return false;
					   	}
					   else
					   {alert('Favor de ingresar producto');}
           			};break;
             case 1:{	var v_ide=$("#codproducto").val();
                        //alert('v_ide'+v_ide);
                        fn_del(v_ide);
	            	 	fn_agregar_item();
		       			fn_limpiar_modal_add_producto();
			   			fn_ocultar_modal('modal_add_producto');
			   			op_item=0;
			   			return false;

                    };break;
           }
	      
	     }   
	  });
});




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
{  $("#modal_add_producto").modal("show");
}


function fn_del(id)
{	$('#'+id).remove();
	//calcular_total(-importe);
	fn_del_item_array(id);
	calcular_total();
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

function fn_agregar_item()
{  var v_ide=$("#codproducto").val();
   var verdad=existe_en_lista(v_ide, A_codproducto); 

	   if (!verdad)
	   {   var v_producto=$('#prod_sel').text();
		   var v_tipo= $('#tip_prod_sel').text();
		   var v_precio=parseFloat($('#precio_prod_sel').text());
		   var v_obs=$("#obs_prod_sel").val();
		   var v_cantidad=parseFloat($("#cant_prod_sel").val());
		   var v_importe=v_cantidad*v_precio;
		   var sb="";
		
		     sb=sb+"<div id='"+v_ide+"' class='row'>";  
		     sb=sb+"<div class='col-xs-1'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>"; 
		     sb=sb+v_cantidad;
		   	 sb=sb+"</div>";
		     sb=sb+" <div class='col-xs-3'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'> ";
		  	 sb=sb+v_producto;
		 	 sb=sb+"</div>";
			 sb=sb+"<div class='col-xs-1'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>";
		     sb=sb+v_tipo;
			 sb=sb+"</div>";
		 	 sb=sb+" <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>";
		 	 sb=sb+v_obs;
			 sb=sb+"  </div>";
			 sb=sb+" <div class='col-xs-1'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>";
		 	 sb=sb+ v_precio;
			 sb=sb+"  </div>";
			 sb=sb+" <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>";
		 	 sb=sb+v_importe;
			 sb=sb+"  </div>";
			 sb=sb+"  <div class='col-xs-1'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>";
	         sb=sb+"	<a  href='#' onclick=fn_edit('"+v_ide+"')>";
		     sb=sb+"	   Editar&nbsp";
			 sb=sb+"	   <img src='<?php echo base_url()?>public/images/EDITAR.png'>";
			 sb=sb+"	</a>"; 
			 sb=sb+"  </div>"; 
			 sb=sb+"  <div class='col-xs-1'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>";
			 sb=sb+"     <a href='#' onclick=fn_del('"+v_ide+"')>";
			 sb=sb+"        Eliminar&nbsp";
			 sb=sb+"      <img src='<?php echo base_url()?>public/images/ELIMINAR.png'>";
			 sb=sb+"     </a> ";
			 sb=sb+"  </div>";
			 sb=sb+"</div>"; 
		     $('#tabla').append(sb);
			 fn_add_item_array(v_cantidad,v_producto,v_ide,v_tipo,v_obs,v_precio,v_importe);
		     calcular_total();
		   }
	   else
	   { alert('Producto ya existe en el detalle del documento'); }
 
}


function fn_edit(ide)
{ op_item=1; 
  var ind=fn_obt_indice(ide);
  if(ind>-1)
    {   $('#codproducto').val(ide);
        $('#prod_sel').text(A_producto[ind]);
        $('#tip_prod_sel').text(A_tipo[ind]);
        $('#precio_prod_sel').text(A_precio[ind]);
        $('#cant_prod_sel').val( A_cantidad[ind]);
        fn_mostrar_modal('modal_add_producto');
    }
  
}


function calcular_total()
{  var v_total=0;
   for(var i=0;i<A_importe.length;i++)
	{   var importe=parseFloat(A_importe[i]);
	     v_total=v_total+importe; 
	}
   $('#txt_total').text(v_total);

}



function redondeo(numero,decimales)
{	var flotante=parseFloat(numero);
	var resultado=Math.round(flotante*Math.pow(10,decimales))/Math.pow(10,decimales);
    return resultado;
}


function fn_add_item_array(cantidad,desproducto,codproducto,tipo,observacion,precio,importe)
{ A_cantidad[A_cantidad.length]=cantidad;
  A_producto[A_producto.length]=desproducto;
  A_codproducto[A_codproducto.length]=codproducto;
  A_tipo[A_tipo.length]=tipo;
  A_observacion[A_observacion.length]=observacion;
  A_precio[A_precio.length]=precio;
  A_importe[A_importe.length]=importe;

}


function fn_del_item_array(codproducto)
{ var ind=fn_obt_indice(codproducto);
  if(ind>-1)
    {   A_cantidad.splice(ind, 1);
    	A_producto.splice(ind, 1);
        A_codproducto.splice(ind, 1);
        A_tipo.splice(ind, 1);
        A_observacion.splice(ind, 1);
        A_precio.splice(ind, 1);
        A_importe.splice(ind, 1);
     }

}

function fn_obt_indice(codproducto)
{ var indice=-1;
	for(var i=0;i<A_codproducto.length;i++)
	{    if(A_codproducto[i]==codproducto)
	       {indice=i;
            i=A_codproducto.length;
	       }  
	}

 return indice;
}


function validarDatos_OrdenE()
{  var v_codcliente=$("#codcliente").val();
   var v_comentario=$("#comentario").val();
   var v_cantitems=A_codproducto.length;
   var Msg="";
   
  if(v_codcliente===''  || v_codcliente === null)
    {     Msg = Msg + "- Ingrese cliente </br>" ; }

  if(v_comentario==''  || v_comentario === null)
    {     Msg = Msg + "- Ingrese comentario </br>" ; }

  if(v_cantitems===0)
   {     Msg = Msg + "- Ingrese alg&uacute;n item </br>" ; }

   return Msg;
     
}




function fn_registrar_OrdenE()
{
   var msg=validarDatos_OrdenE();
   if (msg=='')
      {   insertar_OrdenE();  }
   else
      {   $("#mensaje_crea_OrdenEntrada").html(msg);
	      $("#modal_CreaOrden_msg_error").modal("show");
      }	    
    
}



function pad(n,longitud)
{ //funcion que completa de ceros a la izquierda
   var n=n.toString();
   while(n.length<longitud)
       n="0"+n;
   return n;

}

function insertar_OrdenE()
{  var v_cod_SerieOrden=<?php echo $codserorden?>;
   var v_serie=<?php echo $serie?>;
   var v_numero=<?php echo $numero?>;
   var v_serie=pad(v_serie,6);
   var v_numero=pad(v_numero,6);
   var v_fecha =$('#fecha').text(); 
   var v_cod_cli=$('#codcliente').val(); 
   var v_total=$('#txt_total').text(); 
   var v_obs=$("#comentario").val(); 
   var v_usu_crea=<?php echo $codusuario?>;

   var A_detfactura = [];
   for(var i=0;i<A_codproducto.length;i++)
		{  var item = {};
	       item ["codproducto"]= A_codproducto[i];
	       item ["cantidad"]= A_cantidad[i];
	       item ['obs']=  A_observacion[i];
	       item ['precio']= A_precio[i];
	       A_detfactura.push(item);
	   	  
		}
   var arreglo=JSON.stringify(A_detfactura);

   
 $.ajax({
	    url:  "<?php echo base_url()?>MantOrdenEntrada_c/insertar",
	    type: 'post',//metodo
	    data: { cod_SerOrden: v_cod_SerieOrden,
			    serie:        v_serie,
		        numero:       v_numero,
				fecha:	      v_fecha,
                codcliente:   v_cod_cli,
                total:        v_total,   
                obs:          v_obs, 
                usuario:      v_usu_crea,
                detfactura:   arreglo
            }, //parametros
	    success: function(respuesta) { 
	   if(respuesta==1)
	       {  $("#modal_CreaOrden_reg_ok").modal("show");
	       }
	       else
	       {
	      	 $("#modal_CreaOrden_reg_error").modal("show");
	       }    
	    }, 
	    error: function() { alert('Se ha producido un error'); }

    });

    return false;
  
}


/*
function fn_prueba_envio()
{  var A_datos = [];
   for(var i=0;i<A_codproducto.length;i++)
		{  var item = {};
	       item ["codproducto"]= A_codproducto[i];
	       item ["cantidad"]= A_cantidad[i];
	       item ['obs']=  A_observacion[i];
	       item ['precio']= A_precio[i];
	       A_datos.push(item);
	   	  
		}
     var arreglo=JSON.stringify(A_datos);

   $.ajax({
	    url:  "</?php echo base_url()?>MantOrdenEntrada_c/prueba",
	    type: 'post',//metodo
	    data: {  dato: arreglo,
		         prueba:'probando'
		      }, //parametros
	    success: function(respuesta) { 
		alert('respuesta:'+respuesta);   
	  if(respuesta==1)
	       {  $("#modal_CreaOrden_reg_ok").modal("show");
	       }
	   else
	       {
	      	 $("#modal_CreaOrden_reg_error").modal("show");
	       }  
	    }
	    , 
	    error: function() { alert('Se ha producido un error');

	  
	     }

   });
   return false;
}*/


</script>
</body>
</html>