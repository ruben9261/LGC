<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsCliente_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($Nombre,$documento)
	{	if($query = $this->db->query("CALL SP_R_CLIENTE_TOT_PAG('".$Nombre."','".$documento."');"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($Numpagina,$Nombre,$documento)
	{	if($query = $this->db->query("CALL SP_R_CLIENTE_OBT_LISTA(".$Numpagina.",'".$Nombre."','".$documento."');"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	
	}
	
	public function obt_cliente($codigo)
	{ if($query = $this->db->query("CALL SP_R_CLIENTE_OBT_X_CODIGO(".$codigo.");"))
			{	if($query->num_rows() > 0 )
					{return $query->result();}
					else{ return 0;}
			}
			
	}
	
	public function listar_tipo_documento()
	{ if($query = $this->db->query("CALL SP_R_TIPO_DOCUMENTO_OBT_TIPO_DOCUMENTOS();"))
		{	if($query->num_rows() > 0 )
			{return $query->result();}
			else{ return 0;}
	    }
		
	}
	
	public function listar_regimen()
	{ if($query = $this->db->query("CALL SP_R_REGIMEN_OBT_REGIMEN();"))
			{	if($query->num_rows() > 0 )
				{return $query->result();}
				else{ return 0;}
			}
	
	}
	
	public function listar_estado_cliente()
	{ if($query = $this->db->query("CALL SP_R_ESTADO_CLIENTE_OBT_ESTADO_CLIENTE();"))
		{	if($query->num_rows() > 0 )
		{return $query->result();}
		else{ return 0;}
		}
	
	}
	
	public function listar_clasificacion_cliente()
	{ if($query = $this->db->query("CALL SP_R_CLASIF_CLIENTE_OBT_CLASIF_CLIENTE();"))
		{	if($query->num_rows() > 0 )
		{return $query->result();}
		else{ return 0;}
		}
	
	}
		
	
	public function listar_actividad_cliente()
	{ if($query = $this->db->query("CALL SP_R_ACTIV_CLIENTE_OBT_ACTIV_CLIENTE();"))
		{	if($query->num_rows() > 0 )
			{return $query->result();}
			else{ return 0;}
		}
	
	}
	
	

	public function listar_contacto()
	{ if($query = $this->db->query("CALL SP_R_CONTACTO_OBT_CONTACTO();"))
			{	if($query->num_rows() > 0 )
				{return $query->result();}
				else{ return 0;}
			}
	
	}
	
	
	public function obt_ult_cod_cliente()
	{ if($query = $this->db->query("CALL SP_R_CLIENTE_OBT_ULT_COD();"))
		{	if($query->num_rows() > 0 )
				{return $query->result();}
			else{ return 0;}
		}
	
	}
	
	
	
	
	
	
}
