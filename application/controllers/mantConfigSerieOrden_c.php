<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantConfigSerieOrden_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantConfigSerieOrden_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionConfigSerieOrden");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->model('consConfigSerieOrden_m');
		$Usuarios=$this->consConfigSerieOrden_m->obt_usuarios();
		mysqli_next_result($this->db->conn_id);
		$series=$this->consConfigSerieOrden_m->obt_serie_ordenes();
		mysqli_next_result($this->db->conn_id);
		$data['usuarios'] =$Usuarios;
		$data['series'] =$series;		
		$this->load->view("CreaConfigSerieOrden",$data);
		 
	}
	

	public function mostrar_Editar($cod_conf=null)
	{ if($cod_conf)
		{ 	$this->load->model('consConfigSerieOrden_m');
			
		    $usuarios=$this->consConfigSerieOrden_m->obt_usuarios();
			mysqli_next_result($this->db->conn_id);
			
			
			$series=$this->consConfigSerieOrden_m->obt_serie_ordenes();
			mysqli_next_result($this->db->conn_id);
			
			$codigos=$this->consConfigSerieOrden_m->obt_codigos_conf_serie_ordenes($cod_conf);
			mysqli_next_result($this->db->conn_id);
			
			//var_dump($codigos);
			foreach ($codigos as $codigo) {
				$cod_usu=$codigo->COD_USU;				
				$cod_serie=$codigo->COD_SERIE_ORDEN;
				
			}
			$data['cod_conf']=$cod_conf;
			$data['series'] =$series;
			$data['usuarios'] =$usuarios;
			$data['codusuario']=$cod_usu;
			$data['codserie']=$cod_serie;
			
		}
		$this->load->view("EditConfigSerieOrden",$data);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');		
		$cod_usuario = addslashes(htmlspecialchars($_POST["usuario"]));
		$cod_serie = addslashes(htmlspecialchars($_POST["serie"]));
		$this->load->model('mantConfigSerieOrden_m');
		$rpta=$this->mantConfigSerieOrden_m->inserta($cod_usuario,$cod_serie);
	   if(!is_null($rpta) && !empty($rpta))
		{   $json_string =json_encode($rpta);
			echo $json_string;
			
		}
	}
	
	
	public function editar(){
	
		header('Content-Type: application/json');
		$codigo=addslashes(htmlspecialchars($_POST["codigo"]));
		$cod_usuario = addslashes(htmlspecialchars($_POST["usuario"]));
		$cod_serie = addslashes(htmlspecialchars($_POST["serie"]));
		
		$this->load->model('mantConfigSerieOrden_m');
		$rpta=$this->mantConfigSerieOrden_m->editar($codigo,$cod_usuario,$cod_serie);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
			
		}
	}
	
	public function eliminar($cod_conf=null){
		header('Content-Type: application/json');
		$codigo=addslashes(htmlspecialchars($_POST["codigo"]));
		$this->load->model('mantConfigSerieOrden_m');
		$rpta=$this->mantConfigSerieOrden_m->eliminar($codigo);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}