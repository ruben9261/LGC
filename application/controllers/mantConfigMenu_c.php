<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantConfigMenu_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		$this->load->model('mantConfigMenu_m');
	
	}
	
	
	public function index() {
		$this->load->view("GestionConfigMenu");
	}
	

	public function mostrar_Nuevo()
	{ 	$this->load->model('consConfigMenu_m');
		$Usuarios=$this->consConfigMenu_m->obt_usuarios();
		mysqli_next_result($this->db->conn_id);
		$Menus=$this->consConfigMenu_m->obt_menus();
		mysqli_next_result($this->db->conn_id);
		$data['menus'] =$Menus;
		$data['usuarios'] =$Usuarios;
		$this->load->view("CreaConfigMenu",$data);
		 
	}
	

	public function mostrar_Editar($codperfil=null)
	{ if($codperfil)
		{ 	$this->load->model('consConfigMenu_m');
			$Usuarios=$this->consConfigMenu_m->obt_usuarios();
			mysqli_next_result($this->db->conn_id);
			$Menus=$this->consConfigMenu_m->obt_menus();
			mysqli_next_result($this->db->conn_id);
			$codigos=$this->consConfigMenu_m->obt_codigos_menus($codperfil);
			mysqli_next_result($this->db->conn_id);
			//var_dump($codigos);
			foreach ($codigos as $codigo) {
				$codusu=$codigo->COD_USU;				
				$codmenu=$codigo->COD_MENU;
				$coditem=$codigo->COD_ITEMS;
			}
			$data1['codperfil']=$codperfil;
			$data1['codusu']=$codusu;
			$data1['codmenu']=$codmenu;
			$data1['coditem']=$coditem;
			$data1['menus'] =$Menus;
			$data1['usuarios'] =$Usuarios;
		
		}
		$this->load->view("EditConfigMenu",$data1);
 
	}
	
	
	public function insertar(){
		header('Content-Type: application/json');		
		$Idusuario = addslashes(htmlspecialchars($_POST["usuario"]));
		$Idmenu = addslashes(htmlspecialchars($_POST["menu"]));
		$Iditem = addslashes(htmlspecialchars($_POST["item"]));
		$this->load->model('mantConfigMenu_m');
		$rpta=$this->mantConfigMenu_m->inserta($Idusuario,$Idmenu,$Iditem);
	   if(!is_null($rpta) && !empty($rpta))
		{   $json_string =json_encode($rpta);
			echo $json_string;
		}
	}
	
	
	public function editar(){
	
		header('Content-Type: application/json');
		$Idperfil=addslashes(htmlspecialchars($_POST["codperfil"]));
		$Idusuario = addslashes(htmlspecialchars($_POST["usuario"]));
		$Idmenu = addslashes(htmlspecialchars($_POST["menu"]));
		$Iditem = addslashes(htmlspecialchars($_POST["item"]));
		
		$this->load->model('mantConfigMenu_m');
		$rpta=$this->mantConfigMenu_m->editar($Idperfil,$Idusuario,$Idmenu,$Iditem);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
		     echo $json_string;
			
		}
	}
	
	public function eliminar(){
		header('Content-Type: application/json');
		$Idperfil=addslashes(htmlspecialchars($_POST["codperfil"]));
		$this->load->model('mantConfigMenu_m');
		$rpta=$this->mantConfigMenu_m->eliminar($Idperfil);
		if(!is_null($rpta) && !empty($rpta))
		{    $json_string =json_encode($rpta);
	      	 echo $json_string;
		}
	}
	
	

}