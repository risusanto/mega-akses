<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Instalasi_m extends MY_Model
{

  function __construct()
  {
    $this->data['table_name'] = 'instalasi';
    $this->data['primary_key'] = 'kd_instalasi';
  }
}
