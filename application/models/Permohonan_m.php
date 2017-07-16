<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Permohonan_m extends MY_Model
{

  function __construct()
  {
    $this->data['table_name'] = 'permohonan';
    $this->data['primary_key'] = 'kd_permohonan';
  }
}
