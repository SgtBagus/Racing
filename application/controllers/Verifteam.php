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
        if ($_GET['title']) {
            $data['tbl_event_register'] = $this->mymodel->selectWithQuery('SELECT a.id as event_register_id, a.*, b.id as event_id, b.* from tbl_event_register a INNER JOIN tbl_event b ON a.event_id = b.id WHERE a.approve = "APPROVE" AND b.title LIKE "%' . $_GET['title'] . '%" GROUP BY a.event_id');
        } else {
            $data['tbl_event_register'] = $this->mymodel->selectWithQuery('SELECT a.id as event_register_id, a.*, b.id as event_id, b.* from tbl_event_register a INNER JOIN tbl_event b ON a.event_id = b.id WHERE a.approve = "APPROVE" GROUP BY a.event_id');
        }

        $this->template->load('template/template', 'verifteam/index', $data);
    }


    public function view($id)
    {
        $data['page'] = 'Verified Team';
        $data['tbl_event_register'] = $this->mymodel->selectDataone('tbl_event_register', array('id' => $id));
        $data['tbl_event'] = $this->mymodel->selectDataone('tbl_event', array('id' => $data['tbl_event_register']['event_id']));
        $data['file_event'] = $this->mymodel->selectDataone('file', array('table_id' => $data['tbl_event']['id'], 'table' => 'tbl_event'));

        $data['rowteam'] = $this->mymodel->selectWithQuery("SELECT count(id) as rowteam from tbl_event_register WHERE event_id = '" . $data['tbl_event_register']['event_id'] . "'");

        if ($_GET['name']) {
            $data['teamregister'] = $this->mymodel->selectWithQuery("SELECT a.team_id as team_id, b.name from tbl_event_register a INNER JOIN tbl_team b on a.team_id = b.id WHERE event_id = '" . $data['tbl_event_register']['event_id'] . "' AND b.name LIKE '%" . $_GET['name'] . "%'");
        } else {
            $data['teamregister'] = $this->mymodel->selectWithQuery("SELECT team_id from tbl_event_register WHERE event_id = '" . $data['tbl_event_register']['event_id'] . "'");
        }

        $data['subpage'] = $data['tbl_event']['title'];
        $this->template->load('template/template', 'verifteam/view', $data);
    }
}
