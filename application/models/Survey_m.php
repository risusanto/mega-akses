<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Survey_m extends MY_Model
{

  function __construct()
  {
    $this->data['table_name'] = 'survey';
    $this->data['primary_key'] = 'kd_survey';
  }
}
