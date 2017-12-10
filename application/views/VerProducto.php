<!DOCTYPE html> 
<html> 
  <head> 
    <title>Ver Producto</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
</head>
<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width:60%; height:60%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Ver Producto</STRONG>
		            </div>
				    <form id="frmVerProducto">
					        <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">DESCRIPCI&Oacute;N</span></h4>
						          <label class="form-control"  ><?php echo $descripcion?></label>
						    </div>
					        
					        <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">TIPO DE PRODUCTO</span></h4>
						          <label class="form-control"  ><?php echo $desc_tipo?></label>
						    </div>
						   
						    <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">PRECIO</span></h4>
						          <label class="form-control"  ><?php echo $precio?></label>
						    </div>
						   
						   <div class="form-group">
							    <a href="<?php echo base_url()?>ConsProducto_c/mostrar_Consulta" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
							        Regresar
							        <img src="<?php echo base_url()?>public/images/REGRESAR.png" class="dropdown">
							   </a>
						   </div>   
			 </form>
   </div>
</body>
</html>