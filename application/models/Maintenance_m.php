<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Maintenance_m extends MY_Model
{

  function __construct()
  {
    $this->data['table_name'] = 'maintenance';
    $this->data['primary_key'] = 'kd_maintenance';
  }
}
