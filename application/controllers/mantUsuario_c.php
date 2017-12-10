<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantUsuario_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantUsuario_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionUsuario");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->model('consUsuario_m');
		$Niveles=$this->consUsuario_m->obt_niveles();
		mysqli_next_result($this->db->conn_id);
		$data['niveles'] =$Niveles;
		$this->load->view("CreaUsuario",$data);
		 
	}
	

	public function mostrar_Editar($codusu=null)
	{ if($codusu)
		{ 	$this->load->model('consUsuario_m');
			$Niveles=$this->consUsuario_m->obt_niveles();
			mysqli_next_result($this->db->conn_id);
			$Usuario=$this->consUsuario_m->obt_Usuario($codusu);
			mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($Usuario as $campos) {
				$codnivel=$campos->cod_nivel;
				$usuario=$campos->usu;
				$clave=$campos->clave;
				$nom_usu=$campos->nom_usu;
				$ape_usu=$campos->ape_usu;
				$cargo=$campos->cargo;
		    }
			$data['codusu'] =$codusu;
			$data['codnivel']=$codnivel;
			$data['usuario']=$usuario;
			$data['clave']=$clave;
			$data['nom_usu']=$nom_usu;
			$data['ape_usu']=$ape_usu;
			$data['cargo']=$cargo;
			$data['niveles'] =$Niveles;
		}
		$this->load->view("EditUsuario",$data);
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');		
		$P_usu = addslashes(htmlspecialchars($_POST["usuario"]));
		$P_clave = addslashes(htmlspecialchars($_POST["clave"]));
		$P_cod_nivel = addslashes(htmlspecialchars($_POST["nivel"]));
		$P_nom_usu = addslashes(htmlspecialchars($_POST["nom_usu"]));
		$P_ape_usu = addslashes(htmlspecialchars($_POST["ape_usu"]));
		$P_cargo = addslashes(htmlspecialchars($_POST["cargo"]));
		$this->load->model('mantUsuario_m');
		$rpta=$this->mantUsuario_m->inserta($P_cod_nivel, 	 
											$P_usu,
											$P_clave,	 
											$P_nom_usu,
											$P_ape_usu,
											$P_cargo
										  );
	   if(!is_null($rpta) && !empty($rpta))
		{   $json_string =json_encode($rpta);
			echo $json_string;
			
		}
	}
	
	
	public function editar(){
		header('Content-Type: application/json');
		$P_cod_usu=addslashes(htmlspecialchars($_POST["codusu"]));
		$P_cod_nivel = addslashes(htmlspecialchars($_POST["nivel"]));
		$P_usu = addslashes(htmlspecialchars($_POST["usuario"]));
		$P_clave = addslashes(htmlspecialchars($_POST["clave"]));
		$P_nom_usu = addslashes(htmlspecialchars($_POST["nom_usu"]));
		$P_ape_usu = addslashes(htmlspecialchars($_POST["ape_usu"]));
		$P_cargo = addslashes(htmlspecialchars($_POST["cargo"]));
		$this->load->model('mantUsuario_m');
		$rpta=$this->mantUsuario_m->editar($P_cod_usu,
				                           $P_cod_nivel, 	 
										   $P_usu,
										   $P_clave,	 
										   $P_nom_usu,
										   $P_ape_usu,
										   $P_cargo
				                           );
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
			
		}
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$P_cod_usu=addslashes(htmlspecialchars($_POST["codusu"]));
		$this->load->model('mantUsuario_m');
		$rpta=$this->mantUsuario_m->eliminar($P_cod_usu);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}