<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantEmpresa_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
	    $P_nombre,
		$P_domicilio,	 
		$P_ruc,
		$P_tlfn,
		$P_correo
	   )
	{
		if($this->db->query("CALL SP_W_EMPRESA_INS('" .$P_nombre."','".
													   $P_domicilio."','".	 
													   $P_ruc."','".
													   $P_tlfn."','".
													   $P_correo."'
													 );"
													))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			$P_cod_emp,
			$P_nombre,
			$P_domicilio,	 
			$P_ruc,
			$P_tlfn,
			$P_correo
	      )
	{
		if($this->db->query("CALL SP_W_EMPRESA_ACT(".$P_cod_emp.",'".
				                                     $P_nombre."','".
													 $P_domicilio."','".
													 $P_ruc."','".
													 $P_tlfn."','".
													 $P_correo."');"
				                                 ))
		{ return 1;}
		else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_cod_emp)
	{	if($this->db->query("CALL SP_W_EMPRESA_ELI(".$P_cod_emp.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
