<?php

class Customer_dashboard extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // dashboard model
        $this->load->model('Dashboard_model');
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
        $data['customers'] = $this->Dashboard_model->get_customer_billboards();
        $data['ads'] = $this->Dashboard_model->get_customer_ads();
        $data['customers'] = array();
        $data['ads'] = array();

        $this->_render_view('template/customer/dashboard', $data);
    }

}
