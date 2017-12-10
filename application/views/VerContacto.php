<!DOCTYPE html> 
<html> 
  <head> 
    <title>Ver Contacto</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
</head>
<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 45%; height:50%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Ver Contacto</STRONG>
		            </div>
				    <form id="frmVerContacto">
					       
					         <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">NOMBRE DE CONTACTO</span></h4>
						          <label class="form-control"  ><?php echo $nombre?></label>
						     </div>
					       
					        <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">PRIMER TEL&Eacute;FONO</span></h4>
						          <label class="form-control"  ><?php echo $tlfn1?></label>
						     </div>
					       
						   
					        <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">SEGUNDO TEL&Eacute;FONO</span></h4>
						          <label class="form-control"  ><?php echo $tlfn2?></label>
						    </div>
					       
					       
					       <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">CORREO</span></h4>
						          <label class="form-control"  ><?php echo $correo?></label>
						    </div>
						     
						  <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">DOMICILIO</span></h4>
						          <label class="form-control"  ><?php echo $domicilio?></label>
						   </div>
						   
						  <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">ORDEN</span></h4>
						          <label class="form-control"  ><?php echo $orden?></label>
						   </div>
						  
						  						   
						   <div class="form-group">
							   <a href="<?php echo base_url()?>ConsContacto_c/mostrar_Consulta" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
							        Regresar
							        <img src="<?php echo base_url()?>public/images/REGRESAR.png" class="dropdown">
							   </a>
						 
						  </div>   
			 </form>
   </div>

 
</body>
</html>