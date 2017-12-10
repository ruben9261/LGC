<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class Login_c extends CI_Controller{
	
	
	public function _construct()
	{	parent::_construct();
		$this->load->helper('url');
	    $this->load->model('login_m');
	}
	
	
	public function index() {
	  $this->load->view("login");
       // $this->load->view("prueba2");
	}
	
	
	public function validar()
	{ 
		$USR=$this->input->post("txtusuario");
		$PSW=$this->input->post("txtclave");
		
		$this->load->model('login_m');
		$NOMCOMP=$this->login_m->obt_nomcompleto_usuario($USR,$PSW);
		mysqli_next_result($this->db->conn_id);
		
		$COD_USU=$this->login_m->obt_codigo_usuario($USR,$PSW);
		mysqli_next_result($this->db->conn_id);
	
		
		$this->load->library('session');
		$this->session->set_userdata('cod_usu',$COD_USU);
		//print_r( $this->session->cod_usu);
		
		if($NOMCOMP <> 0)
	    {  $datos=$this->login_m->obt_perfil_usuario($USR,$PSW);
	       mysqli_next_result($this->db->conn_id);
	      
	      if($datos <> 0)
	   	  {	$data['nomcomp'] =$NOMCOMP;
	   	    $data['cod_usu'] =$COD_USU;
	   	  	$data['vector'] =$datos;
	       	$this->session->set_userdata("menu",$data);
	     	//echo $this->session->welcome; //muestra valor de variable sesion
	     	$this->load->view('menu',$data);
	      }
	   	 
	   }
	  else{ $this->load->view('Error_usuario'); }	
	}

	public function regresar(){
		$this->load->view('menu',$this->session->menu);
		
	}
	
}