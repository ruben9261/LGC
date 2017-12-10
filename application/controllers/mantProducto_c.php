<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantProducto_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantProducto_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionProducto");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->model('consProducto_m');
		$tipos=$this->consProducto_m->obt_Tipos();
		$data['tipos']=$tipos;
		$this->load->view("CreaProducto",$data);
		 
	}
	

	public function mostrar_Editar($codprod=null)
	{ if($codprod)
		{ 	$this->load->model('consProducto_m');
			$Producto=$this->consProducto_m->obt_producto($codprod);
			mysqli_next_result($this->db->conn_id);
			$tipos=$this->consProducto_m->obt_tipos();
			mysqli_next_result($this->db->conn_id);
			
			foreach ($Producto as $campos) {
				$cod_tipo=$campos->COD_TIP_PROD;
				$desc=$campos->DESCRIPCION;
				$precio=$campos->PRECIO;
			}
			
			$data['codprod']=$codprod;
		    $data['codtipo']=$cod_tipo;			
		    $data['descripcion']=$desc;
		    $data['precio']=$precio;
		    $data['tipos']=$tipos;
	       
	     }
		$this->load->view("EditProducto",$data);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');				
		$P_desc= addslashes(htmlspecialchars($_POST["descripcion"]));
		$P_tipo = addslashes(htmlspecialchars($_POST["tipo"]));
		$P_precio = addslashes(htmlspecialchars($_POST["precio"]));
		$this->load->model('mantProducto_m');
		$rpta=$this->mantProducto_m->inserta( $P_tipo,
				                              $P_desc,
											  $P_precio);
	   if(!is_null($rpta) && !empty($rpta))
		{   $json_string =json_encode($rpta);
			echo $json_string;
			
		}
	}
	
	
	public function editar(){
		header('Content-Type: application/json');
		$P_codigo=addslashes(htmlspecialchars($_POST["codigo"]));
	    $P_tipo = addslashes(htmlspecialchars($_POST["tipo"]));
		$P_desc= addslashes(htmlspecialchars($_POST["descripcion"]));
		$P_precio = addslashes(htmlspecialchars($_POST["precio"]));
		
		$this->load->model('mantProducto_m');
		$rpta=$this->mantProducto_m->editar($P_codigo,
				                            $P_tipo,
				                            $P_desc,
											$P_precio);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
			
		}
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$P_codprod=addslashes(htmlspecialchars($_POST["codprod"]));
		$this->load->model('mantProducto_m');
		$rpta=$this->mantProducto_m->eliminar($P_codprod);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}