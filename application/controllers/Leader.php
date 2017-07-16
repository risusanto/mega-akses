<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Leader extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->data['username'] = $this->session->userdata('username');
    $this->data['id_role'] = $this->session->userdata('id_role');
    if (!isset($this->data['id_role']) || $this->data['id_role'] != 2) {
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
    $this->data['content'] = 'leader/dashboard';

    $this->template($this->data,'leader');
  }

  public function data_permohonan()
  {
    $this->load->model('permohonan_m');
    $this->load->model('pelanggan_m');
    $this->load->model('survey_m');

    if ($this->POST('get') && $this->POST('id')) {
				$data = $this->pelanggan_m->get_row(['kd_pelanggan' => $this->POST('id')]);
				echo json_encode($data);
				exit;
		}

    if ($this->POST('survey') && $this->POST('id')) {
				$data = $this->survey_m->get_row(['pelanggan' => $this->POST('id')]);
				echo json_encode($data);
				exit;
		}

    if ($this->POST('edit_survey')) {
      $req = ['jarak_spilter','keterangan'];
      if (!$this->survey_m->required_input($req)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('leader/data-permohonan');
        exit;
      }
      $data_survey = [
        'jarak_spilter' => $this->POST('jarak_spilter'),
        'keterangan' => $this->POST('keterangan'),
        'status' => 'survey telah dilaksanakan'
      ];
      $data_permohonan = [
        'status' => 'survey telah dilaksanakan'
      ];
      $this->permohonan_m->update($this->POST('permohonan'),$data_permohonan);
      $this->survey_m->update($this->POST('id'),$data_survey);
      $this->flashmsg('Data disimpan!');
      redirect('leader/data-permohonan');
      exit;
    }

    $this->data['permohonan'] = $this->permohonan_m->get();
    $this->data['title'] = 'Data Permohonan & Survey'.$this->title;
    $this->data['content'] = 'leader/Permohonan';

    $this->template($this->data,'leader');
  }

  public function atur_jadwal_instalasi()
  {
    $this->load->model('pelanggan_m');
    $this->load->model('instalasi_m');
    $this->load->model('teknisi_m');

    if ($this->POST('get') && $this->POST('id')) {
				$data = $this->pelanggan_m->get_row(['kd_pelanggan' => $this->POST('id')]);
				echo json_encode($data);
				exit;
		}

    if ($this->POST('atur_instalasi')) {
      $req = ['tgl_instalasi','teknisi'];
      if (!$this->instalasi_m->required_input($req)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('leader/atur-jadwal-instalasi');
        exit;
      }
      $data = [
        'kd_pelanggan' => $this->POST('kd_pelanggan'),
        'tgl_request' => date('Y-m-d'),
        'kd_teknisi' => $this->POST('teknisi'),
        'tgl_instalasi' => $this->POST('tgl_instalasi'),
        'status_instalasi' => 'proses instalasi'
      ];
      $this->instalasi_m->insert($data);
      $this->flashmsg('Data disimpan!');
      redirect('leader/atur-jadwal-instalasi');
      exit;
    }

    $this->data['teknisi'] = $this->teknisi_m->get();
    $this->data['pelanggan'] = $this->pelanggan_m->get();
    $this->data['title'] = 'Atur Jadwal Instalasi'.$this->title;
    $this->data['content'] = 'leader/atur-jadwal-instalasi';

    $this->template($this->data,'leader');
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
    $this->data['content'] = 'leader/jadwal-instalasi';

    $this->template($this->data,'leader');
  }

  public function atur_jadwal_maintenance()
  {
    $this->load->model('gangguan_m');
    $this->load->model('pelanggan_m');
    $this->load->model('maintenance_m');

    if ($this->POST('get') && $this->POST('id')) {
				$data = $this->gangguan_m->get_row(['kd_gangguan' => $this->POST('id')]);
				echo json_encode($data);
				exit;
		}

    if ($this->POST('atur_maintenance')) {
      $req = ['tgl_maintenance'];
      if (!$this->maintenance_m->required_input($req)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('leader/atur-jadwal-maintenance');
        exit;
      }
      $data = [
        'tgl_maintenance' => $this->POST('tgl_maintenance'),
        'kd_pelanggan' => $this->POST('kd_pelanggan')
      ];
      $this->maintenance_m->insert($data);
      $this->gangguan_m->update($this->POST('kd_gangguan'),['status' => '1']);
      $this->flashmsg('Tanggal maintenance diatur');
      redirect('leader/atur-jadwal-maintenance');
      exit;
    }

    $tables = ['pelanggan']; $jcond = ['kd_pelanggan'];
    $this->data['gangguan'] = $this->gangguan_m->getDataJoin($tables,$jcond);
    $this->data['title'] = 'Atur Jadwal Maintenance'.$this->title;
    $this->data['content'] = 'leader/atur-jadwal-maintenance';

    $this->template($this->data,'leader');
  }

  public function jadwal_maintenance()
  {
    $this->load->model('maintenance_m');

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
    $this->data['content'] = 'leader/jadwal-maintenance';

    $this->template($this->data,'leader');
  }

  public function barang_keluar()
  {
    $this->load->model('barang_keluar_m');

    $this->data['barang'] = $this->barang_keluar_m->get();
    $this->data['title'] = 'Barang Keluar'.$this->title;
    $this->data['content'] = 'leader/barang-keluar';

    $this->template($this->data,'leader');
  }
}