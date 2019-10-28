<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Verifraider extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page'] = 'Verified Raider';
        if ($_GET['title']) {
            $data['tbl_event_register'] = $this->mymodel->selectWithQuery('SELECT a.id as event_register_id, a.*, b.id as event_id, b.* from tbl_event_register a INNER JOIN tbl_event b ON a.event_id = b.id WHERE a.approve = "APPROVE" AND b.title LIKE "%' . $_GET['title'] . '%" GROUP BY a.event_id');
        } else {
            $data['tbl_event_register'] = $this->mymodel->selectWithQuery('SELECT a.id as event_register_id, a.*, b.id as event_id, b.* from tbl_event_register a INNER JOIN tbl_event b ON a.event_id = b.id WHERE a.approve = "APPROVE" GROUP BY a.event_id');
        }

        $this->template->load('template/template', 'verifraider/index', $data);
    }


    public function view($id)
    {
        $data['page'] = 'Verified Raider';
        $data['tbl_event'] = $this->mymodel->selectDataone('tbl_event', array('id' => $id));
        $data['file_event'] = $this->mymodel->selectDataone('file', array('table_id' => $data['tbl_event']['id'], 'table' => 'tbl_event'));
        $data['rowraider'] = $this->mymodel->selectWithQuery("SELECT count(a.id) as rowraider from tbl_event_register_raider a INNER JOIN tbl_event_register b ON a.event_register_id = b.id WHERE b.event_id = " . $id);

        $data['subpage'] = $data['tbl_event']['title'];
        $this->template->load('template/template', 'verifraider/view', $data);
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

                $event_register_id = $this->mymodel->selectDataone('tbl_event_register', array('event_id' => $row['id'], 'approve' => 'APPROVE'));
                $rowraider = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = '" . $event_register_id['id'] . "'");

                if ($row['status'] == 'ENABLE') {
                    $status =  '<small class="label bg-green">Dibuka</small>';
                } else {
                    $status = '<small class="label bg-red">Ditutup</small>';
                }

                $output .= '
                <a href="' . base_url("verifraider/view/") . $row['id'] . '" class="a_black">
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
									<i class="fa fa-motorcycle"></i>' . $rowraider[0]['rowraider'] . '
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

    public function fetchraider($id)
    {
        $output = '';
        $search = $_GET['name'];

        if ($search) {
            $tbl_raider = $this->mymodel->selectWithQuery("SELECT b.event_id, a.raider_id as raider_id, c.name, b.id from tbl_event_register_raider a INNER JOIN tbl_event_register b ON a.event_register_id = b.id INNER JOIN tbl_raider c ON a.raider_id = c.id WHERE b.event_id = '" . $id . "' AND b.approve = 'APPROVE' AND c.name LIKE '%" . $_GET['name'] . "%' ORDER BY a.id, b.team_id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
        } else {
            $tbl_raider = $this->mymodel->selectWithQuery("SELECT b.event_id, a.event_register_id, a.raider_id FROM tbl_event_register_raider a INNER JOIN tbl_event_register b ON a.event_register_id = b.id WHERE b.event_id = '" . $id . "' AND b.approve = 'APPROVE' ORDER BY a.id, b.team_id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
        }
        if ($tbl_raider) {
            $i = 1;
            foreach ($tbl_raider as $row) {
                $raider = $this->mymodel->selectDataone('tbl_raider', array('id' => $row['raider_id']));
                $team = $this->mymodel->selectDataone('tbl_team', array('id' => $raider['team_id']));
                $photo = $this->mymodel->selectDataone('file', array('table_id' => $raider['id'], 'table' => 'tbl_raider'));

                $photo_team = $this->mymodel->selectDataone('file', array('table_id' => $raider['team_id'], 'table' => 'tbl_team'));

                if ($raider['verificacion'] == 'ENABLE') {
                    $verificacion  = '<i class="fa fa-check-circle" style="color: #3b8dbc"> </i>';
                }

                $teamPhoto = '';
                if ($photo_team['url']) {
                    $teamPhoto = '<img alt="User Image" src="' . $photo_team['url'] . '" alt="Third slide" height="50px" width="90px">';
                }

                $teamvalue = '<p class="help-block pull-right">Rider Peorangan!</p>';
                if ($team['name']) {
                    $singkatTeam = strlen($team["name"]) > 10 ? substr($team["name"], 0, 10) . "..." : $team["name"];
                    $teamvalue = '<p>' . $singkatTeam . '</p>';
                }

                $raiderValue = strlen($raider["name"]) > 13 ? substr($raider["name"], 0, 13) . "..." : $raider["name"];

                $photoUrl = base_url('webfiles/raider/raider_default.png');
                if ($photo['url'] != NULL) {
                    $photoUrl = $photo['url'];
                }

                $output .= '<div class="col-xs-6">
                <div class="box">
				<img class="img-even" src="' . $photoUrl . '" style="height: 100px;">
                    <div class="box-body">
                        <div class="row" align="center">
                        <div class="col-xs-12">
                        <p>' . $raiderValue . ' ' . $verificacion . '</p>
                            ' . $teamvalue . '
                            <br>
                            ' . $teamPhoto . '
                        </div>
                        <p>Number : <b>' . $raider['nostart'] . '</b></p>
                        </div>
                    </div>
                </div>
            </div>';
                $i++;
            }
        }
        echo $output;
    }
}
