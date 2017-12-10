<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantConfigMenu_m extends CI_Model {
		
	public function _construct()
	{
		parent::_construct();
		
		$this->load->database('default');
	}
	

	public function inserta($Idusuario,$Idmenu,$Iditem)
	{
		if($this->db->query("CALL SP_W_PERFIL_USUARIO_INS(".$Idusuario.",'".$Idmenu."','".$Iditem."');"))
		    { return 1;}
		else{ return 0;}
	}
	
	public function editar($Idperfil,$Idusuario,$Idmenu,$Iditem)
	{
		if($this->db->query("CALL SP_W_PERFIL_USUARIO_ACT(".$Idperfil.",".$Idusuario.",'".$Idmenu."','".$Iditem."');"))
		    { return 1; }
		else{ return 0;}
	}
	
	
	public function eliminar($Idperfil)
	{
		if($this->db->query("CALL SP_W_PERFIL_USUARIO_ELI(".$Idperfil.");"))
		    { return 1; }
		else{ return 0; }
	}
	
}
