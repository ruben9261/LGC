<!DOCTYPE html> 
<html> 
  <head> 
    <title>Ver Usuario</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
 </head>
<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 45%; height:50%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Ver Usuario</STRONG>
		            </div>
				    <form id="frmVerUsuario" >
					        <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">USUARIO</span></h4>
						         <label class="form-control"  ><?php echo $usuario?></label>
						     
						    </div>
						   
					        <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">CLAVE</span></h4>
						         <label class="form-control"  ><?php echo $clave?></label>
						     
						    </div>
						   
						   
						   <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">NIVEL</span></h4>
						         <label class="form-control"  ><?php echo $nivel?></label>
						     
						    </div>
					       
					        <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">NOMBRE DE USUARIO</span></h4>
						         <label class="form-control"  ><?php echo $nom_usu?></label>
						    </div>
					       
					        <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">APELLIDO DE USUARIO</span></h4>
						         <label class="form-control"  ><?php echo $ape_usu?></label>
						    </div>
					       
					        <div class="form-group">
						         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">CARGO</span></h4>
						         <label class="form-control"  ><?php echo $cargo?></label>
						    </div>
						    
						    <div class="form-group">
								  <a href="<?php echo base_url()?>ConsUsuario_c/mostrar_Consulta" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
			 					        Regresar
								        <img src="<?php echo base_url()?>public/images/REGRESAR.png" class="dropdown">
								   </a>
							</div>   
			 </form>
   </div>
</body>
</html>