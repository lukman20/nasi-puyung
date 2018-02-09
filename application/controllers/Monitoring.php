<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

	public function __construct() {
    
    parent::__construct();
        $this->load->helper('form','url');
        $this->load->model('import_model');
        $this->require_login();
  	}
  	
	public function index($success="")
	{
        
        if ($success) {
            $data['pesan'] = '<div class="alert alert-success alert-dismissible">';
            $data['pesan'] .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
            $data['pesan'] .= '<h4><i class="icon fa fa-check"></i> Alert!</h4>';
            $data['pesan'] .= 'Success alert preview. This alert is dismissable.';
            $data['pesan'] .= '</div>';
        }

       $data['items'] = $this->import_model->filterTagihanBelumBayar();
       $data['collection'] = $this->import_model->filterPelangganBelumBayar();
       $data['result'] = $this->import_model->filterHasil();

		$this->load->view('monitoring/index',$data, FALSE);
	}

  public function do_upload_master(){
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'xlsx|xls';
        
        $this->load->library('upload', $config);

        
        $master = 'master';
        //$tagihan = 'tagihan';
        
        if ($this->upload->do_upload($master)){
            $data = array(
              'upload_data_master' => $_FILES['master'],
              // 'upload_data_tagihan' => $_FILES['tagihan'],
              );
            
            $filename_master = $data['upload_data_master']['name'];
            // $filename_tagihan = $data['upload_data_tagihan']['name'];
            $this->import_model->upload_data_master($filename_master);
            unlink('./upload/'.$filename_master);
            // unlink('./upload/'.$filename_tagihan);
            $this->session->set_flashdata("success", "<div class=\"alert alert-success\">
              <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
              <strong>Data Berhasil Disimpan ! !</strong> </div>");
              redirect('monitoring');
        }else{
            // $error = array('error' => $this->upload->display_errors());
            // print_r($error);
            $this->session->set_flashdata("success", "<div class=\"alert alert-danger\">
              <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
              <strong>Data Gagal Disimpan ! !</strong> </div>");
            redirect('monitoring');
        }
    }

    public function do_upload_tagihan(){
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'xlsx|xls';
        
        $this->load->library('upload', $config);

        
        //$master = 'master';
        $tagihan = 'tagihan';
        
        if ($this->upload->do_upload($tagihan)){
            $data = array(
              // 'upload_data_master' => $_FILES['master'],
              'upload_data_tagihan' => $_FILES['tagihan'],
              );
            
            // $filename_master = $data['upload_data_master']['name'];
            $filename_tagihan = $data['upload_data_tagihan']['name'];
            $this->import_model->upload_data_tagihan($filename_tagihan);
            // unlink('./upload/'.$filename_master);
            unlink('./upload/'.$filename_tagihan);
            $this->session->set_flashdata("success", "<div class=\"alert alert-success\">
              <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
              <strong>Data Berhasil Disimpan ! !</strong> </div>");
              redirect('monitoring');
        }else{
            // $error = array('error' => $this->upload->display_errors());
            // print_r($error);
            $this->session->set_flashdata("success", "<div class=\"alert alert-danger\">
              <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
              <strong>Data Gagal Disimpan ! !</strong> </div>");
            redirect('monitoring');
        }
    }

	protected function require_login() {
    	if(!$this->session->userdata('logged_in')){
    	redirect('auth');
    	}
    }
}
