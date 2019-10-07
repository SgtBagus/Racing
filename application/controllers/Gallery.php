<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
        $data['page'] = 'Gallery';

        if($_GET['title']){
            $data['tbl_gallery'] = $this->mymodel->selectWithQuery("SELECT a.*, b.imagegroup_id FROM master_imagegroup a INNER JOIN tbl_gallery b ON a.id = b.imagegroup_id WHERE a.public = 'ENABLE' AND a.value LIKE '%".$_GET['title']."%' GROUP BY b.imagegroup_id"); 
        }else{
            $data['tbl_gallery'] = $this->mymodel->selectWithQuery('SELECT a.*, b.imagegroup_id FROM master_imagegroup a INNER JOIN tbl_gallery b ON a.id = b.imagegroup_id WHERE a.public = "ENABLE" GROUP BY b.imagegroup_id'); 
        }
        
        $this->template->load('template/template','gallery/index', $data); 
	}
	
	public function view($id){
        $data['page'] = 'Gallery';

        if($_GET['title']){
            $data['tbl_gallery'] = $this->mymodel->selectWithQuery("SELECT * FROM tbl_gallery WHERE imagegroup_id = '".$id."' AND title LIKE '%".$_GET['title']."%'"); 
        }else{
            $data['tbl_gallery'] = $this->mymodel->selectWhere('tbl_gallery', array('imagegroup_id' => $id));
        }
        
        $data['id'] = $this->mymodel->selectDataone('master_imagegroup', array('id' => $id));
        $data['main_image'] = $this->mymodel->selectDataOne('file', array('table_id' => $data['id']['id'], 'table' => 'master_gallery'));
        $data['subpage'] = '<b>'.$data['id']['value'].'</b>';
        $this->template->load('template/template','gallery/view', $data); 
	}
}