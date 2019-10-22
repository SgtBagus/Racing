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
        $data['rowraider'] = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = " . $id);
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
                <div class="box-body">
                <div class="row">
                <div class="col-xs-12">
                <img class="img-even" src="' . $photo['url'] . '" alt="Third slide">
                </div>
                <div class="col-xs-12">
                <h4>' . $row['title'] . '<br>
                <small>
                <i class="fa fa-globe"></i> ' . $row['kota'] . '<br>
                ' . $row['alamat'] . '
                </small>
                </h4>
                <hr style="margin-top:5px">
                </div>
                </div>
                <div class="row">
                <div class="col-xs-6">
                Event Dimulai : ' . date('d-m-Y', strtotime($row['tglevent'])) . '<br>
                ' . $status . '
                </div>
                <div class="col-xs-6" align="right">
                Pendaftar : 
                <b>
                <i class="fa fa-motorcycle"></i> <b>' . $rowraider[0]['rowraider'] . '</b> Raider
                </b>
                <br>
                <small>Event Dibuat : ' . date('d-m-Y', strtotime($row['created_at'])) . '</small>
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
        $event_register_id = $this->mymodel->selectDataone('tbl_event_register', array('event_id' => $id, 'approve' => 'APPROVE'));
        if ($search) {
            $tbl_raider = $this->mymodel->selectWithQuery("SELECT b.event_id, a.raider_id as raider_id, c.name, b.id from tbl_event_register_raider a INNER JOIN tbl_event_register b ON a.event_register_id = b.id INNER JOIN tbl_raider c ON a.raider_id = c.id WHERE b.event_id = 1 AND c.name LIKE '%" . $_GET['name'] . "%' ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
        } else {
            $tbl_raider = $this->mymodel->selectWithQuery("SELECT raider_id from tbl_event_register_raider WHERE event_register_id = '" . $event_register_id['id'] . "'  ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
        }

        if ($tbl_raider) {
            foreach ($tbl_raider as $row) {
                $raider = $this->mymodel->selectDataone('tbl_raider', array('id' => $row['raider_id']));
                $team = $this->mymodel->selectDataone('tbl_team', array('id' => $raider['team_id']));
                $motor = $this->mymodel->selectDataone('master_motor', array('id' => $raider['motor_id']));
                $photo = $this->mymodel->selectDataone('file', array('table_id' => $raider['id'], 'table' => 'tbl_raider'));

                if ($raider['verificacion'] == 'ENABLE') {
                    $verificacion  = '<i class="fa fa-check-circle" style="color: #3b8dbc"> </i>';
                }
                $output .= '<div class="col-xs-6">
                <div class="box">
                    <div class="box-body">
                        <div class="row" align="center">
                            <div class="col-xs-12">
                                <h3>Team<br><b>'.$team['name'].'</b></h3>
                            </div>
                            <div class="col-xs-12">
                                <img class="img-circle" alt="User Image" src="' . $photo['url'] . '" alt="Third slide" height="100px" width="100px">
                            </div>
                            <div class="col-xs-12">
                                <h4>' . $raider['name'] . $verificacion . '<br>
                                    <small><i class="fa fa-globe"></i> ' . $raider['kota'] . '</small>
                                </h4>
                                <p>' . $raider['nostart'] . '/' . $motor['value'] . '/' . $raider['ukuran_jersey'] . '</p>
                                <p>Sebanyak : <b>' . $raider['eventikut'] . '</b> Event Telah Di Ikuti</p>
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
