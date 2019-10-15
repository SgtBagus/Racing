<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Blogs extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['page'] = 'Blogs';
		$this->template->load('template/template', 'blog/index', $data);
	}

	public function view($id)
	{
		$data['page'] = 'Blogs';
		$data['tbl_blog'] = $this->mymodel->selectDataone('tbl_blog',  array('id' => $id));
		$data['file'] = $this->mymodel->selectDataone('file',  array('table_id' => $id, 'table' => 'tbl_blog'));
		$data['subpage'] = '<b>' . $data['tbl_blog']['title'] . '</b>';
		$this->template->load('template/template', 'blog/view', $data);
	}

	public function fetch()
	{
		$output = '';

		$search = $_GET['title'];

		if ($search) {
			$tbl_blog = $this->mymodel->selectWithQuery("SELECT * from tbl_blog WHERE title LIKE '%" . $_GET['title'] . "%' AND status = 'ENABLE' ORDER BY id DESC LIMIT ".$this->input->post('limit')." OFFSET ".$this->input->post('start'));
		} else {
			$tbl_blog = $this->mymodel->selectWithQuery("SELECT * FROM tbl_blog WHERE status = 'ENABLE' ORDER BY id DESC LIMIT ".$this->input->post('limit')." OFFSET ".$this->input->post('start'));
		} 
		if ($tbl_blog) {
			foreach ($tbl_blog as $row) {
				$photo = $this->mymodel->selectDataone('file', array('table_id' => $row['id'], 'table' => 'tbl_blog'));

				$desktpsi = strlen($row["deskripsi"]) > 50 ? substr($row["deskripsi"], 0, 50) . "..." : $row["deskripsi"];

				$output .= '
				<div class="col-md-12">
					<a href="' . base_url('blogs/view/') . $row['id'] . '" class="a_black">
						<div class="box">
                            <div class="box-body">
                                <div class="row">
                                	<div class="col-xs-12">
                                        <img class="img-gallery" src="' . $photo['url'] . '" alt="Third slide">
                                    </div>
                                    <div class="col-xs-12" align="center">
                                        <h3><b>' . $row['title'] . '</b></h3>
                                    </div>
									<div class="col-xs-12" align="center">
									' . $desktpsi . '
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
