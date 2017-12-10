<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsSerieCaja_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consSerieCaja_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionSerieCaja");
	 }

	 
	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaSerieCaja");
	 }
	 
	 
		
	public function obt_datos(){
		header('Content-Type: application/json');
		$caja = addslashes(htmlspecialchars($_POST["caja"]));
		$serie = addslashes(htmlspecialchars($_POST["serie"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
	
		$this->load->model('consSerieCaja_m');
		$totalpaginas=$this->consSerieCaja_m->obt_totpaginas($caja,$serie);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consSerieCaja_m->obt_lista(1,$caja,$serie);
		   }
		else 
		   { $datos=$this->consSerieCaja_m->obt_lista($numpagina,$caja,$serie);
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
			{ 	$this->load->model('consSerieCaja_m');
				$cajas=$this->consSerieCaja_m->obt_cajas();
				mysqli_next_result($this->db->conn_id);
				$serie=$this->consSerieCaja_m->obt_Serie($codserie);
				mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($serie as $campos) {
				$caja=$campos->CAJA;
				$ser=$campos->SERIE;
				$num=$campos->NUMERO;
			}
		
			$data['caja']=$caja;
			$data['serie']=$ser;
			$data['numero']=$num;
				
			}
			$this->load->view("VerSerieCaja",$data);
	
	}
	
	
}