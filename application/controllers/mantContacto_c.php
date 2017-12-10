<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantContacto_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantContacto_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionContacto");
	}
	

	public function mostrar_Nuevo()
	{ 	
		$this->load->view("CreaContacto");
		 
	}
	

	public function mostrar_Editar($codigo=null)
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
		$this->load->view("EditContacto",$data);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');				
		$P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$P_tlfn1 = addslashes(htmlspecialchars($_POST["tlfn1"]));
		$P_tlfn2 = addslashes(htmlspecialchars($_POST["tlfn2"]));
		$P_correo = addslashes(htmlspecialchars($_POST["correo"]));
		$P_domicilio = addslashes(htmlspecialchars($_POST["domicilio"]));
		$P_orden = addslashes(htmlspecialchars($_POST["orden"]));
		$this->load->model('mantContacto_m');
		$rpta=$this->mantContacto_m->inserta($P_nombre,$P_tlfn1,$P_tlfn2,$P_correo,$P_domicilio,$P_orden);
	    if(!is_null($rpta) && !empty($rpta))
		 {   $json_string =json_encode($rpta);
			echo $json_string;
			
		 }
	}
	
	
	public function editar(){
		header('Content-Type: application/json');
		$P_codigo=addslashes(htmlspecialchars($_POST["codigo"]));
	    $P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$P_tlfn1 = addslashes(htmlspecialchars($_POST["tlfn1"]));
		$P_tlfn2 = addslashes(htmlspecialchars($_POST["tlfn2"]));
		$P_correo = addslashes(htmlspecialchars($_POST["correo"]));
		$P_domicilio = addslashes(htmlspecialchars($_POST["domicilio"]));
		$P_orden = addslashes(htmlspecialchars($_POST["orden"]));
		
		$this->load->model('mantContacto_m');
		$rpta=$this->mantContacto_m->editar($P_codigo,$P_nombre,$P_tlfn1,$P_tlfn2,$P_correo,$P_domicilio,$P_orden);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
		}
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$P_codigo=addslashes(htmlspecialchars($_POST["codigo"]));
		$this->load->model('mantContacto_m');
		$rpta=$this->mantContacto_m->eliminar($P_codigo);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}