<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantSerieCaja_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantSerieCaja_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionSerieCaja");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->model('consSerieCaja_m');
		$cajas=$this->consSerieCaja_m->obt_cajas();
		mysqli_next_result($this->db->conn_id);
		$data['cajas'] =$cajas;
		$this->load->view("CreaSerieCaja",$data);
		 
	}
	

	public function mostrar_Editar($codserie=null)
	{ if($codserie)
		{ 	$this->load->model('consSerieCaja_m');
			$cajas=$this->consSerieCaja_m->obt_cajas();
	    	mysqli_next_result($this->db->conn_id);
			$serie=$this->consSerieCaja_m->obt_serie($codserie);
			mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($serie as $campos) {
				$codcaja=$campos->COD_CAJA;
				$ser=$campos->SERIE;
				$num=$campos->NUMERO;
			}
			$data['codserie'] =$codserie;
			$data['codcaja']=$codcaja;
			$data['cajas']=$cajas;
			$data['serie']=$ser;
			$data['numero']=$num;
			
		}
		$this->load->view("EditSerieCaja",$data);
 
	}
	
	
	
	
	public function insertar(){
		header('Content-Type: application/json');		
		$P_codcaja = addslashes(htmlspecialchars($_POST["caja"]));
		$P_serie = addslashes(htmlspecialchars($_POST["serie"]));
		$P_numero = addslashes(htmlspecialchars($_POST["numero"]));
		$this->load->model('mantSerieCaja_m');
		$rpta=$this->mantSerieCaja_m->inserta($P_codcaja, 	 
									      $P_serie,
										  $P_numero
				                         );
	   if(!is_null($rpta) && !empty($rpta))
		{   $json_string =json_encode($rpta);
			echo $json_string;
			
		}
	}
	
	
	public function editar(){
		header('Content-Type: application/json');
		$P_codserie=addslashes(htmlspecialchars($_POST["codigo"]));
		$P_codcaja = addslashes(htmlspecialchars($_POST["caja"]));
		$P_serie = addslashes(htmlspecialchars($_POST["serie"]));
		$P_numero = addslashes(htmlspecialchars($_POST["numero"]));
		
		$this->load->model('mantSerieCaja_m');
		$rpta=$this->mantSerieCaja_m->editar( $P_codserie,
				                          $P_codcaja, 	 
									      $P_serie,
										  $P_numero
				                         );
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
			
		}
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$P_codserie=addslashes(htmlspecialchars($_POST["codserie"]));
		$this->load->model('mantSerieCaja_m');
		$rpta=$this->mantSerieCaja_m->eliminar($P_codserie);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}