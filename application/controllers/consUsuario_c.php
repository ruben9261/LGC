<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsUsuario_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consUsuario_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionUsuario");
	 }

	 
	 

	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaUsuario");
	 }
	 
		
	public function obt_datos(){
		header('Content-Type: application/json');
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
		$Nom_usu = addslashes(htmlspecialchars($_POST["nom_usu"]));
		$Ape_usu = addslashes(htmlspecialchars($_POST["ape_usu"]));
		$Cargo = addslashes(htmlspecialchars($_POST["cargo"]));
		
	
		$this->load->model('consUsuario_m');
		$totalpaginas=$this->consUsuario_m->obt_totpaginas($Nom_usu,$Ape_usu,$Cargo);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consUsuario_m->obt_lista(1,$Nom_usu,$Ape_usu,$Cargo);
		   }
		else 
		   { $datos=$this->consUsuario_m->obt_lista($numpagina,$Nom_usu,$Ape_usu,$Cargo);
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
	


	public function mostrar_ver($codusu=null)
	{ if($codusu)
			{ 	$this->load->model('consUsuario_m');
				$Usuario=$this->consUsuario_m->obt_Usuario($codusu);
				mysqli_next_result($this->db->conn_id);
				//var_dump($codigos);
				foreach ($Usuario as $campos) {
					
					$usuario=$campos->usu;
					$clave=$campos->clave;
					$nom_usu=$campos->nom_usu;
					$ape_usu=$campos->ape_usu;
					$cargo=$campos->cargo;
					$nivel=$campos->desc_nivel;
			 }
		
			$data['usuario']=$usuario;
			$data['clave']=$clave;
			$data['nom_usu']=$nom_usu;
			$data['ape_usu']=$ape_usu;
			$data['cargo']=$cargo;
			$data['nivel'] =$nivel;
			}
			$this->load->view("VerUsuario",$data);
	}
		
	
	
}