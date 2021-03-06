<!DOCTYPE html> 
<html> 
  <head> 
    <title>Registrar Gesti&oacute;n de Pagos</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="/public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="/public/pnotify/pnotify.custom.min.css">
	<link rel="stylesheet" href="/public/styles/bootstrap-datepicker.css"/>
	<script type="text/javascript" src="/public/jquery/jquery-3.1.1.min.js"></script>
	<script  type="text/javascript"  src="/public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>
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
		}
		.form-horizontal .form-group {
    margin-right: 10px;
    margin-left: 10px;
}
	</style>
 </head>
<body>
<?php

$NUMERO_CUENTA = "";
$FECHA_OPERACION = "";
$NUMERO_OPERACION = "";
$NRO_DOCUMENTO = "";
$COD_PROV = "";
$NOMBRE = "";
$TOTAL = 0;
$datos = 0;

$COD_TIPOPAGO = 1;
$COD_TIPO_DOC = 0;
$OBSERVACION = "";
$FECHA_OPERACION_NEW ="";
if(count($docPago)>0){


	foreach($docPago as $item){
		$NUMERO_CUENTA = $item->NUMERO_CUENTA;
		$OBSERVACION = $item->OBSERVACION;
		// $fecha= $item->FECHA_OPERACION;

		// $FECHA_OPERACION = moment($item->FECHA_OPERACION).format('YYYY/MM/DD');
		$FECHA_OPERACION = $item->FECHA_OPERACION;
		//$FECHA_OPERACION_NEW = date("y-m-d", strtotime($FECHA_OPERACION));
		//$FECHA_OPERACION = date("Y-m-d"); 



		$fechahora=explode(" ", $FECHA_OPERACION);
 
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
		$FECHA_OPERACION_NEW = "$mes/$dia/$ano"; // join them together
	
		

		$NUMERO_OPERACION = $item->NUMERO_OPERACION;
		$NRO_DOCUMENTO = $item->NRO_DOCUMENTO;
		$COD_PROV = $item->COD_PROV;
		$NOMBRE = $item->NOMBRE;
		$COD_TIPOPAGO = $item->COD_TIPOPAGO;
		$COD_TIPO_DOC = $item->COD_TIPO_DOC;
	}
}
$display = "";

if($COD_TIPOPAGO==1){
	$display = "none";
}else{
	$display = "block";
}

if($TIPO_TRANSACCION==1){
	$displayPdf = "none";
}else{
	$displayPdf = "block";
}

