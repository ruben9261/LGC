<!DOCTYPE html> 
<html> 
  <head> 
    <title>Crear Orden de Entrada</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="/public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="/public/pnotify/pnotify.custom.min.css">
	<link rel="stylesheet" href="/public/styles/bootstrap-datepicker.css"/>
	<script type="text/javascript" src="/public/jquery/jquery-3.1.1.min.js"></script>
	<script  type="text/javascript"  src="/public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	
	<style>
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

		.container{
			background-color:rgb(255,255,255);
			border: 1px solid rgb(0,128,255); 
			width: 90%;
			height:50%;
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
	</style>
 </head>
<body>
<?php

$NUMERO_CUENTA = "";
$FECHA_OPERACION = "";
$NUMERO_OPERACION = "";
$NRO_DOCUMENTO = "";
$COD_CLI = "";
$NOMBRE = "";
$Total = 0;
$COD_TIPOCOBRO = 0;
$COD_TIPO_DOC = 0;
if(count($docCobro)>0){
	foreach($docCobro as $item){
		$NUMERO_CUENTA = $item->NUMERO_CUENTA;
		$FECHA_OPERACION = $item->FECHA_OPERACION;
		$NUMERO_OPERACION = $item->NUMERO_OPERACION;
		$NRO_DOCUMENTO = $item->NRO_DOCUMENTO;
		$COD_CLI = $item->COD_CLI;
		$NOMBRE = $item->NOMBRE;
		$COD_TIPOCOBRO = $item->COD_TIPOCOBRO;
		$COD_TIPO_DOC = $item->COD_TIPO_DOC;
	}
}
$display = "";

if($COD_TIPOCOBRO==1){
	$display = "none";
}else{
	$display = "block";
}

?>
	<input type="hidden" Id="CodCli" name="" value="">
	<div class="container" id="contenedor">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Registrar Orden de Entrada </STRONG>
						 <div class="">
						 	<a class="btn btn-success" href="/mantGestionCobros_c/DocCobroPdf/1">Imprimir <i class="fa fa-file-pdf-o"> </i>  </a>
						 </div>
		            </div>
					<br/>
				<form id="frmCreaDocCobro" rol="form" class="form-horizontal" method="POST">
						 <input type="hidden" name="COD_DOC_COBRO" id="COD_DOC_COBRO" value="<?php echo $COD_DOC_COBRO;?>">
				         <input type="hidden" name="COD_CLI" id="COD_CLI" value="<?php echo $COD_CLI;?>">
						 <input type="hidden" name="COD_TIPO_DOC" id="COD_TIPO_DOC" value="<?php echo $COD_TIPO_DOC;?>">
						 <input type="hidden" name="COD_OFI" id="COD_OFI" value="<?php echo $COD_OFI?>">
						 <input type="hidden" name="COD_CAJA" id="COD_CAJA" value="<?php echo $COD_CAJA?>">
						 <input type="hidden" name="COD_USU" id="COD_USU" value="<?php echo $COD_USU?>">
						 <input type="hidden" name="MONTO_TOTAL" id="MONTO_TOTAL" value="<?php echo $Total;?>">
						 <input type="hidden" name="MONTO_NETO" id="MONTO_NETO" value="<?php echo $Total;?>">
						 <input type="hidden" id="tpagina">
		    	         <input type="hidden" id="pactual">
						 <input type="hidden" id="TIPO_TRANSACCION" value="<?php echo $TIPO_TRANSACCION; ?>">
						 <input type="hidden" id="COD_DOC_COBRO" value="<?php echo $COD_DOC_COBRO; ?>">
							<div class="form-group">
								<div class="col-md-4 container-style">
									<label for="" class="control-label col-md-3">TipoCobro :</label>
									<div class="col-md-6" >
										<select id="COD_TIPOCOBRO" name="COD_TIPOCOBRO" class="form-control input-sm" >
											
										</select>	
									</div>
									
								</div>
								
								<div class="col-md-3 col-md-offset-9 container-style">
									<label for="" class="control-label ">
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
										<div class='input-group'>
										<input type='text' name="FECHA_OPERACION" id="FECHA_OPERACION" class="form-control input-sm calendario" value="<?php echo $FECHA_OPERACION;?>" placeholder="Fecha de Inicio" />
										<!-- <div class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</div> -->
										</div>
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
										<label class="control-label col-md-6">Serie:</label>
										<div class="col-md-6">
											<label class=" control-label"><?php echo $COD_DOC_COBRO;?></label>
										</div>
								</div>
							</div>
						   	<div class="form-group">
								<div  class='col-md-4 container-style'>
									<label for="" class="control-label col-md-3"> Cliente :</label>
									<div class="col-md-6 input-group">
										<input text="text" id="Cliente" name="NombreCliente" class="form-control input-sm" value="<?php echo $NOMBRE; ?>" disabled /> 
										<span class="btn input-group-addon glyphicon glyphicon-search" onclick="fn_ObtenerClientes();"></span>
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
										<button type="button" class="btn btn-primary" onclick="fn_ObtenerOrdenEntrada();">
											Orden Entrada
											<img src="/public/images/add.png">
										</button>
									</div>
								</div>
							</div>

							<br/>
							<div class="container">		
								<div id="tabla"> 
									<table id="TablaOrdenEntradaDet">
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
													IMPORTE
											</th>
											<th class='col-md-1 thead-style'>
													Acciones
											</th>
											</tr>
										</thead>
									<tbody>
										<?php
											if(count($docCobroDet)>0){
												
												foreach($docCobroDet as $item){
													$cols = "";
													$cols .= '<tr class="fila'.$item->CodOrdenE.'">';
													$cols .= '<input type="hidden" class="CodOrdenE" value="'.$item->CodOrdenE.'">';
													$cols .= '<input type="hidden" class="SUB_TOTAL" value="'.$item->Importe.'">';
													$cols .= '<td class="col-md-3 input-sm">'.$item->CodOrdenE.'-'.$item->Serie.'-'.$item->Numero.'</td>';
													$cols .= '<td class="col-md-1 input-sm" >'.$item->Cantidad.'</td>';
													$cols .= '<td class="col-md-1 input-sm" >'.$item->Producto.'</td>';
													$cols .= '<td class="col-md-3 input-sm" >'.$item->TipoProducto.'</td>';
													$cols .= '<td class="col-md-2 input-sm" >'.$item->ObsProd.'</td>';
													$cols .= '<td class="col-md-3 input-sm" >'.$item->Precio.'</td>';
													$cols .= '<td class="col-md-2 input-sm" >'.$item->Importe.'</td>';
													$cols .= '<td class="col-md-1 input-sm" ><i class="btn glyphicon glyphicon-remove" onclick="fn_EliminarOrdenEntradaDetalle('."'fila".$item->CodOrdenE."'".');"></i></td>';
													$cols .= '</tr>';
													$importe = intval($item->Importe);
													$Total = $Total + $importe;
													echo $cols;
												}
											}
										?>
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
							<p class="pull-rigth">Total: <span id="Total"><?php echo $Total; ?></span></p>
									
						    <br/>
						    
						    <div class="form-group">
						         <span style="color:rgb(0,128,255);">Comentario</span>
						          <textarea id="OBSERVACION" rows="5" cols="80" class="form-control" placeholder="observaci&oacute;n"></textarea>
						    </div>	
						 
						    <br/>
						    
						    <div class="form-group">
									   <button  type="submit" class="btn btn-primary" id="Guardar"  style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
									   		   Guardar
									           <img src="/public/images/GUARDAR.png">
									   </button>

									 
									     
									   <a href="/ConsOrdenEntrada_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
										        Cancelar
										        <img src="/public/images/CANCELAR.png">
									   </a>
						   </div>   
			   </form>
   </div>


  <div class="modal fade" id="OrdenEntModal" data-backdrop="static" data-keyboard="false" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;">Orden de Entrada</h4>
        </div>
        <div class="modal-body">
		<table id="TablaOrdenEntrada" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Serie</th>
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
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
 
        </div>
      </div>
    </div>
  </div> 


   <div class="modal fade" id="ClientesModal" data-backdrop="static" data-keyboard="false" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"> Buscar Cliente</h4>
        </div>
        <div class="modal-body">
		<table id="TabalClientes" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          
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

	<script type="text/javascript" src="/public/custom/CreaGestionCobros.js"></script>
 	<script type="text/javascript" src="/public/js/datatable.js" ></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="/public/jquery/jquery.validate.js"></script>
	<script type="text/javascript" src="/public/js/moment.min.js" charset="UTF-8"></script>
	<script src="/public/js/bootstrap-datepicker.min.js"></script>   
  	<script src="/public/js/bootstrap-datepicker.es.min.js"></script> 
	<script src="/public/pnotify/pnotify.custom.min.js"></script>
	<script>
		$(document).ready(function() {

			$("#COD_TIPOCOBRO").val("<?php echo $docCobro->COD_TIPOCOBRO; ?>");
		});
	</script>
</body>
</html>