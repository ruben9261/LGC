<!DOCTYPE html> 
<html> 
  <head> 
    <title>Gesti&oacute;n de Guia de Remisi&oacute;n</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type ="text/css" href="/public/bootstrap-3.3.7-dist/css/bootstrap.min.css"> 
     <style type="text/css">
		.modal-static { 
		    position: fixed;
		    top: 50% !important; 
		    left: 50% !important; 
		    margin-top: -100px;  
		    margin-left: -100px; 
		    overflow: visible !important;
		}
		.modal-static,
		.modal-static .modal-dialog,
		.modal-static .modal-content {
		    width: 200px; 
		    height: 200px; 
		}
		.modal-static .modal-dialog,
		.modal-static .modal-content {
		    padding: 0 !important; 
		    margin: 0 !important;
		}
		.modal-static .modal-content .icon {
		}
</style>
</head> 
<body> 
	    



		
    <div class="container">
         <br/>   
         <P class="text-center" style="color:rgb(0,128,255);"> 
		 Gesti&oacute;n de Guia de Remisi&oacute;n
		 </P>
         <br/>
    	<div class="well" style="background-color:rgb(255,255,255); border: 1px solid rgb(0,128,255);">    	     
		     
		    <form   id="frmGestOrdenEntrada"  action="/MantGuiaRemision_c/MantGuiaRemision/0" method="POST" > 
		          <input type="hidden" name="codigo"> 
		    	  <input type="hidden" id="tpagina">
		    	  <input type="hidden" id="pactual">
		    	
		    	  <div class="form_group">
		    	 		<button  type="submit"  id="btnNuevo"  style="background-color:rgb(255,255,255);color:rgb(0,128,255); border: 1px solid rgb(0,128,255);">
		    	 		    <img src="/public/images/REGISTRAR.png">
		    	 		    Nuevo
		    	 	   </button>
		    	        <a  href="/login_c/regresar" class="navbar-text pull-right">
							<img src="/public/images/REGRESAR.png" class="dropdown">
							Regresar
					   </a>
		    	  </div>
		    	  <br/>
		    	  <div class="form_group">
				       <input type="text" name="btnbuscar" id="FECHA_EMISION" class="form-control"  placeholder="FECHA_EMISION"> 
					   <input type="text" name="btnbuscar" id="FECHA_TRASLADO"  class="form-control"  placeholder="FECHA_TRASLADO">
				        <input type="text" name="btnbuscar" id="NRO_COMPROBANTE"  class="form-control"  placeholder="NRO_COMPROBANTE">
				     

					   <br/>

                       
					   <button  type="button"  id="btnbuscar"   style="background-color:rgb(255,255,255);color:rgb(0,128,255); border: 1px solid rgb(0,128,255);">
							  <img src="/public/images/BUSCAR.png">
							  Buscar
					   </button>
				 </div>
		    	</form>
		</div>
    </div>
    <div class="container">
		  <div id="cuadro_paginacion"></div>
		 
		  <div id="tabla"></div>
	</div> 
	
	 <div class="container">
		  <div id="respuesta"></div>
	</div> 
	
 
<script type="text/javascript"> 

</script> 	
<!-- Static Modal -->
<div class="modal modal-static fade" id="processing-modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <img src="/public/images/cargar2.gif">
                    <h4>            Procesando... <button type="button" class="close" style="float: none;" data-dismiss="modal" aria-hidden="true">�</button></h4>
                </div>
            </div>
        </div>
    </div>
</div>
	<!--Prueba-->
  <div class="modal fade" id="mostrarmodal_ok" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
               <a  class="close" data-dismiss="modal"  onclick="bus_OrdenEntrada();">&times;</a>
               <h4 class="modal-title" >Eliminaci&oacute;n de Orden de Entrada</h4>
           </div>
           <div class="modal-body">
            	 <div class="alert alert-info">
     		           La informaci&oacute;n se elimino correctamente 
     	        </div>
          </div>
       </div>
   </div>
</div>

 <div class="modal fade" id="mostrarmodal_error" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
     
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Registro de Orden Entrada</h3>
           </div>
           <div class="modal-body">
          		<div class="alert alert-danger">
             		   Error al registrar la informaci&oacute;n
          		</div>
           </div>
           <div class="modal-footer">
          		 <a href="/consOrdenEntrada_c/"  class="btn btn-danger">Cerrar</a>
           </div>
      </div>
   </div>
</div>
<script type="text/javascript" src="/public/jquery/jquery-3.1.1.min.js"></script>
<script  type="text/javascript"  src="/public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>

	<script type="text/javascript" src="/public/js/moment.min.js" charset="UTF-8"></script>

<script type="text/javascript" src="/public/custom/GuiaRemision.js"></script>
</body> 
</html> 