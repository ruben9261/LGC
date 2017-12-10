<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantOrdenEntrada_c  extends CI_Controller{
     
    
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantOrdenEntrada_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionOrdenEntrada");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->library('session');
  	    $datos= $this->session->cod_usu;
  	   // $this->session->unset_userdata('cod_usu');
  	    //  print_r($datos);
	   foreach ($datos as $campos) 
	      {	$codusu=$campos->COD_USU;}
	   
	    $this->load->model('consOrdenEntrada_m');
	    $datos1=$this->consOrdenEntrada_m->obt_serie_orden_x_usu($codusu,1);
		mysqli_next_result($this->db->conn_id);
		foreach ($datos1 as $campos)
		{	$codserorden=$campos->COD_SERIE_ORDEN;
			$serie=$campos->SERIE;
			$numero=$campos->NUMERO;
		}
	   
		//obtenemos tipo de documento de cliente
		$this->load->model('consCliente_m');
		$tipodoc=$this->consCliente_m->listar_tipo_documento();
		mysqli_next_result($this->db->conn_id);
		
		//obtenemnos tipo de producto     
		$this->load->model('consProducto_m');
		$tipo_prod=$this->consProducto_m->obt_Tipos();
		mysqli_next_result($this->db->conn_id);
		
		
		date_default_timezone_set("America/Bogota");
		
		$data['codserorden']=$codserorden;
		$data['codusuario']=$codusu;	
		$anio = date('Y');
		$mes = date('m');
		$dia = date('d');
		//$data['fecha']= $dia.'/'.$mes.'/'.$anio;
		$data['fecha']= $anio.'-'.$mes.'-'.$dia;
		$data['tipodoc']=$tipodoc;
		$data['tipo_prod']=$tipo_prod;
		$data['serie']=$serie;
		$data['numero']=$numero;
		$this->load->view("CreaOrdenEntrada1",$data);
		 
	}
	

	public function procesar_cliente()
	{  $opcion=$_POST["opcion"];
       if($opcion==1)
		   { $this->Nuevo_cliente(); }	
	   else
		   {  $codcliente=$_POST["codcliente"];
	          $nombre=$_POST["nombre"];
	          $documento=$_POST["documento"];
	     	  $this->mostrar_Nuevo_y_cliente($codcliente,$nombre,$documento) ;
		   }

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
				
			$this->load->model('consOrdenEntrada_m');
			$datos1=$this->consOrdenEntrada_m->obt_serie_orden_x_usu($codusu,1);
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
			$this->load->view("CreaOrdenEntrada",$data);
	
	}
	
	
	
	
	
	public function Nuevo_cliente()
	{ 	    $this->load->model('consCliente_m');
			$tipodoc=$this->consCliente_m->listar_tipo_documento();
			mysqli_next_result($this->db->conn_id);
			
			$regimen=$this->consCliente_m->listar_regimen();
			mysqli_next_result($this->db->conn_id);
			
			$estado=$this->consCliente_m->listar_estado_cliente();
			mysqli_next_result($this->db->conn_id);
			
			$clasificacion=$this->consCliente_m->listar_clasificacion_cliente();
			mysqli_next_result($this->db->conn_id);
			
			$actividad=$this->consCliente_m->listar_actividad_cliente();
			mysqli_next_result($this->db->conn_id);
			
			
			$contacto=$this->consCliente_m->listar_contacto();
			mysqli_next_result($this->db->conn_id);
			
			$data['band_SelCliente']=1;
			$data['tipodoc']=$tipodoc;
			$data['regimenes']=$regimen;
			$data['estados']=$estado;
			$data['clasificaciones']=$clasificacion;
			$data['actividades']=$actividad;
			$data['contactos']=$contacto;
			$this->load->view("CreaCliente",$data);
				
	}
	
	
	
	public function mostrar_Editar($codserie=null)
	{ if($codserie)
		{ 	$this->load->model('consOrdenEntrada_m');
			$oficinas=$this->consOrdenEntrada_m->obt_oficinas();
	    	mysqli_next_result($this->db->conn_id);
	    	
	    	$tipos=$this->consOrdenEntrada_m->obt_tipos_serie();
	    	mysqli_next_result($this->db->conn_id);
	    	
	    	
			$serie=$this->consOrdenEntrada_m->obt_serie($codserie);
			mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($serie as $campos) {
							$codoficina=$campos->COD_OFI;
							$codtipo=$campos->COD_TIP_SER;
							$ser=$campos->SERIE;
							$num=$campos->NUMERO;
			}
			$data['codserie'] =$codserie;
			$data['oficinas']=$oficinas;
			$data['tipos']=$tipos;
			$data['codofi']=$codoficina;
			$data['codtipo']=$codtipo;
			$data['serie']=$ser;
			$data['numero']=$num;
			
		}
		$this->load->view("EditOrdenEntrada",$data);
 
	}
	
	
	
	
	public function insertar(){
		header('Content-Type: application/json');		
		
		//INSERTAR ORDEN DE ENTRADA
		$P_cod_SerOrden = addslashes(htmlspecialchars($_POST["cod_SerOrden"]));
		$P_serie = addslashes(htmlspecialchars($_POST["serie"]));
		$P_numero = addslashes(htmlspecialchars($_POST["numero"]));
		$P_fecha = addslashes(htmlspecialchars($_POST["fecha"]));
		$P_cod_cliente = addslashes(htmlspecialchars($_POST["codcliente"]));
		$P_total = addslashes(htmlspecialchars($_POST["total"]));
		$P_obs = addslashes(htmlspecialchars($_POST["obs"]));
		$P_usuario = addslashes(htmlspecialchars($_POST["usuario"]));
		
		$this->load->model('mantOrdenEntrada_m');
		$rpta1=$this->mantOrdenEntrada_m->inserta($P_cod_SerOrden,
												 $P_serie,
												 $P_numero,
												 $P_fecha ,
												 $P_cod_cliente ,
												 $P_total,
												 $P_obs,
												 $P_usuario);
		
		
		
		
		
		//--------------------------------------------------------------------
	
		//INSERTAR DETALLE DE ORDEN DE ENTRADA
		$this->load->model('consOrdenEntrada_m');
		$lst_ult_cod_ord_ent=$this->consOrdenEntrada_m->obt_ult_cod_orden_entrada();
		mysqli_next_result($this->db->conn_id);
		 
		foreach ($lst_ult_cod_ord_ent as $campos) {
			$ult_cod_orden=$campos->ULTIMO;
		}
	
		$cantidad=0;
		$det_factura=json_decode($_POST['detfactura']);
		
		for ($i=0; $i < count($det_factura); $i++) {
		  
			$P_cantidad =$det_factura[$i]->cantidad;
			$P_codproducto =$det_factura[$i]->codproducto;
			$P_obs_producto =$det_factura[$i]->obs;
			$P_precio =$det_factura[$i]->precio;
			
			$this->load->model('MantOrdenEntradaDet_m');
			$resp=$this->MantOrdenEntradaDet_m->inserta($ult_cod_orden,
														$P_cantidad,
														$P_codproducto,
														$P_obs_producto,
														$P_precio,
														$P_usuario
														);
			$cantidad++;
		}
		//------------------------------------------------------------------------
		if(count($det_factura) == $cantidad)
		{ $rpta2=true;
		
		}
		
	   if(!is_null($rpta1) && !empty($rpta1) && !is_null($rpta2) && !empty($rpta2))
		 { 	$rpta=1; }
		
	   else 
	      {$rpta=0;}
		/*	
	       $this->load->model('mantProcess_log_m');
	       $this->mantProcess_log_m->eliminar();
	       
	       
	       $this->load->model('mantProcess_log_m');
	       $this->mantProcess_log_m->inserta( date('Y-m-d H:i:s'),
	       		'insertar',
	       		'$rpta',
	       		$rpta
	       		);
	     */  
	       
	    $json_string =json_encode($rpta);
		echo $json_string;
		
			
	}

	public function editar(){
		header('Content-Type: application/json');
		$P_codigo=addslashes(htmlspecialchars($_POST["codigo"]));
		$P_oficina = addslashes(htmlspecialchars($_POST["oficina"]));
		$P_tipo = addslashes(htmlspecialchars($_POST["tipo"]));
		$P_serie = addslashes(htmlspecialchars($_POST["serie"]));
		$P_numero = addslashes(htmlspecialchars($_POST["numero"]));
		
		$this->load->model('mantOrdenEntrada_m');
		$rpta=$this->mantOrdenEntrada_m->editar($P_codigo,
				                        	 $P_oficina, 	 
											 $P_tipo,
				                             $P_serie,
										     $P_numero
				                             );
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
			
		}
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$P_codserie=addslashes(htmlspecialchars($_POST["codserie"]));
		$this->load->model('mantOrdenEntrada_m');
		$rpta=$this->mantOrdenEntrada_m->eliminar($P_codserie);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	public function prueba()
	{   $prueba=$_POST["prueba"];
		$DATA=json_decode($_POST['dato']);
	
		echo "prueba".$prueba;
	   /*	
	    foreach ($DATA as $campos) {
	      $nombre=$campos->nombre;
	      echo "nombre:".$nombre;
	      echo "<br/>";
	    }*/
	//  print_r($DATA);
    //	die();
		for ($i=0; $i < count($DATA); $i++) {
			//Por cada objeto que encuentra en el array lo separa y crea una query
			$q[$i]  = $DATA[$i]->codproducto."-".$DATA[$i]->cantidad;
			echo $q[$i] . "<br>";
		}
	         
	}
	
	
	
	

}