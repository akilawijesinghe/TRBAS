<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_runner extends MY_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary libraries, models, etc.
        $this->load->library('unit_test');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index($test_controller = null) {
        if ($test_controller) {
            // Run the specific test controller
            $this->_run_test($test_controller);
        } else {
            // Run all tests
            $this->_run_all_tests();
        }
    }

    private function _run_test($controller_name) {
        $path = APPPATH . "tests/controllers/{$controller_name}.php";

        if (file_exists($path)) {
            require_once($path);

            // Load the CI super object
            $CI = &get_instance();

            // Re-initialize the controller using the CI super object
            if (class_exists($controller_name)) {
                $CI->$controller_name = new $controller_name();
                $CI->$controller_name->index();
                echo $CI->unit->report();
            } else {
                show_error("Class {$controller_name} does not exist in {$path}");
            }
        } else {
            show_404("Test controller {$controller_name} not found.");
        }
    }

    private function _run_all_tests() {
        $path = APPPATH . 'tests/controllers/';
        $CI = &get_instance();

        foreach (glob($path . "*.php") as $filename) {
            $controller_name = basename($filename, ".php");

            require_once($filename);

            if (class_exists($controller_name)) {
                $CI->$controller_name = new $controller_name();
                $CI->$controller_name->index();
            }
        }

        echo $CI->unit->report();
    }
}
