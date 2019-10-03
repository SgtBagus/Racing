<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Raider extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page'] = 'Raider';
        if($_GET['name']){
            $data['raider'] = $this->mymodel->selectWithQuery('SELECT * from tbl_raider WHERE team_id = '.$this->session->userdata('id').' AND name LIKE "%'.$_GET['name'].'%"');
        }else{
            $data['raider'] = $this->mymodel->selectWhere('tbl_raider', array('team_id' => $this->session->userdata('id')));
        }
        
        $this->template->load('template/template', 'raider/index', $data);
    }
 
    public function create()
    {
        $data['page'] = 'Raider';
        $this->template->load('template/template', 'raider/create', $data);
    }

    public function edit($id)
    {
        $data['page'] = 'Raider';
        $data['raider'] = $this->mymodel->selectDataone('tbl_raider', array('id' => $id));
        $data['file'] = $this->mymodel->selectDataone('file', array('table_id' => $id, 'table' => 'tbl_raider'));
        $this->template->load('template/template', 'raider/edit', $data);
    }

    public function validate()
    {
        $this->form_validation->set_error_delimiters('<li>', '</li>');
        $this->form_validation->set_rules('dt[name]', '<strong>Nama Tim</strong> Tidak Boleh Kosong', 'required');
        $this->form_validation->set_rules('dt[alamat]', '<strong>Alamat Tim</strong> Tidak Boleh Kosong', 'required');
        $this->form_validation->set_rules('dt[kota]', '<strong>Kota</strong> Tidak Boleh Kosong', 'required');
        $this->form_validation->set_rules('dt[tgllahir]', '<strong>Tanggal Lahir</strong> Tidak Boleh Kosong', 'required');
        $this->form_validation->set_rules('dt[nostart]', '<strong>Nomor Start</strong> Tidak Boleh Kosong', 'required');
        $this->form_validation->set_rules('dt[namajersey]', '<strong>Nama Di Jersey</strong> Tidak Boleh Kosong', 'required');
        $this->form_validation->set_rules('dt[nowa]', '<strong>Nomor Wa</strong> Tidak Boleh Kosong', 'required');
        $this->form_validation->set_rules('dt[motor_id]', '<strong>Nama Motor</strong> Mohon Di Pilih', 'required');
        $this->form_validation->set_rules('dt[goldarah]', '<strong>Golongan Darah</strong> Tidak Boleh Kosong', 'required');

        $supported_file = array(
            'jpg', 'jpeg', 'png'
        );

        $src_file_name = $_FILES['file']['name'];

        if ($src_file_name) {
            $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));

            if (!in_array($ext, $supported_file)) {
                $this->form_validation->set_message('dt[gambar]', '<strong>Gambar Proyek</strong> Harus berformat PNG, JPG, JPEG', 'required');
            }
        }
        $this->form_validation->set_message('required', '%s');
    }

    public function store()
    {
        $this->validate();
        if ($this->form_validation->run() == FALSE) {
            $this->alert->alertdanger(validation_errors());
        } else {
            $id = $this->session->userdata('id');
            $dt = $_POST['dt'];
            $dt['team_id'] = $id;
            $dt['verificacion'] = 'DISABLE';
            $dt['status'] = 'ENABLE';
            $dt['created_at'] = date("Y-m-d H:i:s");
            $this->mymodel->insertData('tbl_raider', $dt);

            $last_id = $this->db->insert_id();
            if (!empty($_FILES['file']['name'])) {
                $dir  = "webfiles/raider/";
                $config['upload_path']          = $dir;
                $config['allowed_types']        = '*';
                $config['file_name']           = md5('smartsoftstudio') . rand(1000, 100000);

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    $error = $this->upload->display_errors();
                    $this->alert->alertdanger($error);
                } else {
                    $file = $this->upload->data();
                    $data = array(
                        'name' => $file['file_name'],
                        'mime' => $file['file_type'],
                        'dir' => $dir . $file['file_name'],
                        'table' => 'tbl_raider',
                        'table_id' => $last_id,
                        'url' => base_url() . $dir . $file['file_name'],
                        'status' => 'ENABLE',
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    $this->mymodel->insertData('file', $data);
                }
            }else{
                $data = array(
                    'name' => 'raider_default.png',
                    'mime' => 'image/png',
                    'dir' => 'webfiles/raider/raider_default.png',
                    'table' => 'tbl_raider',
                    'table_id' => $last_id,
                    'url' => base_url().'webfiles/raider/raider_default.png',
                    'status' => 'ENABLE',
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->mymodel->insertData('file', $data);
            }
            $this->alert->alertsuccess('Success Send Data');
        }
    }

    public function update()
    {
        $this->validate();
        if ($this->form_validation->run() == FALSE) {
            $this->alert->alertdanger(validation_errors());
        } else {
            $id = $_POST['id'];
            $dt = $_POST['dt'];
            $dt['updated_at'] = date("Y-m-d H:i:s");
            $this->mymodel->updateData('tbl_raider', $dt, array('id' => $id));

            $last_id = $this->db->insert_id();
            if (!empty($_FILES['file']['name'])) {
                $dir  = "webfiles/raider/";
                $config['upload_path']          = $dir;
                $config['allowed_types']        = '*';
                $config['file_name']           = md5('smartsoftstudio') . rand(1000, 100000);

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')) {
                    $error = $this->upload->display_errors();
                    $this->alert->alertdanger($error);
                } else {
                    $file = $this->upload->data();
                    $data = array(
                        'name' => $file['file_name'],
                        'mime' => $file['file_type'],
                        'dir' => $dir . $file['file_name'],
                        'table' => 'tbl_raider',
                        'table_id' =>  $id,
                        'url' => base_url() . $dir . $file['file_name'],
                        'status' => 'ENABLE',
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    $file = $this->mymodel->selectDataone('file', array('table_id' => $id, 'table' => 'tbl_raider'));
                    if ($file['name'] != "raider_default.png") {
                        @unlink($file['dir']);
                    }
                    $this->mymodel->updateData('file', $data, array('table_id' =>  $id, 'table' => 'tbl_raider'));
                }
            }
            $this->alert->alertsuccess('Success Send Data');
        }
    }

    public function delete($id)
    {
        $file_dir = $this->mymodel->selectDataone('file', array('table_id' => $id, 'table' => 'tbl_raider'));
        @unlink($file_dir['dir']);

        $this->mymodel->deleteData('file',  array('id' => $file_dir['id']));
        $this->mymodel->deleteData('tbl_raider',  array('id' => $id));
        header('Location:'.base_url('raider'));
    }

    public function deleteapi($id)
    {
        $file_dir = $this->mymodel->selectDataone('file', array('table_id' => $id, 'table' => 'tbl_raider'));
        @unlink($file_dir['dir']);

        $this->mymodel->deleteData('file',  array('id' => $file_dir['id']));
        $this->mymodel->deleteData('tbl_raider',  array('id' => $id));
        header('Location: http://192.168.100.9:8080/raider?delete=true');
    }
}
