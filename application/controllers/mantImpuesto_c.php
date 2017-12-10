<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantImpuesto_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantImpuesto_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionImpuesto");
	}
	

	public function mostrar_Nuevo()
	{ 	
		$this->load->view("CreaImpuesto");
		 
	}
	

	public function mostrar_Editar($codigo=null)
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
		$this->load->view("EditImpuesto",$data);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');				
		$P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$P_abreviatura = addslashes(htmlspecialchars($_POST["abreviatura"]));
		$P_valor = addslashes(htmlspecialchars($_POST["valor"]));
		$this->load->model('mantImpuesto_m');
		$rpta=$this->mantImpuesto_m->inserta($P_nombre,$P_abreviatura,$P_valor);
	    if(!is_null($rpta) && !empty($rpta))
		 {   $json_string =json_encode($rpta);
			echo $json_string;
			
		 }
	}
	
	
	public function editar(){
		header('Content-Type: application/json');
		$P_codigo=addslashes(htmlspecialchars($_POST["codigo"]));
		$P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$P_abreviatura = addslashes(htmlspecialchars($_POST["abreviatura"]));
		$P_valor = addslashes(htmlspecialchars($_POST["valor"]));
		
		$this->load->model('mantImpuesto_m');
		$rpta=$this->mantImpuesto_m->editar($P_codigo,$P_nombre,$P_abreviatura,$P_valor);										
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
		}
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$P_codigo=addslashes(htmlspecialchars($_POST["codigo"]));
		$this->load->model('mantImpuesto_m');
		$rpta=$this->mantImpuesto_m->eliminar($P_codigo);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}