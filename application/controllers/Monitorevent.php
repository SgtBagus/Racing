<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Monitorevent extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Monitoring Event';
		$this->template->load('template/template','monitorevent/index', $data); 
	}

	public function fetch(){
		$output = '';

		$search = $_GET['title'];

		if($search){
			$tbl_event_register = $this->mymodel->selectWithQuery("SELECT * FROM tbl_event_register WHERE team_id = '".$this->session->userdata('id')."' AND LOWER(title) like '%".$search."%' ORDER BY id DESC LIMIT ".$this->input->post('limit')." OFFSET ".$this->input->post('start'));   
		}else{
			$tbl_event_register = $this->mymodel->selectWithQuery("SELECT * FROM tbl_event_register WHERE team_id = '".$this->session->userdata('id')."' ORDER BY id DESC LIMIT ".$this->input->post('limit')." OFFSET ".$this->input->post('start'));   
		}

		if($tbl_event_register){
			foreach($tbl_event_register as $row)
			{
				$event = $this->mymodel->selectDataone('tbl_event', array('id' => $row['event_id']));

				$photo = $this->mymodel->selectDataone('file', array('table_id' => $row['event_id'], 'table' => 'tbl_event'));

				$rowraider = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = '" . $row['id'] . "'"); 

				if ($row['approve'] == 'WAITING') {
					$approve = '<small class="label bg-yellow"><i class="fa fa-warning"> </i> Menunggu Dikonfirmasi </small>';
				} else if ($row['approve'] == "APPROVE") {
					$approve = '<small class="label bg-green"><i class="fa fa-check"> </i> Pendaftaran Di Terima </small>';
				} else if ($row['approve'] == "REJECT") {
					$approve = '<small class="label bg-red"><i class="fa fa-ban"> </i> Pendaftaran Di Tolak </small>';
				} else if ($row['approve'] == "FINISH") {
					$approve = '<small class="label bg-green"><i class="fa fa-check"> </i> Event Selesai </small>';
				} else if ($row['approve'] == "CANCEL") {
					$approve = '<small class="label bg-red"><i class="fa fa-ban"> </i> Event Dibatalkan</small>';
				}

				$output .= '
				<a href="'.base_url('monitorevent/view/').$row['id'].'" class="a_black">
				<div class="col-md-12">
				<div class="box">
				<div class="box-body">
				<div class="row">
				<div class="col-xs-5">
				<img class="img-even" src="'.$photo['url'].'" alt="Third slide">
				</div>
				<div class="col-xs-7">
				<h4>'.$event['title'].'<br>
				<small>
				<i class="fa fa-globe"></i> '.$event['kota'].'<br>
				'.$event['alamat'].'
				</small>
				</h4>
				</div>
				</div>
				<hr style="margin-top:5px; margin-bottom: 5px">
				<div class="row">
				<div class="col-xs-12">
				'.$approve.'
				</div>
				<div class="col-xs-6">
				Mendaftar dengan : <br> 
				<i class="fa fa-motorcycle"></i> <b>'.$rowraider[0]['rowraider'].'</b> Raider
				</div>
				<div class="col-xs-6" align="right">
				Mendaftar pada : <br>'.date('d-m-Y', strtotime($row['created_at'])).'
				</div>
				</div>
				</div>
				</div>
				</div>
				</a>';
			}
		}
		echo $output;
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