<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantOrdenSalida_c  extends CI_Controller{
     
    
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantOrdenSalida_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionOrdenSalida");
	}
	

	
	public function procesar_opcion()
	{   $opcion=$_POST["opcion"];
		if($opcion==1)
			{ $this->mostrar_Nuevo(); }
		else
			{  $codorden=$_POST["codorden"];
			   $this-> mostrar_Editar($codorden);
			}

	}
	
	public function mostrar_Nuevo()
	{ 	$this->load->library('session');
  	    $datos= $this->session->cod_usu;
  	   // $this->session->unset_userdata('cod_usu');
  	    //  print_r($datos);
	   foreach ($datos as $campos) 
	      {	$codusu=$campos->COD_USU;}
	   
	    $this->load->model('consOrdenSalida_m');
	    $datos1=$this->consOrdenSalida_m->obt_serie_orden_x_usu($codusu,2);
		mysqli_next_result($this->db->conn_id);
		foreach ($datos1 as $campos)
		{	$codserorden=$campos->COD_SERIE_ORDEN;
			$serie=$campos->SERIE;
			$numero=$campos->NUM_ACTUAL;
		}
	   
		//obtenemos tipo de documento de cliente
		$this->load->model('consProveedor_m');
		$ofertas=$this->consProveedor_m->obt_ofertas();
		mysqli_next_result($this->db->conn_id);
		
		//obtenemnos tipo de producto     
		$this->load->model('consProducto_m');
		$tipo_prod=$this->consProducto_m->obt_Tipos();
		mysqli_next_result($this->db->conn_id);
		
		
		//obtenemos tipo de tarifa
		$this->load->model('consTarifa_m');
		$tarifas=$this->consTarifa_m->obt_tarifas();
		mysqli_next_result($this->db->conn_id);
		
		
		
		
		
		date_default_timezone_set("America/Lima");
		
		$data['codserorden']=$codserorden;
		$data['codusuario']=$codusu;	
		$anio = date('Y');
		$mes = date('m');
		$dia = date('d');
		$data['fecha']= $dia.'/'.$mes.'/'.$anio;
		//$data['fecha']= $anio.'-'.$mes.'-'.$dia;
		$data['ofertas']=$ofertas;

		$data['tipo_prod']=$tipo_prod;
		$data['serie']=$serie;
		$data['numero']=$numero;
		$data['tarifas']=$tarifas;
		
		$this->load->view("CreaOrdenSalida",$data);
		 
	}
	

	

	
	public function procesar_producto()
	{  $opcion=$_POST["opcion"];
		if($opcion==1)
			{ $this->Nuevo_producto(); }
		else
			{  $codcliente=$_POST["codcliente"];
				$nombre=$_POST["nombre"];
				$documento=$_POST["documento"];
				$this->mostrar_Nuevo_y_cliente($codcliente,$nombre,$documento) ;
			}
	
	}
	
	
	
	
	public function mostrar_Nuevo_y_cliente($codcli,$nomb,$doc)
	{ 	    $this->load->library('session');
			$datos= $this->session->cod_usu;
			// $this->session->unset_userdata('cod_usu');
			//  print_r($datos);
			foreach ($datos as $campos)
			{	$codusu=$campos->COD_USU;}
				
			$this->load->model('consOrdenSalida_m');
			$datos1=$this->consOrdenSalida_m->obt_serie_orden_x_usu($codusu,1);
			mysqli_next_result($this->db->conn_id);
			foreach ($datos1 as $campos)
			{	$serie=$campos->SERIE;
			$numero=$campos->NUMERO;
			}
			
			$data['cod_cliente']=$codcli;
			$data['nomb_cliente']=$nomb;
			$data['doc_cliente']=$doc;
			$data['serie']=$serie;
			$data['numero']=$numero;
			$this->load->view("CreaOrdenSalida",$data);
	
	}
	
	
	
	
	
	

	public function mostrar_Editar($codigo=null)
	{ if($codigo)
		{ 
			$this->load->library('session');
			$datos= $this->session->cod_usu;
			foreach ($datos as $campos)
			{	$codusu_mod=$campos->COD_USU;}
			
			$this->load->model('consOrdenSalida_m');
			$ordenEnt=$this->consOrdenSalida_m->obt_orden_salida($codigo);
			mysqli_next_result($this->db->conn_id);
			//var_dump($ordenEnt);
			foreach ($ordenEnt as $campos) {
				$P_codserorden=$campos->cod_ser_ord_s;
				$P_serie=$campos->serie;
				$P_numero=$campos->numero;
				$P_fecha=$campos->fecha;
				$P_codproveedor=$campos->cod_proveedor;
				$P_nomb_prov=$campos->nombre;
				$P_doc_prov=$campos->nro_documento;
				$P_total=$campos->total;
				$P_obs=$campos->observacion;
				$P_usu_crea=$campos->usu_crea;
				$P_fecha_crea=$campos->fecha_crea;
			}
		
			
			//obtenemos tipo de documento de cliente
				$this->load->model('consProveedor_m');
				$ofertas=$this->consProveedor_m->obt_ofertas();
				mysqli_next_result($this->db->conn_id);
		
			
			//obtenemnos tipo de producto
			$this->load->model('consProducto_m');
			$tipo_prod=$this->consProducto_m->obt_Tipos();
			mysqli_next_result($this->db->conn_id);
			
			//obtenemos tipo de tarifa
			$this->load->model('consTarifa_m');
			$tarifas=$this->consTarifa_m->obt_tarifas();
			mysqli_next_result($this->db->conn_id);
			
			
			$this->load->model('ConsOrdenSalidaDet_m');
			$ordenEntdet=$this->ConsOrdenSalidaDet_m->obt_ordenEntDet($codigo);
			mysqli_next_result($this->db->conn_id);
			
			
			
			date_default_timezone_set("America/Lima");
			
			$data['codorden']=$codigo;
			$data['codserorden']=$P_codserorden;
			$data['codusuario']=$codusu_mod;
			$data['ofertas']=$ofertas;
			$data['tipo_prod']=$tipo_prod;
			$data['tarifas']=$tarifas;
			$data['serie']=$P_serie;
			$data['numero']=$P_numero;
			$anio=substr($P_fecha, 0,4);
			$mes=substr($P_fecha, 5,2);
			$dia=substr($P_fecha, 8,2);
			$data['fecha']= $dia.'/'.$mes.'/'.$anio;
			$data['codproveedor']= $P_codproveedor;
			$data['nomb_prov']= $P_nomb_prov;
			$data['doc_prov']= $P_doc_prov;
			$data['total']= $P_total;
			$data['obs']= $P_obs;
			$data['usu_crea']= $P_usu_crea;
			$data['fecha_crea']=$P_fecha_crea;
			$data['vector']=$ordenEntdet;
			
		}
		
		$this->load->view("EditOrdenSalida",$data);
				
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');		
		
		//INSERTAR ORDEN DE Salida
		$P_cod_SerOrden = addslashes(htmlspecialchars($_POST["cod_SerOrden"]));
		$P_serie = addslashes(htmlspecialchars($_POST["serie"]));
		$P_numero = addslashes(htmlspecialchars($_POST["numero"]));
		$P_fecha = addslashes(htmlspecialchars($_POST["fecha"]));
		$P_cod_proveedor = addslashes(htmlspecialchars($_POST["codproveedor"]));
		$P_total = addslashes(htmlspecialchars($_POST["total"]));
		$P_obs = addslashes(htmlspecialchars($_POST["obs"]));
		$P_usuario = addslashes(htmlspecialchars($_POST["usuario"]));

		$this->load->model('mantOrdenSalida_m');
		$rpta1=$this->mantOrdenSalida_m->inserta($P_cod_SerOrden,
												$P_serie,
												$P_numero,
												$P_fecha,
												$P_cod_proveedor,
												$P_total,
												$P_obs,
												$P_usuario);
		
		
		//--------------------------------------------------------------------
	
		//INSERTAR DETALLE DE ORDEN DE Salida
		$this->load->model('consOrdenSalida_m');
		$lst_ult_cod_ord_ent=$this->consOrdenSalida_m->obt_ult_cod_orden_salida();
		mysqli_next_result($this->db->conn_id);
		 
		foreach ($lst_ult_cod_ord_ent as $campos) {
			$ult_cod_orden=$campos->ULTIMO;
		}
	
		$cantidad=0;
		$det_orden=json_decode($_POST['detorden']);
		
		for ($i=0; $i < count($det_orden); $i++) {
		  
			$P_cantidad =$det_orden[$i]->cantidad;
			$P_codproducto =$det_orden[$i]->codproducto;
			$P_det_producto =$det_orden[$i]->det;
			$P_precio =$det_orden[$i]->precio;
			
			$this->load->model('MantOrdenSalidaDet_m');
			$resp=$this->MantOrdenSalidaDet_m->inserta($ult_cod_orden,
														$P_cantidad,
														$P_codproducto,
														$P_det_producto,
														$P_precio,
														$P_usuario
														);
			$cantidad++;
		}
		//------------------------------------------------------------------------
		if(count($det_orden) == $cantidad)
		{ $rpta2=true;
		
		}
		
	   if(!is_null($rpta1) && !empty($rpta1) && !is_null($rpta2) && !empty($rpta2))
		 { 	$rpta=1; }
		
	   else 
	      {$rpta=0;}
	      
	    $json_string =json_encode($rpta);
		echo $json_string;
		
			
	}
	
	
	public function editar(){
		
		header('Content-Type: application/json');
		
		//INSERTAR ORDEN DE Salida
		$P_codorden = addslashes(htmlspecialchars($_POST["codorden"]));
		$P_codserorden = addslashes(htmlspecialchars($_POST["codserorden"]));
		$P_serie = addslashes(htmlspecialchars($_POST["serie"]));
		$P_numero = addslashes(htmlspecialchars($_POST["numero"]));
		$P_fecha = addslashes(htmlspecialchars($_POST["fecha"]));
		$P_cod_proveedor = addslashes(htmlspecialchars($_POST["codproveedor"]));
		$P_total = addslashes(htmlspecialchars($_POST["total"]));
		$P_obs = addslashes(htmlspecialchars($_POST["obs"]));
		$P_usu_crea = addslashes(htmlspecialchars($_POST["usu_crea"]));
		$P_fecha_crea = addslashes(htmlspecialchars($_POST["fecha_crea"]));
		$P_usu_mod = addslashes(htmlspecialchars($_POST["usu_mod"]));
		
		

		$this->load->model('mantProcess_log_m');
		$rpta1=$this->mantProcess_log_m->inserta('2017-12-16',
												 'editar orden',
												 'parametros',
												 $P_codorden."-".
												 $P_codserorden ."-".
												 $P_serie."-".
												 $P_numero."-".
												 $P_fecha ."-".
												 $P_cod_proveedor ."-".
												 $P_total."-".
												 $P_obs."-".
												 $P_usu_mod);
		
		
		
		$this->load->model('mantOrdenSalida_m');
		$rpta1=$this->mantOrdenSalida_m->editar($P_codorden,
												 $P_codserorden ,
												 $P_serie,
												 $P_numero,
												 $P_fecha ,
												 $P_cod_proveedor ,
												 $P_total,
												 $P_obs,
												 $P_usu_mod);
											
		//ELIMINAR DETALLE DE ORDEN ANTERIOR
		
		$this->load->model('MantOrdenSalidaDet_m');
		$resp=$this->MantOrdenSalidaDet_m->eliminar($P_codorden);
		
		
	
		
		$cantidad=0;
		$det_orden=json_decode($_POST['detorden']);
		
		for ($i=0; $i < count($det_orden); $i++) {
		
			$P_cantidad =$det_orden[$i]->cantidad;
			$P_codproducto =$det_orden[$i]->codproducto;
			$P_det_producto =$det_orden[$i]->det;
			$P_precio =$det_orden[$i]->precio;
				
			$this->load->model('MantOrdenSalidaDet_m');
			$resp=$this->MantOrdenSalidaDet_m->editar( $P_codorden,
														$P_cantidad,
														$P_codproducto,
														$P_det_producto,
														$P_precio,
														$P_usu_crea,
														$P_fecha_crea,
														$P_usu_mod
													 );
			$cantidad++;
		}
		//------------------------------------------------------------------------
		if(count($det_orden) == $cantidad)
		{ $rpta2=true;
		
		}
		
		if(!is_null($rpta1) && !empty($rpta1) && !is_null($rpta2) && !empty($rpta2))
		{ 	$rpta=1; }
		
		else
		{$rpta=0;}
		
		
		$json_string =json_encode($rpta1);
		echo $json_string;
		
		
	}
	
	        
	
   public function cambiar_estado(){
		header('Content-Type: application/json');
		$P_codigo=addslashes(htmlspecialchars($_POST["codigo"]));
		$P_estado=addslashes(htmlspecialchars($_POST["estado"]));
		$this->load->model('mantOrdenSalida_m');
		$rpta=$this->mantOrdenSalida_m->set_estado_operativo($P_codigo,$P_estado);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	
	
	
	
	

}