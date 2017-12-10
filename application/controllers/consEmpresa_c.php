<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsEmpresa_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consEmpresa_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionEmpresa");
	 }
	 
	 

	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaEmpresa");
	 }
	 

		
	public function obt_datos(){
		header('Content-Type: application/json');
		$Nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$Ruc = addslashes(htmlspecialchars($_POST["ruc"]));
		$Tlfn = addslashes(htmlspecialchars($_POST["tlfn"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
		
		$this->load->model('consEmpresa_m');
		$totalpaginas=$this->consEmpresa_m->obt_totpaginas($Nombre,$Ruc,$Tlfn);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consEmpresa_m->obt_lista(1,$Nombre,$Ruc,$Tlfn);
		   }
		else 
		   { $datos=$this->consEmpresa_m->obt_lista($numpagina,$Nombre,$Ruc,$Tlfn);
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
	

	public function mostrar_ver($codemp=null)
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
		
		$data['nombre']=$nombre;
		$data['domicilio']=$domicilio;
		$data['ruc']=$ruc;
		$data['tlfn']=$tlfn;
		$data['correo']=$correo;
		}
		$this->load->view("VerEmpresa",$data);
	
	}
	
	
	
	
}