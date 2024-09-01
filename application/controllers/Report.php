<?php

class Report extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Report_model');
    }


    public function index()
    {
        $this->_render_view('report/test');
    }

    public function traffic_report()
    {
        // check is this admin
        if ($this->session->userdata('user_role') != 'admin') {
            redirect('login'); // Redirect to login if not an admin
        }

        $data = array();

        if ($this->input->post()) {
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $data['from_date'] = $from_date;
            $data['to_date'] = $to_date;
            $data['data'] = $this->Report_model->get_billboards_info($from_date, $to_date);
            $this->load->view('report/pdf/traffic_report', $data);
        } else {
            $data['title'] = "Traffic Volume Report";
            $data['action'] = "report/traffic_report";
            $this->_render_view('report/date_range', $data);
        }
    }

    // ad_performance_report
    public function ad_performance_report()
    {
        // check is this admin
        if ($this->session->userdata('user_role') != 'admin') {
            redirect('login'); // Redirect to login if not an admin
        }

        $data = array();

        if ($this->input->post()) {
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $data['from_date'] = $from_date;
            $data['to_date'] = $to_date;
            $data['data'] = $this->Report_model->get_ads_info($from_date, $to_date);
            $this->load->view('report/pdf/ad_performance', $data);
        } else {
            $data['title'] = "Ad Performance Report";
            $data['action'] = "report/ad_performance_report";
            $this->_render_view('report/date_range', $data);
        }
    }

    // revenue_report
    public function revenue_report()
    {
        // check is this admin
        if ($this->session->userdata('user_role') != 'admin') {
            redirect('login'); // Redirect to login if not an admin
        }

        $data = array();

        if ($this->input->post()) {
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $data['from_date'] = $from_date;
            $data['to_date'] = $to_date;
            $data['data'] = $this->Report_model->get_revenue_info($from_date, $to_date);
            $this->load->view('report/pdf/revenue_report', $data);
        } else {
            $data['title'] = "Revenue Report";
            $data['action'] = "report/revenue_report";
            $this->_render_view('report/date_range', $data);
        }
    }
}
