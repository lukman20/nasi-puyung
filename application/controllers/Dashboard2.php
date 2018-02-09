<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard2 extends CI_Controller {

	public function __construct() {
    
    parent::__construct();
        $this->require_login();
  	}
  	
	public function index()
	{
		$this->load->view('dashboard2');
	}

	protected function require_login() {
    	if(!$this->session->userdata('logged_in')){
    	redirect('auth');
    	}
    }
}
