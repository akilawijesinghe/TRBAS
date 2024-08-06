<?php 

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Billboard_model');

        // $auth_key = $this->input->get_request_header('auth-key', TRUE);
        // if($auth_key != '123456'){
        //     $response = array('status' => 'error', 'message' => 'Unauthorized Access');
        //     $this->output->set_content_type('application/json')->set_output(json_encode($response));
        //     return false;
        // }
        
    }

    public function get_billboards()
    {
        $billboards = $this->Billboard_model->get_billboards();
        return $billboards;
    }

}