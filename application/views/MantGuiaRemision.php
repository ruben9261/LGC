<!DOCTYPE html> 
<html> 
  <head> 
    <title>Mantenimiento de Gesti&oacute;n de Guia de Remisi&oacute;n </title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="/public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="/public/pnotify/pnotify.custom.min.css">
	<link rel="stylesheet" href="/public/styles/bootstrap-datepicker.css"/>
	<script type="text/javascript" src="/public/jquery/jquery-3.1.1.min.js"></script>



	<script  type="text/javascript"  src="/public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	
	<style>
label.help-block {
    color: #ba0f26 !important;
}label.control-label {
    color: #0080ff!important;
}


		p.pull-rigth {
    float: right;
    margin-right: 105px;
	margin-top: 5px;
}
th.sorting_asc,th.sorting_desc,th.sorting {
    background: #007ffd;
    color: #ffffff;
} a.btn.btn-success {
    float: right !important;
}
i.btn.glyphicon.glyphicon-ok {
    background: #00da08;
    color: #ffffff;
}.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}.fa-file-pdf-o:before {
    content: "\f1c1";
}

.container.contenido{
	border: 1px solid rgb(0,128,255); 
	
	}
	.container{
		background-color:rgb(255,255,255);

		width: 90%;
		height:50%;
	}
td.input-sm {
    border: #0080ff 1px solid;
}
		 .container-border{
			background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);
			
		} 

		.container-style{
			background-color: white; 
			color:rgb(0,128,255);
			font-size:12px;
		}

		.thead-style{
			background-color:rgb(0,128,255); color:white; font-size:11px;
		}.form-horizontal .form-group {
    margin-right: 10px;
    margin-left: 10px;
}



a#btnNuevo_selproducto {
    padding: 0px;
}
	</style>



 </head>
<body>
<?php


  $datos = 0;

	
	$FECHA_EMISION = "";
	$FECHA_TRASLADO = "";
	$PUNTO_PARTIDA = "";
	$PUNTO_LLEGADA = "";
	$RAZON_SOCIAL = "";
	$NRO_DOCUMENTO = "";
	$MARCA_PLACA = "";
	$NROCONS_INSCRIPC = "";
	$NROLIC_CONDUCIR = "";
	$ORDEN_COMPRA = "";
	$NRO_PEDIDO = "";
	$NRO_COMPROBANTE = "";
	$TIPO_COMPROBANTE = "";
	$TRANSPORTISTA = "";
	$TRANSPORTISTA_RUC = "";
	$COSTO_MINIMO = "";
	$COD_MOT_TRAS = "";
	$FECHA_EMISION_NEW = "";
	$FECHA_TRASLADO_NEW = "";
	if(count($GuiaRemision)>0){

		foreach($GuiaRemision as $item){
			$FECHA_EMISION = $item->FECHA_EMISION;
			$FECHA_TRASLADO = $item->FECHA_TRASLADO;
			//$NUM_ACTUAL = $item->NUM_ACTUAL;

			
			$fechahora=explode(" ", $FECHA_EMISION);
			$fecha=$fechahora[0];
			$hora = $fechahora[1];
			 
			$fecha=explode("-", $fecha);
			$dia=$fecha[2];
			$mes=$fecha[1];
			$ano=$fecha[0];
			 
			$hora=explode(":", $hora);
			 
			$horas=$hora[0];
			$minutos=$hora[1];
			$segundos=$hora[2];
			$FECHA_EMISION_NEW = "$mes/$dia/$ano"; // join them together
		   
			$fechahora2=explode(" ", $FECHA_TRASLADO);
			$fecha2=$fechahora2[0];
			$hora2= $fechahora2[1];
			 
			$fecha2=explode("-", $fecha2);
			$dia2=$fecha2[2];
			$mes2=$fecha2[1];
			$ano2=$fecha2[0];
			 
			$hora2=explode(":", $hora2);
			 
			$horas2=$hora2[0];
			$minutos2=$hora2[1];
			$segundos2=$hora2[2];
			$FECHA_TRASLADO_NEW = "$mes2/$dia2/$ano2"; // join them together


			$PUNTO_PARTIDA = $item->PUNTO_PARTIDA;
			$PUNTO_LLEGADA = $item->PUNTO_LLEGADA;
			$RAZON_SOCIAL = $item->RAZON_SOCIAL;
			$NRO_DOCUMENTO = $item->NRO_DOCUMENTO;
			$MARCA_PLACA = $item->MARCA_PLACA;
			$NROCONS_INSCRIPC = $item->NROCONS_INSCRIPC;
			$NROLIC_CONDUCIR = $item->NROLIC_CONDUCIR;
			$ORDEN_COMPRA = $item->ORDEN_COMPRA;
			$NRO_PEDIDO = $item->NRO_PEDIDO;
			$NRO_COMPROBANTE = $item->NRO_COMPROBANTE;
			$TIPO_COMPROBANTE = $item->TIPO_COMPROBANTE;
			$TRANSPORTISTA = $item->TRANSPORTISTA;
			$TRANSPORTISTA_RUC = $item->TRANSPORTISTA_RUC;
			$COSTO_MINIMO = $item->COSTO_MINIMO;
			$COD_MOT_TRAS = $item->COD_MOT_TRAS;
			//$RUC_EMPRESA = $item->RUC_EMPRESA;
		}
	}

	$displayPdf = "";

	if($TIPO_TRANSACCION==1){
		$displayPdf = "none";
	}else{
		$displayPdf = "true";
	}

