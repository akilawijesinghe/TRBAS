<?php

class Price_package_test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('PricePackage_model');
    }

    public function index()
    {
        $this->test_save_pricepackage();
        $this->test_update_pricepackage();
        $this->test_delete_pricepackage();
        $this->test_get_pricepackages();

        echo $this->unit->report();
    }

    public function test_save_pricepackage()
    {
        // Test data for saving a new price package
        $data = array(
            'package_name' => 'Test Package',
            'duration' => 30,
            'price' => 100.00,
            'discount' => 10,
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => 1
        );

        // Expected result
        $expected_result = true;
        $test_name = 'Save Price Package Test';

        // Call the method to test
        $result = $this->PricePackage_model->save_pricepackage($data);

        // Run the test
        $this->unit->run($result, $expected_result, $test_name);
    }

    public function test_update_pricepackage()
    {
        // Test data for updating an existing price package
        $data = array(
            'package_name' => 'Updated Package',
            'duration' => 45,
            'price' => 150.00,
            'discount' => 15,
            'active' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => 1
        );

        $packageId = 1; // Assuming a package with ID 1 exists

        // Expected result
        $expected_result = true;
        $test_name = 'Update Price Package Test';

        // Call the method to test
        $result = $this->PricePackage_model->update_pricepackage($data, $packageId);

        // Run the test
        $this->unit->run($result, $expected_result, $test_name);
    }

    public function test_delete_pricepackage()
    {
        $packageId = 1; // Assuming a package with ID 1 exists

        // Expected result
        $expected_result = true;
        $test_name = 'Delete Price Package Test';

        // Call the method to test
        $result = $this->PricePackage_model->delete_pricepackage($packageId);

        // Run the test
        $this->unit->run($result, $expected_result, $test_name);
    }

    public function test_get_pricepackages()
    {
        // Expected result should be an array
        $expected_result = 'is_array';
        $test_name = 'Get Price Packages Test';

        // Call the method to test
        $result = $this->PricePackage_model->get_pricepackages();

        // Run the test
        $this->unit->run($result, $expected_result, $test_name);
    }
}
