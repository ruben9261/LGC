<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <title>MENU PRINCIPAL</title>
	            <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
				<link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/styles/menu.css"> 	 
	</head>
	 <body id="prueba">
	        <div >
	             <header>
	              		<nav class="navbar navbar-default navbar-static-top" id="cabeza">
	        			 <div class="container-fluid">
	        		 	      <div class="navbar-header">
		        		 	       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
		        		 	                 <span class="sr-only">Menu</span>
				        		 	         <span class="icon-bar"></span>
				        		 	         <span class="icon-bar"></span>
				        		 	         <span class="icon-bar"></span>
		        		 	       </button>
		        		 	      
	        		 	      </div>
	        		 	      <div class="collapse navbar-collapse" id="navbar-1">
				        		 	     <ul CLASS="nav navbar-nav">
								        		  <?php $cant=0; $nombmenu="";?>
								        		   <?php foreach ($vector as $valor): ?>
								        		           <?php if($nombmenu != $valor->NOMB_MENU){ ?>
								        		                 <li class="dropdown">
																	<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" id="text_menu">
																	<?php echo "".$valor->NOMB_MENU ?>
																	<br>
																	<img src="<?php echo base_url()?>public/images/<?php echo "".$valor->NOMB_MENU?>.png" class="dropdown"> <span class="caret"></span>
																	</a>
																	 <ul class="dropdown-menu">
														            <?php $nombmenu=$valor->NOMB_MENU; ?>
								        		            <?php }?>
								        		                     <li><a href="<?php echo base_url()?><?php echo "".$valor->HREF?>" id="text_item"><?php echo "".$valor->NOMBRE ?> </a></li>
																	 <li class="divider"></li>	
															<?php $cant++;?>	 		 
														    <?php if($cant==$valor->CANT_ITEMS){ ?>
														          <?php $cant=0; $nombmenu="";?>
														            </ul>
   															   </li>  
   															    <li class="divider"></li>   
														    <?php }?>
														    
												<?php  endforeach ?>
			        		 			</ul>
			        		 			
					        		 	<p class="navbar-text pull-right">
					        		 	    <img src="<?php echo base_url()?>public/images/USUARIO.png" class="dropdown">
					        		 	    <a href="#" class="navbar-link">
										 	 <?php foreach ($nomcomp as $valor1): ?>
										 	   	<?php echo "".$valor1->NOMCOMPLETO ?> 
										 	 <?php  endforeach ?>
										    </a>
										 	<br/>
											<a  href="<?php echo base_url()?>login_c" class="navbar-text pull-right">
												 <img src="<?php echo base_url()?>public/images/SALIR.png" class="dropdown">
												 cerrar sesi&oacute;n
											</a>
										</p>
										
	        		 	         </div>
	        		 	        
					 	 </div>
	        		 	 
	        		</nav>
	           </header>
			    <div class="container" id="pnl_logo">
		                <img src="<?php echo base_url()?>public/images/logo.png"/>
			    </div>
	        </div>
	        <script  type="text/javascript" src="<?php echo base_url()?>public/jquery/jquery-latest.js"></script>
	        <script  type="text/javascript"src="<?php echo base_url()?>public/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
           
</body>	 
</html>