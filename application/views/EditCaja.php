<!DOCTYPE html> 
<html> 
  <head> 
    <title>Editar Caja</title> 
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
		                 <STRONG>Editar Caja</STRONG>
		            </div>
				    <form id="frmCreaCaja"  action="<?php echo base_url()?>mantCaja_c/insertar" method="POST">
					        <div class="form-group">
								       <select class="form-control" id="oficina" name="oficina" >
								    	         <option value="0">
										                 SELECCIONAR OFICINA
										         </option>
										         <?php foreach ($oficinas as $oficina): ?>
										            <option value="<?php echo "".$oficina->CLAVE?>">
										                    <?php echo "".$oficina->VALOR?>
										            </option>
										         <?php  endforeach ?>
								       </select>
							           
							 </div>
						   
						    <script type="text/javascript">
										         $("#oficina option[value="+"<?php echo $codoficina?>" +"]").attr("selected",true); 
							</script>     
							   
						   
						   
						   
						    <div class="form-group">
						         <input id="caja" type="text" class="form-control" placeholder="Descripci&oacute;n de caja" value="<?php echo $desc_caja?>">
						    </div>
						   
						    
						    <div class="form-group">
								       <select class="form-control" id="tipo" name="tipo" >
								    	         <option value="0">
										                 SELECCIONAR TIPO CAJA
										         </option>
										         <?php foreach ($tipos as $tipo): ?>
										            <option value="<?php echo "".$tipo->CLAVE?>">
										                    <?php echo "".$tipo->VALOR?>
										            </option>
										         <?php  endforeach ?>
								       </select>
							           
							 </div>
						   	 
						   	<script type="text/javascript">
										         $("#tipo option[value="+"<?php echo $cod_tip_caja?>" +"]").attr("selected",true); 
							</script>     
							   
						   
						    
						    <div class="form-group">
							   <a class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="editar();" >
							   				Guardar
							        	<img src="<?php echo base_url()?>public/images/GUARDAR.png">
							   </a>
							     
							   <a href="<?php echo base_url()?>ConsCaja_c/" class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255); color:rgb(0,128,255);">
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
               <h3>Edici&oacute;n de Caja</h3>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-success">
     		           La informaci&oacute;n se edito correctamente 
     		      </div>
          </div>
          <div class="modal-footer">
          				<a href="<?php echo base_url()?>MantCaja_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          				<a href="<?php echo base_url()?>consCaja_c/"  class="btn btn-danger">Cerrar</a>
           </div>
       </div>
   </div>
</div>


 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edici&oacute;n de Caja</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al editar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		<a href="<?php echo base_url()?>MantCaja_c/mostrar_Nuevo" class="btn btn-primary">Nuevo</a>
          		<a href="<?php echo base_url()?>consCaja_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>


<div class="modal fade" id="mostrarmodal_error_campos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edici&oacute;n de Caja</h3>
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




 <script  type="text/javascript"> 


function validarDatos()
{
	 var ofi=$("#oficina").val();
	 var caj=$("#caja").val();
	 var tip=$("#tipo").val();
    
	var Msg="";
	 if(ofi==0 || ofi === null)
      {     Msg = Msg + "- Seleccione oficina </br>" ;
      }

    if(caj==''  || caj === null)
    {     Msg = Msg + "- Ingrese descripción de caja </br>" ;
    }

    if(tip==0 || tip === null)
    {     Msg = Msg + "- Seleccione tipo caja  </br>" ;
    }

    return Msg;
     
}


function guardar()
{ var msg=validarDatos();
 /* alert('msg'+msg);*/
if (msg=='')
  { editar();   
  }
  else
  {   
	  $("#mensaje").html(msg);
	  $("#mostrarmodal_error_campos").modal("show");
   }	  

}



function editar()
{    var cod=<?php echo $codcaja?>;
	 var ofi=$("#oficina").val();
	 var caj=$("#caja").val();
	 var tip=$("#tipo").val();
   
	

$.ajax({
	    url:  "<?php echo base_url()?>MantCaja_c/editar",
	    type: 'post',//metodo
	    data: { codigo:cod,
		        oficina:ofi,
		        caja:   caj,
		        tipo:   tip	        
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






function inicializa_combo(id)
{	var combo=document.getElementById(id);
    combo.selectedIndex=0;
}


function fn_procesar(op,cod) 
{  	$("#operacion").val(op);
	$("#codigo").val(cod);
    $("#frmCreaConfigAcceso").submit();
}



</script>

</body>
</html>