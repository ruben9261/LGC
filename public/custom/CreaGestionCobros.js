$(document).ready(function() {

	    $.validator.setDefaults({
        errorClass: 'help-block',
        highlight: function (element) {
            $(element)
                .closest('.form-group')
                .addClass('has-error');
        },
        unhighlight: function (element) {
            $(element)
                .closest('.form-group')
                .removeClass('has-error');
        },
        errorPlacement: function (error, element) {
            if (element.prop('type') === 'checkbox') {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
	});
	
	$('.calendario').datepicker({
    format: 'mm/dd/yyyy',
      pickTime: false,
      autoclose: true,
      language: 'es'
	});

	$("#TablaOrdenEntrada").DataTable({
		"pageLength": 5,
			//  data: myData,
		aoColumns: [
			{ mData: 'Serie' },
			{ mData: 'Cliente' },
			{ mData: 'Documento' },
			{ mData: 'Acciones'}
		]
	});

	$("#TabalClientes").DataTable({
		"pageLength": 5,
			//  data: myData,
		aoColumns: [
			{ mData: 'COD_CLI' },
			{ mData: 'NOMBRE' },
			{ mData: 'NRO_DOCUMENTO' },
			{ mData: 'Acciones'}
		]
	});
	
} );

function QuitarValidacion (element) {
	$(element)
		.closest('.form-group')
		.removeClass('has-error');
	var lblError = element.replace("#","")
	$('label[for="'+lblError+'"]').hide();

	// $(element).closest('.form-group').addClass('has-success').removeClass('has-danger');
    // $(element).closest('.form-control').addClass('form-control-success').removeClass('form-control-danger');
	
}

function fn_eliminar(cod) 
{  $.ajax({
		    url:  "/mantOrdenEntrada_c/eliminar",
	    	type: 'post',//metodo
	    	data: { codOrdenEntrada:  cod
	    		  }, //parametros
	    	success: function(respuesta) { 
       		if(respuesta==1)
       		{  $("#mostrarmodal_ok").modal("show");}
       		else
       		{  $("#mostrarmodal_error").modal("show");}    
	      }, 
	       error: function() { alert('Se ha producido un error'); }
	    });
	  return false;
}


function fn_ObtenerClientes(){
	$('#TabalClientes').dataTable().fnClearTable();
	//$('#TabalClientes').dataTable().fnDestroy();
		$("#processing-modal").modal("show");
	$.ajax({
		url:"/mantGestionCobros_c/ObtenerClientes",
		type:"POST",
		data: null,
		success:function(response){
			$("#processing-modal").modal("toggle");
			$("#ClientesModal").modal("show");
			var respuesta=JSON.parse(response);
			var listClientes = respuesta.listClientes;
			var TableData = new Array();
			var Cliente = null;
			if(listClientes.length>0){
				$.each(listClientes, function(index, value){
					var cols = "";
					// cols += '<tr><td class="CodCli" data-value="">'+value.COD_CLI+'</td>';
					// cols += '<td class="NomCli" >'+value.NOMBRE+'</td>';
					// cols += '<td>'+value.NRO_DOCUMENTO+'</td>';
					// cols += '<td><i class="btn glyphicon glyphicon-ok" onclick="fn_SeleccionarCliente('+"'"+value.COD_CLI+"','"+value.NOMBRE+"','"+value.NRO_DOCUMENTO+"'"+');"></i></td></tr>';
					//$("#TabalClientes tbody").append(cols);

					Cliente = new Object;
					Cliente.COD_CLI = value.COD_CLI;
					Cliente.NOMBRE = value.NOMBRE;
					Cliente.NRO_DOCUMENTO = value.NRO_DOCUMENTO;
					Cliente.Acciones = '<i class="btn glyphicon glyphicon-ok" onclick="fn_SeleccionarCliente('+"'"+value.COD_CLI+"','"+value.NOMBRE+"','"+value.NRO_DOCUMENTO+"','"+value.COD_TIPO_DOC+"'"+');"></i>';
					TableData.push(Cliente);
				});
			}
			// $("#TabalClientes").DataTable({
			// 			"pageLength": 5
			// });
			//listClientes = JSON.stringify(listClientes);
			$('#TabalClientes').dataTable().fnAddData(TableData);
			
		},
		error: function(e){
			$("#processing-modal").modal("toggle");
			AlertNotify('', 'Error', 'Error en el servidor consulte con el administrador', 'danger');
		}
	});
}

function fn_ObtenerOrdenEntrada(){
	$('#TablaOrdenEntrada').dataTable().fnClearTable();
	$("#processing-modal").modal("show");
	$.ajax({
		url:"/mantGestionCobros_c/ObtenerOrdenEntrada",
		type:"POST",
		data: null,
		success:function(response){
			$("#processing-modal").modal("toggle");
			$("#OrdenEntModal").modal("show");
			var respuesta=JSON.parse(response);
			var listOrdenEntrada = respuesta.listOrdenEntrada;
			var TableData = new Array();
			var OrdenEntrada = null;
			if(listOrdenEntrada.length>0){
				$.each(listOrdenEntrada, function(index, value){
					//var cols = "";
					// cols += '<tr><td class="CodCli" data-value="">'+value.cod_orden_e+'-'+value.serie+'-'+value.numero+'</td>';
					// cols += '<td class="NomCli" >'+value.cliente+'</td>';
					// cols += '<td>'+value.documento+'</td>';
					// cols += '<td><i class="btn glyphicon glyphicon-ok" onclick="fn_SeleccionarOrdenEntrada('+"'"+value.cod_orden_e+"'"+');"></i></td></tr>';
					//$("#TablaOrdenEntrada tbody").append(cols);
					OrdenEntrada = new Object();
					OrdenEntrada.Serie = value.cod_orden_e+'-'+value.serie+'-'+value.numero;
					OrdenEntrada.Cliente = value.cliente;
					OrdenEntrada.Documento = value.documento;
					OrdenEntrada.Acciones = '<i class="btn glyphicon glyphicon-ok" onclick="fn_SeleccionarOrdenEntrada('+"'"+value.cod_orden_e+"'"+');"></i>';
					TableData.push(OrdenEntrada);
				});
			}
			$('#TablaOrdenEntrada').dataTable().fnAddData(TableData);
		},
		error: function(e){
			$("#processing-modal").modal("toggle");
			AlertNotify('', 'Error', 'Error en el servidor consulte con el administrador', 'danger');
		}
	});
}

function fn_ObtenerTipoCobro(){
	$.ajax({
		type: "POST",
		url: "/mantGestionCobros_c/ObtenerTipoCobro",
		data:null,
		success:function(response){
			var respuesta = JSON.parse(response);
			var listTipoCobro = respuesta.listTipoCobro;
			$.each(listTipoCobro,function(index,value){
				var col = "";
				col += '<option value="'+value.COD_TIPOCOBRO+'">'+value.NOM_TIPOCOBRO+'</option>';
				$("#COD_TIPOCOBRO").append(col);
			});
		},
		error:function(e){

		}
	});
}

function fn_ValidarSiExisteOrdenEntrada(NewCodOrdenE){
	var YaExiste = false;
	var CodOrdenE = null;
	$("#TablaOrdenEntradaDet tbody tr").each(function(){
		CodOrdenE = $(".CodOrdenE",this).val();
		if(CodOrdenE == NewCodOrdenE){
			YaExiste = true;
			
		}
	});
	return YaExiste;
}
function fn_SeleccionarCliente(CodCli,NomCli,NroDocumento,CodTipoDoc){
	$("#COD_CLI").val(CodCli);
	var NomCli = NomCli;
	$("#Cliente").val(NomCli);
	$("#NRO_DOCUMENTO").val(NroDocumento);
	$("#COD_TIPO_DOC").val(CodTipoDoc);
	$('#ClientesModal').modal('toggle');
	QuitarValidacion("#Cliente");
	QuitarValidacion("#NRO_DOCUMENTO");
}

function fn_SeleccionarOrdenEntrada(CodOrdenE){
	$('#OrdenEntModal').modal('toggle');
	
	var Existe = fn_ValidarSiExisteOrdenEntrada(CodOrdenE);
	if(!Existe){
			$("#processing-modal").modal("show");
			$.ajax({
					type:"POST",
					url:"/mantGestionCobros_c/ObtenerOrdenEntradaDet",
					data:{CodOrdenE:CodOrdenE},
					success: function(response){
						$("#processing-modal").modal("toggle");
						var respuesta=JSON.parse(response);
						var listOrdenEntradaDet = respuesta.listOrdenEntradaDet;
						var Total = 0;
						debugger;
						Total = parseInt($("#Total").html());
						if(listOrdenEntradaDet.length>0){
							$datos=0;

							$.each(listOrdenEntradaDet, function(index, value){
								$datos=$datos+1;
								
								var cols = "";
								cols += '<tr class="FILA'+value.CodOrdenE+'">';
								cols += '<input type="hidden" class="COD_DOC_COBRO_DET" value="'+value.COD_DET_ORDEN_E+'">';
								cols += '<input type="hidden" class="CodOrdenE" value="'+value.CodOrdenE+'">';
								cols += '<input type="hidden" class="SUB_TOTAL" value="'+value.Importe+'">'
								cols += '<input type="hidden" class="SUB_TOTAL" value="'+value.datos+'">'
								cols += '<td class="col-md-3 input-sm">'+value.CodOrdenE+'-'+value.Serie+'-'+value.Numero+'</td>';
								cols += '<td class="col-md-1 input-sm" >'+value.Cantidad+'</td>';
								cols += '<td class="col-md-1 input-sm" >'+value.Producto+'</td>';
								cols += '<td class="col-md-3 input-sm" >'+value.TipoProducto+'</td>';
								cols += '<td class="col-md-2 input-sm" >'+value.ObsProd+'</td>';
								cols += '<td class="col-md-3 input-sm" >'+value.Precio+'</td>';
								cols += '<td class="col-md-2 input-sm" >'+value.Importe+'</td>';
								cols += '<td class="col-md-1 input-sm" ><i class="btn glyphicon glyphicon-remove" onclick="fn_EliminarOrdenEntradaDetalle('+"'FILA"+value.CodOrdenE+"'"+');"></i></td>';
								
								$("#TablaOrdenEntradaDet tbody").append(cols);
								Total = Total + parseInt(value.Importe);
								$("#Total").html(Total);
								$("#MONTO_TOTAL").val(Total);
								$("#MONTO_NETO").val(Total);
								document.getElementById("demo").innerHTML = "<div   id='validartabla'><label style='color:red;display:none' class=control-labe>Seleccione orden de entrada</label></label> </div>";
								
							});
							document.getElementById("datos").value =$datos ;
	
						}
					},
					error: function(error){
						$("#processing-modal").modal("toggle");
						AlertNotify('', 'Error', 'Error en el servidor consulte con el administrador', 'danger');
					}
				});
	}else{
			AlertNotify('', 'Alerta', 'La orden de entrada ya fue agregada', 'danger');
	}
	
}

$( "#Guardar" ).click(function( e ) {
	// var TipoCobro = $("#COD_TIPOCOBRO").val();
	// debugger;


	$datos = $("#datos").val();

	if($datos==0){
	   document.getElementById("demo").innerHTML = "<div id='validartabla'><label style='color:red;display:block' class=control-labe>Seleccione orden de salida</label></label> </div>";
	
	}
	if($datos>0){
		document.getElementById("demo").innerHTML = "<div id='validartabla'><label style='color:red;display:none' class=control-labe>Seleccione orden de salida</label></label> </div>";
	
	}
  

	$("#frmCreaDocCobro").validate({
				rules: {
					NRO_DOCUMENTO: {
						required: true
					},
					NUMERO_OPERACION: {
						required: true
					},
					NUMERO_CUENTA: {
						required: true,
					},
					FECHA_OPERACION: {
						required: true,
					}
				
				}, messages: {
					
					NRO_DOCUMENTO: {
						required: "Ingrese un número de documento"
					},
					NUMERO_OPERACION: {
						required: "Ingrese un número de operación"
					},
					NUMERO_CUENTA: {
						required: "Ingrese un número de cuenta"
					},
					FECHA_OPERACION: {
						required: "Ingrese una fecha de operación"
					}
				},
				submitHandler: function (form) {
					e.preventDefault();
					fn_GuardarDocCobro();
				}

			});

});

function fn_ActualizarDetalleDocCobro(listDocCobroDet){
	if(listDocCobroDet.length>0){
		$datos = 0;
		$.each(listDocCobroDet, function(index, value){
			$datos = $datos +1;
          
			var cols = "";
			cols += '<tr>';
			cols += '<input type="hidden" class="COD_DOC_COBRO_DET" value="'+value.COD_DOC_COBRO_DET+'">';
			cols += '<input type="hidden" class="CodOrdenE" value="'+value.CodOrdenE+'">';
			cols += '<input type="hidden" class="SUB_TOTAL" value="'+value.Importe+'">'
			cols += '<input type="hidden" class="datos" value="'+value.datos+'">';
			cols += '<td class="col-md-3 input-sm">'+value.CodOrdenE+'-'+value.Serie+'-'+value.Numero+'</td>';
			cols += '<td class="col-md-1 input-sm" >'+value.Cantidad+'</td>';
			cols += '<td class="col-md-1 input-sm" >'+value.Producto+'</td>';
			cols += '<td class="col-md-3 input-sm" >'+value.TipoProducto+'</td>';
			cols += '<td class="col-md-2 input-sm" >'+value.ObsProd+'</td>';
			cols += '<td class="col-md-3 input-sm" >'+value.Precio+'</td>';
			cols += '<td class="col-md-2 input-sm" >'+value.Importe+'</td>';
			$("#TablaOrdenEntradaDet tbody").append(cols);
			Total = Total + parseInt(value.Importe);
			document.getElementById("demo").innerHTML = "<div   id='validartabla'><label style='color:red;display:none' class=control-labe>Seleccione orden de entrada</label></label> </div>";
			
			
			
			$("#Total").html(Total);
			$("#MONTO_TOTAL").val(Total);
			$("#MONTO_NETO").val(Total);
		});
		document.getElementById("datos").value =$datos ;
	
	}
	
}
function fn_GuardarDocCobro(){

	
	var fecha= $("#FECHA_OPERACION").val();

	var new_date = moment(fecha).format('YYYY/MM/DD');
	var DocCobro = new Object();
	DocCobro.COD_DOC_COBRO = $("#COD_DOC_COBRO").val();
	DocCobro.COD_OFI = $("#COD_OFI").val();
	DocCobro.COD_CAJA = $("#COD_CAJA").val();
	DocCobro.COD_USU = $("#COD_USU").val();
	DocCobro.NRO_DOCUMENTO = $("#NRO_DOCUMENTO").val();
	DocCobro.NUMERO_CUENTA = $("#NUMERO_CUENTA").val();
	DocCobro.COD_TIPO_DOC = $("#COD_TIPO_DOC").val();
	DocCobro.COD_CLI = $("#COD_CLI").val();
	DocCobro.FECHA_OPERACION = new_date;
	DocCobro.NUMERO_OPERACION = $("#NUMERO_OPERACION").val();
	DocCobro.OBSERVACION = $("#OBSERVACION").val();
	DocCobro.MONTO_TOTAL = $("#MONTO_TOTAL").val();
	DocCobro.MONTO_NETO = $("#MONTO_NETO").val();
	DocCobro.COD_TIPOCOBRO = $("#COD_TIPOCOBRO").val();

	DocCobro.TIPO_TRANSACCION = $("#TIPO_TRANSACCION").val();

	var listDocCobroDet = new Array();
	var DocCobroDet = null;
	$("#TablaOrdenEntradaDet tbody tr").each(function(){
		DocCobroDet = new Object();
		var CodOrdenE = $(".CodOrdenE",this).val();
		DocCobroDet.COD_ORDEN_E = $(".CodOrdenE",this).val();
		DocCobroDet.SUB_TOTAL = parseInt($(".SUB_TOTAL",this).val());
	   
		
		listDocCobroDet.push(DocCobroDet);
      


	});
	debugger;

	var result = [];
	listDocCobroDet = listDocCobroDet.reduce(function (res, value) {
		if (!res[value.COD_ORDEN_E]) {
			res[value.COD_ORDEN_E] = {
				SUB_TOTAL: 0,
				COD_ORDEN_E: value.COD_ORDEN_E
			};
			result.push(res[value.COD_ORDEN_E])
		}
		res[value.COD_ORDEN_E].SUB_TOTAL += value.SUB_TOTAL
		return res;
	}, {});

	DocCobro.listDocCobroDet = listDocCobroDet;
	var valor  = 1;
	$.ajax({
		type: "post",
		url: "/mantGestionCobros_c/GuardarDocCobro",
		// dataType : "json",
		// contentType:"application/json",
		data: {DocCobro: DocCobro},
		success: function(response){
			debugger;
			var response = JSON.parse(response);
			if(response.respuesta){
				AlertNotify('', 'Éxito', 'El registro se guardo correctamente', 'success');
				$("#COD_DOC_COBRO").val(response.COD_DOC_COBRO);
				$("#lblCOD_DOC_COBRO").html(response.COD_DOC_COBRO);
				$("#TIPO_TRANSACCION").val(2);
				$("#ImprimirPdf").show();
				var ImprimirPdf = "<a type='button' class='btn btn-success' href='/mantGestionCobros_c/docCobroPdf/"+response.COD_DOC_COBRO+"' target='blank'>Imprimir</a>";
				$("#ImprimirPdf").html(ImprimirPdf);
			}else{
				AlertNotify('', 'Error', 'No se pudo guardar el registro', 'danger');
			}
		},
		error: function(e){
			AlertNotify('', 'Error', 'Error en el servidor consulte con el administrador', 'danger');
		}
	});
}

//Mensaje de dialogo de confrimacion
function InicioJPopUpConfirm(url, id, titulo, message, actionfunction) {
    var selector = "<div class='modal fade' id='dialogModal' tabindex='-1' role='dialog' aria-hidden='true'><div class='modal-dialog modal-sm'  role='document'><div id='ContenidoModal' class='modal-content' style='border: 1px solid rgba(0,0,0,.2); border-radius:5px'><div><div class='modal-header' style='padding-top:0px; padding-bottom:0px; background-color:#2178C4; color:white; font-style:italic'><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>x</button><h4>" + titulo + "</h4></div><div class='modal-body'><p>" + message + "?</p></div><div class='modal-footer'><div class='col-md-12'><button type='button' class='btn btn-default' data-dismiss='modal'><i class='fa fa-remove'></i>Cancelar</button><button data-url='" + url + "' data-valor='" + id + "' id='" + actionfunction + "' type='button' class='btn btn-danger'>Aceptar</button></div></div></div></div></div></div>";
    $(selector).modal('show');
}

//mensaje de retorno 
/* tipo de mensaje : 1: success = correcto, 2: error = Error, 3: warning = Advertencia,4: info = Informacion*/
function AlertNotify(versionB, titulo, texto, tipo) {

    new PNotify({
        styling: 'bootstrap3',
        title: titulo,
        text: texto,
        type: tipo
    });
}

$("#COD_TIPOCOBRO").on("change",function(){
	var TipoCobro = $("#COD_TIPOCOBRO").val();
	if(TipoCobro=="1"){
		$("#divNroCuenta").hide();
		$("#divFechaOperacion").hide();
		$("#divNroOperacion").hide();
		$("#NUMERO_OPERACION").val("0");
		$("#NUMERO_CUENTA").val("0");
	}else{
		$("#divNroCuenta").show();
		$("#divFechaOperacion").show();
		$("#divNroOperacion").show();
		$("#NUMERO_OPERACION").val("");
		$("#NUMERO_CUENTA").val("");
		$("#FECHA_OPERACION").val("");
	}
});

$("#FECHA_OPERACION").on("change",function(){
	var fechaOperacion = $("#FECHA_OPERACION").val();
	if(fechaOperacion!=""){
		QuitarValidacion("#FECHA_OPERACION");
	}
})

function LoadingPageClose() {
    // eliminamos el div que bloquea pantalla
    $("#WindowLoad").remove();

}

function LoadingPage() {
    //eliminamos si existe un div ya bloqueando
    LoadingPageClose();

    //imagen que aparece mientras nuestro div es mostrado y da apariencia de cargandoimg
    var imgCentro = "<div style='text-align:center; height:12%; background: rgb(0, 0, 0); width:28%; margin: 0 auto; '><div style='color: #fff; margin-top:51%;font-size:12px; font-weight:bold; height: 700px;'>Espere por favor <img style='height:10%;' src='/public/images/Loading3.gif'></div></div>";

    //creamos el div que bloquea grande------------------------------------------
    var div = document.createElement("div");
    div.id = "WindowLoad";
    div.style.width = "100%";
    div.style.height = "100%";
    $("body").append(div);

    //creamos un input text para que el foco se plasme en este y el usuario no pueda escribir en nada de atras
    var input = document.createElement("input");
    input.id = "focusInput";
    input.type = "text";

    //asignamos el div que bloquea
    $("#WindowLoad").append(input);
    //centramos el div del texto
    $("#WindowLoad").html(imgCentro);

}

function fn_EliminarOrdenEntradaDetalle(elemento){
	debugger;
	var elemento2 = '.'+elemento.trim();
	$(elemento2).remove();

	var SUB_TOTAL = 0;
	$("#TablaOrdenEntradaDet tbody tr").each(function(){
		SUB_TOTAL += parseInt($(".SUB_TOTAL",this).val());
	});
 	
	
	//document.getElementById("Total").value =0;
	$("#Total").html(SUB_TOTAL);
	$("#MONTO_TOTAL").val(SUB_TOTAL);
	$("#MONTO_NETO").val(SUB_TOTAL);
	$("#datos").val(0);
}

var DataGrouper = (function() {
    var has = function(obj, target) {
        return _.any(obj, function(value) {
            return _.isEqual(value, target);
        });
    };

    var keys = function(data, names) {
        return _.reduce(data, function(memo, item) {
            var key = _.pick(item, names);
            if (!has(memo, key)) {
                memo.push(key);
            }
            return memo;
        }, []);
    };

    var group = function(data, names) {
        var stems = keys(data, names);
        return _.map(stems, function(stem) {
            return {
                key: stem,
                vals:_.map(_.where(data, stem), function(item) {
                    return _.omit(item, names);
                })
            };
        });
    };

    group.register = function(name, converter) {
        return group[name] = function(data, names) {
            return _.map(group(data, names), converter);
        };
    };

    return group;
}());

DataGrouper.register("sum", function(item) {
    return _.extend({}, item.key, {Value: _.reduce(item.vals, function(memo, node) {
        return memo + Number(node.Value);
    }, 0)});
});

/* ---------------------------------------------------------------------------------------------------------*/



 /*******************utilitarios********************/
 function fn_mostrar_modal(ide)
 {   $('#'+ide).modal("show");
 }

 function fn_ocultar_modal(ide)
 { $('#'+ide).modal("hide");
   
 }
 
 $( "#GuardarCliente" ).click(function( e ) {
 $("#frmCreaCliente").validate({
		 rules: {
			nombre: {
				 required: true
			 },v_contact: {
				 required: true
			 },tlfn: {
				 required: true,
				 number:true
			 },domicilio: {
				 required: true
			 },razon_social: {
				 required: true
			 },tipo: {
				 required: true
			 },documento: {
				 required: true,
				 number:true
			 }
		 }, messages: {
			nombre: {
				 required: "Ingrese Descripcion"
			 },v_contact: {
				 required: "Ingrese Contacto"
			 },tlfn: {
				 required: "Ingrese Telefono",
				 number: "Ingrese Digitos"
			 },domicilio: {
				 required: "Ingrese domicilio",
			 },razon_social: {
				 required: "Ingrese Razon Social",
			 },tipo: {
				 required: "Seleccione tipo",
			 },documento: {
				 required: "Ingrese documento",
				 number: "Ingrese Digitos"
				 
			 }
		 },
		 submitHandler: function (form) {
			 e.preventDefault();
			 insertar_Cliente();
		 }
	 });
 });
/**************************************************/


function fn_limpiar_modal_sel_cliente()
{ $("#txt_nombre").val('');
  $("#txt_documento").val('');
  $("#cuadro_paginacion_sel_cliente").html('');
  $("#tabla_sel_cliente").html('');
}


function fn_set_cliente(codcliente,nombre,documento)
{  $("#codcliente").val(codcliente);
   $("#nomb_cliente").text(nombre);
   $("#doc_cliente").text(documento);
}
/**************************************************/
function fn_limpiar_modal_crea_cliente()
{ $("#txt_razon_social").val('');
  $("#tipo_doc").val(0);
  $("#tipo_doc option[value="+"0" +"]").attr("selected",true);
  $("#txt_doc_cliente").val('');
  $("#txt_contacto").val('');
  $("#txt_direccion").val('');
  $("#txt_tlfn").val('');
}
 

function insertar_cliente()
{       var v_rsocial=$("#txt_razon_social").val();
	    var v_tipo=$("#tipo_doc").val();
		var v_docu=$("#txt_doc_cliente").val();
		var v_contact=$("#txt_contacto").val();
		var v_dir=$("#txt_direccion").val();
		var v_tlfn=$("#txt_tlfn").val();

$.ajax({
	    url:  "<?php echo base_url()?>MantCliente_c/insertar_creaOrdenEntrada",
	    type: 'post',//metodo
	    data: { nombre:	      v_contact,
			    tlfn:         v_tlfn,
		        domicilio:    v_dir,
		        razon_social: v_rsocial,
		        tipo:         v_tipo,
		        documento:    v_docu
	    	  }, //parametros
	    success: function(respuesta) { 

	   if(respuesta==1)
	       {  $("#modal_creaCliente_reg_ok").modal("show");
	       }
	       else
	       {
	      	 $("#modal_creaCliente_reg_error").modal("show");
	       }    
	    }, 
	    error: function() { alert('Se ha producido un error'); }

    });

    return false;
}