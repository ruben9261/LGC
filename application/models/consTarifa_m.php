<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class ConsTarifa_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		$this->load->database('default');
	}
	
	public function obt_tarifas()
	{ if($query = $this->db->query("CALL SP_R_TIPO_TARIFA_OBT_TIPOS();"))
		{	if($query->num_rows() > 0 )
			{return $query->result();}
			else{ return 0;}
		}
	
	}
	
	

		
}
