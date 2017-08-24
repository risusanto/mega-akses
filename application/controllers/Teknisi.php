<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Teknisi extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->data['username'] = $this->session->userdata('username');
    $this->data['id_role'] = $this->session->userdata('id_role');
    if (!isset($this->data['id_role']) || $this->data['id_role'] != 5) {
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('id_role');
			$this->flashmsg('Anda harus login terlebih dahulu!', 'warning');
      redirect('login');
      exit;
    }
    $this->load->model('teknisi_m');
    $this->load->model('user_m');
    $this->data['profile'] = $this->teknisi_m->get_row(['nama_teknisi' => $this->data['username']]);
  }

  public function index()
  {
    $this->load->model('permohonan_m');

    if ($this->POST('ganti_passwd')) {
        $this->load->model('user_m');
        $req = ['password','new_password','confirm'];
        if (!$this->user_m->required_input($req)) {
          $this->flashmsg('Data harus lengkap!');
          redirect('teknisi');
          exit;
        }
        $data = [
          'username' => $this->data['username'],
          'password' => md5($this->POST('password'))
        ];
        $cek = $this->user_m->get_row($data);
        if (!isset($cek)) {
          $this->flashmsg('Password salah!','danger');
          redirect('teknisi');
          exit;
        }
        if ($this->POST('new_password') != $this->POST('confirm')) {
          $this->flashmsg('Password harus sama!','danger');
          redirect('teknisi');
          exit;
        }
        $this->user_m->update($this->data['username'],['password' => md5($this->POST('new_password'))]);
        $this->flashmsg('Password diganti');
        redirect('teknisi');
        exit;
      }

    $this->data['title'] = 'Dashboard'.$this->title;
    $this->data['content'] = 'teknisi/dashboard';

    $this->template($this->data,'teknisi');
  }

  public function jadwal_instalasi()
  {
    $this->load->model('instalasi_m');
    $this->load->model('pelanggan_m');

    if ($this->POST('selesai') && $this->POST('id')) {
      $data = ['status_instalasi' => 'selesai' ];
      $user = ['status' => 2];
      $this->instalasi_m->update($this->POST('id'),$data);
      $id = $this->instalasi_m->get_row(['kd_instalasi' => $this->POST('id')])->kd_pelanggan;
      $this->pelanggan_m->update($id,$user);
      exit;
    }

    $tables = ['pelanggan','teknisi']; $jcond = ['kd_pelanggan','kd_teknisi'];
    $this->data['jadwal'] = $this->instalasi_m->getDataJoin($tables,$jcond);
    $this->data['title'] = 'Jadwal Instalasi'.$this->title;
    $this->data['content'] = 'teknisi/jadwal-instalasi';

    $this->template($this->data,'teknisi');
  }

  public function jadwal_maintenance()
  {
    $this->load->model('maintenance_m');
    $this->load->model('teknisi_m');

    if ($this->POST('selesai') && $this->POST('id')) {
      $data = [
        'status_maintenance' => 'selesai',
        'tgl_selesai' => date('Y-m-d')
      ];
      $this->maintenance_m->update($this->POST('id'),$data);
      exit;
    }

    $tables = ['pelanggan']; $jcond = ['kd_pelanggan'];
    $this->data['jadwal'] = $this->maintenance_m->getDataJoin($tables,$jcond);
    $this->data['title'] = 'Jadwal Maintenance'.$this->title;
    $this->data['content'] = 'teknisi/jadwal-maintenance';

    $this->template($this->data,'teknisi');
  }

}