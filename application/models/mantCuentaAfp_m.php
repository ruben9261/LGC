<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantCuentaAfp_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
			 $P_cod_cli,
             $P_usu_afp,
	         $P_clave_afp
		)
	{
		if($this->db->query("CALL SP_W_CUENTA_AFP_INS(".$P_cod_cli.",'".$P_usu_afp."','".$P_clave_afp."');"))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			 $P_codigo,
			 $P_cod_cli,
             $P_usu_afp,
	         $P_clave_afp
	      )
	{
		if($this->db->query("CALL SP_W_CUENTA_AFP_ACT(".$P_codigo.",".$P_cod_cli.",'".$P_usu_afp."','".$P_clave_afp."');"))
		{ return 1;}
		else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_codigo)
	{	if($this->db->query("CALL SP_W_CUENTA_AFP_ELI(".$P_codigo.");"))
		    { return 1; }
		else{ return 0; }
	}
	
	
	public function eliminar_x_cliente($P_codigo)
	{	if($this->db->query("CALL SP_W_CUENTA_AFP_ELI_X_CLIENTE(".$P_codigo.");"))
		{ return 1; }
		else{ return 0; }
	}
	
	
	
}
