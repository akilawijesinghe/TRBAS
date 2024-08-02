<?php 

class Admin extends MY_Controller
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
        $data['title'] = 'Admin Dashboard';
        $this->_render_view('admin/dashboard', $data);
    }
}