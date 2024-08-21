<?php

class Location_test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('Location_model');
    }

    public function index() {
        echo "Location_test controller is working!";
    }
}