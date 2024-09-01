<?php 

class Price_package extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('PricePackage_model');
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
        $data['title'] = 'Price Packages';
        $data['pricepackages'] = $this->PricePackage_model->get_pricepackages();
        $this->_render_view('pricepackage/main', $data);
    }

    public function save_pricepackage()
    {

        $post_data = $this->escape_post($_POST);

        // validate the post data
        if(!empty($post_data['id']) && is_numeric($post_data['id'])) {
            $this->form_validation->set_rules('package_name', 'Package Name', 'required');
        }else{
            $this->form_validation->set_rules('package_name', 'Package Name', 'required|callback_price_package_check');
        }

        $this->form_validation->set_rules('duration', 'Duration', 'required');
        $this->form_validation->set_rules('discount', 'Discount', 'required');
        $this->form_validation->set_rules('active', 'Active', 'required');

        if ($this->form_validation->run() == FALSE) {
            http_response_code(422);
            echo json_encode($this->form_validation->error_array());
        } else {
            // save the pricepackage
            if(!empty($post_data['id']) && is_numeric($post_data['id'])) {
                // Update pricepackage
                $id = $post_data['id'];
                unset($post_data['id']);
                $res = $this->PricePackage_model->update_pricepackage($post_data, $id);
            } else {
                // Set timestamps and user data
                $post_data['created_at'] = date('Y-m-d H:i:s');
                $post_data['created_by'] = $this->session->userdata('user_id');
                $res = $this->PricePackage_model->save_pricepackage($post_data);
            }
            if ($res) {
                http_response_code(200);
                echo json_encode(array('status' => 'success', 'message' => 'Price Package saved successfully'));
            } else {
                http_response_code(500);
                echo json_encode(array('status' => 'error', 'message' => 'Error saving Price Package'));
            }
        }
    }

    // delete_pricepackage
    public function delete_pricepackage()
    {
        $post_data = $this->escape_post($_POST);
        $id = $post_data['id'];
        $res = $this->PricePackage_model->delete_pricepackage($id);
        if ($res) {
            http_response_code(200);
            echo json_encode(array('status' => 'success', 'message' => 'Price Package deleted successfully'));
        } else {
            http_response_code(500);
            echo json_encode(array('status' => 'error', 'message' => 'Error deleting price package'));
        }
    }
}