<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsImpuesto_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consImpuesto_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionImpuesto");
	 }

	 
	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaImpuesto");
	 }
		
	public function obt_datos(){
		header('Content-Type: application/json');
		$Nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$Abreviatura = addslashes(htmlspecialchars($_POST["abreviatura"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
		
		$this->load->model('consImpuesto_m');
		$totalpaginas=$this->consImpuesto_m->obt_totpaginas($Nombre,$Abreviatura);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consImpuesto_m->obt_lista(1,$Nombre,$Abreviatura);
		   }
		else 
		   { $datos=$this->consImpuesto_m->obt_lista($numpagina,$Nombre,$Abreviatura);
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
	{ 	$this->load->model('consImpuesto_m');
		$Impuesto=$this->consImpuesto_m->obt_impuesto($codigo);
		mysqli_next_result($this->db->conn_id);
		//var_dump($codigos);
		foreach ($Impuesto as $campos) {
			$nombre=$campos->NOMB_IMPUESTO;
			$abrev=$campos->ABREVIATURA;
			$valor=$campos->VALOR;
		}
		$data['codimp']=$codigo;
		$data['nombre']=$nombre;
		$data['abrev']=$abrev;
		$data['valor']=$valor;
		}
		$this->load->view("VerImpuesto",$data);
		
	}

}