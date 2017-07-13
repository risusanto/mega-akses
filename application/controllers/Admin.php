<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Admin extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->data['username'] = $this->session->userdata('username');
    $this->data['id_role'] = $this->session->userdata('id_role');
    if (!isset($this->data['id_role']) || $this->data['id_role'] != 1) {
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('id_role');
			$this->flashmsg('Anda harus login terlebih dahulu!', 'warning');
      redirect('login');
      exit;
    }
    $this->load->model('user_m');
  }

  public function index()
  {
    $this->data['title'] = 'Dashboard'.$this->title;
    $this->data['content'] = 'admin/dashboard';

    $this->template($this->data,'admin');
  }

  public function data_user()
  {
    $this->data['title'] = 'Data Pelanggan'.$this->title;
    $this->data['content'] = 'admin/pelanggan';

    $this->template($this->data,'admin');
  }

  public function tambah_pelanggan()
  {
    $this->load->model('pelanggan_m');
    if ($this->POST('add')) {
      $required = ['username','nama','telepon','email','brandwith','isp'];
			if (!$this->pelanggan_m->required_input($required)) {
				$this->flashmsg('Isi data dengan lengkap!', 'warning');
				redirect('admin/tambah-pelanggan');
				exit;
			}
      $data_pelanggan = [
        'username' => $this->POST('username'),
        'nama_pelanggan' => $this->POST('nama'),
        'alamat' => $this->POST('alamat'),
        'no_telp' => $this->POST('telepon'),
        'email' => $this->POST('email'),
        'brandwith' => $this->POST('brandwith'),
        'isp' => $this->POST('isp')
      ];
      $data_user = [
        'username' => $this->POST('username'),
        'password' => md5($this->POST('username')),
        'id_role' => 3
      ];
      $this->user_m->insert($data_user);
      $this->pelanggan_m->insert($data_pelanggan);
      $this->flashmsg('Data disimpan!', 'success');
      redirect('admin/data-pelanggan');
      exit;
    }
    $this->data['title'] = 'Tambah Pelanggan'.$this->title;
    $this->data['content'] = 'admin/add_pelanggan';
    $this->template($this->data,'admin');
  }

  public function data_leader()
  {
    $this->data['title'] = 'Data Leader'.$this->title;
    $this->data['content'] = 'admin/leader';

    $this->template($this->data,'admin');
  }
}
