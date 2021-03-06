<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsSerieGuia_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consSerieGuia_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionSerieGuia");
	 }

	 
	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaSerieGuia");
	 }
	 
	 
		
	public function obt_datos(){
		header('Content-Type: application/json');
		$oficina = addslashes(htmlspecialchars($_POST["oficina"]));
		$serie = addslashes(htmlspecialchars($_POST["serie"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
	
		$this->load->model('consSerieGuia_m');
		$totalpaginas=$this->consSerieGuia_m->obt_totpaginas($oficina,$serie);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consSerieGuia_m->obt_lista(1,$oficina,$serie);
		   }
		else 
		   { $datos=$this->consSerieGuia_m->obt_lista($numpagina,$oficina,$serie);
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
		{ 	$this->load->model('consSerieGuia_m');
			$serie=$this->consSerieGuia_m->obt_serie($codserie);
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
		$this->load->view("VerSerieGuia",$data);
	
	}
	
	
}