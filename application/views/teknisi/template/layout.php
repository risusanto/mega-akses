<?php
	$this->load->view('teknisi/template/header', array('title' => $title));
	$this->load->view('teknisi/template/navbar');
	$this->load->view('teknisi/template/sidebar');
	$this->load->view($content);
	$this->load->view('teknisi/template/footer');
?>
