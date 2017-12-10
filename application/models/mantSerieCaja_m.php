<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantSerieCaja_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
	         $P_codcaja,
	         $P_serie,
             $P_numero)
	{
		if($this->db->query("CALL SP_W_SERIE_CAJA_INS(".$P_codcaja.",'".
												   $P_serie."','".	 
												   $P_numero."');"
											   ))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			 $P_cod_serie,
			 $P_codcaja,
	         $P_serie,
             $P_numero)
	{
		if($this->db->query("CALL SP_W_SERIE_CAJA_ACT(".$P_cod_serie.",".
				                                   $P_codcaja.",'".
												   $P_serie."','".
												   $P_numero."');"
				                                 ))
		{ return 1;}
		 else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_cod_serie)
	{	if($this->db->query("CALL SP_W_SERIE_CAJA_ELI(".$P_cod_serie.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
