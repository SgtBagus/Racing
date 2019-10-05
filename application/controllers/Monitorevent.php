<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Monitorevent extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Monitoring Event';
        $this->template->load('template/template','monitorevent/index', $data); 
	}
	
}