<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Direktur extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->data['username'] = $this->session->userdata('username');
    $this->data['id_role'] = $this->session->userdata('id_role');
    if (!isset($this->data['id_role']) || $this->data['id_role'] != 4) {
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('id_role');
			$this->flashmsg('Anda harus login terlebih dahulu!', 'warning');
      redirect('login');
      exit;
    }
  }

  public function index()
  {
    $this->data['title'] = 'Dashboard'.$this->title;
    $this->data['content'] = 'direktur/dashboard';

    $this->template($this->data,'direktur');
  }

  public function jadwal_instalasi()
  {
    $this->load->model('instalasi_m');
    $this->load->model('pelanggan_m');

    $tables = ['pelanggan','teknisi']; $jcond = ['kd_pelanggan','kd_teknisi'];
    $this->data['jadwal'] = $this->instalasi_m->getDataJoin($tables,$jcond);
    $this->data['title'] = 'Jadwal Instalasi'.$this->title;
    $this->data['content'] = 'direktur/jadwal-instalasi';

    $this->template($this->data,'direktur');
  }

  public function jadwal_maintenance()
  {
    $this->load->model('maintenance_m');

    $tables = ['pelanggan']; $jcond = ['kd_pelanggan'];
    $this->data['jadwal'] = $this->maintenance_m->getDataJoin($tables,$jcond);
    $this->data['title'] = 'Jadwal Maintenance'.$this->title;
    $this->data['content'] = 'direktur/jadwal-maintenance';

    $this->template($this->data,'direktur');
  }

  public function data_permohonan()
  {
    $this->load->model('permohonan_m');
    $this->load->model('pelanggan_m');

    $this->data['permohonan'] = $this->permohonan_m->get();
    $this->data['title'] = 'Data Permohonan'.$this->title;
    $this->data['content'] = 'direktur/permohonan';

    $this->template($this->data,'direktur');
  }

  public function print_jadwal_instalasi()
  {
    $this->load->model('instalasi_m');
    $this->load->model('pelanggan_m');

    $tables = ['pelanggan','teknisi']; $jcond = ['kd_pelanggan','kd_teknisi'];
    $this->data['jadwal'] = $this->instalasi_m->getDataJoin($tables,$jcond);
    $this->data['title'] = 'Jadwal Instalasi'.$this->title;

    $this->load->view('laporan/instalasi', $this->data);
  }

  public function print_jadwal_maintenance()
  {
    $this->load->model('maintenance_m');

    $tables = ['pelanggan']; $jcond = ['kd_pelanggan'];
    $this->data['jadwal'] = $this->maintenance_m->getDataJoin($tables,$jcond);
    $this->data['title'] = 'Jadwal Maintenance'.$this->title;

    $this->load->view('laporan/maintenance', $this->data);
  }
}
