<?php

class Report extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // load advertisement model
        $this->load->model('Advertisement_model');
        // load booking model
        $this->load->model('Booking_model');
    }


    public function index(){
        $this->load->view('report/test');
    }


}