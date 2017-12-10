<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantConfigCaja_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantConfigCaja_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionConfigCaja");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->model('consConfigCaja_m');
		$Usuarios=$this->consConfigCaja_m->obt_usuarios();
		mysqli_next_result($this->db->conn_id);
		$Cajas=$this->consConfigCaja_m->obt_Cajas();
		mysqli_next_result($this->db->conn_id);
		$data['usuarios'] =$Usuarios;
		$data['cajas'] =$Cajas;		
		$this->load->view("CreaConfigCaja",$data);
		 
	}
	

	public function mostrar_Editar($cod_conf_caja=null)
	{ if($cod_conf_caja)
		{ 	$this->load->model('consConfigCaja_m');
			
		    $usuarios=$this->consConfigCaja_m->obt_usuarios();
			mysqli_next_result($this->db->conn_id);
			
			
			$cajas=$this->consConfigCaja_m->obt_Cajas();
			mysqli_next_result($this->db->conn_id);
			
			$codigos=$this->consConfigCaja_m->obt_codigos_conf_Cajas($cod_conf_caja);
			mysqli_next_result($this->db->conn_id);
			
			//var_dump($codigos);
			foreach ($codigos as $codigo) {
				$cod_usu=$codigo->COD_USU;				
				$cod_Caja=$codigo->COD_CAJA;
				
			}
			$data['cod_conf_caja']=$cod_conf_caja;
			$data['cajas'] =$cajas;
			$data['usuarios'] =$usuarios;
			$data['codusuario']=$cod_usu;
			$data['codcaja']=$cod_Caja;
			
		}
		$this->load->view("EditConfigCaja",$data);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');		
		$cod_usuario = addslashes(htmlspecialchars($_POST["usuario"]));
		$cod_Caja = addslashes(htmlspecialchars($_POST["caja"]));
		$this->load->model('mantConfigCaja_m');
		$rpta=$this->mantConfigCaja_m->inserta($cod_usuario,$cod_Caja);
	   if(!is_null($rpta) && !empty($rpta))
		{   $json_string =json_encode($rpta);
			echo $json_string;
			
		}
	}
	
	
	public function editar(){
	
		header('Content-Type: application/json');
		$cod_conf_caja=addslashes(htmlspecialchars($_POST["codigo"]));
		$cod_usuario = addslashes(htmlspecialchars($_POST["usuario"]));
		$cod_Caja = addslashes(htmlspecialchars($_POST["caja"]));
		
		$this->load->model('mantConfigCaja_m');
		$rpta=$this->mantConfigCaja_m->editar($cod_conf_caja,$cod_usuario,$cod_Caja);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
			
		}
	}
	
	public function eliminar($cod_conf_caja=null){
		header('Content-Type: application/json');
		$cod_conf_caja=addslashes(htmlspecialchars($_POST["codigo"]));
		$this->load->model('mantConfigCaja_m');
		$rpta=$this->mantConfigCaja_m->eliminar($cod_conf_caja);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}