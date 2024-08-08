<?php

class Customer_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // Check if the user is logged in and is a customer
        if ($this->session->userdata('user_role') != 'customer') {
            redirect('login'); // Redirect to login if not a customer
        }
    }

    public function index()
    {
        // Load data for customer dashboard
        $data = array();
        $data['title'] = 'Customer Dashboard';
        $this->load->view('template/customer/dashboard', $data);
    }

}
