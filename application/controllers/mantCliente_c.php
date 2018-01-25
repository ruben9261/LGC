<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantCliente_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantCliente_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionCliente");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->model('consCliente_m');
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
		
		
		$data['tipodoc']=$tipodoc;
		$data['regimenes']=$regimen;
		$data['estados']=$estado;
		$data['clasificaciones']=$clasificacion;
		$data['actividades']=$actividad;
		$data['contactos']=$contacto;
		$this->load->view("CreaCliente",$data);
		 
	}
	

	public function mostrar_Editar($codigo=null)
	{ if($codigo)
		{ 	

			$this->load->model('consDetContCli_m');
			$lstcontactos=$this->consDetContCli_m->obt_Det_Contactos_x_Cliente($codigo);
			mysqli_next_result($this->db->conn_id);
			
			
			$this->load->model('consDetActCli_m');
			$lstactividades=$this->consDetActCli_m->obt_Det_Actividades_x_Cliente($codigo);
			mysqli_next_result($this->db->conn_id);
				
			
			$this->load->model('consCliente_m');
			$Cliente=$this->consCliente_m->obt_Cliente($codigo);
			mysqli_next_result($this->db->conn_id);
	   
	   	  foreach ($Cliente as $campos) {
				$nombre=$campos->NOMBRE;
				$codtipodoc=$campos->COD_TIPO_DOC;
				$nrodoc=$campos->NRO_DOCUMENTO;
				$codreg=$campos->COD_REGIMEN;
				$codest=$campos->COD_ESTADO;
				$codclas=$campos->COD_CLASIFICACION;
			}
	
			$udr=substr ($nrodoc,strlen($nrodoc)-1,1);
			
	    	$this->load->model('consCuenta_Sol_m');
			$CuentaSol=$this->consCuenta_Sol_m->obt_CuentaSol($codigo);
			mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($CuentaSol as $campos) {
				$codctasol=$campos->COD_CTA_SOL;
				$usu_sol=$campos->USU_SOL;
				$clave_sol=$campos->CLAVE_SOL;
				$pregunta=$campos->PREGUNTA;
				$respuesta=$campos->RESPUESTA;
				
			}
			
			$this->load->model('consCuenta_Afp_m');
			$CuentaAfp=$this->consCuenta_Afp_m->obt_CuentaAfp($codigo);
			mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($CuentaAfp as $campos) {
				$codctaafp=$campos->COD_CTA_AFP;
				$usu_afp=$campos->USU_AFP;
				$clave_afp=$campos->CLAVE_AFP;
			
			}
			
			
			$this->load->model('consDetraccion_m');
			$CuentaAfp=$this->consDetraccion_m->obt_Detraccion($codigo);
			mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($CuentaAfp as $campos) {
				$coddetrac=$campos->COD_DETRACT;
				$nrocuenta=$campos->NRO_CUENTA;
				$usu_bn=$campos->USUARIO_BN;
				$clave_bn=$campos->CLAVE_BN;
			}
			
			
			$this->load->model('consCliente_m');
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
			
			$data['cod_Cliente']=$codigo;
			$data['contactos']=$contacto;	
			$data['listcontactos']=$lstcontactos;
			$data['actividades']=$actividad;
			$data['listactividades']=$lstactividades;
			$data['tipodoc']=$tipodoc;
			$data['regimenes']=$regimen;
			$data['estados']=$estado;
			$data['clasificaciones']=$clasificacion;
			$data['nombre']=$nombre;
			$data['codtipo']=$codtipodoc;
			$data['nrodoc']=$nrodoc;
			$data['udr']=$udr;
			$data['codreg']=$codreg;
			$data['codest']=$codest;
			$data['codclas']=$codclas;
			$data['cod_cta_sol']=$codctasol;
			$data['usu_sol']=$usu_sol;
			$data['clave_sol']=$clave_sol;
			$data['pregunta']=$pregunta;
			$data['respuesta']=$respuesta;
			$data['cod_cta_afp']=$codctaafp;
			$data['usu_afp']=$usu_afp;
			$data['clave_afp']=$clave_afp;
			$data['cod_detraccion']=$coddetrac;
			$data['nrocuenta']=$nrocuenta;
			$data['usu_bn']=$usu_bn;
			$data['clave_bn']=$clave_bn;
			
		}
		$this->load->view("EditCliente",$data);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');
		$P_contactos =addslashes(htmlspecialchars($_POST["contactos"]));
	    $P_actividades =addslashes(htmlspecialchars($_POST["actividades"]));
		
	    
	    
		$P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$P_tipo = addslashes(htmlspecialchars($_POST["tipo"]));
		$P_documento = addslashes(htmlspecialchars($_POST["documento"]));
		$P_regimen = addslashes(htmlspecialchars($_POST["regimen"]));
		$P_estado = addslashes(htmlspecialchars($_POST["estado"]));
		$P_clasificacion = addslashes(htmlspecialchars($_POST["clasificacion"]));
	   
		
		$P_usu_sol = addslashes(htmlspecialchars($_POST["usu_sol"]));
		$P_clave_sol = addslashes(htmlspecialchars($_POST["clave_sol"]));
		$P_pregunta = addslashes(htmlspecialchars($_POST["pregunta"]));
		$P_respuesta = addslashes(htmlspecialchars($_POST["respuesta"]));

		$P_usu_afp = addslashes(htmlspecialchars($_POST["usu_afp"]));
		$P_clave_afp = addslashes(htmlspecialchars($_POST["clave_afp"]));
		
		
		$P_nrocuenta = addslashes(htmlspecialchars($_POST["nrocuenta"]));
		$P_usu_bn = addslashes(htmlspecialchars($_POST["usu_bn"]));
		$P_clave_bn = addslashes(htmlspecialchars($_POST["clave_bn"]));
		
	
		
		$this->load->model('mantCliente_m');
		$rpta1=$this->mantCliente_m->inserta($P_nombre,
											 $P_tipo,
											 $P_documento,
											 $P_regimen,
											 $P_estado,                        
											 $P_clasificacion
											);
		
	
		$this->load->model('consCliente_m');
	    $lst_ult_cod_cli=$this->consCliente_m->obt_ult_cod_cliente();
		mysqli_next_result($this->db->conn_id);
	    
		foreach ($lst_ult_cod_cli as $campos) {
			  $ult_cod_cli=$campos->ULTIMO;
		}
		
		/*
		$this->load->model('mantPrueba_m');
		$resp=$this->mantPrueba_m->inserta('ult_cod_cli-'. $ult_cod_cli);
		*/
		
		$longcontactos=strlen($P_contactos);
		$numcomas=substr_count($P_contactos, ',');
		$cantins1=0;
		$V_contactos = str_split($P_contactos);
		for($i=0;$i<count($V_contactos);$i++)
		{   if($V_contactos[$i]!=',')
			{   $cod_contact=$V_contactos[$i];
				$this->load->model('mantDetContCli_m');
			    $resp=$this->mantDetContCli_m->inserta($ult_cod_cli,$cod_contact);
			    $cantins1++;
			    /*$this->load->model('mantPrueba_m');
			     $resp=$this->mantPrueba_m->inserta('cod_contac-'.$cod_contact);*/
			}
		}
		
		
		if(($longcontactos-$numcomas)== $cantins1)
		  { $rpta2=true;}
		
		
		  $longactividades=strlen($P_actividades);
		  $numcomas=substr_count($P_actividades, ',');
		  $cantins2=0;
		  $V_actividades = str_split($P_actividades);
		  for($i=0;$i<count($V_actividades);$i++)
		  {   if($V_actividades[$i]!=',')
			  {  $cod_act=$V_actividades[$i];
				  $this->load->model('mantDetActCli_m');
				  $resp=$this->mantDetActCli_m->inserta($ult_cod_cli,$cod_act);
				  $cantins2++;
							
				/* $this->load->model('mantPrueba_m');
				   $resp=$this->mantPrueba_m->inserta('cod_act-'. $cod_act);*/
			  }
		  }
		  
		  if(($longactividades-$numcomas)== $cantins2)
		  { $rpta3=true;}
		  
		
		
		
		$this->load->model('mantCuentaSol_m');
		$rpta4=$this->mantCuentaSol_m->inserta( $ult_cod_cli,
												$P_usu_sol,
												$P_clave_sol,
												$P_pregunta,
												$P_respuesta 
											   );
		
		$this->load->model('mantCuentaAfp_m');
		$rpta5=$this->mantCuentaAfp_m->inserta($ult_cod_cli,
											   $P_usu_afp,
										       $P_clave_afp 
											   );
		
		$this->load->model('mantDetraccion_m');
		$rpta6=$this->mantDetraccion_m->inserta($ult_cod_cli,
												$P_nrocuenta,
												$P_usu_bn,
												$P_clave_bn
												);
		
		
		
		if(!is_null($rpta1) && !empty($rpta1) &&  !is_null($rpta2) && !empty($rpta2) &&
		   !is_null($rpta3) && !empty($rpta3) &&  !is_null($rpta4) && !empty($rpta4) &&
		   !is_null($rpta5) && !empty($rpta5) &&  !is_null($rpta6) && !empty($rpta6))
		 { 	$rpta=1; }
		
		 else 
	       {$rpta=0;}

	      $json_string =json_encode($rpta);
		  echo $json_string;
		  
	}
	
	

	public function insertar_creaOrdenEntrada(){
		header('Content-Type: application/json');
		
		/*============== 1. insertamos contacto  ================*/
		
		$P_nombre= addslashes(htmlspecialchars($_POST["nombre"]));
		$P_tlfn1= addslashes(htmlspecialchars($_POST["tlfn"]));
		$P_tlfn2= '';
		$P_correo= '';
		$P_domicilio= addslashes(htmlspecialchars($_POST["domicilio"]));
		$P_orden= 0;
		$this->load->model('mantContacto_m');
		$rpta0=$this->mantContacto_m->inserta($P_nombre,$P_tlfn1,$P_tlfn2,$P_correo,$P_domicilio,$P_orden);
		
			
		
		/*=================== 2. obtenemos �ltimo c�digo registrado ================*/
		
		$P_razon_social= addslashes(htmlspecialchars($_POST["razon_social"]));
		$P_tipo=addslashes(htmlspecialchars($_POST["tipo"]));
		$P_documento=addslashes(htmlspecialchars($_POST["documento"]));
		$P_regimen=1;
		$P_estado=1;
		$P_clasificacion =1;
	
	
		$P_usu_sol='';
		$P_clave_sol= '';
		$P_pregunta='';
		$P_respuesta='';
	
		$P_usu_afp= '';
		$P_clave_afp= '';
	
		$P_nrocuenta= '';
		$P_usu_bn= '';
		$P_clave_bn= '';
	
	
	
		$this->load->model('mantCliente_m');
		$rpta1=$this->mantCliente_m->inserta($P_razon_social,
											 $P_tipo,
											 $P_documento,
											 $P_regimen,
											 $P_estado,
											 $P_clasificacion
											);
							
	
		$this->load->model('consCliente_m');
		$lst_ult_cod_cli=$this->consCliente_m->obt_ult_cod_cliente();
		mysqli_next_result($this->db->conn_id);
		 
		foreach ($lst_ult_cod_cli as $campos) {
			$ult_cod_cli=$campos->ULTIMO;
		}
	
		
		$this->load->model('consContacto_m');
		$lst_ult_cod_contacto=$this->consContacto_m->obt_ult_cod_contacto();
		mysqli_next_result($this->db->conn_id);
			
		foreach ($lst_ult_cod_contacto as $campos) {
			$ult_cod_contacto=$campos->ULTIMO;
		}
		
		
		
		
		
		$this->load->model('mantDetContCli_m');
		$rpta2=$this->mantDetContCli_m->inserta($ult_cod_cli,$ult_cod_contacto);
	
	
	
		$cod_act=1;
		$this->load->model('mantDetActCli_m');
		$rpta3=$this->mantDetActCli_m->inserta($ult_cod_cli,$cod_act);
		
	
	
		$this->load->model('mantCuentaSol_m');
		$rpta4=$this->mantCuentaSol_m->inserta( $ult_cod_cli,
												$P_usu_sol,
												$P_clave_sol,
												$P_pregunta,
												$P_respuesta
												);
									
		$this->load->model('mantCuentaAfp_m');
		$rpta5=$this->mantCuentaAfp_m->inserta($ult_cod_cli,
												$P_usu_afp,
												$P_clave_afp
												);
	
		$this->load->model('mantDetraccion_m');
		$rpta6=$this->mantDetraccion_m->inserta($ult_cod_cli,
												$P_nrocuenta,
												$P_usu_bn,
												$P_clave_bn
											  );
	
	
		$this->load->model('mantProcess_log_m');
		$this->mantProcess_log_m->eliminar();
		
		
		$this->load->model('mantProcess_log_m');
		$this->mantProcess_log_m->inserta(   date('Y-m-d H:i:s'),
											'insert_creaOrdenE',
											'rpta0',
											 $rpta0
											);
		
		$this->load->model('mantProcess_log_m');
		$this->mantProcess_log_m->inserta(  date('Y-m-d H:i:s'),
				'insert_creaOrdenE',
				'rpta1',
				$rpta1
				);
		
		$this->load->model('mantProcess_log_m');
		$this->mantProcess_log_m->inserta( date('Y-m-d H:i:s'),
				'insert_creaOrdenE',
				'rpta2',
				$rpta2
				);
		
		
		$this->load->model('mantProcess_log_m');
		$this->mantProcess_log_m->inserta( date('Y-m-d H:i:s'),
				'insert_creaOrdenE',
				'rpta3',
				$rpta3
				);
		
		
		$this->load->model('mantProcess_log_m');
		$this->mantProcess_log_m->inserta( date('Y-m-d H:i:s'),
				'insert_creaOrdenE',
				'rpta4',
				$rpta4
				);
		
		

		$this->load->model('mantProcess_log_m');
		$this->mantProcess_log_m->inserta( date('Y-m-d H:i:s'),
				'insert_creaOrdenE',
				'rpta5',
				$rpta5
				);
		

		$this->load->model('mantProcess_log_m');
		$this->mantProcess_log_m->inserta( date('Y-m-d H:i:s'),
				'insert_creaOrdenE',
				'rpta6',
				 $rpta6
				);
		
		
		
	
		if(!is_null($rpta0) && !empty($rpta0) && !is_null($rpta1) && !empty($rpta1) &&  
		   !is_null($rpta2) && !empty($rpta2) && !is_null($rpta3) && !empty($rpta3) &&  
		   !is_null($rpta4) && !empty($rpta4) && !is_null($rpta5) && !empty($rpta5) &&  
		   !is_null($rpta6) && !empty($rpta6) )
		 { 	$rpta=1; }
		 else
		  { $rpta=0;}
	
		  $this->load->model('mantProcess_log_m');
		  $this->mantProcess_log_m->inserta( date('Y-m-d H:i:s'),
		  		'insert_creaOrdenE',
		  		'rpta',
		  		 $rpta
		  		);
		  
		  
		$json_string =json_encode($rpta);
		echo $json_string;
	
	}
	
	
	
	public function editar(){
		header('Content-Type: application/json');
		
		$P_cod_cliente=addslashes(htmlspecialchars($_POST["cod_cliente"]));
		$P_cod_cta_sol=addslashes(htmlspecialchars($_POST["cod_cta_sol"]));
		$P_cod_cta_afp =addslashes(htmlspecialchars($_POST["cod_cta_afp"]));
		$P_cod_detraccion=addslashes(htmlspecialchars($_POST["cod_detraccion"]));
		
		
		$P_contactos =addslashes(htmlspecialchars($_POST["contactos"]));
		$P_actividades =addslashes(htmlspecialchars($_POST["actividades"]));
		
		$P_nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$P_tipo = addslashes(htmlspecialchars($_POST["tipo"]));
		$P_documento = addslashes(htmlspecialchars($_POST["documento"]));
		$P_regimen = addslashes(htmlspecialchars($_POST["regimen"]));
		$P_estado = addslashes(htmlspecialchars($_POST["estado"]));
		$P_clasificacion = addslashes(htmlspecialchars($_POST["clasificacion"]));
		
		
		$P_usu_sol = addslashes(htmlspecialchars($_POST["usu_sol"]));
		$P_clave_sol = addslashes(htmlspecialchars($_POST["clave_sol"]));
		$P_pregunta = addslashes(htmlspecialchars($_POST["pregunta"]));
		$P_respuesta = addslashes(htmlspecialchars($_POST["respuesta"]));
		
		$P_usu_afp = addslashes(htmlspecialchars($_POST["usu_afp"]));
		$P_clave_afp = addslashes(htmlspecialchars($_POST["clave_afp"]));
		
		
		$P_nrocuenta = addslashes(htmlspecialchars($_POST["nrocuenta"]));
		$P_usu_bn = addslashes(htmlspecialchars($_POST["usu_bn"]));
		$P_clave_bn = addslashes(htmlspecialchars($_POST["clave_bn"]));
		
		$this->load->model('mantCliente_m');
		$rpta1=$this->mantCliente_m->editar($P_cod_cliente,
										   $P_nombre,
										   $P_tipo,
										   $P_documento,
										   $P_regimen,
										   $P_estado,
										   $P_clasificacion
										 );
		
	
		/*
		 $this->load->model('mantPrueba_m');
		 $resp=$this->mantPrueba_m->inserta('ult_cod_cli-'. $ult_cod_cli);
		 */
		
		$this->load->model('mantDetContCli_m');
		$resp=$this->mantDetContCli_m->eliminar_x_cliente($P_cod_cliente);
		
		$this->load->model('mantDetActCli_m');
		$resp=$this->mantDetActCli_m->eliminar_x_cliente($P_cod_cliente);
		
		
		$longcontactos=strlen($P_contactos);
		$numcomas=substr_count($P_contactos, ',');
		$cantins1=0;
		$V_contactos = str_split($P_contactos);
		for($i=0;$i<count($V_contactos);$i++)
		{   if($V_contactos[$i]!=',')
			{   $cod_contact=$V_contactos[$i];
				$this->load->model('mantDetContCli_m');
				$resp=$this->mantDetContCli_m->inserta($P_cod_cliente,$cod_contact);
				$cantins1++;
			/*$this->load->model('mantPrueba_m');
			 $resp=$this->mantPrueba_m->inserta('cod_contac-'.$cod_contact);*/
			}
		}
		
		
		if(($longcontactos-$numcomas)== $cantins1)
			{ $rpta2=true;}
		
		
		$longactividades=strlen($P_actividades);
		$numcomas=substr_count($P_actividades, ',');
		$cantins2=0;
		$V_actividades = str_split($P_actividades);
		for($i=0;$i<count($V_actividades);$i++)
		{   if($V_actividades[$i]!=',')
			{   $cod_act=$V_actividades[$i];
				$this->load->model('mantDetActCli_m');
				$resp=$this->mantDetActCli_m->inserta($P_cod_cliente,$cod_act);
				$cantins2++;
				
			/* $this->load->model('mantPrueba_m');
			 $resp=$this->mantPrueba_m->inserta('cod_act-'. $cod_act);*/
		   }
		}
		
		if(($longactividades-$numcomas)== $cantins2)
		{ $rpta3=true;}
		
		
		
		
		$this->load->model('mantCuentaSol_m');
		$rpta4=$this->mantCuentaSol_m->editar($P_cod_cta_sol,
											  $P_cod_cliente,
											  $P_usu_sol,
											  $P_clave_sol,
											  $P_pregunta,
											  $P_respuesta
									         );
		
		$this->load->model('mantCuentaAfp_m');
		$rpta5=$this->mantCuentaAfp_m->editar($P_cod_cta_afp,
				                              $P_cod_cliente,
											  $P_usu_afp,
											  $P_clave_afp
											  );
		
		$this->load->model('mantDetraccion_m');
		$rpta6=$this->mantDetraccion_m->editar( $P_cod_detraccion,
												$P_cod_cliente,
											    $P_nrocuenta,   
												$P_usu_bn,
												$P_clave_bn
											  );
		
		
		
		if(!is_null($rpta1) && !empty($rpta1) &&  !is_null($rpta2) && !empty($rpta2) &&
				!is_null($rpta3) && !empty($rpta3) &&  !is_null($rpta4) && !empty($rpta4) &&
				!is_null($rpta5) && !empty($rpta5) &&  !is_null($rpta6) && !empty($rpta6))
		   { $rpta=1; }
		else
		   { $rpta=0;}
		
		$json_string =json_encode($rpta);
		echo $json_string;
		
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$P_codigo=addslashes(htmlspecialchars($_POST["codigo"]));
		
		
		
		$this->load->model('mantDetContCli_m');
		$rpta1=$this->mantDetContCli_m->eliminar_x_cliente($P_codigo);
		
		$this->load->model('mantDetActCli_m');
		$rpta2=$this->mantDetActCli_m->eliminar_x_cliente($P_codigo);
				
		$this->load->model('mantCuentaAfp_m');
		$rpta3=$this->mantCuentaAfp_m->eliminar_x_cliente($P_codigo);
		
		$this->load->model('mantCuentaSol_m');
		$rpta4=$this->mantCuentaSol_m->eliminar_x_cliente($P_codigo);
		
		$this->load->model('mantDetraccion_m');
		$rpta5=$this->mantDetraccion_m->eliminar_x_cliente($P_codigo);
		
		$this->load->model('mantCliente_m');
		$rpta6=$this->mantCliente_m->eliminar($P_codigo);
		

		if(!is_null($rpta1) && !empty($rpta1) &&  !is_null($rpta2) && !empty($rpta2) &&
		   !is_null($rpta3) && !empty($rpta3) &&  !is_null($rpta4) && !empty($rpta4) &&
		   !is_null($rpta5) && !empty($rpta5) &&  !is_null($rpta6) && !empty($rpta6))
		{ $rpta=1; }
		else
		{ $rpta=0;}
		
		$json_string =json_encode($rpta);
		echo $json_string;
		
	
	}
	
	
	public function mostrar($cadena)
	{	v_dump($cadena);
	
	}
	
	

}