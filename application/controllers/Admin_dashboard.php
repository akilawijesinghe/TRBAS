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
        $data = array();
        $data['title'] = 'Admin Dashboard';
        $data['billboards'] = $this->Dashboard_model->get_billboards_stats();
        $data['customers'] = $this->Dashboard_model->get_customers();
        $this->_render_view('template/admin/dashboard', $data);
    }

    public function send_mail()
    {
        if ($this->emailer->send_email('minolijayasinghe99@gmail.com', 'Test Email', '<p>This is a test email.</p>')) {
            echo 'Email sent successfully.';
        } else {
            echo 'Failed to send email.';
        }
    }
}
