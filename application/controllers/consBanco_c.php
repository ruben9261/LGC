<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsBanco_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consBanco_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionBanco");
	 }


	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaBanco");
	 }
	 
	 
	 
	public function obt_datos(){
		header('Content-Type: application/json');
		$Nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
		
		$this->load->model('consBanco_m');
		$totalpaginas=$this->consBanco_m->obt_totpaginas($Nombre);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consBanco_m->obt_lista(1,$Nombre);
		   }
		else 
		   { $datos=$this->consBanco_m->obt_lista($numpagina,$Nombre);
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
	


	public function mostrar_ver($codigo=null)
	{ if($codigo)
		{ 	$this->load->model('consBanco_m');
			$Banco=$this->consBanco_m->obt_banco($codigo);
			mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($Banco as $campos) {
				$nombre=$campos->NOMBRE;
			}
			$data['nombre']=$nombre;
		}
		
		$this->load->view("VerBanco",$data);
	
	}
	
	
}