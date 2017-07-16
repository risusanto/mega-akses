<?php
	$this->load->view('leader/template/header', array('title' => $title));
	$this->load->view('leader/template/navbar');
	$this->load->view('leader/template/sidebar');
	$this->load->view($content);
	$this->load->view('leader/template/footer');
?>
