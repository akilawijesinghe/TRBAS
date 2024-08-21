<?php

class Location_test extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('Location_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->test_save_location();
        $this->test_get_locations();
        $this->test_delete_location();
    }


    public function test_save_location()
    {
        // Mock data for a new location
        $data = [
            'location_name' => 'Test Location',
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => 1
        ];

        // Perform the save operation
        $result = $this->Location_model->save_location($data);

        // Define expected result
        $expected_result = TRUE;

        // Define test name
        $test_name = 'Test Save Location';

        // Run the test
        $this->unit->run($result, $expected_result, $test_name);

        // Display the test result
        echo $this->unit->report();
    }

    public function test_get_locations()
    {
        // Retrieve locations
        $result = $this->Location_model->get_locations();

        // Define expected result type
        $expected_result = 'is_array';

        // Define test name
        $test_name = 'Test Get Locations';

        // Run the test
        $this->unit->run($result, $expected_result, $test_name);

        // Display the test result
        echo $this->unit->report();
    }

    public function test_delete_location()
    {
        // Mock ID to delete
        $id = 1;

        // Perform the delete operation
        $result = $this->Location_model->delete_location($id);

        // Define expected result
        $expected_result = TRUE;

        // Define test name
        $test_name = 'Test Delete Location';

        // Run the test
        $this->unit->run($result, $expected_result, $test_name);

        // Display the test result
        echo $this->unit->report();
    }
}
