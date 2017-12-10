<!DOCTYPE html> 
<html> 
  <head> 
    <title>Ver Empresa</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <script type="text/javascript" src="<?php echo base_url()?>public/jquery/jquery-3.1.1.min.js"></script>
    <script  type="text/javascript"  src="<?php echo base_url()?>public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>
</head>
<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 45%; height:50%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Ver Empresa</STRONG>
		            </div>
				    <form id="frmVerEmpresa">
					        
					        <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">NOMBRE DE EMPRESA</span></h4>
						          <label class="form-control"  ><?php echo $nombre?></label>
						     </div>
					        
					        <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">DOMICILIO</span></h4>
						          <label class="form-control"  ><?php echo $domicilio?></label>
						     </div>
					        
					        <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">RUC</span></h4>
						          <label class="form-control"  ><?php echo $ruc?></label>
						     </div>
					        
					        <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">TEL&Eacute;n</span></h4>
						          <label class="form-control"  ><?php echo $tlfn?></label>
						     </div>
						     
						      <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">CORREO</span></h4>
						          <label class="form-control"  ><?php echo $correo?></label>
						     </div>
						     
						     
						     <div class="form-group">
							    <a href="<?php echo base_url()?>ConsEmpresa_c/mostrar_Consulta" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
							        Regresar
							        <img src="<?php echo base_url()?>public/images/REGRESAR.png" class="dropdown">
							   </a>
						 </div>   
			 </form>
   </div>
</body>
</html>