<!DOCTYPE html> 
<html> 
  <head> 
    <title>Ver Serie</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
</head>
<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 45%; height:50%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Ver Serie</STRONG>
		            </div>
				    <form id="frmCreaSerie">
					       <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">CAJA</span></h4>
						         <label class="form-control"  ><?php echo $caja?></label>
						     
						    </div>
						   
						   <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">SERIE</span></h4>
						         <label class="form-control"  ><?php echo $serie?></label>
						     
						    </div>
						       
						   <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">N&Uacute;MERO</span></h4>
						         <label class="form-control"  ><?php echo $numero?></label>
						     
						    </div>
						   
						   <div class="form-group">
		         			   <a href="<?php echo base_url()?>ConsSerieCaja_c/mostrar_Consulta" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
		 					        Regresar
							        <img src="<?php echo base_url()?>public/images/REGRESAR.png" class="dropdown">
							   </a>
						 </div>   
			 </form>
   </div>
</body>
</html>