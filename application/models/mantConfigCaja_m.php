<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantConfigCaja_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta($cod_usu,$cod_caja)
	{
		if($this->db->query("CALL SP_W_CONFIG_CAJA_INS(".$cod_usu.",".$cod_caja.");"))
		    { return 1;}
		else{ return 0;}
	}
	
	public function editar($cod_conf,$cod_usu,$cod_caja)
	{
		if($this->db->query("CALL SP_W_CONFIG_CAJA_ACT(".$cod_conf.",".$cod_usu.",".$cod_caja.");"))
		    { return 1; }
		else{ return 0;}
	}
	
	
	public function eliminar($cod_conf)
	{
		if($this->db->query("CALL SP_W_CONFIG_CAJA_ELI(".$cod_conf.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
