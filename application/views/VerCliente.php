<!DOCTYPE html> 
<html> 
 <head> 
    <title>Ver Cliente</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <script type="text/javascript" src="<?php echo base_url()?>public/jquery/jquery-3.1.1.min.js"></script>
    
  <script  type="text/javascript"> 
	function fn_agregarOpcion(id,idvalue,valor)
 	{ $('#'+id).append('<option value= " '+ idvalue + ' " selected="selected">'+valor+'</option>'); }
  </script> 

</head>
<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 70%; height:65%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Ver Cliente</STRONG>
		            </div>
				    <form id="frmVerCliente" >
					            <div class="form-group">
						               <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">LISTA DE CONTACTOS</span></h4>
						         	   <select name="lisContacto"  id="lisContacto" class="form-control" size="6" >  </select>
							           <script type="text/javascript">
										         $('#lisContacto').html('');
									   </script>
							           <?php foreach ($listcontactos as $campos): ?>
							          		  <script type="text/javascript">
							                		 fn_agregarOpcion('lisContacto','<?php echo "".$campos->CLAVE?>','<?php echo "".$campos->VALOR?>');
							                 		 $('#lisContacto option:selected').prop("selected", ""); 
									          </script>
									   <?php  endforeach ?>
							   </div>	
						      
						       <br/>
						       <br/>
						       <div class="form-group">
								         <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">LISTA DE ACTIVIDADES</span></h4>
								         <select name="lisActividad"  id="lisActividad" class="form-control" size="6" ></select>
								         <script type="text/javascript">
										         $('#lisActividad').html('');
										   </script>
								         <?php foreach ($listactividades as $campos): ?>
							          		  <script type="text/javascript">
							          		        fn_agregarOpcion('lisActividad','<?php echo "".$campos->CLAVE?>','<?php echo "".$campos->VALOR?>');
							                 		 $('#lisActividad option:selected').prop("selected", "");
									          </script>
									       <?php  endforeach ?>
							  </div>	
							
						      <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">RAZON SOCIAL</span></h4>
						          <label class="form-control"  ><?php echo $razon?></label>
						     </div>
						   
						     <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">TIPO DE DOCUMENTO</span></h4>
						          <label class="form-control"  ><?php echo $tipodoc?></label>
						     </div>
						   
						     <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">DOCUMENTO</span></h4>
						          <label class="form-control"  ><?php echo $documento?></label>
						     </div>
						     
						     <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">UDR</span></h4>
						          <label class="form-control"  ><?php echo $udr?></label>
						     </div>
						    
						     <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">REGIMEN</span></h4>
						          <label class="form-control"  ><?php echo $regimen?></label>
						     </div>
						   
						     <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">ESTADO</span></h4>
						          <label class="form-control"  ><?php echo $estado?></label>
						     </div>
						   
						    <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">CLASIFICACI&Oacute;N</span></h4>
						          <label class="form-control"  ><?php echo $clasificacion?></label>
						     </div>
						     
						     
						     <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">USUARIO SOL</span></h4>
						          <label class="form-control"  ><?php echo $usu_sol?></label>
						     </div>
						   
						      <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">CLAVE SOL</span></h4>
						          <label class="form-control"  ><?php echo $clave_sol?></label>
						     </div>
						   
						     <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">PREGUNTA</span></h4>
						          <label class="form-control"  ><?php echo $pregunta?></label>
						     </div>
						    
						     
						     <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">RESPUESTA</span></h4>
						          <label class="form-control"  ><?php echo $respuesta?></label>
						     </div>
						   
						     <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">USUARIO AFP</span></h4>
						          <label class="form-control"  ><?php echo $usu_afp?></label>
						     </div>
						    
						     <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">CLAVE AFP</span></h4>
						          <label class="form-control"  ><?php echo $clave_afp?></label>
						     </div>
						    
						    <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);">N&Uacute;MERO DE CUENTA</span></h4>
						          <label class="form-control"  ><?php echo  $nrocuenta?></label>
						    </div>
						    
						    <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);"> USUARIO BANCO DE LA NACI&Oacute;N</span></h4>
						          <label class="form-control"  ><?php echo  $usu_bn?></label>
						    </div>
						    
						   <div class="form-group">
					              <h4> <span class="label label-info"  style="background-color:rgb(0,128,255);"> CLAVE BANCO DE LA NACI&Oacute;N</span></h4>
						         <label class="form-control"  ><?php echo  $clave_bn?></label>
						   </div>
						    
						 
						  <div class="form-group">
							  <a href="<?php echo base_url()?>ConsCliente_c/mostrar_Consulta" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
							        Regresar
							        <img src="<?php echo base_url()?>public/images/REGRESAR.png" class="dropdown">
							   </a>
						 </div>   
			 </form>
   </div>
</body>
</html>