<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsCaja_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
	    $this->load->model('consCaja_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionCaja");
	 }

	 
	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaCaja");
	 } 
	 
		
	public function obt_datos(){
		header('Content-Type: application/json');
		$oficina = addslashes(htmlspecialchars($_POST["oficina"]));
		$empresa = addslashes(htmlspecialchars($_POST["empresa"]));
		$caja = addslashes(htmlspecialchars($_POST["caja"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
		

		$this->load->model('consCaja_m');
		$totalpaginas=$this->consCaja_m->obt_totpaginas($oficina,$empresa,$caja);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consCaja_m->obt_lista(1,$oficina,$empresa,$caja); 
		      mysqli_next_result($this->db->conn_id);
		  }
		else 
		   { $datos=$this->consCaja_m->obt_lista($numpagina,$oficina,$empresa,$caja);
		     mysqli_next_result($this->db->conn_id);
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
	
	
	public function mostrar_ver($codcaja=null)
	{   if($codcaja)
			{ 	$this->load->model('consCaja_m');
			    $Caja=$this->consCaja_m->obt_Caja($codcaja);
				mysqli_next_result($this->db->conn_id);
				
				foreach ($Caja as $campos) {
					$oficina=$campos->OFICINA;
					$desc_caja=$campos->DESC_CAJA;
					$tipo_caja=$campos->TIPO_CAJA;
				}
				
				
				$data['oficina']=$oficina;
				$data['desc_caja']=$desc_caja;
				$data['tipo_caja']=$tipo_caja;
					
			  }
			$this->load->view("VerCaja",$data);
	
	}
	
	
	
	
	
	
	
	
}