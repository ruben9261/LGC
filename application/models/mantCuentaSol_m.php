<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantCuentaSol_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
			    $P_cod_cliente,
	            $P_usu_sol,
	            $P_clave_sol,   
	            $P_pregunta,
	            $P_respuesta
		)
	{
		if($this->db->query("CALL SP_W_CUENTA_SOL_INS(".$P_cod_cliente.",'".
													    $P_usu_sol."','".
													    $P_clave_sol."','".
													    $P_pregunta."','".
													    $P_respuesta."');"))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			    $P_cod_cta_sol,
			    $P_cod_cliente,
	            $P_usu_sol,
	            $P_clave_sol,   
	            $P_pregunta,
	            $P_respuesta
	      )
	{
		if($this->db->query("CALL SP_W_CUENTA_SOL_ACT(".$P_cod_cta_sol.",".
														$P_cod_cliente.",'".
													    $P_usu_sol."','".
													    $P_clave_sol."','".
													    $P_pregunta."','".
													    $P_respuesta."');"))
	
		 { return 1;}
		 else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_codigo)
	{	if($this->db->query("CALL SP_W_CUENTA_SOL_ELI(".$P_codigo.");"))
		    { return 1; }
		else{ return 0; }
	}
	
	

	public function eliminar_x_cliente($P_codigo)
	{	if($this->db->query("CALL SP_W_CUENTA_SOL_ELI_X_CLIENTE(".$P_codigo.");"))
		{ return 1; }
		else{ return 0; }
	}
	
	
	
}
