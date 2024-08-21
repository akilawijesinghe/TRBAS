<?php

class Billboard_test extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('Billboard_model');
    }

    public function index()
    {
        $this->get_billboards();
        $this->test_save_billboard();
        $this->update_billboard();
        $this->test_delete_billboard();
    }

    public function get_billboards()
    {
        $expected_result = 'is_array';
        $test_name = 'Get Billboards Test';

        $result = $this->Billboard_model->get_billboards();

        echo $this->unit->run($result, $expected_result, $test_name);
    }

    public function test_save_billboard()
    {
        $postData = array(
            'location_id' => 17,
            'size' => 'Large',
            'type' => 'Digital',
            'mac_address' => '00:1B:44:11:3A:B7',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => 6
        );

        $expected_result = true;
        $test_name = 'Save Billboard Test';

        $result = $this->Billboard_model->save_billboard($postData);

        echo $this->unit->run($result, $expected_result, $test_name);
    }

    public function update_billboard()
    {
        $postData = array(
            'location_id' => 17,
            'size' => 'Large',
            'type' => 'Digital',
            'mac_address' => '00:1B:44:11:3A:B7',
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => 6
        );

        $id = 1; // Assuming an ID to update

        $expected_result = true;
        $test_name = 'Update Billboard Test';

        $result = $this->Billboard_model->update_billboard($postData, $id);

        echo $this->unit->run($result, $expected_result, $test_name);
    }

    public function test_delete_billboard()
    {
        $id = 1; // Assuming an ID to delete

        $expected_result = true;
        $test_name = 'Delete Billboard Test';

        $result = $this->Billboard_model->delete_billboard($id);

        echo $this->unit->run($result, $expected_result, $test_name);
    }
}
