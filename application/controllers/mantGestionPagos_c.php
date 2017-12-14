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
		   
		$listTipoCobro=$this->consGestionPago_m->obt_TipoCobro();
		mysqli_next_result($this->db->conn_id);

		$listClientes=$this->consGestionPago_m->obt_OrdenEntraClientes();
		mysqli_next_result($this->db->conn_id);

		$data['listOficina'] = $listOficina;
		$data['listUsuarios'] = $listUsuarios;
		$data['listTipoCobro'] = $listTipoCobro;
		$data['listClientes'] = $listClientes;

		$this->load->view("GestionDePagos",$data);
	}

	public function DocCobroPdf($COD_DOC_COBRO){
		$codigo = $COD_DOC_COBRO;

		$this->load->view("DocCobroPdf");
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

	public function ObtenerOrdenEntrada(){
		$this->load->model('consGestionPago_m');
	    $listOrdenEntrada=$this->consGestionPago_m->obt_OrdenEntrada(0);
		mysqli_next_result($this->db->conn_id);

		$array = array( 'listOrdenEntrada'=>$listOrdenEntrada
	        				   );

		$jsonResponse = json_encode($array);

		echo $jsonResponse;
	}

	public function ObtenerOrdenEntradaDet(){

		$CodOrdenE = $_POST["CodOrdenE"];
		$this->load->model('consGestionPago_m');
	    $listOrdenEntradaDet=$this->consGestionPago_m->obt_OrdenEntradaDet($CodOrdenE);
		mysqli_next_result($this->db->conn_id);

		$array = array( 'listOrdenEntradaDet'=> $listOrdenEntradaDet );

		$jsonResponse = json_encode($array);

		echo $jsonResponse;
	}

	public function ObtenerTipoCobro(){

		$this->load->model('consGestionPago_m');
	    $listTipoCobro=$this->consGestionPago_m->obt_TipoCobro();
		mysqli_next_result($this->db->conn_id);

		$array = array( 'listTipoCobro'=>$listTipoCobro
	        				   );

		$jsonResponse = json_encode($array);

		echo $jsonResponse;
	}

	public function GuardarDocCobro(){
		$DocCobro = $_POST["DocCobro"];
		$TIPO_TRANSACCION = $DocCobro["TIPO_TRANSACCION"];
		$this->load->model('consGestionPago_m');
		if($TIPO_TRANSACCION==1){
			$respuesta=$this->consGestionPago_m->insertDocCobro($DocCobro);
		}else{
			$respuesta=$this->consGestionPago_m->updateDocCobro($DocCobro);
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
		$COD_DOC_COBRO = $_POST["COD_DOC_COBRO"];
		$this->load->model('consGestionPago_m');
		$respuesta=$this->consGestionPago_m->eliminar($COD_DOC_COBRO);
		
		$array = array( 'respuesta'=>$respuesta,
		);
		$response =json_encode($array);
		echo $response;
	}

}