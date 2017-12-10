<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsCliente_c extends CI_Controller{
	
	
	public function _construct()
	{   parent::_construct();
		$this->load->helper('url');
		$this->load->model('consCliente_m');
				
	}
	
	
	public function index() {
		$this->load->view("GestionCliente");
	 }

	 
	public function mostrar_Seleccion_Cliente()
	{	   $this->load->view("CreaOrdenEntrada1");
				
	}
	 
	 
	 
	 public function mostrar_Consulta() {
	 	$this->load->view("ConsultaCliente");
	 }
	 
	 
		
	public function obt_datos(){
		header('Content-Type: application/json');
		$Nombre = addslashes(htmlspecialchars($_POST["nombre"]));
		$documento = addslashes(htmlspecialchars($_POST["documento"]));
		$numpagina = addslashes(htmlspecialchars($_POST["pagina"]));
		
		$this->load->model('consCliente_m');
		$totalpaginas=$this->consCliente_m->obt_totpaginas($Nombre,$documento);
		mysqli_next_result($this->db->conn_id);
		if($numpagina==-1)
		   {  $datos=$this->consCliente_m->obt_lista(1,$Nombre,$documento);
		   }
		else 
		   { $datos=$this->consCliente_m->obt_lista($numpagina,$Nombre,$documento);
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
	
	
	
	public function mostrar_ver($codigo=null)
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
			$razon=$campos->NOMBRE;
			$tipo_doc=$campos->TIPO_DOC;
			$nrodoc=$campos->NRO_DOCUMENTO;
			$regimen=$campos->REG_DES;
			$estado=$campos->EST_DES;
			$clasificacion=$campos->CLAS_DES;
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
			
		$data['listcontactos']=$lstcontactos;
		$data['listactividades']=$lstactividades;
		$data['razon']=$razon;
		$data['tipodoc']=$tipo_doc;
		$data['documento']=$nrodoc;
		$data['udr']=$udr;
		$data['regimen']=$regimen;
		$data['estado']=$estado;
		$data['clasificacion']=$clasificacion;
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
	$this->load->view("VerCliente",$data);
	
	}
	
	

}