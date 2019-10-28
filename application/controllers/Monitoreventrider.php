<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Monitoreventrider extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['page'] = 'Monitoring Event';
		$this->template->load('template/template','Monitoreventrider/index', $data); 
	}

	public function fetch(){
		$output = '';

		$search = $_GET['title'];
		
		if($search){
			$tbl_event_register = $this->mymodel->selectWithQuery("SELECT a.*, b.raider_id, c.title FROM tbl_event_register a INNER JOIN tbl_event_register_raider b ON a.id = b.event_register_id INNER JOIN tbl_event c ON a.event_id = c.id WHERE a.team_id = 0 AND b.raider_id = ".$this->session->userdata('id')." AND LOWER(c.title) like '%".$search."%' ORDER BY id DESC LIMIT ".$this->input->post('limit')." OFFSET ".$this->input->post('start'));   
		}else{
			$tbl_event_register = $this->mymodel->selectWithQuery("SELECT a.*, b.raider_id, c.title FROM tbl_event_register a INNER JOIN tbl_event_register_raider b ON a.id = b.event_register_id INNER JOIN tbl_event c ON a.event_id = c.id WHERE a.team_id = 0 AND b.raider_id = ".$this->session->userdata('id')." ORDER BY id DESC LIMIT ".$this->input->post('limit')." OFFSET ".$this->input->post('start'));   
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
				} 
				
				$output .= '
				
				<div class="box">
					<img class="img-even" src="' . $photo['url'] . '">
					<div class="box-body">
						<div class="row">
							<div class="col-xs-12">
								<h4 align="center">' . $event['title'] . '</h4>
								<div class="row" align="center">
								' . $approve . '
								</div>
								<div class="col-md-12" style="padding:0px 10px;">
								<p style="text-align:center;">
								' . $event['alamat'] . '
								</p>
								</div>
							</div>
						</div>
						<hr style="margin-top:5px; margin-bottom: 5px;">
						<div class="row">
							<div class="col-xs-6">
								Tanggal Event :
								<br>
								<small>
								' . date('d M Y', strtotime($event['tgleventStart'])) . '
									<b>s/d</b>
									' . date('d M Y', strtotime($event['tgleventEnd'])) . '
								</small>
							</div>
							<div class="col-xs-6" align="right">
								Pendaftar :
								<b>
									<i class="fa fa-motorcycle"></i>' . $rowraider[0]['rowraider'] . '
								</b>
								<br>
								<small>Event Dibuat : ' . date('d M Y', strtotime($event['created_at'])) . '</small>
							</div>
						</div>
					</div>
				</div>';
			}
		}
		echo $output;
	}
}