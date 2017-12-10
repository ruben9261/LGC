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
	<style>
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
		                 <STRONG>Registrar Orden de Entrada </STRONG>
		            </div>
					<br/>
				<form id="frmCreaDocCobro" rol="form" class="form-horizontal" method="POST">
						 <input type="hidden" name="COD_DOC_COBRO" id="COD_DOC_COBRO">
				         <input type="hidden" name="COD_CLI" id="COD_CLI">
						 <input type="hidden" name="COD_TIPO_DOC" id="COD_TIPO_DOC" >
						 <input type="hidden" name="COD_OFI" id="COD_OFI" value="<?php echo $COD_OFI?>">
						 <input type="hidden" name="COD_CAJA" id="COD_CAJA" value="<?php echo $COD_CAJA?>">
						 <input type="hidden" name="COD_USU" id="COD_USU" value="<?php echo $COD_USU?>">
						 <input type="hidden" name="MONTO_TOTAL" id="MONTO_TOTAL" value="0">
						 <input type="hidden" name="MONTO_NETO" id="MONTO_NETO" value="0">
						 <input type="hidden" id="tpagina">
		    	         <input type="hidden" id="pactual">
						
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
								<div class="col-md-4 col-md-offset-3 container-style" style="display:none;" id="divNroCuenta">
									<label for="" class="control-label col-md-6"  >Número de Cuenta :</label>
									<div class="col-md-6">
										<input type="text" class="form-control input-sm" name="NUMERO_CUENTA" id="NUMERO_CUENTA" value="">
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
								<div class="col-md-3 container-style" style="display:none;" id="divNroOperacion">
									<label for="" class="control-label col-md-6" >N° de Operación :</label>
									<div class="col-md-6">
										<input type="text" class="form-control input-sm" name="NUMERO_OPERACION" id="NUMERO_OPERACION" value="">
									</div>
								</div>
								<div class="col-md-4 container-style" style="display:none" id="divFechaOperacion">
									<label for="" class="control-label col-md-6" >Fecha Operación :</label>
									<div class="col-md-6">
										<div class='input-group'>
										<input type='text' name="FECHA_OPERACION" id="FECHA_OPERACION" class="form-control input-sm calendario" placeholder="Fecha de Inicio" />
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
											<label class=" control-label">001-100</label>
										</div>
								</div>
							</div>
						   	<div class="form-group">
								<div  class='col-md-4 container-style'>
									<label for="" class="control-label col-md-3"> Cliente :</label>
									<div class="col-md-6 input-group">
										<input text="text" id="Cliente" name="NombreCliente" class="form-control input-sm" disabled /> 
										<span class="btn input-group-addon glyphicon glyphicon-search" onclick="fn_ObtenerClientes();"></span>
									</div>
								</div>
								<div  class='col-md-4 col-md-offset-3 container-style'>
									<label for="" class="control-label col-md-6"> N° Documento :</label>
									<div class="col-md-6">
										<input text="text" id="NRO_DOCUMENTO" name="NRO_DOCUMENTO" class="form-control input-sm"/> 
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
											<th class='col-md-1'>Total:</th>
											<th class='col-md-1'><span id="Total">0</span></th>
										</tr>
									</tfoot>
									</table>
								</div> 
								
							</div>
						
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
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
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
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
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
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
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
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
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
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" ></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="/public/jquery/jquery.validate.js"></script>
	<script type="text/javascript" src="/public/js/moment.min.js" charset="UTF-8"></script>
	<script src="/public/js/bootstrap-datepicker.min.js"></script>   
  	<script src="/public/js/bootstrap-datepicker.es.min.js"></script> 
	<script src="/public/pnotify/pnotify.custom.min.js"></script>
</body>
</html>