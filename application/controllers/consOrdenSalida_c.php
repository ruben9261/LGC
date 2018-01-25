<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsOrdenSalida_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consOrdenSalida_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionOrdenSalida");
	 }

	 
	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaOrdenSalida");
	 }
	 
	 
		
	public function obt_datos(){
		header('Content-Type: application/json');
		$fecha = addslashes(htmlspecialchars($_POST["fecha"]));
		$serie = addslashes(htmlspecialchars($_POST["serie"]));
		$numero = addslashes(htmlspecialchars($_POST["numero"]));
		$proveedor= addslashes(htmlspecialchars($_POST["proveedor"]));
		$documento= addslashes(htmlspecialchars($_POST["documento"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
		
		$this->load->model('consOrdenSalida_m');
		$totalpaginas=$this->consOrdenSalida_m->obt_totpaginas($fecha,$serie,$numero,$proveedor,$documento);
		mysqli_next_result($this->db->conn_id);
		$datos=$this->consOrdenSalida_m->obt_lista($numpagina,$fecha,$serie,$numero,$proveedor,$documento);
		
			
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
	

	public function mostrar_ver($codserie=null)
	{ if($codserie)
	{ 	$this->load->model('consOrdenSalida_m');
		$serie=$this->consOrdenSalida_m->obt_serie($codserie);
		mysqli_next_result($this->db->conn_id);
		//var_dump($codigos);
		foreach ($serie as $campos) {
			$oficina=$campos->OFICINA;
			$tipo=$campos->TIPO_SERIE;
			$ser=$campos->SERIE;
			$num=$campos->NUMERO;
		}
		$data['oficina']=$oficina;
		$data['tipo']=$tipo;
		$data['serie']=$ser;
		$data['numero']=$num;
			
		}
		$this->load->view("VerOrdenSalida",$data);
	
	}
}