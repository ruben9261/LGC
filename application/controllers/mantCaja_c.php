<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantCaja_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('mantCaja_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionCaja");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->model('consCaja_m');
		$Oficinas=$this->consCaja_m->obt_oficinas();
		mysqli_next_result($this->db->conn_id);
		$tipos=$this->consCaja_m->obt_tipos_cajas();
		mysqli_next_result($this->db->conn_id);
		$data['oficinas'] =$Oficinas;
		$data['tipos'] =$tipos;
		$this->load->view("CreaCaja",$data);
		 
	}
	

	public function mostrar_Editar($codcaja=null)
	{ if($codcaja)
		{ 	$this->load->model('consCaja_m');
		    $Oficinas=$this->consCaja_m->obt_oficinas();
		    mysqli_next_result($this->db->conn_id);
		    $Caja=$this->consCaja_m->obt_Caja($codcaja);
			mysqli_next_result($this->db->conn_id);
			$tipos=$this->consCaja_m->obt_tipos_cajas();
			mysqli_next_result($this->db->conn_id);
			
			//var_dump($codigos);
			foreach ($Caja as $campos) {
				$codoficina=$campos->COD_OFI;
				$desc_caja=$campos->DESC_CAJA;
				$cod_tip_caja=$campos->COD_TIP_CAJA;
			}
			
			$data['codcaja'] =$codcaja;
			$data['oficinas']=$Oficinas;
			$data['tipos']=$tipos;
			$data['desc_caja']=$desc_caja;
			$data['codoficina']=$codoficina;
			$data['cod_tip_caja']=$cod_tip_caja;
			
		}
		$this->load->view("EditCaja",$data);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');		
		$P_oficina = addslashes(htmlspecialchars($_POST["oficina"]));
		$P_caja = addslashes(htmlspecialchars($_POST["caja"]));
		$P_tipo = addslashes(htmlspecialchars($_POST["tipo"]));
		$this->load->model('mantCaja_m');
		$rpta=$this->mantCaja_m->inserta($P_oficina, 	 
										 $P_caja,
										 $P_tipo
				                        );
	   if(!is_null($rpta) && !empty($rpta))
		{   $json_string =json_encode($rpta);
			echo $json_string;
			
		}
	}
	
	
	public function editar(){
		header('Content-Type: application/json');
		$P_codigo = addslashes(htmlspecialchars($_POST["codigo"]));
		$P_oficina = addslashes(htmlspecialchars($_POST["oficina"]));
		$P_caja = addslashes(htmlspecialchars($_POST["caja"]));
		$P_tipo = addslashes(htmlspecialchars($_POST["tipo"]));
		
		$this->load->model('mantCaja_m');
		$rpta=$this->mantCaja_m->editar( $P_codigo,
				                         $P_oficina, 	 
										 $P_caja,
										 $P_tipo 
										);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
			
		}
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$P_cod=addslashes(htmlspecialchars($_POST["codcaja"]));
		$this->load->model('mantCaja_m');
		$rpta=$this->mantCaja_m->eliminar($P_cod);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}