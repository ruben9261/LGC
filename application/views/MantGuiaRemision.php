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
									<label for="" class="control-label col-md-6" >Fecha Operación :</label>
									<div class="col-md-6">
										<div class='input-group'>
										<input type='text' name="FECHA_OPERACION" id="FECHA_OPERACION" class="form-control input-sm calendario" value="" placeholder="Fecha de Inicio" />
										<!-- <div class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</div> -->
										</div>
									</div>
                                </div> 
                                <div class="col-md-4 container-style" style="" id="divFechaOperacion">
									<label for="" class="control-label col-md-6" >Fecha de  Translado :</label>
									<div class="col-md-6">
										<div class='input-group'>
										<input type='text' name="FECHA_OPERACION" id="FECHA_OPERACION" class="form-control input-sm calendario" value="" placeholder="Fecha de Inicio" />
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
										<input type="text" class="form-control input-sm" name="NUMERO_CUENTA" id="NUMERO_CUENTA" value="">
									</div>
								</div>
								<div class="col-md-4 container-style" style="" id="divNroCuenta">
									<label for="" class="control-label col-md-6"  >Nombre o Razon Social :</label>
									<div class="col-md-6">
										<input type="text" class="form-control input-sm" name="NUMERO_CUENTA" id="NUMERO_CUENTA" value="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-4 container-style">
										<label for="" class="control-label col-md-6">R.U.C :</label>
										<div class="col-md-6">
                                        <input type="text" class="form-control input-sm" name="NUMERO_CUENTA" id="NUMERO_CUENTA" value="">
										</div>
								</div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Tipo de Documento de Identidad:</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="NUMERO_CUENTA" id="NUMERO_CUENTA" value="">
                                   </div>
                                </div>
								
								
							</div>
							<div class="form-group">
								<div class="col-md-4 container-style">
										<label for="" class="control-label col-md-6">Marca y Numero de Placa:</label>
										<div class="col-md-6">
                                        <input type="text" class="form-control input-sm" name="NUMERO_CUENTA" id="NUMERO_CUENTA" value="">
										</div>
								</div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Constancia de Inscripcion:</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="NUMERO_CUENTA" id="NUMERO_CUENTA" value="">
                                   </div>
                                </div>
								<div class="col-md-4 container-style">
                                  <label for="" class="control-label col-md-6">Licencia de Conducir:</label>
                                   <div class="col-md-6">
                                    <input type="text" class="form-control input-sm" name="NUMERO_CUENTA" id="NUMERO_CUENTA" value="">
                                   </div>
                                </div>
								
							</div>
							<div class="form-group">
                                <div class="col-md-12 container-style">
                                  <label for="" class="control-label col-md-2">Punto de llegada:</label>
                                   <div class="col-md-6">
                                   <textarea id="OBSERVACION" rows="5" cols="80" class="form-control" placeholder="observaci&oacute;n"></textarea>
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



 	<script type="text/javascript" src="/public/js/datatable.js" ></script>
 	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="/public/jquery/jquery.validate.js"></script>
	<script type="text/javascript" src="/public/js/moment.min.js" charset="UTF-8"></script>
	<script src="/public/js/bootstrap-datepicker.min.js"></script>   
  	<script src="/public/js/bootstrap-datepicker.es.min.js"></script> 
	<script src="/public/pnotify/pnotify.custom.min.js"></script>
	
</body>
</html>