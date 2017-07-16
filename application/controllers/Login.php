<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Login extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->data['username'] = $this->session->userdata('username');

		if (isset($this->data['username']))
		{
			$this->data['id_role'] = $this->session->userdata('id_role');
			switch ($this->data['id_role'])
			{
				case 1:
					redirect('admin');
					break;
				case 2:
					redirect('leader');
					break;
				case 3:
					redirect('pelanggan');
					break;
        case 4:
  				redirect('direktur');
  				break;
			}
			exit;
		}
  }

  public function index()
  {
    if ($this->POST('login')) {
			date_default_timezone_set('Asia/Jakarta');
			$this->load->model('user_m');
			$required = ['username','password'];
			if (!$this->user_m->required_input($required)) {
				$this->flashmsg('Informasi login harus lengkap!', 'warning');
				redirect('login');
				exit;
			}
			$data = [
				'username' => $this->POST('username'),
				'password' => md5($this->POST('password'))
			];
			$result = $this->user_m->login($data);
			if (!isset($result)) {
        $this->flashmsg('Username atau password salah!', 'danger');
				redirect('login');
				exit;
			}
			redirect('login');
			exit;
		}
    $this->data['title'] = 'MASUK'.$this->title;
    $this->load->view('login',$this->data);
  }
}

 ?>
