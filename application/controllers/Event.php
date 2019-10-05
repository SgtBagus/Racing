<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Event extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Event';
		$data['tbl_event'] = $this->mymodel->selectWhere('tbl_event',  array('public' => 'ENABLE'));
		$this->template->load('template/template','event/index', $data); 
	} 
	
	public function view($id){
		$data['page'] = 'Event';
		$data['tbl_event'] = $this->mymodel->selectDataone('tbl_event',  array('id' => $id));
		$data['file'] = $this->mymodel->selectDataone('file',  array('table_id' => $id, 'table' => 'tbl_event'));
		$this->template->load('template/template','event/view', $data); 
	}

	public function register($id){
		$data['page'] = 'Event';
		$data['tbl_event'] = $this->mymodel->selectDataone('tbl_event',  array('id' => $id));
		$data['file'] = $this->mymodel->selectDataone('file',  array('table_id' => $id, 'table' => 'tbl_event'));
		$data['raider'] = $this->mymodel->selectWhere('tbl_raider', array('team_id' => $this->session->userdata('id')));
		$this->template->load('template/template','event/register', $data); 
	}

	public function get_raider($id){
		$value = $this->db->query("SELECT a.*, b.url FROM tbl_raider a INNER JOIN file b on b.table_id = a.id WHERE b.table = 'tbl_raider' AND a.id = '".$id."'")->result_array();
		echo json_encode($value);
	}

	public function addregister(){
		$dt['team_id'] = $_POST['team_id'];
		$dt['event_id'] = $_POST['event_id'];
		$dt['approve'] = 'WAITING';
		$dt['note'] = '';
		$dt['status'] = 'ENABLE';
		$dt['created_at'] = date("Y-m-d H:i:s");
		$this->mymodel->insertData('tbl_event_register', $dt);
		$last_id = $this->db->insert_id();

		$countfiles = count($_POST['raiderarray']);
		for($i=1;$i<=$countfiles;$i++){
			$dtd['event_register_id'] = $last_id;
			$dtd['raider_id'] = $_POST['raiderarray'][$i];
			$dtd['status'] = 'ENABLE';
			$dtd['created_at'] = date("Y-m-d H:i:s");
			$this->mymodel->insertData('tbl_event_register_raider', $dtd);
		}
		$this->alert->alertsuccess('Success Send Data');
	}
}