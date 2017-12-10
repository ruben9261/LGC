<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsProveedor_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($Nombre,$Nrodocumento,$Tlfn1,$Tlfn2)
	{	if($query = $this->db->query("CALL SP_R_PROVEEDOR_TOT_PAG('".$Nombre."','".$Nrodocumento."','".$Tlfn1."','".$Tlfn2."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($NUMPAGINA,$Nombre,$Nrodocumento,$Tlfn1,$Tlfn2)
	{	if($query = $this->db->query("CALL SP_R_PROVEEDOR_OBT_LISTA(".$NUMPAGINA.",'".$Nombre."','".$Nrodocumento."','".$Tlfn1."','".$Tlfn2."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	
	}
	
	public function obt_ofertas()
	{ if($query = $this->db->query("CALL SP_R_OFERTA_OBT_OFERTAS();"))
		{	if($query->num_rows() > 0 )
			   {return $query->result();}
			else{ return 0;}
		}
	
	}
	
	
	public function obt_proveedor($codprov)
	{ if($query = $this->db->query("CALL SP_R_PROVEEDOR_OBT_X_CODIGO(".$codprov.");"))
	{	if($query->num_rows() > 0 )
	{return $query->result();}
	else{ return 0;}
	}
	
	}
	
	
	
		
}
