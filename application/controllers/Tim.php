<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Tim extends CI_Controller {

    protected $uri_segment_one = "tim";
    protected $folder = "tim";
    protected $title = "Tim";

	public function __construct() {
    parent::__construct();
        $this->load->model('tim_model');
        $this->load->helper('form','url');
        $this->require_login();
  }

	public function index()
	{
        $data=[
        'title' => $this->title,
        'uri_segment_one'=>$this->uri_segment_one,
        'items'  => (object) $this->tim_model->all_record()
        ];
		$this->load->view($this->folder.'/index',$data);
	}

    public function add()
    {   $data=[
        'title' => $this->title,
        'uri_segment_one'=>$this->uri_segment_one,
        'type' => 'create'
        ];
        $this->load->view($this->folder.'/form',$data);
    }

    public function update($id)
    {   

        $data=[
        'title' => $this->title,
        'uri_segment_one'=>$this->uri_segment_one,
        'data'  => $this->tim_model->one_record($id),
        'type' => 'update'
        ];
        $this->load->view($this->folder.'/form',$data);
    }

    public function save()
    {
        $id = $this->input->post('tim_id');
            $data = [
             'jenis_tim' => $this->input->post('jenis_tim'),
             'nama_tim' => $this->input->post('nama_tim'),
             'koor' => $this->input->post('koor'),
             'anggota' => $this->input->post('anggota'),
        ];

            if ($id!='') 
            {
                $this->tim_model->update_record($data,$id);
            } else {
                $this->tim_model->insert_record($data);
            }
            
            redirect($this->uri_segment_one);
    }

    

    public function delete($id)
    {
        $this->tim_model->delete_record($id);
        redirect($this->uri_segment_one);
    }

    protected function require_login() {
        if(!$this->session->userdata('logged_in')){
            redirect('auth');
        }
    }
}