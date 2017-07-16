<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Pelanggan_m extends MY_Model
{

  function __construct()
  {
    $this->data['table_name'] = 'pelanggan';
    $this->data['primary_key'] = 'kd_pelanggan';
  }
}
