<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantProveedor_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
	    $P_cod_ofer, 	 
		$P_nombre,
		$P_nro_doc,	 
		$P_tlfn1,
		$P_tlfn2,
		$P_correo1,
		$P_correo2,
		$P_comentario)
	{
		if($this->db->query("CALL SP_W_PROVEEDOR_INS(".$P_cod_ofer.",'".	 
													   $P_nombre."','".
													   $P_nro_doc."','".	 
													   $P_tlfn1."','".
													   $P_tlfn2."','".
													   $P_correo1."','".
													   $P_correo2."','".
													   $P_comentario."'
													 );"
													))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			$P_cod_prov,
			$P_cod_ofer,
			$P_nombre,
			$P_nro_doc,
			$P_tlfn1,
			$P_tlfn2,
			$P_correo1,
			$P_correo2,
			$P_comentario)
	{
		if($this->db->query("CALL SP_W_PROVEEDOR_ACT(".$P_cod_prov.",".
													   $P_cod_ofer.",'".
													   $P_nombre."','".
													   $P_nro_doc."','".
													   $P_tlfn1."','".
													   $P_tlfn2."','".
													   $P_correo1."','".
													   $P_correo2."','".
													   $P_comentario."');"
				                                     ))
		{ return 1;}
		else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_cod_prov)
	{	if($this->db->query("CALL SP_W_PROVEEDOR_ELI(".$P_cod_prov.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
