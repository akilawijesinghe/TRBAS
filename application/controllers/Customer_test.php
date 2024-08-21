<?php

class Customer_test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('Customer_model');
    }

    public function index()
    {
        $this->test_save_customer();
        $this->test_update_customer();
        $this->test_delete_customer();
        $this->test_get_customers();
    }

    public function test_save_customer()
    {
        // Test data for saving a new customer
        $data = array(
            'name' => 'Test Customer',
            'email' => 'testcustomer@example.com',
            'contact' => '1234567890',
            'password' => password_hash('TestPassword123', PASSWORD_DEFAULT),
            'role' => 'customer',
            'abn' => '123456789',
            'business_address' => '123 Test St'
        );

        // Expected result
        $expected_result = true;
        $test_name = 'Save Customer Test';

        // Call the method to test
        $result = $this->Customer_model->save_customer($data);

        // Run the test
        echo $this->unit->run($result, $expected_result, $test_name);
    }

    public function test_update_customer()
    {
        // Test data for updating an existing customer
        $data = array(
            'name' => 'Updated Customer',
            'email' => 'updatedcustomer@example.com',
            'contact' => '0987654321',
            'abn' => '987654321',
            'business_address' => '456 Updated St',
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => 1
        );

        $customerId = 1; // Assuming a customer with ID 1 exists

        // Expected result
        $expected_result = true;
        $test_name = 'Update Customer Test';

        // Call the method to test
        $result = $this->Customer_model->update_customer($data, $customerId);

        // Run the test
        echo $this->unit->run($result, $expected_result, $test_name);
    }

    public function test_delete_customer()
    {
        $customerId = 1; // Assuming a customer with ID 1 exists

        // Expected result
        $expected_result = true;
        $test_name = 'Delete Customer Test';

        // Call the method to test
        $result = $this->Customer_model->delete_customer($customerId);

        // Run the test
        echo $this->unit->run($result, $expected_result, $test_name);
    }

    public function test_get_customers()
    {
        // Expected result should be an array
        $expected_result = 'is_array';
        $test_name = 'Get Customers Test';

        // Call the method to test
        $result = $this->Customer_model->get_customers();

        // Run the test
        echo $this->unit->run($result, $expected_result, $test_name);
    }
}
