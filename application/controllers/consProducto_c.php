<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsProducto_c extends CI_Controller{
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consProducto_m');
	}
	
	
	public function index() {
		$this->load->view("GestionProducto");
	 }

	 
	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaProducto");
	 } 
	 
		
	 public function mostrar_Seleccion_Producto()
	 {	   $this->load->view("SeleccionProducto");
	 
	 }
	 
	  
	 
	public function obt_datos(){
		header('Content-Type: application/json');
		$descripcion = addslashes(htmlspecialchars($_POST["descripcion"]));
		$tipo = addslashes(htmlspecialchars($_POST["tipo"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
		
		$this->load->model('consProducto_m');
		$totalpaginas=$this->consProducto_m->obt_totpaginas($descripcion,$tipo);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consProducto_m->obt_lista(1,$descripcion,$tipo);
		   }
		else 
		   { $datos=$this->consProducto_m->obt_lista($numpagina,$descripcion,$tipo);
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
	
	
	

	public function mostrar_ver($codprod=null)
	{ if($codprod)
		{ 	$this->load->model('consProducto_m');
			$Producto=$this->consProducto_m->obt_producto($codprod);
			mysqli_next_result($this->db->conn_id);
				
			foreach ($Producto as $campos) {
				$desc_tipo=$campos->DESC_TIPO;
				$desc=$campos->DESCRIPCION;
				$precio=$campos->PRECIO;
			}
		
			$data['descripcion']=$desc;
			$data['desc_tipo']=$desc_tipo;
			$data['precio']=$precio;
		
			
		}
		$this->load->view("VerProducto",$data);
			
	}
	
	
	
	
}