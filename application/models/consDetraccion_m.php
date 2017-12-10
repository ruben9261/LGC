<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsDetraccion_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	
	public function obt_Detraccion($codigo)
	{ if($query = $this->db->query("CALL SP_R_DETRACCION_OBT_X_COD_CLI(".$codigo.");"))
			{	if($query->num_rows() > 0 )
					{return $query->result();}
					else{ return 0;}
			}
			
	}
	
	
	
		
}
