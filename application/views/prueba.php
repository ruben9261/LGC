
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type ="text/css" href="<?php echo base_url()?>public/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script type="text/javascript" src="<?php echo base_url()?>public/jquery/jquery-3.1.1.min.js"></script>
<script  type="text/javascript"  src="<?php echo base_url()?>public/bootstrap-3.3.7-dist/js/bootstrap.min.js"> </script>

<script  type="text/javascript"> 

$(document).ready(function(){

	$('#agregar').click(function(){
		//alert('agregar');
		fn_mostrar();
		return false;
	});

	$('#quitar').click(function(){
			//alert('quitar');
			fn_del(2);
			return false;
	});


});

function fn_mostrar()
{ alert('mostrar');
	 $("#mostrar_add").modal("show");
}


function fn_del(id)
{
	$('#'+id).remove();

}

function existe_en_lista(dato,lista)
 {  var verdad=false;
	for(var i=0;i<lista.length;i++)
	{    if(dato==lista[i])
	     {   verdad=true;
			i=lista.length;
		}
	}
	return verdad;
 }


function mostrar_array(lista)
{   alert('lista.length'+lista.length);
	for(var i=0;i<lista.length;i++)
	{    alert('lista['+i+']='+lista[i]);}
}

function fn_add()
{   
   var vide=$("#ide").val();
   var Vprod=$("#producto").val();


	 var sb="";
     sb=sb+"<div id='"+vide+"' class='row'>";  
     sb=sb+"<div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>"; 
     sb=sb+"10";
   	 sb=sb+"</div>";
     sb=sb+" <div class='col-xs-6'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'> ";
  	 sb=sb+ Vprod;
 	 sb=sb+"</div>";
	 sb=sb+"<div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>";
     sb=sb+"  20";
	 sb=sb+"</div>";
 	 sb=sb+" <div class='col-xs-1'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>";
 	 sb=sb+"200";
	 sb=sb+"  </div>";
	 sb=sb+"  <div class='col-xs-1'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>";
	 sb=sb+"     <a href='#' onclick=fn_del('"+vide+"')>";
	 sb=sb+"        Eliminar&nbsp";
	 sb=sb+"      <img src='<?php echo base_url()?>public/images/ELIMINAR.png'>";
	 sb=sb+"     </a> ";
	 sb=sb+"  </div>";
	 sb=sb+"</div>"; 
     $('#tabla').append(sb);
     $("#mostrar_add").modal("hide");
}





</script>


</head>
<body>
          <div class="container">
           <br/>
	      <div class='row'>
	           <div class="form-group">
	           	
	           <?php echo  date('d/m/y');?>
	             <button id="agregar">Agregar(+)</button>
	           <!-- 
	                <label>Cantidad</label> <input id="cantidad" type="text">
	                <label>codproducto</label><input id="codproducto" type="text">
	                <label>producto</label><input id="producto" type="text">
	                
	                <button id="agregar">Agregar(+)</button>
	                <button id="quitar">Quitar(-)</button>
	                  --> 
	           </div>
	        </div>
	     
	         
	      <div class='row'>
   		   			<div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
   			   			 CANTIDAD 
   					</div> 
   		    		<div class='col-xs-6'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
   			     		DESCRIPCI&Oacute;N
   			 		</div>
   			 		<div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
   			     		PRECIO
   			 		</div>
   			 		<div class='col-xs-2'  style='background-color:rgb(0,128,255); color:white; font-size:11px;'>
   			     		IMPORTE
   			 		</div>				   
   		   </div>	  
   		   
   		      <div id="tabla">
   		    <!-- 
   		        <div id="1" class='row'>  
                      <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'> 
         	  	          	 cantidad
         	  	        </div>
         	  	        <div class='col-xs-6'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'> 
       	  	          	    descripcion
       	  	            </div>
       	  	      	   <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>
  	                        precio
  	                       
  	                    </div>
	   	  			    <div class='col-xs-2'  style='background-color:#fff; border: 1px solid rgb(0,128,255); font-size:10px;'>
	   	  			 	    	importe
    			 	   </div>
    			 	   
     	     	</div> 
   		    -->
   		        </div> 
   		   
   </div>
   
   <div class="modal fade" id="mostrar_add" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
	           <div class="modal-header btn-primary">
	                  <button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                   <h4>Datos de Producto</h4>
	           </div>
		           <div class="modal-body">
		            	<div class="container">
					      <br/>
						      <div class='row'>
						      
						          <div class="form-group">
						               <label>IDE</label><input id="ide" type="text">
						           </div>
						           <div class="form-group">
						               <label>codproducto</label><input id="codproducto" type="text">
						           </div>
						           <div class="form-group">
						               <label>producto</label><input id="producto" type="text">
						            </div>
						           <div class="form-group">
						                <label>Cantidad</label> <input id="cantidad" type="text">
						           </div>
						      </div>
					      </div>
		          </div>
          <div class="modal-footer">
          			<a class="btn btn-primary"  id="boton1" style="background-color: white; border: 1px solid rgb(0,128,255);color:rgb(0,128,255);" onclick="fn_add();" >
						A&ntilde;adir
						<img src="<?php echo base_url()?>public/images/GUARDAR.png">
					 </a>
           </div>
       </div>
   </div>
</div>

 
   
   
</body>
</html>