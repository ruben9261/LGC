<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantDetActCli_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
			$P_cod_cli,
			$P_cod_act
		)
	{
		if($this->db->query("CALL SP_W_DET_ACT_CLIENTE_INS(".$P_cod_cli.",".$P_cod_act.");"))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			    $P_codigo,
			    $P_cod_cli,
			    $P_cod_act
	      )
	{
		if($this->db->query("CALL SP_W_DET_ACT_CLIENTE_ACT(".$P_codigol.",".$P_cod_cli.",".$P_cod_act.");"))
	
		 { return 1;}
		 else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_codigo)
	{	if($this->db->query("CALL SP_W_DET_ACT_CLIENTE_ELI(".$P_codigo.");"))
		    { return 1; }
		else{ return 0; }
	}
	
	public function eliminar_x_cliente($P_codigo)
	{	if($this->db->query("CALL SP_W_DET_ACTIVIDAD_CLIENTE_ELI_X_CLIENTE(".$P_codigo.");"))
		{ return 1; }
		else{ return 0; }
	}
	
	
	
	
	
	
}
