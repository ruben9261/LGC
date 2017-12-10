<!DOCTYPE html>
<html lang="en">
	<head>
	      <meta charset="UTF-8">
		  <meta  name="viewport"  content="width=device-with,initial-scale=1">
		  <title>Ingresa al Sistema LGC</title>			 
		  <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.css"/>
	      <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/styles/login.css"> 
	      <script type="text/javascript" src="<?php echo base_url()?>public/jquery/jquery-3.1.1.min.js"></script>
	      
          <script type="text/javascript">
          var verdad1=true;
          var verdad2=true;
           
          $(document).ready(function () {
        	  var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
              var expr1 = /^[a-zA-Z]*$/;
              $("#boton1").click(function(){ //función para el boton de enviar
                  //recolectamos en variables, lo que tenga cada input.
                  //Para mejor manipulación en los if's
                  $(".error").remove();
                  var usuario = $("#txtusuario").val();
                  var clave = $("#txtclave").val();
                  //Secuencia de if's para verificar contenido de los inputs
                  //Verifica que no este vacío y que sean letras
           	    if (usuario == '') {
   			      $("#txtusuario").focus().after("<span class='error'>Ingrese nombre de usuario por favor.</span>");
     			    return false;
     			    verdad1=false;
   				}
   				if (clave == '') {
   				 $("#txtclave").focus().after("<span class='error'>Ingrese su contrase&ntildea por favor.</span>");
   					return false;
                     verdad1=false
   				}
   				return true;
              });//fin click
      
              $("#txtusuario, #txtclave").keyup(function(){
                  if( $(this).val() != "" && expr1.test($(this).val())){
                      $(".error").fadeOut();
                      return false;
                      verdad2=false;
                  }
              });

        });//fin ready

   </script>
          
   </head>
	<body>
		  <div class="container well" id="contenedor">
		      		<div class="row">
		    				  <div class="col-xs-12">
		    							<img src="./public/images/logo1.png" class="img-responsive" id="logo">
		    				  </div>
		       		</div>  		
		       		<form class="login" action="<?php echo base_url()?>login_c/validar" method="POST" id="formid"> 
		       			   <div id="ok"></div>
		       				   <div class="form-group">
		        						<input type="text" class="form-control" placeholder="usuario" name="txtusuario" id="txtusuario1" value="ADMIN"  required autofocus>
		        				</div>
		       
		       					<div class="form-group">
		        						<input type="password" class="form-control" placeholder="clave" name="txtclave" id="txtclave1" VALUE="kuJqyys8+" required>
		        				</div>
		        		       <button class="btn btn-lg btn-primary btn-block"  id="boton1" >Iniciar Sesi&oacute;n</button>
		       		</form>	
            </div>
      </body>
</html>

