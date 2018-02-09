<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User extends CI_Controller {

    protected $uri_segment_one = "user";
    protected $folder = "user";
    protected $title = "User";

	public function __construct() {
    parent::__construct();
        $this->load->model('user_model');
        $this->load->model('group_model');
        $this->load->helper('form','url');
        $this->require_login();
  }

	public function index()
	{
        $data=[
        'title' => $this->title,
        'uri_segment_one'=>$this->uri_segment_one,
        'items'  => (object) $this->user_model->all_record()
        ];
		$this->load->view($this->folder.'/index',$data);
	}

    public function add()
    {   $data=[
        'title' => $this->title,
        'uri_segment_one'=>$this->uri_segment_one,
        'items'  => (object)$this->group_model->all_record_not_superadmin(),
        'type' => 'create'
        ];
        $this->load->view($this->folder.'/form',$data);
    }

    public function update($id)
    {   $data=[
        'title' => $this->title,
        'uri_segment_one'=>$this->uri_segment_one,
        'items'  => $this->group_model->all_record(),
        'data'  => $this->user_model->one_record($id),
        'type' => 'update'
        ];
        $this->load->view($this->folder.'/form',$data);
    }

    public function save()
    {
        $id = $this->input->post('user_id');

        $config['upload_path'] = './upload/images/users/';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['max_size']     = '100';
        //$config['max_width'] = '1024';
        //$config['max_height'] = '768';
        $this->load->library('upload', $config);
        
        $image = 'avatar';

         if ($this->upload->do_upload($image))
                {
                        $file = array('upload_data' => $this->upload->data());
                }
                // else
                // {
                //         $error = array('error' => $this->upload->display_errors());
                //         print_r($error);
                // }
             $filename = $file['upload_data']['file_name'];
            $data = [
             'username' => $this->input->post('username'),
             'fullname' => $this->input->post('fullname'),
             'email' => $this->input->post('email'),
             'status' => $this->input->post('status') ? '1' : '0',
             'group_id' => $this->input->post('group_id'),
        ];

        //print_r($data);exit();
            if(!empty($filename))
            {
                $data['avatar'] = $filename;
            } else {
                $model = $this->user_model->one_record($id);
                $data['avatar']=$model->avatar;

            }

            if ($id!='') 
            {
                $this->user_model->update_record($data,$id);
            } else {
                $data['password'] = md5($this->input->post('password'));
                $this->user_model->insert_record($data);
            }
            
            redirect($this->uri_segment_one);
    }

    public function status($id)
    {

        $model = $this->user_model->one_record($id);
            $data = [            
             'status' => $model->status=='1' ? '0' : '1',
        ];
        
        $this->user_model->update_record($data,$id);
        redirect($this->uri_segment_one);
    }

    public function delete($id)
    {
        $this->user_model->delete_record($id);
        redirect($this->uri_segment_one);
    }

    protected function require_login() {
        if(!$this->session->userdata('logged_in')){
            redirect('auth');
        }
    }
}