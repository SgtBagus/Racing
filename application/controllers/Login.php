<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = '<i class="fa fa-sign-in"></i> Login';
        $this->template->load('template/template','login/index', $data); 
	}

	public function register(){
		$data['page'] = '<i class="fa fa-users"></i> Mendaftar';
        $this->template->load('template/template','login/register', $data); 
	}
	
}