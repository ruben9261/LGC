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

	<input type="hidden" Id="CodCli" name="" value="">
	<div class="container" id="contenedor">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Mantenimiento de Guia de Remision </STRONG>
						 <div class="">
						 	<a class="btn btn-success" href="">Imprimir <i class="fa fa-file-pdf-o"> </i>  </a>
						 </div>
		            </div>
					<br/>
				<form id="" rol="form" class="form-horizontal" method="POST">
                         <input type="hidden" name="" id="" value="">
                         <input type="hidden" name="" id="" value="">
                         <input type="hidden" name="" id="" value="">
                         <input type="hidden" name="" id="" value="">
                         <input type="hidden" name="" id="" value="">
			
						 <input type="hidden" id="tpagina">
		    	         <input type="hidden" id="pactual">
						 <input type="hidden" id="TIPO_TRANSACCION" value="">
						 <input type="hidden" id="COD_DOC_COBRO" value="">
							<div class="form-group">
                            <div class="col-md-4 container-style" style="" id="divFechaOperacion">
									<label for="" class="control-label col-md-6" >Fecha de Emisión :</label>
									<div class="col-md-6">
										<div class='input-group'>
										<input type='text' name="FECHA_EMISION" id="FECHA_EMISION" class="form-control input-sm FECHA_EMISION" value="" />
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
										<input type='text' name="FECHA_TRASLADO" id="FECHA_TRASLADO" class="form-control input-sm FECHA_TRASLADO" />
										<!-- <div class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</div> -->
										</div>
									</div>
								</div>                            
                            </div>
                            
                              <div class="form-group">
								<div class="col-md-4 container-style">
									<label for="" class="control-label col-md-6">Punto de Partida :</label>
									<div class="col-md-6">
										<input type="text" class="form-control input-sm PUNTO_PARTIDA" name="PUNTO_PARTIDA" id="PUNTO_PARTIDA" value="">
									</div>
								</div>
								<div class="col-md-4 container-style" style="" id="divNroCuenta">
									<label for="" class="control-label col-md-6"  >Punto de Llegada :</label>
									<div class="col-md-6">
										<input type="text" class="form-control input-sm" name="PUNTO_LLEGADA" id="PUNTO_LLEGADA" value="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4 container-style">
										<label for="" class="control-label col-md-6">Razón Social :</label>
										<div class="col-md-6">
                                        <input type="text" class="form-control input-sm" name="RAZON_SOCIAL" id="RAZON_SOCIAL" value="">
										</div>
								</div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Nro Documento :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="NRO_DOCUMENTO" id="NRO_DOCUMENTO" value="">
                                   </div>
                                </div>
								
							</div>
							<div class="form-group">
								<div class="col-md-4 container-style">
										<label for="" class="control-label col-md-6">Marca Placa :</label>
										<div class="col-md-6">
                                        <input type="text" class="form-control input-sm" name="MARCA_PLACA" id="MARCA_PLACA" value="">
										</div>
								</div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Nro Constancia Inscripción :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="NROCONS_INSCRIPC" id="NROCONS_INSCRIPC" value="">
                                   </div>
                                </div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Nro Licencia de Conducir :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="NROLIC_CONDUCIR" id="NROLIC_CONDUCIR" value="">
                                   </div>
                                </div>
								
							</div>
							<div class="form-group">
								<div class="col-md-4 container-style">
										<label for="" class="control-label col-md-6">Número Comprobante :</label>
										<div class="col-md-6">
                                        <input type="text" class="form-control input-sm" name="NRO_COMPROBANTE" id="NRO_COMPROBANTE" value="">
										</div>
								</div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Nro Orden de Compra :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="ORDEN_COMPRA" id="ORDEN_COMPRA" value="">
                                   </div>
                                </div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Nro Pedido :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="NRO_PEDIDO" id="NRO_PEDIDO" value="">
                                   </div>
                                </div>
								
							</div>
							div class="form-group">
								<div class="col-md-4 container-style">
										<label for="" class="control-label col-md-6">Número Comprobante :</label>
										<div class="col-md-6">
                                        <input type="text" class="form-control input-sm" name="NRO_COMPROBANTE" id="NRO_COMPROBANTE" value="">
										</div>
								</div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Nro Orden de Compra :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="ORDEN_COMPRA" id="ORDEN_COMPRA" value="">
                                   </div>
                                </div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Nro Pedido :</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="NRO_PEDIDO" id="NRO_PEDIDO" value="">
                                   </div>
                                </div>
								
							</div>
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
							<br/>
							<div class="container">		
								<div id="tabla"> 
									<table id="TablaOrdenEntradaDet">
										<thead>
											<tr>
											<th class='col-md-1 thead-style'>
													CODIGO 
											</th> 
											<th class='col-md-1 thead-style'>
													CANTIDAD 
											</th> 
											<th class='col-md-3 thead-style'>
													UNIDAD
											</th>
											<th class='col-md-1 thead-style'>
													DESCRIPCION
											</th>
											<th class='col-md-3 thead-style'>
													PESO
											</th>
											</tr>
										</thead>
									<tbody>
									
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
							<p class="pull-rigth">Total: <span id="Total"></span></p>
									
						    <br/>

						    <br/>
						    
						    <div class="form-group">
									   <button  type="submit" class="btn btn-primary" id="Guardar"  style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
									   		   Guardar
									           <img src="/public/images/GUARDAR.png">
									   </button>

									 
									     
									   <a href="" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
										        Cancelar
										        <img src="/public/images/CANCELAR.png">
									   </a>
						   </div>   
			   </form>
   </div>

   
   <div class="modal fade" id="ProductosModal" data-backdrop="static" data-keyboard="false" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"> Buscar Cliente</h4>
        </div>
        <div class="modal-body">
		<form>
			<div class="form-horizontal">
				<div class="form-group">
					<label for="" class=" col-md-3 control-label">Producto :</label>
					<div class="col-md-4">
						<select name="" class="form-control input-sm" id="">
							<option value="">--SELECCIONE--</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="" class=" col-md-3 control-label">Unidad :</label>
					<div class="col-md-4">
						<select name="" class="form-control input-sm" id="">
							<option value="">--SELECCIONE--</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="" class=" col-md-3 control-label">Cantidad :</label>
					<div class="col-md-4">
						<input type="text" class="form-control input-sm">
					</div>
				</div>
				<div class="form-group">
				<button  type="submit" class="btn btn-primary col-md-2 col-md-offset-8" id="Guardar"  style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
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

 	<script type="text/javascript" src="/public/js/datatable.js" ></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="/public/jquery/jquery.validate.js"></script>
	<script type="text/javascript" src="/public/js/moment.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="/public/js/bootstrap-datepicker.min.js"></script>   
  	<script type="text/javascript" src="/public/js/bootstrap-datepicker.es.min.js"></script> 
	<script type="text/javascript" src="/public/pnotify/pnotify.custom.min.js"></script>
	<script type="text/javascript" src="/public/custom/CreaGuiaRemision.js"></script>
</body>
</html>