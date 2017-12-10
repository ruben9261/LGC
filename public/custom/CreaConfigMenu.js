$(function () {
    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function (element) {
            // $(element)
            //     .closest('.form-group')
            //     .addClass('has-error');
            $(element).parent().removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element) {
            // $(element)
            //     .closest('.form-group')
            //     .removeClass('has-error');
            $(element).parent().removeClass('has-error').addClass('has-success');
        },
        errorPlacement: function (error, element) {
            if (element.prop('type') === 'checkbox') {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });
    var combo=document.getElementById('menu');
    combo.selectedIndex="";

    var combo=document.getElementById('usuario');
    combo.selectedIndex="";

 $('.calendario').datepicker({
    format: 'mm/dd/yyyy',
      pickTime: false,
      autoclose: true,
      language: 'es'
    });


});

function obt_items()
{ var menu = $("#menu").val();
  $.ajax({
    url:  "/consConfigMenu_c/obt_items_x_cod_menu",
    type: 'get',//metodo
    data: { codmenu:  menu 
    	  }, //parametros
    success: function(respuesta) { 

      var lista =respuesta;
       if(lista.length > 0) 
   	  	{   var sb="";

   	          sb=sb+" <option value=''> SELECCIONAR ITEM </option>";   
	      
     	  	 for(var i=0;i<lista.length;i++)
           {  var fila=lista[i];
				
              sb=sb+"  <option value='"+fila["CLAVEI"].toString()+"'>";
              sb=sb+ fila["VALORI"].toString();
              sb=sb+"  </option>";
             
            }
     	  	 //$("#item").html('');
     	  	 $("#item").html(sb);
			
        }
       
    	//$('#resultado').html(respuesta); 	
    	//	$("#item").html(respuesta); 	
    		//seleccionar_ItemxValor('idcurso',0);
          
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

$( "#Guardar" ).click(function( e ) {
$("#frmCreaConfigAcceso").validate({
        rules: {
            usuario: {
                required: true
            },
            menu: {
                required: true
            },
            item: {
                required: true,
            }
        }, messages: {
            usuario: {
                required: "Seleccione un usuario"
            },
            menu: {
                required: "Seleccione un menú"
            },
            item: {
                required: "Por favor seleccione un tipo de clase"
            }
        },
        submitHandler: function (form) {
            e.preventDefault();
            insertar();
        }
	});
});

function insertar()
{  var usu= $("#usuario").val();
   var men= $("#menu").val();
  var ite= $("#item").val();
    

$.ajax({
	    url:  "/mantConfigMenu_c/insertar",
	    type: 'post',//metodo
	    data: { usuario:  usu,
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

function inicializa_combo(id)
{	var combo=document.getElementById(id);
    combo.selectedIndex=0;
}

function fn_procesar(op,cod) 
{  	$("#operacion").val(op);
	$("#codigo").val(cod);
    $("#frmCreaConfigAcceso").submit();
}