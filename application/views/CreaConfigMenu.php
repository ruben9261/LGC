<!DOCTYPE html> 
<html> 
  <head> 
    <title>Registro Configuraci&oacute;n de Acceso </title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="/public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="/public/styles/bootstrap-datepicker.css"/>

	<script type="text/javascript" src="/public/jquery/jquery-3.1.1.min.js"></script>
    <script  type="text/javascript"  src="/public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>
	<script type="text/javascript" src="/public/jquery/jquery.validate.js"></script>
	<script type="text/javascript" src="/public/js/moment.min.js" charset="UTF-8"></script>
 <script src="/public/js/bootstrap-datepicker.min.js"></script>   
  <script src="/public/js/bootstrap-datepicker.es.min.js"></script>  
</head>
<body>
    <br/>
 <div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 45%; height:50%;">
		            <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Registrar Configuraci&oacute;n de Acceso</STRONG>
		            </div>
				   <form  id="frmCreaConfigAcceso"> 
						       <div class="form-group">
								       <select class="form-control" id="usuario" name="usuario" >
								    	         <option value="">
										                 SELECCIONAR USUARIO
										         </option>
										         <?php foreach ($usuarios as $usuario): ?>
										            <option value="<?php echo "".$usuario->clave?>">
										                    <?php echo "".$usuario->valor?>
										            </option>
										         <?php  endforeach ?>
								       </select>
							           
							  </div>
							  <div class="form-group">
								     <select class="form-control" id="menu" name="menu" onchange="obt_items();" >
								           <option value="">
								                        SELECCIONAR MENU
										    </option>
								    	      
								         <?php foreach ($menus as $menu): ?>
								            <option value="<?php echo "".$menu->cod_menu?>">
								                    <?php echo "".$menu->nomb_menu?>
								            </option>
								         <?php  endforeach ?>
								    </select>
							  </div>
							  
							  <div class="form-group">
							   		<select class="form-control" id="item" name="item" >
							        </select>  
							  </div>

							<div class="form-group">                
								<div class='input-group'>
								<input type='text' name="fechainicio" id="fechainicio" class="form-control calendario" placeholder="Fecha de Inicio" />
									
									<div class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</div>
								</div>
							</div>
							 

							   <div class="form-group">
							                <!-- 
							         <button class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);">
							             Guardar
							        	<img src="<?php echo base_url()?>public/images/GUARDAR.png">
							        </button>
							            -->
							
							        <button class="btn btn-primary" type="submit"  id="Guardar" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" >
							   				Guardar
							        	<img src="<?php echo base_url()?>public/images/GUARDAR.png">
							        </button>
							     
						            <a href="<?php echo base_url()?>consConfigMenu_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
						            		 Cancelar
										<img src="<?php echo base_url()?>public/images/CANCELAR.png">
						       
						            </a>
						         </div>   
				   </form>	
		</div>

   <div class="modal fade" id="mostrarmodal_ok" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
               <h3>Registro de configuraci&oacute;n de Menus</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se registro correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantConfigMenu_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consConfigMenu_c/"  class="btn btn-danger">Cerrar</a>
           </div>
       </div>
   </div>
</div> 

 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de configuraci&oacute;n de Menus</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al registrar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantConfigMenu_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consConfigMenu_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>

<div class="modal fade" id="mostrarmodal_error_campos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de configuraci&oacute;n de Menus</h3>
           </div>
           <div class="modal-body">
          		 
          		<div class="alert alert-warning">
          		    Alerta<br/>
          		    <div id="mensaje"></div>
          		</div>
           </div>
      </div>
   </div>
</div>


<script type="text/javascript" src="<?php echo base_url()?>public/custom/CreaConfigMenu.js" ></script>

</body>
</html>