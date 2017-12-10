<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantBanco_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
	    $P_nombre
	   )
	{
		if($this->db->query("CALL SP_W_BANCO_INS('" .$P_nombre."');"))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			$P_codigo,
			$P_nombre
	      )
	{
		if($this->db->query("CALL SP_W_BANCO_ACT(".$P_codigo.",'".
				                                   $P_nombre."');"
				                                ))
		{ return 1;}
		else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_codigo)
	{	if($this->db->query("CALL SP_W_BANCO_ELI(".$P_codigo.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
