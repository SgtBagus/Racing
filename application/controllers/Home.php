<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Statistik';
		$data['tbl_event'] = $this->db->limit(6)->order_by('id', 'DESC')->get_where('tbl_event', array('public' => 'ENABLE'))->result_array();
		$data['tbl_blog'] = $this->db->limit(6)->order_by('id', 'DESC')->get_where('tbl_blog', array('status' => 'ENABLE'))->result_array();
		$data['tbl_gallery'] = $this->mymodel->selectWithQuery('SELECT a.*, b.imagegroup_id FROM master_imagegroup a INNER JOIN tbl_gallery b ON a.id = b.imagegroup_id WHERE a.public = "ENABLE" GROUP BY b.imagegroup_id ORDER BY id DESC LIMIT 6');
		$data['tbl_merchandise'] = $this->db->limit(6)->order_by('id', 'DESC')->get_where('tbl_merchandise', array('status' => 'ENABLE'))->result_array();
		$this->template->load('template/template','index', $data); 
	}
	
}