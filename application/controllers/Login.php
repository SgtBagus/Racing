<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Login';
        $this->template->load('template/template','login/index', $data); 
	}

	public function register(){
		$data['page'] = 'Daftar';
        $this->template->load('template/template','login/register', $data); 
	}
	
}