?><br><br>
	<input type="hidden" Id="CodCli" name="" value="">
	<div class="container contenido" id="contenedor">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Registrar Gesti&oacute;n de Pagos </STRONG>
						 <div id="ImprimirPdf" class="" style="display:<?php echo $displayPdf;?>;">
						 	<a class="btn btn-success"   href='/mantGestionPagos_c/docPagoPdf/<?php echo $COD_DOC_PAGO;?>' target="_blank" >Imprimir</a>
						 </div>
		            </div>
					<br/>
				<form id="frmCreadocPago" rol="form" class="form-horizontal" method="POST">
						 <input type="hidden" name="COD_DOC_PAGO" id="COD_DOC_PAGO" value="<?php echo $COD_DOC_PAGO;?>">
				         <input type="hidden" name="COD_PROV" id="COD_PROV" value="<?php echo $COD_PROV;?>">
						 <input type="hidden" name="COD_TIPO_DOC" id="COD_TIPO_DOC" value="<?php echo $COD_TIPO_DOC;?>">
						 <input type="hidden" name="COD_OFI" id="COD_OFI" value="<?php echo $COD_OFI?>">
						 <input type="hidden" name="COD_CAJA" id="COD_CAJA" value="<?php echo $COD_CAJA?>">
						 <input type="hidden" name="COD_USU" id="COD_USU" value="<?php echo $COD_USU?>">
						 <input type="hidden" name="MONTO_TOTAL" id="MONTO_TOTAL" value="<?php echo $TOTAL;?>">
						 <input type="hidden" name="MONTO_NETO" id="MONTO_NETO" value="<?php echo $TOTAL;?>">
						 <input type="hidden" id="tpagina">
		    	         <input type="hidden" id="pactual">
						 <input type="hidden" id="TIPO_TRANSACCION" value="<?php echo $TIPO_TRANSACCION; ?>">
							<div class="form-group">
								<div class="col-md-4 container-style">
									<label for="" class="control-label col-md-3">Tipo Pago :</label>
									<div class="col-md-6" >
										<select id="COD_TIPOPAGO" name="COD_TIPOPAGO" class="form-control input-sm" >
										<?php
											foreach($listTipoPago as $item){
												echo "<option value='".$item->COD_TIPOPAGO."'>".$item->NOM_TIPOPAGO."</option>";
											}
										?>
										</select>	
									</div>
								</div>
								
								<div class="col-md-3 col-md-offset-9 container-style">
									<label for="" class="control-label ">Fecha :
									<?php 
											date_default_timezone_set('Australia/Melbourne');
											$date = date('m/d/Y h:i:s a', time());
											echo $date;
										?>
									</label >
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4 container-style">
									<label for="" class="control-label col-md-3">Empresa :</label>
									<div class="col-md-2">
										<label for="" class="control-label">
											<?php
												echo $Nomb_Empresa;
											?>
										</label>
									</div>
								</div>
								<div class="col-md-4 col-md-offset-3 container-style" style="display:<?php echo $display;?>;" id="divNroCuenta">
									<label for="" class="control-label col-md-6"  >Número de Cuenta :</label>
									<div class="col-md-6">
										<input type="text" class="form-control input-sm" name="NUMERO_CUENTA" id="NUMERO_CUENTA" value="<?php echo $NUMERO_CUENTA;?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4 container-style">
										<label for="" class="control-label col-md-3">Oficina :</label>
										<div class="col-md-3">
											<label for="" class="control-label">
											<?php
													echo $Nomb_Oficina;
												?>
											</label>
										</div>
								</div>
								<div class="col-md-3 container-style" style="display:<?php echo $display;?>;" id="divNroOperacion">
									<label for="" class="control-label col-md-6" >N° de Operación :</label>
									<div class="col-md-6">
										<input type="text" class="form-control input-sm" name="NUMERO_OPERACION" id="NUMERO_OPERACION"
										 value="<?php echo $NUMERO_OPERACION;?>">
									</div>
								</div>
								<div class="col-md-4 container-style" style="display:<?php echo $display;?>" id="divFechaOperacion">
									<label for="" class="control-label col-md-6" >Fecha Operación :</label>
									<div class="col-md-6">
										<input type='text' name="FECHA_OPERACION" id="FECHA_OPERACION" class="form-control input-sm calendario" value="<?php echo $FECHA_OPERACION_NEW;?>" placeholder="Fecha de Inicio" />
										<!-- <div class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</div> -->
									</div>
								</div>
								
							</div>
							<div class="form-group">
								<div class="col-md-4 container-style">
									<label class="control-label col-md-3" >Caja :</label>
									<div class="col-md-3">
										<label for="" class="control-label">
											<?php
												echo $Desc_Caja;
											?>
										</label>
									</div>
								</div>
								<div class='col-md-4 col-md-offset-3 container-style'>
										<label class="control-label col-md-6">CÓDIGO:</label>
										<div class="col-md-6">
											<label class=" control-label" id="lblCOD_DOC_PAGO"><?php echo $COD_DOC_PAGO;?></label>
										</div>
								</div>
							</div>
						   	<div class="form-group">
								<div  class='col-md-4 container-style'>
									<label for="" class="control-label col-md-3"> Proveedor :</label>
									<div class="col-md-6 input-group">
										<input text="text" id="Proveedor" name="NombreProveedor" class="form-control input-sm" value="<?php echo $NOMBRE; ?>" disabled /> 
										<span class="btn input-group-addon glyphicon glyphicon-search" onclick="fn_ObtenerProveedores();"></span>
									</div>
								</div>
								<div  class='col-md-4 col-md-offset-3 container-style'>
									<label for="" class="control-label col-md-6"> N° Documento :</label>
									<div class="col-md-6">
										<input text="text" id="NRO_DOCUMENTO" name="NRO_DOCUMENTO" class="form-control input-sm" value="<?php echo $NRO_DOCUMENTO; ?>" /> 
									</div>
								</div>
						     </div>
							<div class="form-group">
								<div  class='col-md-4 col-md-offset-1 container-style'>
									<div class="col-md-6 input-group">
										<button type="button" class="btn btn-primary" onclick="fn_ObtenerOrdenSalida();">
											Orden Salida
											<img src="/public/images/add.png">
										</button>
									</div>
								</div>
							</div>

							<br/>
							<div class="container">		
								<div id="tabla"> 
									<table id="TablaOrdenSalidaDet">
										<thead>
											<tr>
											<th class='col-md-1 thead-style'>
													SERIE 
											</th> 
											<th class='col-md-1 thead-style'>
													CANTIDAD 
											</th> 
											<th class='col-md-3 thead-style'>
													PRODUCTO
											</th>
											<th class='col-md-1 thead-style'>
													TIPO
											</th>
											<th class='col-md-3 thead-style'>
													OBSERVACI&Oacute;N
											</th>
											<th class='col-md-1 thead-style'>
													PRECIO
											</th>
											<th class='col-md-1 thead-style'>
													SUB_TOTAL
											</th>
											<th class='col-md-1 thead-style'>
													Acciones
											</th>
											</tr>
										</thead>
									<tbody>
										<?php
											if(count($docPagoDet)>0){
												
												foreach($docPagoDet as $item){
													$datos = $datos + 1;
													
													$cols = "";
													$cols .= '<tr class="fila'.$item->COD_ORDEN_S.'">';
													$cols .= '<input type="hidden" class="COD_ORDEN_S" value="'.$item->COD_ORDEN_S.'">';
													$cols .= '<input type="hidden" class="SUB_TOTAL" value="'.$item->IMPORTE.'">';
													$cols .= '<td class="col-md-1 input-sm">'.$item->COD_ORDEN_S.'-'.$item->SERIE.'-'.$item->NUMERO.'</td>';
													$cols .= '<td class="col-md-1 input-sm" >'.$item->CANTIDAD.'</td>';
													$cols .= '<td class="col-md-3 input-sm" >'.$item->PRODUCTO.'</td>';
													$cols .= '<td class="col-md-1 input-sm" >'.$item->TIPOPRODUCTO.'</td>';
													$cols .= '<td class="col-md-3 input-sm" >'.$item->DESCRIPCION.'</td>';
													$cols .= '<td class="col-md-1 input-sm" >'.$item->PRECIO.'</td>';
													$cols .= '<td class="col-md-1 input-sm" >'.$item->IMPORTE.'</td>';
													$cols .= '<td class="col-md-1 input-sm" ><i class="btn glyphicon glyphicon-remove" onclick="fn_EliminarOrdenSalidaDetalle('."'fila".$item->COD_ORDEN_S."'".');"></i></td>';
													$cols .= '</tr>';
													$IMPORTE = intval($item->IMPORTE);
													$TOTAL = $TOTAL + $IMPORTE;
													echo $cols;
												}
											}
										?><input type="hidden" name="datos" id="datos" value="<?php echo $datos;?>">
										<div id="demo"></div>
									</tbody>
									<tfoot>
										<tr>
											<th class='col-md-1 '></th>
											<th class='col-md-1'></th> 
											<th class='col-md-3'></th>
											<th class='col-md-1'></th>
											<th class='col-md-3'></th>
											<th class='col-md-1'></th>
											<th class='col-md-1'></th>
											<th class='col-md-1'></th>
										</tr>
									</tfoot>
									</table>
								</div> 
								
							</div>
							<br><br>
							<p class="pull-rigth">Total: <span id="TOTAL"><?php echo $TOTAL; ?></span></p>
								
						    <br/>
						    
						    <div class="form-group">
						         <span style="color:rgb(0,128,255);">Comentario</span>
								  <textarea id="OBSERVACION" rows="5" cols="80" class="form-control" placeholder="observaci&oacute;n" ><?php 
									if($TIPO_TRANSACCION==1){
										if($OBSERVACION==""){
											echo "LE RECORDAMOS QUE EL PLAZO DE RECEPCION DE DOCUMENTOS SIN RECARGOS ES HASTA EL DIA 10 DE CADA MES.";
										}else{
											echo $OBSERVACION;
										}
									  }else{
											echo $OBSERVACION;
									  }
								  ?></textarea>
						    </div>	
						 
						    <br/>
						    
						    <div class="form-group">
									   <button  type="submit" class="btn btn-primary" id="Guardar"  style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
									   		   Guardar
									           <img src="/public/images/GUARDAR.png">
									   </button>
									
									     
									   <a href="/mantGestionPagos_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
										        Cancelar
										        <img src="/public/images/CANCELAR.png">
									   </a>
						   </div>   
			   </form>
   </div>


  <div class="modal fade" id="OrdenSalModal" data-backdrop="static" data-keyboard="false" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"></span> Orden de salida</h4>
        </div>
        <div class="modal-body">
		<table id="TablaOrdenSalida" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>SERIE</th>
                <th>Cliente</th>
                <th>Documento</th>
				<th>Seleccionar</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div> 


   <div class="modal fade" id="ProveedoresModal" data-backdrop="static" data-keyboard="false" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"></span>Proveedores</h4>
        </div>
        <div class="modal-body">
		<table id="TablaProveedores" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Código</th>
                <th>Cliente</th>
                <th>Documento</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
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



 <!-- ************ Inicio formulario  modal para crear proveedor  *************** -->

 <div  data-backdrop="static"  class="modal fade" id="modal_crea_proveedor" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
			 <div class="modal-header btn-primary" style="background-color:rgb(0,128,255);">
			      <button class="close" data-dismiss="modal" aria-hidden="true" onclick="fn_ocultar_modal('modal_crea_proveedor');fn_limpiar_modal_crea_proveedor(); fn_mostrar_modal('ProveedoresModal');">&times;</button>
			                <h4>Crear Proveedor</h4>
			  </div>
		          
		      <div class="modal-body">
			  <form id="frmCreaProveedor">
					        <div class="form-group">
						          <input id="nomb_prov" name="nomb_prov" type="text" class="form-control" placeholder="Nombre" >
						    </div>
						   
						    <div class="form-group">
						         <input id="doc_prov"  name="doc_prov" type="text" class="form-control" placeholder="Documento">
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
							 
							   <a href="#"  id="GuardarProveedor" class="btn btn-primary"  style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" >
							   				Guardar
							        	<img src="<?php echo base_url()?>public/images/GUARDAR.png">
							   </a>
							     
							   <a href="#" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);" onclick="fn_ocultar_modal('modal_crea_proveedor');fn_limpiar_modal_crea_proveedor();fn_limpiar_modal_sel_proveedor(); fn_mostrar_modal('modal_seleccionar_proveedor');">
							        Cancelar
							        <img src="<?php echo base_url()?>public/images/CANCELAR.png">
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

