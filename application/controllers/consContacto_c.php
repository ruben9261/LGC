<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsContacto_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consContacto_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionContacto");
	 }

	 

	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaContacto");
	 }
	 
		
	public function obt_datos(){
		header('Content-Type: application/json');
		$Nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
		
		$this->load->model('consContacto_m');
		$totalpaginas=$this->consContacto_m->obt_totpaginas($Nombre);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consContacto_m->obt_lista(1,$Nombre);
		   }
		else 
		   { $datos=$this->consContacto_m->obt_lista($numpagina,$Nombre);
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
		{ 	$this->load->model('consContacto_m');
		$Contacto=$this->consContacto_m->obt_Contacto($codigo);
		mysqli_next_result($this->db->conn_id);
		//var_dump($codigos);
		foreach ($Contacto as $campos) {
			$nombre=$campos->NOMB_CONTACTO;
			$tlfn1=$campos->TLFN1;
			$tlfn2=$campos->TLFN2;
			$correo=$campos->CORREO;
			$domicilio=$campos->DOMICILIO;
			$orden=$campos->ORDEN;
		}
		$data['codContacto']=$codigo;
		$data['nombre']=$nombre;
		$data['tlfn1']=$tlfn1;
		$data['tlfn2']=$tlfn2;
		$data['correo']=$correo;
		$data['domicilio']=$domicilio;
		$data['orden']=$orden;
		
		
		}
		$this->load->view("VerContacto",$data);
	
	}
	
	
	
}