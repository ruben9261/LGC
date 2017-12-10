<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantDetraccion_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
			$P_cod_cliente,
	        $P_nrocuenta,   
			$P_usuario_bn,
			$P_clave_bn
	     )
	{
		if($this->db->query("CALL SP_W_DETRACCION_INS(".$P_cod_cliente.",'".
													    $P_nrocuenta."','".
													    $P_usuario_bn."','".
													    $P_clave_bn."');"))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			$P_cod_detract,
			$P_cod_cliente,
	        $P_nrocuenta,   
			$P_usuario_bn,
			$P_clave_bn
	      )
	{
		if($this->db->query("CALL SP_W_DETRACCION_ACT(".$P_cod_detract.",".
														$P_cod_cliente.",'".
													    $P_nrocuenta."','".
													    $P_usuario_bn."','".
													    $P_clave_bn."');"))
	
		 { return 1;}
		 else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_codigo)
	{	if($this->db->query("CALL SP_W_DETRACCION_ELI(".$P_codigo.");"))
		    { return 1; }
		else{ return 0; }
	}
	
	public function eliminar_x_cliente($P_codigo)
	{	if($this->db->query("CALL SP_W_DETRACCION_ELI_X_CLIENTE(".$P_codigo.");"))
		{ return 1; }
		else{ return 0; }
	}
	
}
