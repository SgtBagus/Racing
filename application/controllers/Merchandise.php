<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Merchandise extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Merchandise';
		if($_GET['title']){
			$data['tbl_merchandise'] = $this->mymodel->selectWithQuery("SELECT * from tbl_merchandise WHERE title LIKE '%".$_GET['title']."%' AND status = 'ENABLE'");
		}else{
			$data['tbl_merchandise'] = $this->mymodel->selectWhere('tbl_merchandise',  array('status' => 'ENABLE'));
		}
		
		$this->template->load('template/template','merchandise/index', $data);  
	} 
	
	public function view($id){
		$data['page'] = 'Merchandise';
		$data['tbl_merchandise'] = $this->mymodel->selectDataone('tbl_merchandise',  array('id' => $id));
		$data['file'] = $this->mymodel->selectDataone('file',  array('table_id' => $id, 'table' => 'tbl_merchandise'));
        $data['subpage'] = '<b>'.$data['tbl_merchandise']['title'].'</b>';
		$this->template->load('template/template','merchandise/view', $data); 
	}
}