<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['page'] = 'Login';
		$this->template->load('template/login_template', 'login/index', $data);
	}

    public function act_login(){ 
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $pass = md5($password);

        $session     = $this->mlogin->login($email,$pass);
        if ($session) {
            $this->session->set_userdata('session_sop', true);
            $this->session->set_userdata('id', $session['id']);
            $this->session->set_userdata('email', $session['email']);
            $this->session->set_userdata('name', $session['name']);
            $this->session->set_userdata('role', 'Investor');
            echo "success";
            return TRUE;
        } else {
            $this->alert->alertdanger("Cek Kembali Email dan Password anda !");
            return FALSE;
        }
    }

	public function logout()
	{
        $this->session->sess_destroy();
        header('Location: '.base_url('login'));
	}

	public function register()
	{
		$data['page'] = 'Daftar';
		$this->template->load('template/login_template', 'login/register', $data);
	}

	public function validate()
	{
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		$this->form_validation->set_rules('dt[name]', '<strong>Nama Tim</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[email]', '<strong>Email Tim</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('password', '<strong>Password</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('confirmpassword', '<strong>Konfirmasi Password</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[alamat]', '<strong>Alamat Tim</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[kota]', '<strong>Kota Tim</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_rules('dt[nowa]', '<strong>Nomor Wa</strong> Tidak Boleh Kosong', 'required');
		$this->form_validation->set_message('required', '%s');
	}

	public function actionRegister()
	{
		$this->validate();
		if ($this->form_validation->run() == FALSE) {
			$this->alert->alertdanger(validation_errors());
		} else {
			$email_query = $this->mymodel->selectWhere('tbl_team', array('email' => $_POST['dt']['email']));
			if ($email_query != null) {
				$this->alert->alertdanger('<strong>Email</strong> tersebut sudah Terdaftar');
				return false;
			} else if ($_POST['password'] != $_POST['confirmpassword']) {
				$this->alert->alertdanger('<strong>Password</strong> & <strong> Konfirmasi Password </strong> tidak sama !');
				return false;
			} else {
				$dt = $_POST['dt'];
				$dt['password'] = md5($_POST['password']);
				$dt['verificacion'] = "DISABLE";
				$dt['status'] = "ENABLE";
				$dt['created_at'] = date('Y-m-d H:i:s');
				$this->db->insert('tbl_team', $dt);

				$file['name'] = 'team_default.png';
				$file['mime'] = 'image/png';
				$file['dir'] = 'webfiles/team/team_default.png';
				$file['table'] = 'tbl_team';
				$file['table_id'] = $this->db->insert_id();
				$file['url'] = base_url().$file['dir'];
				$file['status'] = 'ENABLE';
				$file['created_at'] = date('Y-m-d H:i:s');

				$this->db->insert('file', $file);

				$session     = $this->mlogin->login($_POST['dt']['email'], md5($_POST['password']));
				$this->session->set_userdata('session_sop', true);
				$this->session->set_userdata('id', $session['id']);
				$this->session->set_userdata('email', $session['email']);
				$this->session->set_userdata('name', $session['name']);
				$this->session->set_userdata('role', 'Investor');

				$this->alert->alertsuccess('Akun Berhasil Terdaftar anda akan di arahkan ke halaman utama');
			}
		}
	} 
}
