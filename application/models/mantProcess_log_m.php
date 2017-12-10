<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantProcess_log_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
	    $P_fecha,
		$P_funcion,
	    $P_variable,
	    $P_valor		
	   )
	{
		if($this->db->query("CALL SP_W_PROCESS_LOG_INS('" .$P_fecha."','"
														  .$P_funcion."','"
														  .$P_variable."','"
														  .$P_valor."');"
				           )
		  )
		    { return 1;}
		else{ return 0;}
	}
	


	public function eliminar()
	{	if($this->db->query("CALL SP_W_PROCESS_LOG_ELI();"))
	{ return 1; }
	else{ return 0; }
	}
}
