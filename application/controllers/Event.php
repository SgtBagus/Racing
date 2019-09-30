<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Event extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Event';
        $this->template->load('template/template','event/index', $data); 
	}
	
	public function view($id){
		$data['page'] = 'Event';
        $this->template->load('template/template','event/view', $data); 
	}
}