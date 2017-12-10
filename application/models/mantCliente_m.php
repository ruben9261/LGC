<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantCliente_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
			$P_nombre,
			$P_cod_tip_doc,
			$P_nro_doc,
			$P_cod_reg,
			$P_cod_estado,
			$P_cod_clas   
		)
	{
		if($this->db->query("CALL SP_W_CLIENTE_INS('" .$P_nombre."',".
													   $P_cod_tip_doc.",'".
													   $P_nro_doc."',".
													   $P_cod_reg.",".
													   $P_cod_estado.",".
													   $P_cod_clas.");"))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			$P_codigo,
			$P_nombre,
			$P_cod_tip_doc,
			$P_nro_doc,
			$P_cod_reg,
			$P_cod_estado,
			$P_cod_clas
		 )
	{
		if($this->db->query("CALL SP_W_CLIENTE_ACT(".$P_codigo.",'".
				                                     $P_nombre."',".
													 $P_cod_tip_doc.",'".
													 $P_nro_doc."',".
													 $P_cod_reg.",".
													 $P_cod_estado.",".
													 $P_cod_clas.");"))
		{ return 1;}
		else{ return 0;}
	}
	
	
	public function eliminar($P_codigo)
	{	if($this->db->query("CALL SP_W_CLIENTE_ELI(".$P_codigo.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
