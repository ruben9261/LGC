<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsCaja_m extends CI_Model {
		
	public function _construct()
	{	parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($oficina,$empresa,$caja)
	{	if($query = $this->db->query("CALL SP_R_CAJA_TOT_PAG('".$oficina."','".$empresa."','".$caja."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($Numpagina,$oficina,$empresa,$caja)
	{	if($query = $this->db->query("CALL SP_R_CAJA_OBT_LISTA(".$Numpagina.",'".$oficina."','".$empresa."','".$caja."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	}
	
	
	public function obt_caja($codcaja)
	{ if($query = $this->db->query("CALL SP_R_CAJA_OBT_X_CODIGO(".$codcaja.");"))
			{	if($query->num_rows() > 0 )
					{return $query->result();}
					else{ return 0;}
			}
			
	}
	
	
	public function obt_oficinas()
	{ if($query = $this->db->query("CALL SP_R_OFICINA_OBT_OFICINAS();"))
		{   if($query->num_rows() > 0 )
			    {return $query->result();}
			else{ return 0;}
		}
		
	}
	
	public function obt_tipos_cajas()
	{ if($query = $this->db->query("CALL SP_R_TIPO_CAJA_OBT_TIPO_CAJAS();"))
			{  if($query->num_rows() > 0 )
				   {return $query->result();}
			   else{ return 0;}
			}
	
	}
	
		
}
