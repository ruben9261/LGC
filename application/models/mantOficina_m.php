<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantOficina_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
	    $P_cod_emp ,
		$P_nomb_ofi,
		$P_domi,
		$P_tlfn,
		$P_correo  	 
	   )
	{
		if($this->db->query("CALL SP_W_OFICINA_INS(".$P_cod_emp.",'".
													 $P_nomb_ofi."','".	 
													 $P_domi."','".
													 $P_tlfn."','".
													 $P_correo."');"
													))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			$P_cod_ofi,
			$P_cod_emp ,
			$P_nomb_ofi,
			$P_domi,
			$P_tlfn,
			$P_correo  	
	      )
	{
		if($this->db->query("CALL SP_W_OFICINA_ACT(".$P_cod_ofi.",".
				                                     $P_cod_emp.",'".
													 $P_nomb_ofi."','".	 
													 $P_domi."','".
													 $P_tlfn."','".
													 $P_correo."');"
				                                 ))
		{ return 1;}
		else{ return 0;}
	}
	
	
	
	
	public function eliminar($P_cod_ofi)
	{	if($this->db->query("CALL SP_W_OFICINA_ELI(".$P_cod_ofi.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
