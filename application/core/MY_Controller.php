<?php


class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
    }
    public function _render_view($view, $data = [])
    {
        $this->load->view('template/header');
        $data['content'] = $this->load->view($view, $data, TRUE);
        if(!isset($data['title'])) $data['title'] = 'Welcome';
        $this->load->view('template/content', $data);
        $this->load->view('template/footer');
    }

    protected function check_login()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    protected function check_admin()
    {
        if ($this->session->userdata('user_role') != 'admin') {
            show_error('You are not authorized to access this page', 403);
        }
    }

    protected function check_customer()
    {
        if ($this->session->userdata('user_role') != 'customer') {
            show_error('You are not authorized to access this page', 403);
        }
    }
}
