<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsProducto_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_totpaginas($Descripcion,$Tipo,$Categoria)
	{	if($query = $this->db->query("CALL SP_R_PRODUCTO_TOT_PAG('".$Descripcion."','".$Tipo."',".$Categoria.");"))
		{	if($query->num_rows() > 0 )
				{	return $query->result();} 
			else{ return 0;}
		}
	
	}
	
	public function obt_lista($Numpagina,$Descripcion,$Tipo,$Categoria)
	{	if($query = $this->db->query("CALL SP_R_PRODUCTO_OBT_LISTA(".$Numpagina.",'".$Descripcion."','".$Tipo."',".$Categoria.");"))
			{	if($query->num_rows() > 0 )
					{	return $query->result();}
				else{ return 0;}
			}
	
	}
	
	
	public function obt_producto($codigo)
	{ if($query = $this->db->query("CALL SP_R_PRODUCTO_OBT_X_CODIGO(".$codigo.");"))
			{	if($query->num_rows() > 0 )
					{return $query->result();}
					else{ return 0;}
			}
			
	}
	
	public function obt_tipos()
	{ if($query = $this->db->query("CALL SP_R_TIPO_PRODUCTO_OBT_TIPO_PRODUCTOS();"))
		{	if($query->num_rows() > 0 )
			{return $query->result();}
			else{ return 0;}
	    }
	
	}
	
	
	public function obt_tipo_tarifas()
	{ if($query = $this->db->query("CALL SP_R_TIPO_TARIFA_OBT_TIPOS();"))
		{	if($query->num_rows() > 0 )
			{  return $query->result();}
			   else{ return 0;}
			}
	
	}
	
	
	public function obt_categorias()
	{ if($query = $this->db->query("CALL SP_R_CATEGORIA_PROD_OBT_CATEGORIA();"))
		{   if($query->num_rows() > 0 )
			  {  return $query->result();}
			else{ return 0;}
		}
	}
	
	
	
}
