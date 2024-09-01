<?php

class Location extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Location_model');
        // check login
        $this->check_login();
        // Check if the user is logged in and is an admin
        if ($this->session->userdata('user_role') != 'admin') {
            redirect('login'); // Redirect to login if not an admin
        }
    }

    public function index()
    {
        $data = array();
        $data['title'] = 'Locations';
        $data['locations'] = array();
        // get all locations from the database
        $data['locations'] = $this->Location_model->get_locations();
        $this->_render_view('location/main', $data);
    }

    public function get_locations()
    {
        $locations = $this->Location_model->get_locations();
        return $locations;
    }

    // save_location
    public function save_location()
    {
        $post_data = $this->escape_post($_POST);

        // validate the post data
        if (!empty($post_data['id']) && is_numeric($post_data['id'])) {
            $this->form_validation->set_rules('location_name', 'Location Name', 'required');
        } else {
            $this->form_validation->set_rules('location_name', 'Location Name', 'required|callback_location_check');
        }

        if ($this->form_validation->run() == FALSE) {
            http_response_code(422);
            echo json_encode($this->form_validation->error_array());
        } else {

            // Set timestamps and user data
            $post_data['updated_at'] = date('Y-m-d H:i:s');
            $post_data['updated_by'] = $this->session->userdata('user_id');

            // Determine whether to update or save
            if (!empty($post_data['id']) && is_numeric($post_data['id'])) {
                // Update location
                $id = $post_data['id'];
                unset($post_data['id']);
                $result = $this->Location_model->update_location($post_data, $id);
            } else {
                // Save new location
                $post_data['created_at'] = $post_data['updated_at'];
                $post_data['created_by'] = $post_data['updated_by'];
                $result = $this->Location_model->save_location($post_data);
            }

            // Check if the operation was successful
            if ($result) {
                http_response_code(200);
                echo json_encode(array('status' => 'success', 'message' => 'Location saved successfully'));
            } else {
                http_response_code(500);
                echo json_encode(array('status' => 'error', 'message' => 'Error saving location'));
            }
        }
    }
    // delete_location
    public function delete_location()
    {
        $post_data = $this->escape_post($_POST);

        // validate the post data
        $this->form_validation->set_rules('id', 'Location ID', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            http_response_code(422);
            echo json_encode($this->form_validation->error_array());
        } else {
            // delete the location
            $id = $post_data['id'];
            // update the location with deleted current timestamp
            $result = $this->Location_model->delete_location($id);
            // Check if the operation was successful
            if ($result) {
                http_response_code(200);
                echo json_encode(array('status' => 'success', 'message' => 'Location deleted successfully'));
            } else {
                http_response_code(500);
                echo json_encode(array('status' => 'error', 'message' => 'Error deleting location'));
            }
        }
    }
}
