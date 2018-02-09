<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
    
    parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('form','url');
  	}

	public function index()
	{
		if(!$this->session->userdata('logged_in')){
		$this->load->view('login');
    	} else{
    	redirect('dashboard2');	
    	}
	}
        
	public function login()
	{
		$data = array(
			'username' => $this->input->post('username', TRUE),
			'password' => md5($this->input->post('password', TRUE))
		);

		$hasil = $this->user_model->cek_user($data);
			if ($hasil->num_rows() == 1) {
				foreach ($hasil->result() as $sess) {
					$sess_data['logged_in'] = 'Sudah Loggin';
					$sess_data['user_id'] = $sess->user_id;
					$sess_data['username'] = $sess->username;
					$sess_data['avatar'] = $sess->avatar;
					$sess_data['group_id'] = $sess->group_id;
					$this->session->set_userdata($sess_data);
				}
				redirect('dashboard2');
			} else {
	$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\">
      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
      <strong>Gagal login ! !</strong> <br/> pastikan username, password anda benar
    </div>");
    redirect('auth');
			}
	}
        
        public function logout()
	{
        $this->session->unset_userdata('username');
		session_destroy();
		redirect('auth');
	}	
  }

