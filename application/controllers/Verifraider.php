<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Verifraider extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Verified Raider';
        if($_GET['title']){
            $data['tbl_event_register'] = $this->mymodel->selectWithQuery('SELECT a.id as event_register_id, a.*, b.id as event_id, b.* from tbl_event_register a INNER JOIN tbl_event b ON a.event_id = b.id WHERE a.approve = "APPROVE" AND b.title LIKE "%'.$_GET['title'].'%" GROUP BY a.event_id'); 
        }else{
            $data['tbl_event_register'] = $this->mymodel->selectWithQuery('SELECT a.id as event_register_id, a.*, b.id as event_id, b.* from tbl_event_register a INNER JOIN tbl_event b ON a.event_id = b.id WHERE a.approve = "APPROVE" GROUP BY a.event_id'); 
        }
        
        $this->template->load('template/template','verifraider/index', $data); 
	}
	
    
	public function view($id){
		$data['page'] = 'Verified Raider';
        $data['tbl_event_register'] = $this->mymodel->selectDataone('tbl_event_register', array('id' => $id));
        $data['tbl_event'] = $this->mymodel->selectDataone('tbl_event', array('id' => $data['tbl_event_register']['event_id']));
        $data['file_event'] = $this->mymodel->selectDataone('file', array('table_id' => $data['tbl_event']['id'], 'table' => 'tbl_event'));
        
        $data['rowraider'] = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = ".$id);
        
        if($_GET['name']){
            $data['raideregister'] = $this->mymodel->selectWithQuery("SELECT a.raider_id as raider_id, b.name from tbl_event_register_raider a INNER JOIN tbl_raider b on a.raider_id = b.id WHERE event_register_id = ".$id." AND b.name LIKE '%".$_GET['name']."%'");
        }else{
            $data['raideregister'] = $this->mymodel->selectWithQuery("SELECT raider_id from tbl_event_register_raider WHERE event_register_id = ".$id);
        }

        $data['subpage'] = $data['tbl_event']['title'];
        $this->template->load('template/template','verifraider/view', $data); 
	}
}