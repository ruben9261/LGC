<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantConfigSerieGuia_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantConfigSerieGuia_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionConfigSerieGuia");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->model('consConfigSerieGuia_m');
		$Usuarios=$this->consConfigSerieGuia_m->obt_usuarios();
		mysqli_next_result($this->db->conn_id);
		$SerieGuias=$this->consConfigSerieGuia_m->obt_serie_guias();
		mysqli_next_result($this->db->conn_id);
		$data['usuarios'] =$Usuarios;
		$data['series'] =$SerieGuias;		
		$this->load->view("CreaConfigSerieGuia",$data);
		 
	}
	

	public function mostrar_Editar($cod_conf=null)
	{ if($cod_conf)
		{ 	$this->load->model('consConfigSerieGuia_m');
			
		    $usuarios=$this->consConfigSerieGuia_m->obt_usuarios();
			mysqli_next_result($this->db->conn_id);
			
			
			$series=$this->consConfigSerieGuia_m->obt_serie_guias();
			mysqli_next_result($this->db->conn_id);
			
			$codigos=$this->consConfigSerieGuia_m->obt_codigos_conf_serie_guias($cod_conf);
			mysqli_next_result($this->db->conn_id);
			
			//var_dump($codigos);
			foreach ($codigos as $codigo) {
				$cod_usu=$codigo->COD_USU;				
				$cod_serie=$codigo->COD_SERIE_GUIA;
				
			}
			$data['cod_conf']=$cod_conf;
			$data['series'] =$series;
			$data['usuarios'] =$usuarios;
			$data['codusuario']=$cod_usu;
			$data['codserie']=$cod_serie;
			
		}
		$this->load->view("EditConfigSerieGuia",$data);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');		
		$cod_usuario = addslashes(htmlspecialchars($_POST["usuario"]));
		$cod_serie = addslashes(htmlspecialchars($_POST["serie"]));
		$this->load->model('mantConfigSerieGuia_m');
		$rpta=$this->mantConfigSerieGuia_m->inserta($cod_usuario,$cod_serie);
	   if(!is_null($rpta) && !empty($rpta))
		{   $json_string =json_encode($rpta);
			echo $json_string;
			
		}
	}
	
	
	public function editar(){
	
		header('Content-Type: application/json');
		$cod_conf=addslashes(htmlspecialchars($_POST["codigo"]));
		$cod_usuario = addslashes(htmlspecialchars($_POST["usuario"]));
		$cod_serie = addslashes(htmlspecialchars($_POST["serie"]));
		
		$this->load->model('mantConfigSerieGuia_m');
		$rpta=$this->mantConfigSerieGuia_m->editar($cod_conf,$cod_usuario,$cod_serie);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
			
		}
	}
	
	public function eliminar($cod_conf=null){
		header('Content-Type: application/json');
		$cod_conf=addslashes(htmlspecialchars($_POST["codigo"]));
		$this->load->model('mantConfigSerieGuia_m');
		$rpta=$this->mantConfigSerieGuia_m->eliminar($cod_conf);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}