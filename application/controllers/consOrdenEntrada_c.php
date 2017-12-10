<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsOrdenEntrada_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consOrdenEntrada_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionOrdenEntrada");
	 }

	 
	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaOrdenEntrada");
	 }
	 
	 
		
	public function obt_datos(){
		header('Content-Type: application/json');
		$fecha = addslashes(htmlspecialchars($_POST["fecha"]));
		$serie = addslashes(htmlspecialchars($_POST["serie"]));
		$numero = addslashes(htmlspecialchars($_POST["numero"]));
		$cliente= addslashes(htmlspecialchars($_POST["cliente"]));
		$documento= addslashes(htmlspecialchars($_POST["documento"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
	
		$this->load->model('consOrdenEntrada_m');
		$totalpaginas=$this->consOrdenEntrada_m->obt_totpaginas($fecha,$serie,$numero,$cliente,$documento);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consOrdenEntrada_m->obt_lista(1,$fecha,$serie,$numero,$cliente,$documento);
		   }
		else 
		   { $datos=$this->consOrdenEntrada_m->obt_lista($numpagina,$fecha,$serie,$numero,$cliente,$documento);
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
	

	public function mostrar_ver($codserie=null)
	{ if($codserie)
	{ 	$this->load->model('consOrdenEntrada_m');
		$serie=$this->consOrdenEntrada_m->obt_serie($codserie);
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
		$this->load->view("VerOrdenEntrada",$data);
	
	}
}