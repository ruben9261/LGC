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