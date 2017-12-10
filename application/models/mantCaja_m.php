<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantCaja_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
	         $P_cod_ofi,
	         $P_desc_caja,
             $P_tipo_caja   	  
	        )
	{
		if($this->db->query("CALL SP_W_CAJA_INS(".$P_cod_ofi.",'".
												  $P_desc_caja."','".	 
												  $P_tipo_caja."');"
											))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			$P_cod_caja,
			$P_cod_ofi,
	        $P_desc_caja,
            $P_tipo_caja   
	      )
	{
		if($this->db->query("CALL SP_W_CAJA_ACT(".$P_cod_caja.",".
				                                  $P_cod_ofi.",'".
												  $P_desc_caja."','".
												  $P_tipo_caja."');"
				                                 ))
		{ return 1;}
		 else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_cod_caja)
	{	if($this->db->query("CALL SP_W_CAJA_ELI(".$P_cod_caja.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
