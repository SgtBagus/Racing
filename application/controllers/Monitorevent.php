<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Monitorevent extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Monitoring Event';
		if($_GET['title']){
			$data['tbl_event_register'] = $this->mymodel->selectWithQuery("SELECT * from tbl_event_register WHERE title LIKE '%".$_GET['title']."%' AND team_id = '".$this->session->userdata('id')."'");
		}else{
			$data['tbl_event_register'] = $this->mymodel->selectWhere('tbl_event_register', array('team_id' => $this->session->userdata('id'))); 
		}
		$this->template->load('template/template','monitorevent/index', $data); 
	}

	public function view($id){
		$data['page'] = 'Monitoring Event';
		$data['tbl_event_register'] = $this->mymodel->selectDataone('tbl_event_register', array('id' => $id));
		$data['tbl_event'] = $this->mymodel->selectDataone('tbl_event', array('id' => $data['tbl_event_register']['event_id']));
		$data['filegambar'] = $this->mymodel->selectDataone('file',  array('table_id' => $data['tbl_event']['id'], 'table' => 'tbl_event'));
		$data['raideregister'] = $this->mymodel->selectWhere('tbl_event_register_raider', array('event_register_id' => $data['tbl_event_register']['id'])); 
		
        $data['subpage'] = '<b>'.$data['tbl_event']['title'].'</b>';
		$this->template->load('template/template','monitorevent/view', $data); 
	}
	
}