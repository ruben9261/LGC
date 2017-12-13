<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsOrdenEntrada_m extends CI_Model {
		
	public function _construct()
	{	parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($fecha,$serie,$numero,$cliente,$documento)
	{	if($query = $this->db->query("CALL SP_R_ORDEN_E_TOT_PAG('".$fecha."','".$serie."','".$numero."','".$cliente."','".$documento."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($Numpagina,$fecha,$serie,$numero,$cliente,$documento)
	{	if($query = $this->db->query("CALL SP_R_ORDEN_E_OBT_LISTA(".$Numpagina.",'".$fecha."','".$serie."','".$numero."','".$cliente."','".$documento."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	}
	
	
	public function obt_serie_orden_x_usu($cod_usu,$tipo_ser_ord)
	{	if($query = $this->db->query("CALL SP_R_DOCUMENTOS_OBT_SERIE_ORDEN_X_USU(".$cod_usu.",".$tipo_ser_ord.");"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();}
			else{ return 0;}
		}
	}
	
	
	public function obt_ult_cod_orden_entrada()
	{ if($query = $this->db->query("CALL SP_R_ORDEN_ENTRADA_OBT_ULT_COD();"))
		{	if($query->num_rows() > 0 )
				{return $query->result();}
		   	else{ return 0;}
		}
	
	}
		
}
