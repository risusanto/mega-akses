<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Pelanggan extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->data['username'] = $this->session->userdata('username');
    $this->data['id_role'] = $this->session->userdata('id_role');
    if (!isset($this->data['id_role']) || $this->data['id_role'] != 3) {
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('id_role');
			$this->flashmsg('Anda harus login terlebih dahulu!', 'warning');
      redirect('login');
      exit;
    }
    $this->load->model('user_m');
    $this->load->model('pelanggan_m');
    $this->data['profile'] = $this->pelanggan_m->get_row(['email' => $this->data['username']]);
    if ($this->data['profile']->status < 1) {
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('id_role');
      $this->flashmsg('Akun anda belum diaktivasi, mohon tunggu hingga proses survey dilakukan!', 'warning');
      redirect('login');
    }
  }

  public function index()
  {
    if ($this->POST('ganti_passwd')) {
        $this->load->model('user_m');
        $req = ['password','new_password','confirm'];
        if (!$this->user_m->required_input($req)) {
          $this->flashmsg('Data harus lengkap!');
          redirect('pelanggan');
          exit;
        }
        $data = [
          'username' => $this->data['username'],
          'password' => md5($this->POST('password'))
        ];
        $cek = $this->user_m->get_row($data);
        if (!isset($cek)) {
          $this->flashmsg('Password salah!','danger');
          redirect('pelanggan');
          exit;
        }
        if ($this->POST('new_password') != $this->POST('confirm')) {
          $this->flashmsg('Password harus sama!','danger');
          redirect('pelanggan');
          exit;
        }
        $this->user_m->update($this->data['username'],['password' => md5($this->POST('new_password'))]);
        $this->flashmsg('Password diganti');
        redirect('pelanggan');
        exit;
      }
    $this->data['title'] = 'Dashboard'.$this->title;
    $this->data['content'] = 'pelanggan/dashboard';

    $this->template($this->data);
  }

  public function jadwal_instalasi()
  {
    $this->load->model('instalasi_m');

    $tables = ['teknisi','pelanggan']; $jcond = ['kd_teknisi','kd_pelanggan'];
    $this->data['jadwal'] = $this->instalasi_m->getDataJoin($tables,$jcond);
    $this->data['title'] = 'Jadwal Instalasi'.$this->title;
    $this->data['content'] = 'pelanggan/jadwal-instalasi';

    $this->template($this->data);
  }

  public function jadwal_maintenance()
  {
    $this->load->model('maintenance_m');
    $tables = ['pelanggan']; $jcond = ['kd_pelanggan'];
    $this->data['jadwal'] = $this->maintenance_m->getDataJoin($tables,$jcond);
    $this->data['title'] = 'Jadwal Maintenance'.$this->title;
    $this->data['content'] = 'pelanggan/jadwal-maintenance';

    $this->template($this->data);
  }

  public function laporkan_gangguan()
  {
    $this->load->model('gangguan_m');

    if ($this->POST('get') && $this->POST('id')) {
				$data = $this->gangguan_m->get_row(['kd_gangguan' => $this->POST('id')]);
				echo json_encode($data);
				exit;
		}

    if ($this->POST('delete')) {
      $this->gangguan_m->delete($this->POST('id'));
      exit;
    }

    if ($this->POST('edit')) {
      $req = ['gangguan'];
      if (!$this->gangguan_m->required_input($req)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('pelanggan/laporkan-gangguan');
        exit;
      }
      $data_gangguan = [
        'tanggal_gangguan' => date('Y-m-d'),
        'gangguan' => $this->POST('gangguan'),
        'kd_pelanggan' => $this->data['profile']->kd_pelanggan
      ];
      $this->gangguan_m->update($this->POST('id'),$data_gangguan);
      $this->flashmsg('data disimpan!');
      redirect('pelanggan/laporkan-gangguan');
      exit;
    }

    if ($this->POST('add')) {
      $req = ['gangguan'];
      if (!$this->gangguan_m->required_input($req)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('pelanggan/laporkan-gangguan');
        exit;
      }
      $data_gangguan = [
        'tanggal_gangguan' => date('Y-m-d'),
        'gangguan' => $this->POST('gangguan'),
        'kd_pelanggan' => $this->data['profile']->kd_pelanggan
      ];
      $this->gangguan_m->insert($data_gangguan);
      $this->flashmsg('data disimpan!');
      redirect('pelanggan/laporkan-gangguan');
      exit;
    }

    $this->data['gangguan'] = $this->gangguan_m->get(['kd_pelanggan' => $this->data['profile']->kd_pelanggan]);
    $this->data['title'] = 'Laporkan Gangguan'.$this->title;
    $this->data['content'] = 'pelanggan/gangguan';

    $this->template($this->data);
  }
}
