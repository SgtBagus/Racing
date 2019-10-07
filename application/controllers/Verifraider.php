<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Verifraider extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Verified Raider';
        if($_GET['name']){
            $data['raider'] = $this->mymodel->selectWithQuery('SELECT * from tbl_raider WHERE name LIKE "%'.$_GET['name'].'%" AND verificacion = "ENABLE"');
        }else{
            $data['raider'] = $this->mymodel->selectWhere('tbl_raider', array('verificacion' => 'ENABLE'));
        }
        
        $this->template->load('template/template','verifraider/index', $data); 
	}
	
}