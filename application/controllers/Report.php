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
        $data = array();
        if ($this->input->post()) {
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $data['from_date'] = $from_date;
            $data['to_date'] = $to_date;
            $data['billboard_data'] = $this->Report_model->get_billboards_info($from_date, $to_date);
            $this->load->view('report/pdf/traffic_report', $data);
        } else {
            $data['action'] = "report/traffic_report";
            $this->_render_view('report/date_range', $data);
        }
    }
}
