<?php 

class Billboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // Check if the user is logged in and is an admin
        if ($this->session->userdata('user_role') != 'admin') {
            redirect('login'); // Redirect to login if not an admin
        }
    }

    public function index()
    {
        // Load data for admin dashboard
        $data = array();
        $data['title'] = 'Billboards';
        $data['billboards'] = array();
        $this->_render_view('billboard/main', $data);
    }
}