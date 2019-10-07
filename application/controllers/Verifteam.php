<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Verifteam extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Verified Team';
        if($_GET['name']){
            $data['team'] = $this->mymodel->selectWithQuery('SELECT * from tbl_team WHERE name LIKE "%'.$_GET['name'].'%" AND verificacion = "ENABLE"');
        }else{
            $data['team'] = $this->mymodel->selectWhere('tbl_team', array('verificacion' => 'ENABLE'));
        }
        
        $this->template->load('template/template','verifteam/index', $data); 
	}
	
}