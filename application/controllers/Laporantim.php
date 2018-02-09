<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Laporantim extends CI_Controller {

    protected $uri_segment_one = "laporantim";
    protected $folder = "laporan_tim";
    protected $title = "Laporan Tim";

	public function __construct() {
    parent::__construct();
        $this->load->model('laporantim_model');
        $this->load->model('tim_model');
        $this->load->helper('form','url');
        $this->require_login();
  }

	public function index()
	{
        $data=[
        'title' => $this->title,
        'uri_segment_one'=>$this->uri_segment_one,
        'items'  => (object) $this->laporantim_model->all_record(),
        ];
		$this->load->view($this->folder.'/index',$data);
	}

    public function add()
    {   $data=[
        'title' => $this->title,
        'uri_segment_one'=>$this->uri_segment_one,
        'collection'  => (object) $this->tim_model->all_record(),
        'type' => 'create'
        ];
        $this->load->view($this->folder.'/form',$data);
    }

    // public function update($id)
    // {   

    //     $data=[
    //     'title' => $this->title,
    //     'uri_segment_one'=>$this->uri_segment_one,
    //     'data'  => $this->tim_model->one_record($id),
    //     'type' => 'update'
    //     ];
    //     $this->load->view($this->folder.'/form',$data);
    // }

    public function save()
    {


            $data = [
             'id_tim' => $this->input->post('id_tim'),
             'tanggal_laporan' => $this->input->post('tanggal_laporan'),
             'jml_pk_terima' => $this->input->post('jml_pk_terima'),
             'jml_pk_kembali' => $this->input->post('jml_pk_kembali'),
             'jml_rp' => $this->input->post('jml_rp'),
        ];

                $this->laporantim_model->insert_record($data);
            
            redirect($this->uri_segment_one);
    }

    

    // public function delete($id)
    // {
    //     $this->user_model->delete_record($id);
    //     redirect($this->uri_segment_one);
    // }

    protected function require_login() {
        if(!$this->session->userdata('logged_in')){
            redirect('auth');
        }
    }
}