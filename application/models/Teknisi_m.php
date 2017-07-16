<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Teknisi_m extends MY_Model
{

  function __construct()
  {
    $this->data['table_name'] = 'teknisi';
    $this->data['primary_key'] = 'kd_teknisi';
  }
}
