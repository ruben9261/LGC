<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantBanco_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantBanco_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionBanco");
	}
	

	public function mostrar_Nuevo()
	{ 	
		$this->load->view("CreaBanco");
		 
	}
	

	public function mostrar_Editar($codigo=null)
	{ if($codigo)
		{ 	$this->load->model('consBanco_m');
			$Banco=$this->consBanco_m->obt_banco($codigo);
			mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($Banco as $campos) {
				$nombre=$campos->NOMBRE;
			}
			$data['codbanco']=$codigo;
			$data['nombre']=$nombre;
		}
		$this->load->view("EditBanco",$data);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');				
		$P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$this->load->model('mantBanco_m');
		$rpta=$this->mantBanco_m->inserta($P_nombre);
	    if(!is_null($rpta) && !empty($rpta))
		 {   $json_string =json_encode($rpta);
			echo $json_string;
			
		 }
	}
	
	
	public function editar(){
		header('Content-Type: application/json');
		$P_codigo=addslashes(htmlspecialchars($_POST["codigo"]));
	    $P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		
		$this->load->model('mantBanco_m');
		$rpta=$this->mantBanco_m->editar($P_codigo,
										 $P_nombre);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
		}
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$P_codigo=addslashes(htmlspecialchars($_POST["codigo"]));
		$this->load->model('mantBanco_m');
		$rpta=$this->mantBanco_m->eliminar($P_codigo);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}