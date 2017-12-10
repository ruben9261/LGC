<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsOficina_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consOficina_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionOficina");
	 }

	 
	public function mostrar_Consulta(){
		$this->load->view("ConsultaOficina");
	}
	 
	 
	 
	 
	 
		
	public function obt_datos(){
		header('Content-Type: application/json');
		$Nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$domicilio = addslashes(htmlspecialchars($_POST["domicilio"]));
		$Tlfn = addslashes(htmlspecialchars($_POST["tlfn"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
		
		$this->load->model('consOficina_m');
		$totalpaginas=$this->consOficina_m->obt_totpaginas($Nombre,$domicilio,$Tlfn);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consOficina_m->obt_lista(1,$Nombre,$domicilio,$Tlfn);
		   }
		else 
		   { $datos=$this->consOficina_m->obt_lista($numpagina,$Nombre,$domicilio,$Tlfn);
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
	
	public function mostrar_ver($codofi=null)
	{ if($codofi)
			{ 	$this->load->model('consOficina_m');
				$Oficina=$this->consOficina_m->obt_Oficina($codofi);
				mysqli_next_result($this->db->conn_id);
				
				//var_dump($codigos);
				foreach ($Oficina as $campos) {
					$empresa=$campos->nomb_empresa;
					$nombre=$campos->nomb_oficina;
					$domicilio=$campos->domicilio;
					$tlfn=$campos->tlfn;
					$correo=$campos->correo;
				}
				
				$data['codofi']=$codofi;
				$data['empresa']=$empresa;
				$data['nombre']=$nombre;				
				$data['domicilio']=$domicilio;
				$data['tlfn']=$tlfn;
				$data['correo']=$correo;
			}
			$this->load->view("VerOficina",$data);
	
	}
	
	

}