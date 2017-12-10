<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantConfigSerieGuia_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta($cod_usu,$cod_serie)
	{
		if($this->db->query("CALL SP_W_CONFIG_SERIE_GUIA_INS(".$cod_usu.",".$cod_serie.");"))
		    { return 1;}
		else{ return 0;}
	}
	
	public function editar($cod_conf,$cod_usu,$cod_serie)
	{
		if($this->db->query("CALL SP_W_CONFIG_SERIE_GUIA_ACT(".$cod_conf.",".$cod_usu.",".$cod_serie.");"))
		    { return 1; }
		else{ return 0;}
	}
	
	
	public function eliminar($cod_conf)
	{
		if($this->db->query("CALL SP_W_CONFIG_SERIE_GUIA_ELI(".$cod_conf.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
