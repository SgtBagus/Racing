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

				$rowteam = $this->mymodel->selectWithQuery("SELECT count(id) as rowteam from tbl_event_register WHERE team_id NOT LIKE '0' "); 
				$rowraider = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = '" . $row['id'] . "'"); 

				if ($row['approve'] == 'WAITING') {
					$approve = '<small class="label bg-yellow"><i class="fa fa-warning"> </i> Menunggu Dikonfirmasi </small>';
				} else if ($row['approve'] == "APPROVE") {
					$approve = '<small class="label bg-green"><i class="fa fa-check"> </i> Pendaftaran Di Terima </small>';
				} else if ($row['approve'] == "REJECT") {
					$approve = '<small class="label bg-red"><i class="fa fa-ban"> </i> Pendaftaran Di Tolak </small>';
				} 
				
				$title = strlen($row["title"]) > 15 ? substr($row["title"], 0, 15) . "..." : $row["title"];

				$output .= '
				<div class="col-xs-6">
				<div class="box">
					<img class="img-even" src="' . $photo['url'] . '">
					<div class="box-body">
						<div class="row">
							<div class="col-xs-12" align="center">
								<b style="font-size:15px">' . $title . '</b><br>
								<div class="row" align="center">
								' . $approve . '
								</div>
								<div class="col-md-12" style="padding:0px 10px;">
								</div>
							</div>
						</div>
						<hr style="margin-top:5px; margin-bottom: 5px;">
						<div class="row">
							<div class="col-xs-12" align="center">
								Tanggal Event :
								<br>
								<small>
								' . date('d M Y', strtotime($row['tgleventStart'])) . '<b> s/d </b>
									' . date('d M Y', strtotime($row['tgleventEnd'])) . '
								</small>
							</div>
							<div class="col-xs-12" align="center">
								Pendaftar :
								<b>
								<img src="' . base_url('assets/flaticon/icon_rider.png') . '" style="display: unset; width: 15px; height: 15px; margin-bottom: 5px;" />' . $rowraider[0]['rowraider'] . '
								<img src="' . base_url('assets/flaticon/icon_team.png') . '" style="display: unset; width: 15px; height: 15px; margin-bottom: 5px;" />' . $rowteam[0]['rowteam'] . '
								</b>
							</div>
						</div>
					</div>
				</div>
				</div>';
			}
		}
		echo $output;
	}
}