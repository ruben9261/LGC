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

		$this->load->view("GuiaRemision",$data);
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
				$RUC_EMPRESA = $campos->RUC;
			}
			
			date_default_timezone_set("America/Bogota");
			$data['COD_USU'] = $COD_USU;
			$data['Nom_Usu']=$Nom_Usu;
			$data['Desc_Caja']=$Desc_Caja;
			$data['Nomb_Oficina']=$Nomb_Oficina;
			$data['Nomb_Empresa']=$Nomb_Empresa;
			$data['COD_CAJA']=$COD_CAJA;
			$data['COD_OFI']=$COD_OFI;
			$data['RUC_EMPRESA']=$RUC_EMPRESA;

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

   
$this->load->model('consProducto_m');
$tipo_prod=$this->consProducto_m->obt_Tipos();
mysqli_next_result($this->db->conn_id);


date_default_timezone_set("America/Bogota");

$data['tipo_prod']=$tipo_prod;

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


	public function obt_datos(){
		header('Content-Type: application/json');
		$Filtros = $_POST["Filtros"];
		$numpagina = $Filtros["Pagina"];
		$this->load->model('consGuiaRemision_m');
		$totalpaginas=$this->consGuiaRemision_m->obt_totpaginas($Filtros);
		if($numpagina==-1)
		   {  $Filtros["numpagina"]=1;
			   $datos=$this->consGuiaRemision_m->obt_lista($Filtros);
		   }
		else 
		   { $datos=$this->consGuiaRemision_m->obt_lista($Filtros);
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
		$COD_GUIAREM = $_POST["COD_GUIAREM"];
		$this->load->model('consGuiaRemision_m');
		$respuesta=$this->consGuiaRemision_m->eliminar($COD_GUIAREM);
		
		$array = array( 'respuesta'=>$respuesta,
		);
		$response =json_encode($array);
		echo $response;
	}

}