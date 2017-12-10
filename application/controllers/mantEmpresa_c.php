<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantEmpresa_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantEmpresa_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionEmpresa");
	}
	

	public function mostrar_Nuevo()
	{ 	
		$this->load->view("CreaEmpresa");
		 
	}
	

	public function mostrar_Editar($codemp=null)
	{ if($codemp)
		{ 	$this->load->model('consEmpresa_m');
			$Empresa=$this->consEmpresa_m->obt_EMPRESA($codemp);
			mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($Empresa as $campos) {
				$nombre=$campos->nomb_empresa;
				$domicilio=$campos->domi_fiscal;
				$ruc=$campos->ruc;
				$tlfn=$campos->tlfn;
				$correo=$campos->correo;
			}
			$data['codemp']=$codemp;
			$data['nombre']=$nombre;
			$data['domicilio']=$domicilio;
			$data['ruc']=$ruc;
			$data['tlfn']=$tlfn;
			$data['correo']=$correo;
		}
		$this->load->view("EditEmpresa",$data);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');				
		$P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$P_domicilio = addslashes(htmlspecialchars($_POST["domicilio"]));
		$P_ruc = addslashes(htmlspecialchars($_POST["ruc"]));
		$P_tlfn = addslashes(htmlspecialchars($_POST["tlfn"]));
		$P_correo = addslashes(htmlspecialchars($_POST["correo"]));
		$this->load->model('mantEmpresa_m');
		$rpta=$this->mantEmpresa_m->inserta(  $P_nombre,
											  $P_domicilio,	 
											  $P_ruc,
											  $P_tlfn,
											  $P_correo);
	   if(!is_null($rpta) && !empty($rpta))
		{   $json_string =json_encode($rpta);
			echo $json_string;
			
		}
	}
	
	
	public function editar(){
		header('Content-Type: application/json');
		$P_cod_emp=addslashes(htmlspecialchars($_POST["cod_emp"]));
	    $P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$P_domicilio = addslashes(htmlspecialchars($_POST["domicilio"]));
		$P_ruc = addslashes(htmlspecialchars($_POST["ruc"]));
		$P_tlfn = addslashes(htmlspecialchars($_POST["tlfn"]));
		$P_correo = addslashes(htmlspecialchars($_POST["correo"]));
		
		$this->load->model('mantEmpresa_m');
		$rpta=$this->mantEmpresa_m->editar(   $P_cod_emp,
				                              $P_nombre,
											  $P_domicilio,	 
											  $P_ruc,
											  $P_tlfn,
											  $P_correo);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
			
		}
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$P_cod_emp=addslashes(htmlspecialchars($_POST["codemp"]));
		$this->load->model('mantEmpresa_m');
		$rpta=$this->mantEmpresa_m->eliminar($P_cod_emp);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}