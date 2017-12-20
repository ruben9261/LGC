<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantGuiaRemision_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		//$this->load->model('mantGuiaRemision_m');
	
	}
	
	
	public function index() {

		$this->load->model('consGuiaRemision_m');

		$listMotivoTraslado=$this->consGuiaRemision_m->obt_MotivoTraslado();
		$listUnidadMedida=$this->consGuiaRemision_m->obt_UnidadMedida();
		$listProducto=$this->consGuiaRemision_m->obt_Producto();

		$data["listMotivoTraslado"] = $listMotivoTraslado;
		$data["listUnidadMedida"] = $listUnidadMedida;
		$data["listProducto"] = $listProducto;

		$this->load->view("MantGuiaRemision",$data);
	}

	public function MantGuiaRemision($COD_GUIAREM)
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
				$RUC = $campos->RUC;
			}
			
			date_default_timezone_set("America/Bogota");
			$data['COD_USU'] = $COD_USU;
			$data['Nom_Usu']=$Nom_Usu;
			$data['Desc_Caja']=$Desc_Caja;
			$data['Nomb_Oficina']=$Nomb_Oficina;
			$data['Nomb_Empresa']=$Nomb_Empresa;
			$data['COD_CAJA']=$COD_CAJA;
			$data['COD_OFI']=$COD_OFI;
			$data['RUC']=$RUC;

			$this->load->model('consGuiaRemision_m');
			
			$listMotivoTraslado=$this->consGuiaRemision_m->obt_MotivoTraslado();
			$listUnidadMedida=$this->consGuiaRemision_m->obt_UnidadMedida();
			$listProducto=$this->consGuiaRemision_m->obt_Producto();

			$GuiaRemision=$this->consGuiaRemision_m->obt_GuiaRemision($COD_GUIAREM);
			$GuiaRemisionDet=$this->consGuiaRemision_m->obt_GuiaRemisionDet($COD_GUIAREM);
	
			$data["listMotivoTraslado"] = $listMotivoTraslado;
			$data["listUnidadMedida"] = $listUnidadMedida;
			$data["listProducto"] = $listProducto;
			$data["GuiaRemision"] = $GuiaRemision;
			$data["GuiaRemisionDet"] = $GuiaRemisionDet;
			$data["COD_GUIAREM"] = $COD_GUIAREM;

			if($COD_GUIAREM!=0){
				$data['TIPO_TRANSACCION'] = 2;
			}else{
				$data['TIPO_TRANSACCION'] = 1;
			}



////////////////////////////////////////
foreach ($datos as $campos) 
{	$codusu=$campos->COD_USU;}

$this->load->model('consOrdenEntrada_m');
$datos1=$this->consOrdenEntrada_m->obt_serie_orden_x_usu($codusu,1);
mysqli_next_result($this->db->conn_id);
foreach ($datos1 as $campos)
{	$codserorden=$campos->COD_SERIE_ORDEN;
  $serie=$campos->SERIE;
  $numero=$campos->NUMERO;
}

//obtenemos tipo de documento de cliente
//$this->load->model('consCliente_m');
//$tipodoc=$this->consCliente_m->listar_tipo_documento();
//mysqli_next_result($this->db->conn_id);

//obtenemnos tipo de producto     
$this->load->model('consProducto_m');
$tipo_prod=$this->consProducto_m->obt_Tipos();
mysqli_next_result($this->db->conn_id);


date_default_timezone_set("America/Bogota");

//$data['codserorden']=$codserorden;
//$data['codusuario']=$codusu;	
//$anio = date('Y');
//$mes = date('m');
//$dia = date('d');
//$data['fecha']= $dia.'/'.$mes.'/'.$anio;
//$data['fecha']= $anio.'-'.$mes.'-'.$dia;
//$data['tipodoc']=$tipodoc;
$data['tipo_prod']=$tipo_prod;
//$data['serie']=$serie;
//$data['numero']=$numero;

			
		$this->load->view("MantGuiaRemision",$data);
		 
	}

	
	public function GuardarGuiaRemision(){
		$GuiaRemision = $_POST["GuiaRemision"];
		$TIPO_TRANSACCION = $GuiaRemision["TIPO_TRANSACCION"];
		$this->load->model('consGuiaRemision_m');
		if($TIPO_TRANSACCION==1){
			$respuesta=$this->consGuiaRemision_m->insertGuiaRemision($GuiaRemision);
		}else{
			$respuesta=$this->consGuiaRemision_m->updateGuiaRemision($GuiaRemision);
		}
		$jsonResponse = json_encode($respuesta);
		
		echo $jsonResponse;
	}
}