<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page'] = 'Gallery';
        $this->template->load('template/template', 'gallery/index', $data);
    }

    public function view($id)
    {
        $data['page'] = 'Gallery';
        $data['id'] = $this->mymodel->selectDataone('master_imagegroup', array('id' => $id));
        $data['main_image'] = $this->mymodel->selectDataOne('file', array('table_id' => $data['id']['id'], 'table' => 'master_gallery'));
        $data['subpage'] = '<b>' . $data['id']['value'] . '</b>';
        $this->template->load('template/template', 'gallery/view', $data);
    }


    public function fetch()
    {
        $output = '';

        $search = $_GET['title'];

        if ($search) {
            $tbl_gallery = $this->mymodel->selectWithQuery("SELECT a.*, b.imagegroup_id FROM master_imagegroup a INNER JOIN tbl_gallery b ON a.id = b.imagegroup_id WHERE a.public = 'ENABLE' AND a.value LIKE '%" . $_GET['title'] . "%' GROUP BY b.imagegroup_id ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
        } else {
            $tbl_gallery = $this->mymodel->selectWithQuery('SELECT a.*, b.imagegroup_id FROM master_imagegroup a INNER JOIN tbl_gallery b ON a.id = b.imagegroup_id WHERE a.public = "ENABLE" GROUP BY b.imagegroup_id ORDER BY id DESC LIMIT ' . $this->input->post('limit') . ' OFFSET ' . $this->input->post('start'));
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

    public function fetchview($id)
    {
        $output = '';

        $search = $_GET['title'];

        if ($search) {
            $tbl_gallery = $this->mymodel->selectWithQuery("SELECT * FROM tbl_gallery WHERE imagegroup_id = '" . $id . "' AND title LIKE '%" . $_GET['title'] . "%' ORDER BY id DESC LIMIT " . $this->input->post('limit') . " OFFSET " . $this->input->post('start'));
        } else {
            $tbl_gallery = $this->mymodel->selectWithQuery('SELECT * FROM tbl_gallery WHERE imagegroup_id = ' . $id . ' ORDER BY id DESC LIMIT ' . $this->input->post('limit') . ' OFFSET ' . $this->input->post('start'));
        }
        if ($tbl_gallery) {
            foreach ($tbl_gallery as $row) {
                $file =  $this->mymodel->selectDataOne('file', array('table_id' => $row['id'], 'table' => 'tbl_gallery'));

                $output .= '
                <div class="col-xs-12">
                    <div class="box">
                    <img class="img-detail" src="' . $file['url'] . '">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12" align="center">
                                    <h3><b>' . $row['title'] . '</b></h3>
                                </div>
                                <div class="col-xs-12" align="center">
                                    <i class="fa fa-calendar"></i> Dibuat pada tgl : ' . date('d-m-Y', strtotime($row['created_at'])) . '
                                </div>
                                <div class="col-xs-12">
                                    <p>' . $row['caption'] . '</p>
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
