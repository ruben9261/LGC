<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantImpuesto_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
	    $P_nombre,
		$P_abreviatura,
		$P_valor
	   )
	{
		if($this->db->query("CALL SP_W_IMPUESTO_INS('".$P_nombre."','".$P_abreviatura."',".$P_valor.");"))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			$P_codigo,
			$P_nombre,
		    $P_abreviatura,
			$P_valor
	      )
	{
		if($this->db->query("CALL SP_W_IMPUESTO_ACT(".$P_codigo.",'".$P_nombre."','".$P_abreviatura."',".$P_valor.");"))
		{ return 1;}
		else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_codigo)
	{	if($this->db->query("CALL SP_W_IMPUESTO_ELI(".$P_codigo.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
