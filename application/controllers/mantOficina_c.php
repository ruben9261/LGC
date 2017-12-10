<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantOficina_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantOficina_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionOficina");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->model('consOficina_m');
		$empresas=$this->consOficina_m->obt_empresas();
		$data['empresas']=$empresas;
		$this->load->view("CreaOficina",$data);
		 
	}
	

	public function mostrar_Editar($codofi=null)
	{ if($codofi)
		{ 	$this->load->model('consOficina_m');
			$Oficina=$this->consOficina_m->obt_Oficina($codofi);
			mysqli_next_result($this->db->conn_id);
			$empresas=$this->consOficina_m->obt_empresas();
			mysqli_next_result($this->db->conn_id);
			
			//var_dump($codigos);
			foreach ($Oficina as $campos) {
				$cod_emp=$campos->cod_emp;
				$nombre=$campos->nomb_oficina;
				$domicilio=$campos->domicilio;
				$tlfn=$campos->tlfn;
				$correo=$campos->correo;
			}
			$data['codofi']=$codofi;
			$data['nombre']=$nombre;
			$data['cod_emp']=$cod_emp;			
			$data['empresas']=$empresas;
			$data['domicilio']=$domicilio;
			$data['tlfn']=$tlfn;
			$data['correo']=$correo;
		}
		$this->load->view("EditOficina",$data);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');				
		$P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$P_cod_emp= addslashes(htmlspecialchars($_POST["empresa"]));
		$P_domicilio = addslashes(htmlspecialchars($_POST["domicilio"]));
		$P_tlfn = addslashes(htmlspecialchars($_POST["tlfn"]));
		$P_correo = addslashes(htmlspecialchars($_POST["correo"]));
		$this->load->model('mantOficina_m');
		$rpta=$this->mantOficina_m->inserta(  $P_cod_emp,
				                              $P_nombre,
											  $P_domicilio,	 
											  $P_tlfn,
											  $P_correo);
	   if(!is_null($rpta) && !empty($rpta))
		{   $json_string =json_encode($rpta);
			echo $json_string;
			
		}
	}
	
	
	public function editar(){
		header('Content-Type: application/json');
		$P_cod_ofi=addslashes(htmlspecialchars($_POST["cod_ofi"]));
	    $P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$P_cod_emp= addslashes(htmlspecialchars($_POST["empresa"]));
		$P_domicilio = addslashes(htmlspecialchars($_POST["domicilio"]));
		$P_tlfn = addslashes(htmlspecialchars($_POST["tlfn"]));
		$P_correo = addslashes(htmlspecialchars($_POST["correo"]));
		
		$this->load->model('mantOficina_m');
		$rpta=$this->mantOficina_m->editar(   $P_cod_ofi,
				                              $P_cod_emp,
				                              $P_nombre,
											  $P_domicilio,	 
											  $P_tlfn,
											  $P_correo);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
			
		}
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$P_cod_ofi=addslashes(htmlspecialchars($_POST["codofi"]));
		$this->load->model('mantOficina_m');
		$rpta=$this->mantOficina_m->eliminar($P_cod_ofi);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}