?>
<br><br>
	<input type="hidden" Id="CodCli" name="" value="">
	<div class="container contenido" id="contenedor">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Mantenimiento de Gesti&oacute;n de Guia de Remisi&oacute;n</STRONG>
						 <div id="ImprimirPdf" class="" style="display:<?php echo $displayPdf;?>;">
						 	<a class="btn btn-success" target="_blank" id="generate">Imprimir <i class="fa fa-file-pdf-o"> </i>  </a>
						 </div>
		            </div>
					<br/>


				<form id="frmGuiaRemision" rol="form" class="form-horizontal" method="POST">
						 <input type="hidden" id="COD_GUIAREM" value="<?php echo $COD_GUIAREM; ?>">
						 <input type="hidden" id="SERIE" value="<?php echo $SERIE;?>">
						 <input type="hidden" id="COD_SERIE_GUIA" value="<?php echo $COD_SERIE_GUIA;?>">
					     <input type="hidden" id="NUM_ACTUAL" value="<?php echo $NUM_ACTUAL; ?>">

		    	         <input type="hidden" id="RUC_EMPRESA" value="<?php echo $RUC_EMPRESA; ?>">
						 
						 <input type="hidden" id="TIPO_TRANSACCION" value="<?php echo $TIPO_TRANSACCION; ?>">
						 <input type="hidden" id="Nomb_Empresa" value="<?php echo $Nomb_Empresa; ?>">
							<div class="form-group">
                            <div class="col-md-4 container-style" style="" id="divFechaOperacion">
									<label for="" class="control-label col-md-6" >Fecha de Emisión :</label>
									<div class="col-md-6">
										<div class='input-group'>
										<input type='text' name="FECHA_EMISION" id="FECHA_EMISION" class="form-control input-sm" value="<?php echo $FECHA_EMISION_NEW;?>" />
										<!-- <div class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</div> -->
										</div>
									</div>
                                </div> 
                                <div class="col-md-4 container-style" style="" id="divFechaOperacion">
									<label for="" class="control-label col-md-6" >Fecha de Translado :</label>
									<div class="col-md-6">
										<div class='input-group'>
										<input type='text' name="FECHA_TRASLADO" id="FECHA_TRASLADO" class="form-control input-sm" value="<?php echo $FECHA_TRASLADO_NEW;?>"/>
										<!-- <div class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</div> -->
										</div>
									</div>
								</div>                            
                            </div>
							<div class="form-group">
								<div class="col-md-4 container-style">
									<label for="" class=""></label>
								</div>
							</div>
                            
                              <div class="form-group">
								<div class="col-md-4 container-style">
									<label for="" class="control-label col-md-6">Punto de Partida :</label>
									<div class="col-md-6">
										<input type="text" class="form-control input-sm PUNTO_PARTIDA" name="PUNTO_PARTIDA" id="PUNTO_PARTIDA" value="<?php echo $PUNTO_PARTIDA;?>">
									</div>
								</div>
								<div class="col-md-4 container-style" style="" id="divNroCuenta">
									<label for="" class="control-label col-md-6"  >Punto de Llegada :</label>
									<div class="col-md-6">
										<input type="text" class="form-control input-sm" name="PUNTO_LLEGADA" id="PUNTO_LLEGADA" value="<?php echo $PUNTO_LLEGADA; ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4 container-style">
										<label for="" class="control-label col-md-6">Razón Social :</label>
										<div class="col-md-6">
                                        <input type="text" class="form-control input-sm" name="RAZON_SOCIAL" id="RAZON_SOCIAL" value="<?php echo $RAZON_SOCIAL; ?>">
										</div>
								</div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Nro Documento :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="NRO_DOCUMENTO" id="NRO_DOCUMENTO" value="<?php echo $NRO_DOCUMENTO; ?>">
                                   </div>
                                </div>
								
							</div>
							<div class="form-group">
								<div class="col-md-4 container-style">
										<label for="" class="control-label col-md-6">Marca Placa :</label>
										<div class="col-md-6">
                                        <input type="text" class="form-control input-sm" name="MARCA_PLACA" id="MARCA_PLACA" value="<?php echo $MARCA_PLACA; ?>">
										</div>
								</div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Nro Constancia Inscripción :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="NROCONS_INSCRIPC" id="NROCONS_INSCRIPC" value="<?php echo $NROCONS_INSCRIPC;?>">
                                   </div>
                                </div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Nro Licencia de Conducir :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="NROLIC_CONDUCIR" id="NROLIC_CONDUCIR" value="<?php echo $NROLIC_CONDUCIR; ?>">
                                   </div>
                                </div>
								
							</div>
							<div class="form-group">
								<div class="col-md-4 container-style">
										<label for="" class="control-label col-md-6">Número Comprobante :</label>
										<div class="col-md-6">
                                        <input type="text" class="form-control input-sm" name="NRO_COMPROBANTE" id="NRO_COMPROBANTE" value="<?php echo $NRO_COMPROBANTE;?>">
										</div>
								</div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Nro Orden de Compra :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="ORDEN_COMPRA" id="ORDEN_COMPRA" value="<?php echo $ORDEN_COMPRA; ?>">
                                   </div>
                                </div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Nro Pedido :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="NRO_PEDIDO" id="NRO_PEDIDO" value="<?php echo $NRO_PEDIDO; ?>">
                                   </div>
                                </div>
							</div>
							<div class="form-group">
							    <div class="col-md-4 container-style">
										<label for="" class="control-label col-md-6">Costo :</label>
										<div class="col-md-6">
                                        <input type="text" class="form-control input-sm" name="COSTO_MINIMO" id="COSTO_MINIMO" value="<?php echo $COSTO_MINIMO; ?>">
										</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4 container-style">
										<label for="" class="control-label col-md-6">Transportista :</label>
										<div class="col-md-6">
                                        <input type="text" class="form-control input-sm" name="TRANSPORTISTA" id="TRANSPORTISTA" value="<?php echo $TRANSPORTISTA;?>">
										</div>
								</div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Transportista RUC :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="TRANSPORTISTA_RUC" id="TRANSPORTISTA_RUC" value="<?php echo $TRANSPORTISTA_RUC; ?>">
                                   </div>
                                </div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Motivo de Traslado :</label>
                                   <div class="col-md-6">
                                    <select name="COD_MOT_TRAS" id="COD_MOT_TRAS" class="form-control input-sm">
									    <option value="">--SELECCIONE--</option>
										<?php
										 if(count($listMotivoTraslado)>0){
											 foreach($listMotivoTraslado as $item){
                                                echo '<option value="'.$item->COD_MOT_TRAS.'">'.$item->DESC_MOT_TRAS.'</option>';
											 }
										 }
										?>
									</select>
                                   </div>
                                </div>
							</div>
							<br/>
							<div class="form-group">
								<div  class='col-md-4 col-md-offset-1 container-style'>
									<div class="col-md-6 input-group">
										<button type="button" class="btn btn-primary" onclick="fn_AbrirModalProductos();">
											Agregar Producto
											<img src="/public/images/add.png">
										</button>
									</div>
								</div>
							</div>
							<br/><br/>
							
							<div class="container">		
								<div id="tabla"> 
									<table id="TablaGuiaRemision">
										<thead>
											<tr>
											<th class='col-md-3 thead-style'>
											PRODUCTO 
											</th> 
											<th class='col-md-2 thead-style'>
													 CANTIDAD
											</th> 
											<th class='col-md-2 thead-style'>
											DESC_UM
											</th>
											<th class='col-md-3 thead-style'>
													DESCRIPCION
											</th>
											<th class='col-md-2 thead-style'>
													ACCIONES
											</th>
											</tr>
										</thead>
									<tbody>
									   <?php
									 		if(count($GuiaRemisionDet)>0){
												$datos = $datos + 1;
												
												 foreach($GuiaRemisionDet as $item){
													$cols = "";


												   // GuiaRemisionDet.PRODUCTO = $(".PRODUCTO",this).val();
													$cols .= '<tr class="FILA'.$item->COD_PROD.'">';
													$cols .= '<input type="hidden" class="COD_PROD" value="'.$item->COD_PROD.'">';
													$cols .= '<input type="hidden" class="COD_UM" value="'.$item->COD_UM.'">';
													
													$cols .= '<input type="hidden" class="CANTIDAD" value="'.round($item->CANTIDAD,2).'">';
													$cols .= '<input type="hidden" class="DESCRIPCION" value="'.$item->DESCRIPCION.'">';
													$cols .= '<input type="hidden" class="PRODUCTO" value="'.$item->PRODUCTO.'">';
													$cols .= '<input type="hidden" class="UNIDMED" value="'.$item->DESC_UM.'">';
												
													$cols .= '<td class="col-md-3 input-sm" >'.$item->DESCRIPCION.'</td>';
													$cols .= '<td class="col-md-3 input-sm" >'.$item->PRODUCTO.'</td>';
													$cols .= '<td class="col-md-2 input-sm" >'.round($item->CANTIDAD,2).'</td>';
													$cols .= '<td class="col-md-2 input-sm" >'.$item->DESC_UM.'</td>';

													
													$cols .= '<td class="col-md-2 input-sm" ><i class="btn glyphicon glyphicon-remove" onclick="fn_EliminarOrdenSalidaDetalle('."'FILA".$item->COD_PROD."'".');"></i></td>';
													
													echo $cols;
												 }
											}
									   ?>
									</tbody><input type="hidden" name="datos" id="datos" value="0">
									<div id="demo"></div>
									<tfoot>
										<tr>
											<th class='col-md-3'></th>
											<th class='col-md-2'></th> 
											<th class='col-md-2'></th>
											<th class='col-md-2'></th>
											<th class='col-md-3'></th>
											<th class='col-md-2'></th>
										</tr>
									</tfoot>
									</table>
                                      
								</div> 
								
							</div>
							 <br/>
							 <br/>
							
										
							

					

						    <br/>
						    
						    <div class="form-group">
									   <button  type="submit" class="btn btn-primary" id="Guardar"  style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
									   		   Guardar
									           <img src="/public/images/GUARDAR.png">
									   </button>

									 
									     
									   <a href="/mantGuiaRemision_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
										        Cancelar
										        <img src="/public/images/CANCELAR.png">
									   </a>
						   </div>   
			   </form>
   </div>

   
 

	<div class="modal modal-static fade" id="processing-modal" data-backdrop="static" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<div class="text-center">
						<img src="/public/images/cargar2.gif">
						<h4>            Procesando... <button type="button" class="close" style="float: none;" data-dismiss="modal" aria-hidden="true"></button></h4>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div  data-backdrop="static"  class="modal fade" id="modal_crea_producto" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
			 <div class="modal-header btn-primary" style="background-color:rgb(0,128,255);">
			      <button class="close" data-dismiss="modal" aria-hidden="true" onclick="fn_ocultar_modal('modal_crea_producto');fn_limpiar_modal_crea_producto(); fn_mostrar_modal('ProductosModal');">&times;</button>
			                <h4>Crear Producto</h4>
			 </div>
		          
		     <div class="modal-body">
		          <form id="frmCreaProducto" >
					    <div class="form-group">
						          <input id="txt_desc_producto" name="descripcion"  type="text" class="form-control" placeholder="Nombre Producto" >
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
							     
							   <a href="#" class="btn btn-primary" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);" onclick="fn_ocultar_modal('modal_crea_producto'),fn_limpiar_modal_crea_producto(),fn_limpiar_modal_sel_producto(), fn_mostrar_modal('ProductosModal');">
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
<div class="modal fade" id="ProductosModal" data-backdrop="static" data-keyboard="false" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"> Agregar  Producto</h4>
        </div>
        <div class="modal-body">
		<form id="formAgregarProducto" method="POST">
			<div class="form-horizontal">
				<div class="form-group">
					<label for="" class=" col-md-3 control-label">Producto :</label>
					<div class="col-md-4">
						<select name="COD_PROD" class="form-control input-sm" id="COD_PROD">
							<option value="">--SELECCIONE--</option>
							<?php
							   if(count($listProducto)>0){
								   foreach($listProducto as $item){
									   echo '<option value="'.$item->COD_PROD.'">'.$item->DESCRIPCION.'</option>';
								   }
							   }
							?>
						</select>
					</div>

					<a href="#"   class="btn btn-primary col-md-3 col-md-offset-1"  id="btnNuevo_selproducto" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_modal_crea_producto();" >
					    	 		    <img src="<?php echo base_url()?>public/images/REGISTRAR.png">
					    	 		    Nuevo
					    	 	    </a
				</div>
				<div class="form-group">
					<label for="" class=" col-md-3 control-label">Unidad :</label>
					<div class="col-md-4">
						<select name="COD_UM" class="form-control input-sm" id="COD_UM">
							<option value="">--SELECCIONE--</option>
							<?php
							   if(count($listUnidadMedida)>0){
								   foreach($listUnidadMedida as $item){
									   echo '<option value="'.$item->COD_UM.'">'.$item->DESC_UM.'</option>';
								   }
							   }
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="" class=" col-md-3 control-label">Cantidad :</label>
					<div class="col-md-4">
						<input type="text" class="form-control input-sm" name="CANTIDAD" id="CANTIDAD">
					</div>
				</div>
				<div class="form-group">
					<label for="" class=" col-md-3 control-label">Descripci&oacute;n :</label>
					<div class="col-md-8">
						<textarea id="DESCRIBIR"  name="DESCRIBIR"  rows="4" cols="20" class="form-control" placeholder="descripci&oacute;n" ><?php 
					  ?></textarea>		
					</div>
				</div>
				<div class="form-group">
			
				<button  type="submit" id="AgregarProducto"  class="btn btn-primary col-md-2 col-md-offset-8" id=""  style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
									   		   Agregar
									           <img src="/public/images/GUARDAR.png">
				</button>
				
				</div>
			</div>
		</form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          
        </div>
      </div>
    </div>
  </div>

 	<script type="text/javascript" src="/public/js/datatable.js" ></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="/public/jquery/jquery.validate.js"></script>
	<script type="text/javascript" src="/public/js/moment.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="/public/js/bootstrap-datepicker.min.js"></script>   
  	<script type="text/javascript" src="/public/js/bootstrap-datepicker.es.min.js"></script> 
	<script type="text/javascript" src="/public/pnotify/pnotify.custom.min.js"></script>
	<script type="text/javascript" src="/public/custom/CreaGuiaRemision.js"></script>
	<script type="text/javascript" src="/public/js/libs/require.js"></script>

<script>
/*******************utilitarios********************/
function fn_mostrar_modal(ide)
 {   $('#'+ide).modal("show");
 }

 function fn_ocultar_modal(ide)
 { $('#'+ide).modal("hide");
   
 }
 
/**************************************************/ </script>
	<script> 
  require.config({paths: {
       'jspdf': '../../public/js/libs/jspdf.debug', 
       'jspdf-autotable': '../../public/js/libs/jspdf.plugin.autotable'
    }});
    
    require(['../../public/custom/GuiaRemisionPdf'], function(main) {
        document.getElementById("generate").onclick = function() {
            main.generatePdf();
        }
    });
</script>
	<script>
		$(document).ready(function() {

			$("#COD_MOT_TRAS").val("<?php echo $COD_MOT_TRAS; ?>");
		});
	</script>
</body>
</html>