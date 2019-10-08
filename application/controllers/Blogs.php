<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blogs extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Blogs';
		if($_GET['title']){
			$data['tbl_blog'] = $this->mymodel->selectWithQuery("SELECT * from tbl_blog WHERE title LIKE '%".$_GET['title']."%' AND status = 'ENABLE'");
		}else{
			$data['tbl_blog'] = $this->mymodel->selectWhere('tbl_blog',  array('status' => 'ENABLE'));
		}
		
		$this->template->load('template/template','blog/index', $data);  
	} 
	
	public function view($id){
		$data['page'] = 'Blogs';
		$data['tbl_blog'] = $this->mymodel->selectDataone('tbl_blog',  array('id' => $id));
		$data['file'] = $this->mymodel->selectDataone('file',  array('table_id' => $id, 'table' => 'tbl_blog'));
        $data['subpage'] = '<b>'.$data['tbl_blog']['title'].'</b>';
		$this->template->load('template/template','blog/view', $data); 
	}
}