<?php 

class Admin_dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Dashboard_model');
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
        $data['billboards'] = $this->Dashboard_model->get_billboards_stats();
        $data['customers'] = $this->Dashboard_model->get_customers();
        $data['billboards'] = array();
        $data['customers'] = array();
        $this->_render_view('template/admin/dashboard', $data);
    }
}