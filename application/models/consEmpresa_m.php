<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsEmpresa_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($Nombre,$Ruc,$Tlfn)
	{	if($query = $this->db->query("CALL SP_R_EMPRESA_TOT_PAG('".$Nombre."','".$Ruc."','".$Tlfn."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($Numpagina,$Nombre,$Ruc,$Tlfn)
	{	if($query = $this->db->query("CALL SP_R_EMPRESA_OBT_LISTA(".$Numpagina.",'".$Nombre."','".$Ruc."','".$Tlfn."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	
	}
	
	
	public function obt_EMPRESA($codemp)
	{ if($query = $this->db->query("CALL SP_R_EMPRESA_OBT_X_CODIGO('".$codemp."');"))
			{	if($query->num_rows() > 0 )
					{return $query->result();}
					else{ return 0;}
			}
			
	}
	
	
	
		
}
