<?php

class User_test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('User_model');
    }

    public function index()
    {
        $this->test_save_user();
        $this->test_update_user();
        $this->test_delete_user();
        $this->test_get_users();
        echo $this->unit->report();
    }

    public function test_save_user()
    {
        // Test data for saving a new user
        $data = array(
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'contact' => '1234567890',
            'password' => password_hash('TestPassword123', PASSWORD_DEFAULT),
            'role' => 'admin'
        );

        // Expected result
        $expected_result = true;
        $test_name = 'Save User Test';

        // Call the method to test
        $result = $this->User_model->save_user($data);

        // Run the test
        $this->unit->run($result, $expected_result, $test_name);
    }

    public function test_update_user()
    {
        // Test data for updating an existing user
        $data = array(
            'name' => 'Updated User',
            'email' => 'updateduser@example.com',
            'contact' => '0987654321',
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => 1
        );

        $userId = 1; // Assuming a user with ID 1 exists

        // Expected result
        $expected_result = true;
        $test_name = 'Update User Test';

        // Call the method to test
        $result = $this->User_model->update_user($data, $userId);

        // Run the test
        $this->unit->run($result, $expected_result, $test_name);
    }

    public function test_delete_user()
    {
        $userId = 1; // Assuming a user with ID 1 exists

        // Expected result
        $expected_result = true;
        $test_name = 'Delete User Test';

        // Call the method to test
        $result = $this->User_model->delete_user($userId);

        // Run the test
        $this->unit->run($result, $expected_result, $test_name);
    }

    public function test_get_users()
    {
        // Expected result should be an array
        $expected_result = 'is_array';
        $test_name = 'Get Users Test';

        // Call the method to test
        $result = $this->User_model->get_users();

        // Run the test
        $this->unit->run($result, $expected_result, $test_name);
    }
}