<div class="modal fade" id="modal_creaProveedor_reg_ok" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
          	    <a href="#" class="btn btn-danger"  onclick="fn_ocultar_modal('modal_creaProveedor_reg_ok');fn_ocultar_modal('modal_crea_proveedor');fn_limpiar_modal_crea_proveedor(); fn_mostrar_modal('modal_seleccionar_proveedor');">Cerrar</a>
           </div>
       </div>
   </div>
</div>




 <div class="modal fade" id="modal_creaProveedor_reg_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
          		 <a href="<?php echo base_url()?>consProveedor_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="modal_creaProveedor_msg_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Proveedor</h3>
           </div>
           <div class="modal-body">
          		 
          		<div class="alert alert-warning">
          		    Alerta<br/>
          		    <div id="mensaje_creaProveedor"></div>
          		</div>
           </div>
      </div>
   </div>
</div>



	<script type="text/javascript" src="/public/custom/CreaGestionPagos.js"></script>
	<script type="text/javascript" src="/public/js/datatable.js" ></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="/public/jquery/jquery.validate.js"></script>
	<script  type="text/javascript"  src="/public/js/moment.min.js"> </script>
	<script src="/public/js/bootstrap-datepicker.min.js"></script>   
  	<script src="/public/js/bootstrap-datepicker.es.min.js"></script>
	   
	<script src="/public/pnotify/pnotify.custom.min.js"></script>
	<script>
		$(document).ready(function() {

			$("#COD_TIPOPAGO").val("<?php echo $COD_TIPOPAGO; ?>");
			document.getElementById("TablaProveedores_length").innerHTML = "<a class='btn btn-primary'  style='background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);' onclick=fn_ocultar_modal('ProveedoresModal');fn_mostrar_modal('modal_crea_proveedor');><img src='<?php echo base_url()?>public/images/REGISTRAR.png'> Nuevo</a>";
		
		});
	</script>


</body>
</html>