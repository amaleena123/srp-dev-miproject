<?php

class Master extends CI_Controller {
	public function __construct ()
	{
		parent::__construct();
	}

	public function index()
	{
		// Load view admin/master.php
		$this->load->view('admin/master');
	}
}
