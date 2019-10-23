<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Wisata extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['page'] = 'Wisata';
		$this->template->load('template/template', 'wisata/index', $data);
	}

	public function view($id)
	{
		$data['page'] = 'Wisata';
		$data['tbl_wisata'] = $this->mymodel->selectDataone('tbl_wisata',  array('id' => $id));
		$data['file'] = $this->mymodel->selectDataone('file',  array('table_id' => $id, 'table' => 'tbl_wisata'));
		$this->template->load('template/template', 'wisata/view', $data);
	}

	public function fetch()
	{
		$output = '';
		$search = $_GET['title'];
		if ($search) {
			$tbl_wisata = $this->mymodel->selectWithQuery("SELECT * from tbl_wisata WHERE title LIKE '%" . $_GET['title'] . "%' AND status = 'ENABLE' ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
		} else {
			$tbl_wisata = $this->mymodel->selectWithQuery("SELECT * FROM tbl_wisata WHERE status = 'ENABLE' ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
		}
		if ($tbl_wisata) {
			foreach ($tbl_wisata as $row) {
				$photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_wisata'));

				$desktpsi = strlen($row["desk"]) > 50 ? substr($row["desk"], 0, 50) . "..." : $row["desk"];

				$output .= '
				<div class="col-md-12">
				<a href="' . base_url('wisata/view/') . $row['id'] . '" class="a_black">
				<div class="box">
				<img class="img-even" src="' . $photo['url'] . '">
				<div class="box-body">
				<div class="row">
				<div class="col-xs-12" align="center">
				<h3><b>' . $row['title'] . '</b></h3>
				</div>
				<div class="col-xs-12" align="center">
				' . $desktpsi . '
				</div>
				</div>
				<div class="row">
				<div class="col-xs-12">
				Wisata Dimulai : 
				<br>
				<small>
				'.date('d M Y', strtotime($row['tglwisataStart'])).' - '.date('d M Y', strtotime($row['tglwisataEnd'])).'
				</small>
				</div>
				</div>
				</div>
				</div>
				</a>
				</div>';
			}
		}
		echo $output;
	}
}