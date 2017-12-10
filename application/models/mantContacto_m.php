<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantContacto_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta(
			   	$P_nomb_contacto,
				$P_tlfn1,
				$P_tlfn2,
                $P_correo,
			    $P_domicilio,
				$P_orden  
		)
	{
		if($this->db->query("CALL SP_W_CONTACTO_INS('".$P_nomb_contacto."','".
													   $P_tlfn1."','".
													   $P_tlfn2."','".
													   $P_correo."','".
													   $P_domicilio."',".
													   $P_orden.");"))
		    { return 1;}
		else{ return 0;}
	}
	

	
	public function editar(
			$P_codigo,
			$P_nomb_contacto,
			$P_tlfn1,
			$P_tlfn2,
            $P_correo,
			$P_domicilio,
			$P_orden  
	      )
	{
		if($this->db->query("CALL SP_W_CONTACTO_ACT(".$P_codigo.",'".
				                                      $P_nomb_contacto."','".
													  $P_tlfn1."','".
													  $P_tlfn2."','".
													  $P_correo."','".
													  $P_domicilio."',".
													  $P_orden.");"))
		{ return 1;}
		else{ return 0;}
	}
	
	
	
	
	
	public function eliminar($P_codigo)
	{	if($this->db->query("CALL SP_W_CONTACTO_ELI(".$P_codigo.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
