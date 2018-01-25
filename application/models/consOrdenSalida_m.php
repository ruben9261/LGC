<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsOrdenSalida_m extends CI_Model {
		
	public function _construct()
	{	parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($fecha,$serie,$numero,$proveedor,$documento)
	{	if($query = $this->db->query("CALL SP_R_ORDEN_S_TOT_PAG('".$fecha."','".$serie."','".$numero."','".$proveedor."','".$documento."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($Numpagina,$fecha,$serie,$numero,$proveedor,$documento)
	{	if($query = $this->db->query("CALL SP_R_ORDEN_S_OBT_LISTA(".$Numpagina.",'".$fecha."','".$serie."','".$numero."','".$proveedor."','".$documento."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	}
	
	
	public function obt_serie_orden_x_usu($cod_usu,$tipo_ser_ord)
	{	if($query = $this->db->query("CALL SP_R_SERIE_ORDEN_OBT_SGTE_NUM_ACTUAL(".$cod_usu.",".$tipo_ser_ord.");"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();}
			else{ return 0;}
		}
	}
	
	
	public function obt_ult_cod_orden_salida()
	{ if($query = $this->db->query("CALL SP_R_ORDEN_S_OBT_ULT_COD();"))
		{	if($query->num_rows() > 0 )
				{return $query->result();}
		   	else{ return 0;}
		}
	
	}
	
	public function obt_tarifas()
	{ if($query = $this->db->query("CALL SP_R_TIPO_TARIFA_OBT_TIPOS();"))
		{	if($query->num_rows() > 0 )
				{return $query->result();}
			else{ return 0;}
		}
	
	}
	

	public function obt_orden_salida($codigo)
	{ if($query = $this->db->query("CALL SP_R_ORDEN_S_OBT_X_CODIGO(".$codigo.");"))
		{	if($query->num_rows() > 0 )
				{return $query->result();}
			else{ return 0;}
		}
			
	}
	
	
		
}
