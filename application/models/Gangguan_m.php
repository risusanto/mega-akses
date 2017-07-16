<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Gangguan_m extends MY_Model
{

  function __construct()
  {
    $this->data['table_name'] = 'gangguan';
    $this->data['primary_key'] = 'kd_gangguan';
  }
}
