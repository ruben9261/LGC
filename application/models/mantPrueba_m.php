<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantPrueba_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta($P_dato)
	{
		if($this->db->query("CALL SP_W_PRUEBA_INS('".$P_dato."');"))
		    { return 1;}
		else{ return 0;}
	}
	

	
	
}
