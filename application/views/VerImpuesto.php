<!DOCTYPE html> 
<html> 
  <head> 
    <title>Ver Impuesto</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
 </head>
<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 45%; height:50%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Ver Impuesto</STRONG>
		            </div>
				    <form id="frmVerImpuesto">
					       
					       <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">NOMBRE DE IMPUESTO</span></h4>
						          <label class="form-control"  ><?php echo $nombre?></label>
						   </div>
					       
					       <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">ABREVIATURA</span></h4>
						          <label class="form-control"  ><?php echo $abrev?></label>
						   </div>
					       
					       <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">VALOR</span></h4>
						          <label class="form-control"  ><?php echo $valor?></label>
						   </div>
					       
					       
						   <div class="form-group">
							 
							     <a href="<?php echo base_url()?>ConsImpuesto_c/mostrar_Consulta" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
							        Regresar
							        <img src="<?php echo base_url()?>public/images/REGRESAR.png" class="dropdown">
							   </a>
						 
						  </div>   
			 </form>
   </div>
   
</body>
</html>