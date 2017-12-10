<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantProveedor_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantProveedor_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionProveedor");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->model('consProveedor_m');
		$Ofertas=$this->consProveedor_m->obt_ofertas();
		mysqli_next_result($this->db->conn_id);
		$data['ofertas'] =$Ofertas;
		$this->load->view("CreaProveedor",$data);
		 
	}
	

	public function mostrar_Editar($codprov=null)
	{ if($codprov)
		{ 	$this->load->model('consProveedor_m');
			$Ofertas=$this->consProveedor_m->obt_ofertas();
			mysqli_next_result($this->db->conn_id);
			$Proveedor=$this->consProveedor_m->obt_proveedor($codprov);
			mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($Proveedor as $campos) {
				$codoferta=$campos->cod_ofer;
				$nombre=$campos->nombre;
				$documento=$campos->nro_documento;
				$tlfn1=$campos->tlfn1;
				$tlfn2=$campos->tlfn2;
				$correo1=$campos->correo1;
				$correo2=$campos->correo2;
				$comentario=$campos->comentario;
			}
			$data['codprov'] =$codprov;
			$data['codoferta']=$codoferta;
			$data['nombre']=$nombre;
			$data['documento']=$documento;
			$data['tlfn1']=$tlfn1;
			$data['tlfn2']=$tlfn2;
			$data['correo1']=$correo1;
			$data['correo2']=$correo2;
			$data['comentario']=$comentario;
			$data['ofertas'] =$Ofertas;
		}
		$this->load->view("EditProveedor",$data);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');		
		$P_cod_ofer = addslashes(htmlspecialchars($_POST["oferta"]));
		$P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$P_nro_doc = addslashes(htmlspecialchars($_POST["documento"]));
		$P_tlfn1 = addslashes(htmlspecialchars($_POST["tlfn1"]));
		$P_tlfn2 = addslashes(htmlspecialchars($_POST["tlfn2"]));
		$P_correo1 = addslashes(htmlspecialchars($_POST["correo1"]));
		$P_correo2 = addslashes(htmlspecialchars($_POST["correo2"]));
		$P_comentario = addslashes(htmlspecialchars($_POST["comentario"]));
		$this->load->model('mantProveedor_m');
		$rpta=$this->mantProveedor_m->inserta($P_cod_ofer, 	 
											  $P_nombre,
											  $P_nro_doc,	 
											  $P_tlfn1,
											  $P_tlfn2,
											  $P_correo1,
											  $P_correo2,
											  $P_comentario);
	   if(!is_null($rpta) && !empty($rpta))
		{   $json_string =json_encode($rpta);
			echo $json_string;
			
		}
	}
	
	
	public function editar(){
		header('Content-Type: application/json');
		$P_cod_prov=addslashes(htmlspecialchars($_POST["cod_prov"]));
		$P_cod_ofer = addslashes(htmlspecialchars($_POST["oferta"]));
		$P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$P_nro_doc = addslashes(htmlspecialchars($_POST["documento"]));
		$P_tlfn1 = addslashes(htmlspecialchars($_POST["tlfn1"]));
		$P_tlfn2 = addslashes(htmlspecialchars($_POST["tlfn2"]));
		$P_correo1 = addslashes(htmlspecialchars($_POST["correo1"]));
		$P_correo2 = addslashes(htmlspecialchars($_POST["correo2"]));
		$P_comentario = addslashes(htmlspecialchars($_POST["comentario"]));
		
		$this->load->model('mantProveedor_m');
		$rpta=$this->mantProveedor_m->editar( $P_cod_prov,
				                              $P_cod_ofer, 	 
											  $P_nombre,
											  $P_nro_doc,	 
											  $P_tlfn1,
											  $P_tlfn2,
											  $P_correo1,
											  $P_correo2,
											  $P_comentario);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
			
		}
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$P_cod_prov=addslashes(htmlspecialchars($_POST["codprov"]));
		$this->load->model('mantProveedor_m');
		$rpta=$this->mantProveedor_m->eliminar($P_cod_prov);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}