<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsProveedor_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consProveedor_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionProveedor");
	 }

	 
	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaProveedor");
	 }
	 
	 
	 
		
	public function obt_datos(){
		header('Content-Type: application/json');
		$Nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$Documento = addslashes(htmlspecialchars($_POST["documento"]));
		$Tlfn1 = addslashes(htmlspecialchars($_POST["tlfn1"]));
		$Tlfn2 = addslashes(htmlspecialchars($_POST["tlfn2"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
	
		$this->load->model('consProveedor_m');
		$totalpaginas=$this->consProveedor_m->obt_totpaginas($Nombre,$Documento,$Tlfn1,$Tlfn2);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consProveedor_m->obt_lista(1,$Nombre,$Documento,$Tlfn1,$Tlfn2);
		   }
		else 
		   { $datos=$this->consProveedor_m->obt_lista($numpagina,$Nombre,$Documento,$Tlfn1,$Tlfn2);
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
	
		
	public function mostrar_ver($codprov=null)
	{ if($codprov)
			{ 	    $this->load->model('consProveedor_m');
					$Proveedor=$this->consProveedor_m->obt_proveedor($codprov);
					mysqli_next_result($this->db->conn_id);
					//var_dump($codigos);
					foreach ($Proveedor as $campos) {
						$oferta=$campos->nomb_oferta;
						$nombre=$campos->nombre;
						$documento=$campos->nro_documento;
						$tlfn1=$campos->tlfn1;
						$tlfn2=$campos->tlfn2;
						$correo1=$campos->correo1;
						$correo2=$campos->correo2;
						$comentario=$campos->comentario;
					}
				
					$data['oferta']=$oferta;
					$data['nombre']=$nombre;
					$data['documento']=$documento;
					$data['tlfn1']=$tlfn1;
					$data['tlfn2']=$tlfn2;
					$data['correo1']=$correo1;
					$data['correo2']=$correo2;
					$data['comentario']=$comentario;
					
				}
				$this->load->view("VerProveedor",$data);
			
	}
	
	
	
	
}