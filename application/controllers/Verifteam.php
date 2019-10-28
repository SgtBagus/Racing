<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Verifteam extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page'] = 'Verified Team';
        $this->template->load('template/template', 'verifteam/index', $data);
    }

    public function fetchevent()
    {
        $output = '';

        $search = $_GET['title'];

        if ($search) {
            $event = $this->mymodel->selectWithQuery("SELECT * FROM tbl_event WHERE public = 'ENABLE' AND status = 'ENABLE' AND LOWER(title) like '%" . $search . "%' ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
        } else {
            $event = $this->mymodel->selectWithQuery("SELECT * FROM tbl_event WHERE public = 'ENABLE' AND status = 'ENABLE' ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
        }
        if ($event) {
            foreach ($event as $row) {
                $photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_event'));
                $rowteam = $this->mymodel->selectWithQuery("SELECT count(team_id) as rowteam from tbl_event_register WHERE event_id = '" . $row['id'] . "'  AND approve = 'APPROVE'");

                if ($row['status'] == 'ENABLE') {
                    $status =  '<small class="label bg-green">Dibuka</small>';
                } else {
                    $status = '<small class="label bg-red">Ditutup</small>';
                }

                $output .= '
				<a href="' . base_url("verifteam/view/") . $row['id'] . '" class="a_black">
				<div class="col-md-12">
				<div class="box">
					<img class="img-even" src="' . $photo['url'] . '">
					<div class="box-body">
						<div class="row">
							<div class="col-xs-12">
								<h4 align="center">' . $row['title'] . '</h4>
								<div class="row" align="center">
								' . $status . '
								</div>
								<div class="col-md-12" style="padding:0px 10px;">
								<p style="text-align:center;">
								' . $row['alamat'] . '
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
								' . date('d M Y', strtotime($row['tgleventStart'])) . '
									<b>s/d</b>
									' . date('d M Y', strtotime($row['tgleventEnd'])) . '
								</small>
							</div>
							<div class="col-xs-6" align="right">
								Pendaftar :
								<b>
									<i class="fa fa-users"></i>' . $rowteam[0]['rowteam'] . '
								</b>
								<br>
								<small>Event Dibuat : ' . date('d M Y', strtotime($row['created_at'])) . '</small>
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

    public function view($id)
    {
        $data['page'] = 'Verified Team';
        $data['tbl_event'] = $this->mymodel->selectDataone('tbl_event', array('id' => $id));
        $data['file_event'] = $this->mymodel->selectDataone('file', array('table_id' => $id, 'table' => 'tbl_event'));
        $data['rowteam'] = $this->mymodel->selectWithQuery("SELECT count(id) as rowteam from tbl_event_register WHERE event_id = '" . $id . "' AND team_id NOT LIKE 0 AND approve = 'APPROVE'");

        $data['subpage'] = $data['tbl_event']['title'];
        $this->template->load('template/template', 'verifteam/view', $data);
    }

    public function fetchteam($id)
    {
        $output = '';

        $search = $_GET['name'];

        if ($search) {
            $team = $this->mymodel->selectWithQuery("SELECT a.team_id as team_id, b.name from tbl_event_register a INNER JOIN tbl_team b on a.team_id = b.id WHERE event_id = '" . $id . "' AND team_id NOT LIKE 0 AND b.name LIKE '%" . $_GET['name'] . "%' AND approve = 'APPROVE' ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
        } else {
            $team = $this->mymodel->selectWithQuery("SELECT team_id from tbl_event_register WHERE event_id = '" . $id . "' AND team_id NOT LIKE 0 AND approve = 'APPROVE' ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
        }

        if ($team) {
            foreach ($team as $row) {
                $team = $this->mymodel->selectDataone('tbl_team', array('id' => $row['team_id']));
                $photo = $this->mymodel->selectDataone('file', array('table_id' => $team['id'], 'table' => 'tbl_team'));

                if ($team['verificacion'] == 'ENABLE') {
                    $verificacion  = '<i class="fa fa-check-circle" style="color: #3b8dbc"> </i>';
                }

                $photoUrl = base_url('webfiles/team/team_default.png');
                if ($photo['url'] != NULL) { 
                    $photoUrl = $photo['url'];
                }

                $nameteam = strlen($team["name"]) > 10 ? substr($team["name"], 0, 10) . "..." : $team["name"];
                
                $output .= '<div class="col-xs-6">
                <div class="box">
                <div class="box-body">
                <div class="row" align="center">
                <div class="col-xs-12">
                <img class="img-circle" alt="User Image" src="' . $photoUrl . '" alt="Third slide" height="100px" width="100px">
                </div>
                <div class="col-xs-12">
                <p>' . $nameteam . ' ' . $verificacion . '<br>
                <small>' . $team['kota'] . '</small>
                </p>
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
