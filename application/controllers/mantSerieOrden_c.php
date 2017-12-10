<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantSerieOrden_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantSerieOrden_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionSerieOrden");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->model('consSerieOrden_m');
		$oficinas=$this->consSerieOrden_m->obt_oficinas();
		mysqli_next_result($this->db->conn_id);
		$tipos=$this->consSerieOrden_m->obt_tipos_serie();
		mysqli_next_result($this->db->conn_id);
		
		$data['oficinas'] =$oficinas;
		$data['tipos'] =$tipos;
		$this->load->view("CreaSerieOrden",$data);
		 
	}
	

	public function mostrar_Editar($codserie=null)
	{ if($codserie)
		{ 	$this->load->model('consSerieOrden_m');
			$oficinas=$this->consSerieOrden_m->obt_oficinas();
	    	mysqli_next_result($this->db->conn_id);
	    	
	    	$tipos=$this->consSerieOrden_m->obt_tipos_serie();
	    	mysqli_next_result($this->db->conn_id);
	    	
	    	
			$serie=$this->consSerieOrden_m->obt_serie($codserie);
			mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($serie as $campos) {
							$codoficina=$campos->COD_OFI;
							$codtipo=$campos->COD_TIP_SER;
							$ser=$campos->SERIE;
							$num=$campos->NUMERO;
			}
			$data['codserie'] =$codserie;
			$data['oficinas']=$oficinas;
			$data['tipos']=$tipos;
			$data['codofi']=$codoficina;
			$data['codtipo']=$codtipo;
			$data['serie']=$ser;
			$data['numero']=$num;
			
		}
		$this->load->view("EditSerieOrden",$data);
 
	}
	
	
	
	
	public function insertar(){
		header('Content-Type: application/json');		
		$P_oficina = addslashes(htmlspecialchars($_POST["oficina"]));
		$P_tipo = addslashes(htmlspecialchars($_POST["tipo"]));
		$P_serie = addslashes(htmlspecialchars($_POST["serie"]));
		$P_numero = addslashes(htmlspecialchars($_POST["numero"]));
		$this->load->model('mantSerieOrden_m');
		$rpta=$this->mantSerieOrden_m->inserta($P_oficina, 	 
											  $P_tipo,
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
		$P_codigo=addslashes(htmlspecialchars($_POST["codigo"]));
		$P_oficina = addslashes(htmlspecialchars($_POST["oficina"]));
		$P_tipo = addslashes(htmlspecialchars($_POST["tipo"]));
		$P_serie = addslashes(htmlspecialchars($_POST["serie"]));
		$P_numero = addslashes(htmlspecialchars($_POST["numero"]));
		
		$this->load->model('mantSerieOrden_m');
		$rpta=$this->mantSerieOrden_m->editar($P_codigo,
				                        	 $P_oficina, 	 
											 $P_tipo,
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
		$this->load->model('mantSerieOrden_m');
		$rpta=$this->mantSerieOrden_m->eliminar($P_codserie);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}