<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Event extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['page'] = 'Event';
		$this->template->load('template/template', 'event/index', $data);
	}

	public function view($id)
	{
		$data['page'] = 'Event';
		$data['tbl_event'] = $this->mymodel->selectDataone('tbl_event',  array('id' => $id));
		$data['file'] = $this->mymodel->selectDataone('file',  array('table_id' => $id, 'table' => 'tbl_event'));
		$data['rule'] = $this->mymodel->selectDataone('file', array('table_id' => $id, 'table' => 'event_rule'));

		$data['rowteam'] = $this->mymodel->selectWithQuery("SELECT count(team_id) as rowteam from tbl_event_register WHERE event_id = '" . $data['tbl_event']['id'] . "'");

		$data['register_id'] = $this->mymodel->selectDataone('tbl_event_register', array('event_id' => $data['tbl_event']['id']));

		$data['rowraider'] = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = '" . $data['register_id']['id'] . "'");

		$data['subpage'] = '<b>' . $data['tbl_event']['title'] . '</b>';
		$this->template->load('template/template', 'event/view', $data);
	}

	public function gallery($id)
	{
		$data['page'] = 'Event';
		$data['tbl_event'] = $this->mymodel->selectDataone('tbl_event',  array('id' => $id));
		$data['file'] = $this->mymodel->selectDataone('file',  array('table_id' => $id, 'table' => 'tbl_event'));

		$data['rowteam'] = $this->mymodel->selectWithQuery("SELECT count(team_id) as rowteam from tbl_event_register WHERE event_id = '" . $data['tbl_event']['id'] . "'");

		$data['register_id'] = $this->mymodel->selectDataone('tbl_event_register', array('event_id' => $data['tbl_event']['id']));

		$data['rowraider'] = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = '" . $data['register_id']['id'] . "'");

		$data['subpage'] = '<b>' . $data['tbl_event']['title'] . '</b>';
		$this->template->load('template/template', 'event/gallery', $data);
	}

	public function register($id)
	{
		$data['page'] = 'Event';
		$data['tbl_event'] = $this->mymodel->selectDataone('tbl_event',  array('id' => $id));
		$data['file'] = $this->mymodel->selectDataone('file',  array('table_id' => $id, 'table' => 'tbl_event'));
		$data['raider'] = $this->mymodel->selectWhere('tbl_raider', array('team_id' => $this->session->userdata('id')));

		$data['rowteam'] = $this->mymodel->selectWithQuery("SELECT count(team_id) as rowteam from tbl_event_register WHERE event_id = '" . $data['tbl_event']['id'] . "'");

		$data['register_id'] = $this->mymodel->selectDataone('tbl_event_register', array('event_id' => $data['tbl_event']['id']));

		$data['rowraider'] = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = '" . $data['register_id']['id'] . "'");

		$data['subpage'] = 'Mendaftar Event : <b>' . $data['tbl_event']['title'] . '</b>';
		$this->template->load('template/template', 'event/register', $data);
	}

	public function get_raider($id)
	{
		$value = $this->db->query("SELECT a.*, b.url FROM tbl_raider a INNER JOIN file b on b.table_id = a.id WHERE b.table = 'tbl_raider' AND a.id = '" . $id . "'")->result_array();
		echo json_encode($value);
	}

	public function addregister()
	{
		$dt['team_id'] = $_POST['team_id'];
		$dt['event_id'] = $_POST['event_id'];
		$dt['approve'] = 'WAITING';
		$dt['note'] = '';
		$dt['status'] = 'ENABLE';
		$dt['created_at'] = date("Y-m-d H:i:s");

		$this->mymodel->insertData('tbl_event_register', $dt);
		$last_id = $this->db->insert_id();

		$countfiles = count($_POST['raiderarray']);
		for ($i = 1; $i <= $countfiles; $i++) {
			$dtd['event_register_id'] = $last_id;
			$dtd['raider_id'] = $_POST['raiderarray'][$i];
			$dtd['status'] = 'ENABLE';
			$dtd['created_at'] = date("Y-m-d H:i:s");
			$this->mymodel->insertData('tbl_event_register_raider', $dtd);
		}
		$this->alert->alertsuccess('Success Send Data');
	}

	public function fetch()
	{
		$output = '';

		$search = $_GET['title'];

		if ($search) {
			$event = $this->mymodel->selectWithQuery("SELECT * FROM tbl_event WHERE public = 'ENABLE' AND LOWER(title) like '%" . $search . "%' ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
		} else {
			$event = $this->mymodel->selectWithQuery("SELECT * FROM tbl_event WHERE public = 'ENABLE' ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
		}
		if ($event) {
			foreach ($event as $row) {
				$photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_event'));
				$rowteam = $this->mymodel->selectWithQuery("SELECT count(team_id) as rowteam from tbl_event_register WHERE event_id = '" . $row['id'] . "'");
				$register_id = $this->mymodel->selectDataone('tbl_event_register', array('event_id' => $row['id']));
				$rowraider = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = '" . $register_id['id'] . "'");

				if ($row['status'] == 'ENABLE') {
					$status =  '<small class="label bg-green">Dibuka</small>';
				} else {
					$status = '<small class="label bg-red">Ditutup</small>';
				}

				$output .= '
				<a href="' . base_url("event/view/") . $row['id'] . '" class="a_black">
				<div class="col-md-12">
				<div class="box">
				<img class="img-even" src="' . $photo['url'] . '">
				<div class="box-body">
				<div class="row">
				<div class="col-xs-12">
				<h4 align="center">' . $row['title'] . '<br><small>' . $status . '</small></h4>
				<small>
				<i class="fa fa-globe"></i> ' . $row['kota'] . '<br>
				' . $row['alamat'] . '
				</small>
				<hr style="margin-top:5px">
				</div>
				</div>
				<div class="row">
				<div class="col-xs-6">
				Event Dimulai : 
				<br>
				<small>
				' . date('d M Y', strtotime($row['tgleventStart'])) . ' - ' . date('d M Y', strtotime($row['tgleventEnd'])) . '
				</small>
				</div>
				<div class="col-xs-6" align="right">
				Pendaftar : 
				<b>
				<i class="fa fa-motorcycle"></i> ' . $rowraider[0]['rowraider'] . '
				<i class="fa fa-users"></i> ' . $rowteam[0]['rowteam'] . '
				</b>
				<br>
				<small>Dibuat : ' . date('d M Y', strtotime($row['created_at'])) . '</small>
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

	public function galleryfetch($event_id)
	{
		$output = '';

		$search = $_GET['title'];

		if ($search) {
			$tbl_gallery = $this->mymodel->selectWithQuery("SELECT a.*, b.imagegroup_id FROM master_imagegroup a INNER JOIN tbl_gallery b ON a.id = b.imagegroup_id WHERE a.public = 'ENABLE' AND a.id_event = '.$event_id.' AND a.value LIKE '%" . $_GET['title'] . "%' GROUP BY b.imagegroup_id ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
		} else {
			$tbl_gallery = $this->mymodel->selectWithQuery('SELECT a.*, b.imagegroup_id FROM master_imagegroup a INNER JOIN tbl_gallery b ON a.id = b.imagegroup_id WHERE a.public = "ENABLE" AND a.id_event = ' . $event_id . ' GROUP BY b.imagegroup_id ORDER BY id DESC LIMIT ' . $this->input->post('limit') . ' OFFSET ' . $this->input->post('start'));
		}
		if ($tbl_gallery) {
			foreach ($tbl_gallery as $row) {
				$main_image = $this->mymodel->selectDataOne('file', array('table_id' => $row['id'], 'table' => 'master_gallery'));
				$imagecount = $this->mymodel->selectWithQuery('SELECT count(id) as imagecount from tbl_gallery WHERE status = "ENABLE" AND imagegroup_id = ' . $row['id']);

				$output .= '
                <div class="col-md-12">
                    <a href="' . base_url('gallery/view/') . $row['id'] . '" class="a_black">
                        <div class="box">
                        <img class="img-even" src="' . $main_image['url'] . '">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12" align="center">
                                        <h3><b>' . $row['value'] . '</b></h3>
                                    </div>
                                    <div class="col-xs-12" align="center">
                                        <i class="fa fa-picture-o"></i> <b>' . $imagecount[0]['imagecount'] . '</b> Gambar
                                        <br>
                                        <i class="fa fa-calendar"></i> Dibuat pada tgl : ' . date('d-m-Y', strtotime($row['created_at'])) . '
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

	public function rank($id)
	{
		$data['page'] = 'Event';
		$data['tbl_event'] = $this->mymodel->selectDataone('tbl_event',  array('id' => $id));
		$data['file'] = $this->mymodel->selectDataone('file',  array('table_id' => $id, 'table' => 'tbl_event'));

		$data['rowteam'] = $this->mymodel->selectWithQuery("SELECT count(team_id) as rowteam from tbl_event_register WHERE event_id = '" . $data['tbl_event']['id'] . "'");

		$data['register_id'] = $this->mymodel->selectDataone('tbl_event_register', array('event_id' => $data['tbl_event']['id']));

		$data['rowraider'] = $this->mymodel->selectWithQuery("SELECT count(id) as rowraider from tbl_event_register_raider WHERE event_register_id = '" . $data['register_id']['id'] . "'");


		$data['subpage'] = '<b>' . $data['tbl_event']['title'] . '</b>';
		$this->template->load('template/template', 'event/rank', $data);
	}

	public function rankfetch($id)
	{
		$output = '';

		$tbl_paket = $this->mymodel->selectWithQuery('SELECT * FROM tbl_paket WHERE id_event = ' . $id . ' ORDER BY id LIMIT ' . $this->input->post('limit') . ' OFFSET ' . $this->input->post('start'));
		if ($tbl_paket) {
			foreach ($tbl_paket as $row) {
				$rankDetail = '';
				$fileRank = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'paket_file'));
				$tbl_paket_detail = $this->db->order_by('number', 'ASC')->get_where('tbl_paket_detail', array('id_paket' => $row['id']))->result_array();

				if ($tbl_paket_detail) {
					foreach ($tbl_paket_detail as $row_detail) {
						$team = $this->mymodel->selectDataone('tbl_team', array('id' => $row_detail['id_team']));
						$fileteam = $this->mymodel->selectDataone('file', array('table_id' => $team['id'], 'table' => 'tbl_team'));
						$rider = $this->mymodel->selectDataone('tbl_raider', array('id' => $row_detail['id_raider']));
						$filerider = $this->mymodel->selectDataone('file', array('table_id' => $rider['id'], 'table' => 'tbl_raider'));

						$rankDetail .= '<tr>
					<td>' . $row_detail['number'] . '</td>
					<td align="center"><img src="' . $fileteam['url'] . '" width="50px" height="50px" style="border-radius:5px"><br>' . $team['name'] . '</td>
					<td align="center"><img src="' . $filerider['url'] . '" width="50px" height="50px" style="border-radius:5px"><br>' . $rider['name'] . '</td>
					<td>' . $row_detail['keterangan'] . '</td>
					</tr>';
					}
				} else {
					$rankDetail .= '<tr>
					<td colspan="4" align="center">Tidak ada Data</td>
					</tr>';
				}

				$filedownload = '';

				if($fileRank){
					$filedownload = '<a href="'.base_url('download/downloadPDFPaket/').$fileRank['id'].'">
						<button class="btn btn-lg btn-block btn-info btn-daftar" style="margin-bottom: 15px">
							<i class="fa fa-download"></i> '.$row['title'].'
						</button>
					</a>';
				}
				
				$output .= '
                <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
									<div class="col-xs-12" align="center">
									<h4><b>' . $row['title'] . '</b></h4>
									<table class="table table-hover">
										<thead>
											<th>Juara</th>
											<th>Team</th>
											<th>Rider</th>
											<th>Keterangan</th>
										</thead>
										<tbody>
											' . $rankDetail . '
										</tbody>
									</table>
                                    </div>
								</div>
								<br>
								'.$filedownload.'
                            </div>
						</div>
                </div>';
			}
		}
		echo $output;
	}
}
