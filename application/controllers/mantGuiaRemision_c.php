<?php if( ! defined ('BASEPATH')) exit('error al intentar acceder');


class MantGuiaRemision_c  extends CI_Controller{
    
			
	public function _construct()
	{   parent::_construct();
		//$this->load->helper('url');
		//$this->load->model('mantGuiaRemision_m');
	
	}
	
	
	public function index() {
		$this->load->view("MantGuiaRemision");
	}
	

	

}