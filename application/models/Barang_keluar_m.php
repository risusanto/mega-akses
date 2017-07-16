<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Barang_keluar_m extends MY_Model
{

  function __construct()
  {
    $this->data['table_name'] = 'barang_keluar';
    $this->data['primary_key'] = 'kd_barangkeluar';
  }
}
