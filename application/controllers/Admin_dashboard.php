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
        $this->load->library('email');
        $this->email->from('minolijayasinghe99@gmail.com', 'Your Name');
        $this->email->to('akilawijesinghe94@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class using local SMTP.');

        // Send the email
        if ($this->email->send()) {
            echo 'Email sent successfully.';
        } else {
            echo 'Email failed to send.';
            echo $this->email->print_debugger();
        }
    }
}
