<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantSerieGuia_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
	         $P_oficina,
			 $P_tipo,
	         $P_serie,
             $P_numero)
	{
		if($this->db->query("CALL SP_W_SERIE_GUIA_INS(".$P_oficina.",'".
														$P_tipo."','".
												        $P_serie."','".	 
												        $P_numero."');"
											   ))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			 $P_codigo,
			 $P_oficina,
			 $P_tipo,
	         $P_serie,
             $P_numero)
	{
		if($this->db->query("CALL SP_W_SERIE_GUIA_ACT(".$P_codigo.",".
														$P_oficina.",".
				                                   		$P_tipo.",'".
												   		$P_serie."','".
												   		$P_numero."');"
				                                 ))
		{ return 1;}
		 else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_codigo)
	{	if($this->db->query("CALL SP_W_SERIE_GUIA_ELI(".$P_codigo.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
