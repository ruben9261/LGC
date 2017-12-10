<!DOCTYPE html> 
<html> 
  <head> 
    <title>Editar Configuraci&oacute;n</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
    <script type="text/javascript" src="<?php echo base_url()?>public/jquery/jquery-3.1.1.min.js"></script>
    <script  type="text/javascript"  src="<?php echo base_url()?>public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>
</head>


 <script  type="text/javascript"> 

function obt_items()
{ var menu = $("#menu").val();
  $.ajax({
    url:  "<?php echo base_url()?>consConfigMenu_c/obt_items_x_cod_menu",
    type: 'get',//metodo
    data: { codmenu:  menu 
    	  }, //parametros
    success: function(respuesta) { 

      var lista =respuesta;
       if(lista.length > 0) 
   	  	{   var sb="";

   	          sb=sb+" <option value='0'> SELECCIONAR </option>";   
	      
     	  	 for(var i=0;i<lista.length;i++)
           {  var fila=lista[i];
				
              sb=sb+"  <option value='"+fila["CLAVEI"].toString()+"'>";
              sb=sb+ fila["VALORI"].toString();
              sb=sb+"  </option>";
             
            }
     	
     	  $("#item").html(sb);
     	  <?php if( $coditem != null && $coditem !=''){ ?>
	  	         $("#item option[value="+"<?php echo $coditem?>" +"]").attr("selected",true); 
          <?php $coditem=null;} ?>

       }
         
    }, 
    error: function() { alert('Se ha producido un error'); }
    });
  return false;
 }


function validarDatos()
{
	 var usu= $("#usuario").val();
	 var men= $("#menu").val();
	 var ite= $("#item").val();

	var Msg="";
    if(usu==0)
      {     Msg = Msg + "- seleccione Usuario </br>" ;
      }

    if(men==0)
    {     Msg = Msg + "- seleccione menu </br>" ;
    }

    if(ite==0 || ite=='' || ite === null)
    {     Msg = Msg + "- seleccione item " ;
    }

    return Msg;
}


function fn_editar()
{ var msg=validarDatos();
 if (msg=='')
  { editar();   
  }
  else
  {   $("#mensaje").html(msg);
	  $("#mostrarmodal_error_campos").modal("show");
   }	  

}



function editar()
{  var cod=<?php echo $codperfil?>;
   var usu= $("#usuario").val();
   var men= $("#menu").val();
   var ite= $("#item").val();
  
$.ajax({
	    url:  "<?php echo base_url()?>mantConfigMenu_c/editar",
	    type: 'post',//metodo
	    data: { codperfil: cod,
		        usuario:  usu,
		        menu:     men,
		        item:     ite 
	    	  }, //parametros
	    success: function(respuesta) { 

       if(respuesta==1)
       {  $("#mostrarmodal_ok").modal("show");
       }
       else
       {
      	 $("#mostrarmodal_error").modal("show");
       }    
	    	

	     }, 
	    error: function() { alert('Se ha producido un error'); }
	    });
	  return false;

}

</script>

 

<body>
    <br/>
	<div class="container" id="contenedor" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);  width: 45%; height:50%;">
		           <br/>
		            <div class="modal-header" style="color:rgb(0,128,255);"> 
		                 <STRONG>Editar Configuraci&oacute;n de Acceso</STRONG>
		            </div>
				   <form  id="frmEditConfigAcceso"> 
						      <br/>
						      <br/>
						       <div class="form-group">
								      <label  for="usuario">Usuario</label>
								       <select class="form-control" id="usuario" name="usuario" >
								    	         <option value="0">
										                 SELECCIONAR
										         </option>
										         <?php foreach ($usuarios as $usuario): ?>
										            <option value="<?php echo "".$usuario->clave?>">
										                    <?php echo "".$usuario->valor?>
										            </option>
										         <?php  endforeach ?>
								       </select>
								       <script type="text/javascript">
										         $("#usuario option[value="+"<?php echo $codusu?>" +"]").attr("selected",true); 
								       </script>     
							  </div>
							  <div class="form-group">
								    <label  for="menu">Menu</label>
								    <select class="form-control" id="menu" name="menu" onchange="obt_items();" >
								            <option value="0">
								                        SELECCIONAR
										    </option>
								    	 <?php foreach ($menus as $menu): ?>
								            <option value="<?php echo "".$menu->cod_menu?>">
								                    <?php echo "".$menu->nomb_menu?>
								            </option>
								         <?php  endforeach ?>
								    </select>
								    <script type="text/javascript">
									        $("#menu option[value="+"<?php echo $codmenu?>" +"]").attr("selected",true); 
									        obt_items();
									</script>     
								    
							  </div>
							  
							  <div class="form-group">
							   		 <label  for="item">Item</label>
							   		 <select class="form-control" id="item" name="item" ></select>
							  </div>
							   <div class="form-group">
							       
							        <a class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_editar();" >
							   				Guardar
							        	<img src="<?php echo base_url()?>public/images/GUARDAR.png">
							        </a>
							     
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
               <h3>Edici&oacute;n de configuraci&oacute;n de Menus</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se edito correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantConfigMenu_c/Nuevo_Config_Acceso" class="btn btn-primary">Nuevo</a>
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
                <h3>Edici&oacute;n de configuraci&oacute;n de Menus</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al editar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantConfigMenu_c/Nuevo_Config_Acceso" class="btn btn-primary">Nuevo</a>
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
                <h3>Edici&oacute;n de configuraci&oacute;n de Menus</h3>
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



</body>
</html>