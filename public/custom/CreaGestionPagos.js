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

	$("#TablaOrdenSalida").DataTable({
		"pageLength": 5,
			//  data: myData,
		aoColumns: [
			{ mData: 'SERIE' },
			{ mData: 'PROVEEDOR' },
			{ mData: 'DOCUMENTO' },
			{ mData: 'Acciones'}
		]
	});

	$("#TablaProveedores").DataTable({
		"pageLength": 5,
			//  data: myData,
		aoColumns: [
			{ mData: 'COD_PROV' },
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
		    url:  "/mantOrdenSalida_c/eliminar",
	    	type: 'post',//metodo
	    	data: { COD_ORDEN_Salida:  cod
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


function fn_ObtenerProveedores(){
	$('#TablaProveedores').dataTable().fnClearTable();
	//$('#TablaProveedores').dataTable().fnDestroy();
		$("#processing-modal").modal("show");
	$.ajax({
		url:"/mantGestionPagos_c/ObtenerProveedores",
		type:"POST",
		data: null,
		success:function(response){
			$("#processing-modal").modal("toggle");
			$("#ProveedoresModal").modal("show");
			var respuesta=JSON.parse(response);
			var listProveedores = respuesta.listProveedores;
			var TableData = new Array();
			var Proveedor = null;
			if(listProveedores.length>0){
				$.each(listProveedores, function(index, value){
					var cols = "";
					// cols += '<tr><td class="COD_PROV" data-value="">'+value.COD_CLI+'</td>';
					// cols += '<td class="NomCli" >'+value.NOMBRE+'</td>';
					// cols += '<td>'+value.NRO_DOCUMENTO+'</td>';
					// cols += '<td><i class="btn glyphicon glyphico	document.getElementById("validartabla").innerHTML = "";n-ok" onclick="fn_SeleccionarProveedor('+"'"+value.COD_CLI+"','"+value.NOMBRE+"','"+value.NRO_DOCUMENTO+"'"+');"></i></td></tr>';
					//$("#TablaProveedores tbody").append(cols);

					
					Proveedor = new Object;
					Proveedor.COD_PROV = value.COD_PROV;
					Proveedor.NOMBRE = value.NOMBRE;
					Proveedor.NRO_DOCUMENTO = value.NRO_DOCUMENTO;
					Proveedor.Acciones = '<i class="btn glyphicon glyphicon-ok" onclick="fn_SeleccionarProveedor('+"'"+value.COD_PROV+"','"+value.NOMBRE+"','"+value.NRO_DOCUMENTO+"','"+0+"'"+');"></i>';
					TableData.push(Proveedor);
				});
			}
			// $("#TablaProveedores").DataTable({
			// 			"pageLength": 5
			// });
			//listClientes = JSON.stringify(listClientes);
			$('#TablaProveedores').dataTable().fnAddData(TableData);
			
		},
		error: function(e){
			$("#processing-modal").modal("toggle");
			AlertNotify('', 'Error', 'Error en el servidor consulte con el administrador', 'danger');
		}
	});
}

function fn_ObtenerOrdenSalida(){
	$('#TablaOrdenSalida').dataTable().fnClearTable();
	$("#processing-modal").modal("show");
	$.ajax({
		url:"/mantGestionPagos_c/ObtenerOrdenSalida",
		type:"POST",
		data: null,
		success:function(response){
			debugger;
			$("#processing-modal").modal("toggle");
			$("#OrdenSalModal").modal("show");
			var respuesta=JSON.parse(response);
			var listOrdenSalida = respuesta.listOrdenSalida;
			var TableData = new Array();
			var OrdenSalida = null;
			if(listOrdenSalida.length>0){
				$.each(listOrdenSalida, function(index, value){
					//var cols = "";
					// cols += '<tr><td class="COD_PROV" data-value="">'+value.COD_ORDEN_S+'-'+value.SERIE+'-'+value.NUMERO+'</td>';
					// cols += '<td class="NomCli" >'+value.cliente+'</td>';
					// cols += '<td>'+value.documento+'</td>';
					// cols += '<td><i class="btn glyphicon glyphicon-ok" onclick="fn_SeleccionarOrdenSalida('+"'"+value.COD_ORDEN_S+"'"+');"></i></td></tr>';
					//$("#TablaOrdenSalida tbody").append(cols);
					OrdenSalida = new Object();
					OrdenSalida.SERIE = value.COD_ORDEN_S+'-'+value.SERIE+'-'+value.NUMERO;
					OrdenSalida.PROVEEDOR = value.PROVEEDOR;
					OrdenSalida.DOCUMENTO = value.DOCUMENTO;
					OrdenSalida.Acciones = '<i class="btn glyphicon glyphicon-ok" onclick="fn_SeleccionarOrdenSalida('+"'"+value.COD_ORDEN_S+"'"+');"></i>';
					TableData.push(OrdenSalida);
				});
				
			}
			$('#TablaOrdenSalida').dataTable().fnAddData(TableData);
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
		url: "/mantGestionPagos_c/ObtenerTipoCobro",
		data:null,
		success:function(response){
			var respuesta = JSON.parse(response);
			var listTipoCobro = respuesta.listTipoCobro;
			$.each(listTipoCobro,function(index,value){
				var col = "";
				col += '<option value="'+value.COD_TIPOPAGO+'">'+value.NOM_TIPOCOBRO+'</option>';
				$("#COD_TIPOPAGO").append(col);
			});
		},
		error:function(e){

		}
	});
}

function fn_ValidarSiExisteOrdenSalida(NewCOD_ORDEN_S){
	var YaExiste = false;
	var COD_ORDEN_S = null;
	$("#TablaOrdenSalidaDet tbody tr").each(function(){
		COD_ORDEN_S = $(".COD_ORDEN_S",this).val();
		if(COD_ORDEN_S == NewCOD_ORDEN_S){
			YaExiste = true;
			
		}
	});
	return YaExiste;
}
function fn_SeleccionarProveedor(COD_PROV,NomCli,NroDocumento,CodTipoDoc){
	$("#COD_PROV").val(COD_PROV);
	var NomCli = NomCli;
	$("#Proveedor").val(NomCli);
	$("#NRO_DOCUMENTO").val(NroDocumento);
	$("#COD_TIPO_DOC").val(CodTipoDoc);
	$('#ProveedoresModal').modal('toggle');
	QuitarValidacion("#Proveedor");
	QuitarValidacion("#NRO_DOCUMENTO");
}

function fn_SeleccionarOrdenSalida(COD_ORDEN_S){
	$('#OrdenSalModal').modal('toggle');
	
	var Existe = fn_ValidarSiExisteOrdenSalida(COD_ORDEN_S);
	if(!Existe){
			$("#processing-modal").modal("show");
			$.ajax({
					type:"POST",
					url:"/mantGestionPagos_c/ObtenerOrdenSalidaDet",
					data:{COD_ORDEN_S:COD_ORDEN_S},
					success: function(response){
						$("#processing-modal").modal("toggle");
						var respuesta=JSON.parse(response);
						var listOrdenSalidaDet = respuesta.listOrdenSalidaDet;
						var TOTAL = 0;
						TOTAL = parseInt($("#TOTAL").html());
						if(listOrdenSalidaDet.length>0){
							$.each(listOrdenSalidaDet, function(index, value){
								var cols = "";
								cols += '<tr class="FILA'+value.COD_ORDEN_S+'">';
								cols += '<input type="hidden" class="COD_DET_ORDEN_S" value="'+value.COD_DET_ORDEN_S+'">';
								cols += '<input type="hidden" class="COD_ORDEN_S" value="'+value.COD_ORDEN_S+'">';
								cols += '<input type="hidden" class="SUB_TOTAL" value="'+value.IMPORTE+'">'
								cols += '<td class="col-md-3 input-sm">'+value.COD_ORDEN_S+'-'+value.SERIE+'-'+value.NUMERO+'</td>';
								cols += '<td class="col-md-1 input-sm" >'+value.CANTIDAD+'</td>';
								cols += '<td class="col-md-1 input-sm" >'+value.PRODUCTO+'</td>';
								cols += '<td class="col-md-3 input-sm" >'+value.TIPOPRODUCTO+'</td>';
								cols += '<td class="col-md-2 input-sm" >'+value.DESCRIPCION+'</td>';
								cols += '<td class="col-md-3 input-sm" >'+value.PRECIO+'</td>';
								cols += '<td class="col-md-2 input-sm" >'+value.IMPORTE+'</td>';
								cols += '<td class="col-md-1 input-sm" ><i class="btn glyphicon glyphicon-remove" onclick="fn_EliminarOrdenSalidaDetalle('+"'FILA"+value.COD_ORDEN_S+"'"+');"></i></td>';
								
								$("#TablaOrdenSalidaDet tbody").append(cols);
								TOTAL = TOTAL + parseInt(value.IMPORTE);
								$("#TOTAL").html(TOTAL);
								$("#MONTO_TOTAL").val(TOTAL);
								$("#MONTO_NETO").val(TOTAL);
								document.getElementById("validartabla").innerHTML = "";
							});
						}
					},
					error: function(error){
						$("#processing-modal").modal("toggle");
						AlertNotify('', 'Error', 'Error en el servidor consulte con el administrador', 'danger');
					}
				});
	}else{
			AlertNotify('', 'Alerta', 'La orden de salida ya fue agregada', 'danger');
	}
	
}

$( "#Guardar" ).click(function( e ) {
	// var TipoCobro = $("#COD_TIPOPAGO").val();
	// debugger;
	$datos = $("#datos").val();
	if($datos==0){
	   document.getElementById("demo").innerHTML = "<div id='validartabla'><label style='color:red;' class=control-labe>Seleccione orden de salida</label></label> </div>";
	}
	$("#frmCreadocPago").validate({
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
						required: true		
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
					fn_GuardarDocPago();
				}

			});

});function fn_ActualizarDetalleDocPago(listDocPagoDet){
	if(listDocPagoDet.length>0){
		$.each(listDocPagoDet, function(index, value){
			var cols = "";
			cols += '<tr>';
			cols += '<input type="hidden" class="COD_DOC_PAGO_DET" value="'+value.COD_DOC_PAGO_DET+'">';
			cols += '<input type="hidden" class="COD_ORDEN_S" value="'+value.COD_ORDEN_S+'">';
			cols += '<input type="hidden" class="SUB_TOTAL" value="'+value.IMPORTE+'">'
			cols += '<td class="col-md-3 input-sm">'+value.COD_ORDEN_S+'-'+value.SERIE+'-'+value.NUMERO+'</td>';
			cols += '<td class="col-md-1 input-sm" >'+value.CANTIDAD+'</td>';
			cols += '<td class="col-md-1 input-sm" >'+value.Producto+'</td>';
			cols += '<td class="col-md-3 input-sm" >'+value.TipoProducto+'</td>';
			cols += '<td class="col-md-2 input-sm" >'+value.ObsProd+'</td>';
			cols += '<td class="col-md-3 input-sm" >'+value.Precio+'</td>';
			cols += '<td class="col-md-2 input-sm" >'+value.IMPORTE+'</td>';
			$("#TablaOrdenSalidaDet tbody").append(cols);
			TOTAL = TOTAL + parseInt(value.IMPORTE);
			$("#TOTAL").html(TOTAL);
			$("#MONTO_TOTAL").val(TOTAL);			
			$("#MONTO_NETO").val(TOTAL);
			document.getElementById("validartabla").innerHTML = "";
		});
	}
}
function fn_GuardarDocPago(){
	debugger;
	var fecha= $("#FECHA_OPERACION").val();

	var new_date = moment(fecha).format('YYYY/MM/DD');


	
	var DocPago = new Object();
	DocPago.COD_DOC_PAGO = $("#COD_DOC_PAGO").val();
	DocPago.COD_OFI = $("#COD_OFI").val();
	DocPago.DOC_PAGO_FECHA = $("#DOC_PAGO_FECHA").val();
	DocPago.COD_CAJA = $("#COD_CAJA").val();
	DocPago.COD_PROV = $("#COD_PROV").val();
	DocPago.NRO_DOCUMENTO = $("#NRO_DOCUMENTO").val();
	DocPago.NUMERO_CUENTA = $("#NUMERO_CUENTA").val();
	DocPago.COD_TIPO_DOC = $("#COD_TIPO_DOC").val();
	DocPago.FECHA_OPERACION =new_date;
	DocPago.NUMERO_OPERACION = $("#NUMERO_OPERACION").val();
	DocPago.OBSERVACION = $("#OBSERVACION").val();
	DocPago.COD_USU = $("#COD_USU").val();
	DocPago.MONTO_TOTAL = $("#MONTO_TOTAL").val();
	DocPago.MONTO_NETO = $("#MONTO_NETO").val();
	DocPago.COD_TIPOPAGO = $("#COD_TIPOPAGO").val();

	DocPago.TIPO_TRANSACCION = $("#TIPO_TRANSACCION").val();

	var listDocPagoDet = new Array();
	var DocPagoDet = null;
	$("#TablaOrdenSalidaDet tbody tr").each(function(){
		DocPagoDet = new Object();
		var COD_ORDEN_S = $(".COD_ORDEN_S",this).val();
		DocPagoDet.COD_ORDEN_S = $(".COD_ORDEN_S",this).val();
		DocPagoDet.SUB_TOTAL = parseInt($(".SUB_TOTAL",this).val());
		
		listDocPagoDet.push(DocPagoDet);
	});
	debugger;

	var result = [];
	listDocPagoDet = listDocPagoDet.reduce(function (res, value) {
		if (!res[value.COD_ORDEN_S]) {
			res[value.COD_ORDEN_S] = {
				SUB_TOTAL: 0,
				COD_ORDEN_S: value.COD_ORDEN_S
			};
			result.push(res[value.COD_ORDEN_S])
		}
		res[value.COD_ORDEN_S].SUB_TOTAL += value.SUB_TOTAL
		return res;
	}, {});

	DocPago.listDocPagoDet = listDocPagoDet;
	var valor  = 1;
	$.ajax({
		type: "post",
		url: "/mantGestionPagos_c/GuardarDocPago",
		// dataType : "json",
		// contentType:"application/json",
		data: {DocPago: DocPago},
		success: function(response){
			debugger;
			var response = JSON.parse(response);
			if(response.respuesta){
				AlertNotify('', 'Éxito', 'El registro se guardo correctamente', 'success');
				$("#COD_DOC_PAGO").val(response.COD_DOC_PAGO);
				$("#lblCOD_DOC_PAGO").html(response.COD_DOC_PAGO);
				$("#TIPO_TRANSACCION").val(2);
				$("#ImprimirPdf").show();
				var ImprimirPdf = '<a class="btn btn-success" href="/mantGestionPagos_c/docPagoPdf/'+response.COD_DOC_PAGO+'">Imprimir</a>';
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

$("#COD_TIPOPAGO").on("change",function(){
	debugger;
	var TipoPago = $("#COD_TIPOPAGO").val();
	if(TipoPago=="1"){
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

function fn_EliminarOrdenSalidaDetalle(elemento){
	debugger;
	var elemento2 = '.'+elemento.trim();
	$(elemento2).remove();

	var SUB_TOTAL = 0;
	$("#TablaOrdenSalidaDet tbody tr").each(function(){
		SUB_TOTAL += parseInt($(".SUB_TOTAL",this).val());
	});

	$("#TOTAL").html(SUB_TOTAL);
	$("#MONTO_TOTAL").val(SUB_TOTAL);
	$("#MONTO_NETO").val(SUB_TOTAL);
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