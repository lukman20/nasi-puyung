<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blank extends CI_Controller {

	public function __construct() {
    
    parent::__construct();
        $this->require_login();
  	}
  	
	public function index()
	{
		$this->load->view('blank');
	}

	protected function require_login() {
    	if(!$this->session->userdata('logged_in')){
    	 redirect('auth');
    	}
    }
}
