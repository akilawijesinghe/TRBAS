<?php 

class Billboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Billboard_model');
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
        // Load data for admin dashboard
        $data = array();
        $data['title'] = 'Billboards';
        $data['billboards'] = $this->Billboard_model->get_billboards();
        $data['locations'] = $this->Location_model->get_locations();
        $this->_render_view('billboard/main', $data);
    }

    public function save_billboard()
    {

        $post_data = $this->escape_post($_POST);

        // validate the post data
        $this->form_validation->set_rules('location_id', 'Location', 'required');
        $this->form_validation->set_rules('size', 'Size', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('mac_address', 'Mac Address', 'required');
        $this->form_validation->set_rules('active', 'Active', 'required');
        $this->form_validation->set_rules('price_per_day', 'Price Per Day', 'required|numeric');
        $this->form_validation->set_rules('minimum_vehicle_count', 'Minimum Vehicle Count', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            http_response_code(422);
            echo json_encode($this->form_validation->error_array());
        } else {
            // save the billboard
            if(!empty($post_data['id']) && is_numeric($post_data['id'])) {
                // Update billboard
                $id = $post_data['id'];
                unset($post_data['id']);
                $res = $this->Billboard_model->update_billboard($post_data, $id);
            } else {
                // Set timestamps and user data
                $post_data['created_at'] = date('Y-m-d H:i:s');
                $post_data['created_by'] = $this->session->userdata('user_id');
                $res = $this->Billboard_model->save_billboard($post_data);
            }
            if ($res) {
                http_response_code(200);
                echo json_encode(array('status' => 'success', 'message' => 'Billboard saved successfully'));
            } else {
                http_response_code(500);
                echo json_encode(array('status' => 'error', 'message' => 'Error saving billboard'));
            }
        }
    }

    // delete_billboard
    public function delete_billboard()
    {
        $post_data = $this->escape_post($_POST);
        $id = $post_data['id'];
        $res = $this->Billboard_model->delete_billboard($id);
        if ($res) {
            http_response_code(200);
            echo json_encode(array('status' => 'success', 'message' => 'Billboard deleted successfully'));
        } else {
            http_response_code(500);
            echo json_encode(array('status' => 'error', 'message' => 'Error deleting billboard'));
        }
    }
}