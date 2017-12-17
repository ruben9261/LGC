<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantGestionPagos_c  extends CI_Controller{

	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantOrdenEntrada_m');
	
	}

	public function index() {
		$this->load->model('consGestionPago_m');
		$listOficina=$this->consGestionPago_m->obt_Oficina();

	   	$listUsuarios=$this->consGestionPago_m->obt_Usuarios();
		   
		$listTipoPago=$this->consGestionPago_m->obt_TipoPago();

		$listProveedores=$this->consGestionPago_m->obt_OrdenSalidaProveedores();

		$data['listOficina'] = $listOficina;
		$data['listUsuarios'] = $listUsuarios;
		$data['listTipoPago'] = $listTipoPago;
		$data['listProveedores'] = $listProveedores;

		$this->load->view("GestionDePagos",$data);
	}

	public function DocPagoPdf($COD_DOC_PAGO){

		$this->load->library('session');
		$datos= $this->session->cod_usu;
		// $this->session->unset_userdata('cod_usu');
			//  print_r($datos);kol,.
		foreach ($datos as $campos) 
			{	$codusu=$campos->COD_USU;}
		
		$this->load->model('consGestionPago_m');
		$listdatosPago=$this->consGestionPago_m->obt_DatosPago($codusu);
		mysqli_next_result($this->db->conn_id);
		foreach ($listdatosPago as $campos)
		{	$COD_USU=$campos->COD_USU;
			$Nom_Usu=$campos->Nom_Usu;
			$Desc_Caja=$campos->Desc_Caja;
			$Nomb_Oficina=$campos->Nomb_Oficina;
			$Nomb_Empresa=$campos->Nomb_Empresa;
			$COD_CAJA=$campos->COD_CAJA;
			$COD_OFI=$campos->COD_OFI;
		}

		$docPago=$this->consGestionPago_m->obt_DocPago($COD_DOC_PAGO);
		$docPagoDet=$this->consGestionPago_m->obt_DocPagoDet($COD_DOC_PAGO);

		$importeTotal = 0;
		foreach($docPago as $item){
			$importeTotal = round($item->MONTO_NETO, 2);
		}
		
		$this->load->model('utilities_m');
		$importeEnLetras=$this->utilities_m->numtoletras($importeTotal);
		
		date_default_timezone_set("America/Bogota");
		$data['COD_USU'] = $COD_USU;
		$data['Nom_Usu']=$Nom_Usu;
		$data['Desc_Caja']=$Desc_Caja;
		$data['Nomb_Oficina']=$Nomb_Oficina;
		$data['Nomb_Empresa']=$Nomb_Empresa;
		$data['COD_CAJA']=$COD_CAJA;
		$data['COD_OFI']=$COD_OFI;
		$data['COD_DOC_PAGO']=$COD_DOC_PAGO;
		
		$data['docPago']=$docPago;
		$data['docPagoDet']=$docPagoDet;
		$data['importeEnLetras']=$importeEnLetras;
		$data['importeTotal']=$importeTotal;

		$NUMERO_CUENTA = "";
		$NUMERO_OPERACION = "";
		$FECHA_OPERACION = "";
		$FECHA_PAGO = "";
		$HORA_PAGO = "";
		$CLIENTE  = "";
		$DOCUMENTO = "";
		$NOMB_OFICINA = "";
		
		foreach($docPago as $item){
			$NUMERO_CUENTA = $item->NUMERO_CUENTA;
			$NUMERO_OPERACION = $item->NUMERO_OPERACION;
			$HORA_PAGO = date("h:i:s a",strtotime($item->DOC_PAGO_FECHA));
			$FECHA_PAGO = date("Y-m-d",strtotime($item->DOC_PAGO_FECHA));
			$FECHA_OPERACION = date("Y-m-d", strtotime($item->FECHA_OPERACION));
			$DOCUMENTO = $item->NRO_DOCUMENTO;
			$PROVEEDOR = $item->NOMBRE;
			$NOMB_OFICINA = $item->NOMB_OFICINA;
		}
		$data['NUMERO_CUENTA']=$NUMERO_CUENTA;
		$data['NUMERO_OPERACION']=$NUMERO_OPERACION;
		$data['FECHA_OPERACION']=$FECHA_OPERACION;
		$data['HORA_PAGO']=$HORA_PAGO;
		$data['FECHA_PAGO']=$FECHA_PAGO;
		$data['PROVEEDOR']=$PROVEEDOR;
		$data['DOCUMENTO']=$DOCUMENTO;
		$data['NOMB_OFICINA']=$NOMB_OFICINA;

		$Ordenes = "";
		if(count($docPagoDet)>0){
			
			$listOrdenes = array();

			foreach($docPagoDet as $item){
				array_push($listOrdenes, $item->COD_ORDEN_S);
			}

			$listOrdenes = array_unique($listOrdenes);
			$x=0;
			
			foreach($listOrdenes as $item){
				if($x==0){
					$Ordenes .= $item;
				}else{
					$Ordenes .= ','.$item;
				}
			}
		}

		$data['Ordenes']=$Ordenes;

		$this->load->view("docPagoPdf",$data);
	}

	public function CreaDocumentoPago($COD_DOC_PAGO)
	{ 	
			$this->load->library('session');
			$datos= $this->session->cod_usu;
			// $this->session->unset_userdata('cod_usu');
				//  print_r($datos);kol,.
			foreach ($datos as $campos) 
				{	$codusu=$campos->COD_USU;}
			
			$this->load->model('consGestionPago_m');
			$listdatosPago=$this->consGestionPago_m->obt_DatosPago($codusu);
			mysqli_next_result($this->db->conn_id);

			foreach ($listdatosPago as $campos)
			{	$COD_USU=$campos->COD_USU;
				$Nom_Usu=$campos->Nom_Usu;
				$Desc_Caja=$campos->Desc_Caja;
				$Nomb_Oficina=$campos->Nomb_Oficina;
				$Nomb_Empresa=$campos->Nomb_Empresa;
				$COD_CAJA=$campos->COD_CAJA;
				$COD_OFI=$campos->COD_OFI;
			}

			$docPago=$this->consGestionPago_m->obt_DocPago($COD_DOC_PAGO);
			$docPagoDet=$this->consGestionPago_m->obt_DocPagoDet($COD_DOC_PAGO);
			$listTipoPago=$this->consGestionPago_m->obt_TipoPago();

			date_default_timezone_set("America/Bogota");
			$data['COD_USU'] = $COD_USU;
			$data['Nom_Usu']=$Nom_Usu;
			$data['Desc_Caja']=$Desc_Caja;
			$data['Nomb_Oficina']=$Nomb_Oficina;
			$data['Nomb_Empresa']=$Nomb_Empresa;
			$data['COD_CAJA']=$COD_CAJA;
			$data['COD_OFI']=$COD_OFI;
			$data['COD_DOC_PAGO']=$COD_DOC_PAGO;
			
			$data['docPago']=$docPago;
			$data['docPagoDet']=$docPagoDet;
			$data['listTipoPago']=$listTipoPago;

			if($COD_DOC_PAGO!=0){
				$data['TIPO_TRANSACCION'] = 2;
			}else{
				$data['TIPO_TRANSACCION'] = 1;
			}

		$this->load->view("CreaDocumentoPago",$data);
		 
	}

	public function ObtenerProveedores(){
		 $this->load->model('consGestionPago_m');
	    $listProveedores=$this->consGestionPago_m->obt_OrdenSalidaProveedores();

		$array = array( 'listProveedores'=>$listProveedores
	        				   );

		$jsonResponse = json_encode($array);

		echo $jsonResponse;
	}

	public function ObtenerOrdenSalida(){
		$this->load->model('consGestionPago_m');
	    $listOrdenSalida=$this->consGestionPago_m->obt_OrdenSalida();

		$array = array( 'listOrdenSalida'=>$listOrdenSalida
	        				   );
		$jsonResponse = json_encode($array);

		echo $jsonResponse;
	}

	public function ObtenerOrdenSalidaDet(){

		$COD_ORDEN_S = $_POST["COD_ORDEN_S"];
		$this->load->model('consGestionPago_m');
	    $listOrdenSalidaDet=$this->consGestionPago_m->obt_OrdenSalidaDet($COD_ORDEN_S);

		$array = array( 'listOrdenSalidaDet'=> $listOrdenSalidaDet );

		$jsonResponse = json_encode($array);

		echo $jsonResponse;
	}

	public function ObtenerTipoPago(){

		$this->load->model('consGestionPago_m');
	    $listTipoPago=$this->consGestionPago_m->obt_TipoPago();
		mysqli_next_result($this->db->conn_id);

		$array = array( 'listTipoPago'=>$listTipoPago
	        				   );

		$jsonResponse = json_encode($array);

		echo $jsonResponse;
	}

	public function GuardarDocPago(){
		$DocPago = $_POST["DocPago"];
		$TIPO_TRANSACCION = $DocPago["TIPO_TRANSACCION"];
		$this->load->model('consGestionPago_m');
		if($TIPO_TRANSACCION==1){
			$respuesta=$this->consGestionPago_m->GuardarDocPago($DocPago);
		}else{
			$respuesta=$this->consGestionPago_m->updateDocPago($DocPago);
		}
		$jsonResponse = json_encode($respuesta);
		
		echo $jsonResponse;
	}

	public function obt_datos(){
		header('Content-Type: application/json');
		$Filtros = $_POST["Filtros"];
		$numpagina = $Filtros["Pagina"];
		$this->load->model('consGestionPago_m');
		$totalpaginas=$this->consGestionPago_m->obt_totpaginas($Filtros);
		if($numpagina==-1)
		   {  $Filtros["numpagina"]=1;
			   $datos=$this->consGestionPago_m->obt_lista($Filtros);
		   }
		else 
		   { $datos=$this->consGestionPago_m->obt_lista($Filtros);
		   }
			
		if($totalpaginas<>0 && $datos<>0)
		{   	$array = array( 'totalpaginas'=>$totalpaginas,
								'lista'=>$datos
	        				   );
		    $json_string =json_encode($array);
			echo $json_string;
		}
		else
		{  	echo "no existe";}
	   
	}

	function eliminar(){
		$COD_DOC_PAGO = $_POST["COD_DOC_PAGO"];
		$this->load->model('consGestionPago_m');
		$respuesta=$this->consGestionPago_m->eliminar($COD_DOC_PAGO);
		
		$array = array( 'respuesta'=>$respuesta,
		);
		$response =json_encode($array);
		echo $response;
	}
}