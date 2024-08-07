<?php

class Customer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Customer_model');
        $this->load->model('User_model');
        // check login
        $this->check_login();
        // Check if the customer is logged in and is an admin
        if ($this->session->userdata('user_role') != 'admin') {
            redirect('login'); // Redirect to login if not an admin
        }
    }

    public function index()
    {
        // Load data for admin dashboard
        $data = array();
        $data['title'] = 'Customer';
        $data['customers'] = $this->Customer_model->get_customers();
        // print_r($data['customers']);
        // die;
        $this->_render_view('customer_/main', $data);
    }

    public function save_customer()
    {

        $post_data = $this->escape_post($_POST);

        // validate the post data
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contact', 'Contact', 'numeric');
        $this->form_validation->set_rules('business_address', 'Business Address', 'required');

        if (!empty($post_data['id']) && is_numeric($post_data['id'])) {
            if (!empty($post_data['password'])) {
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('password_conform', 'Confirm Password', 'required|matches[password]');
            }
        } else {
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password_conform', 'Confirm Password', 'required|matches[password]');
        }

        if ($this->form_validation->run() == FALSE) {
            http_response_code(422);
            echo json_encode($this->form_validation->error_array());
        } else {
            // unset confirm password
            unset($post_data['password_conform']);
            // set customer role as admin
            $post_data['role'] = 'customer';
            // save the customer
            if (!empty($post_data['id']) && is_numeric($post_data['id'])) {
                // Update customer
                $id = $post_data['id'];
                unset($post_data['id']);

                if (!empty($post_data['password'])) {
                    $post_data['password'] = password_hash($post_data['password'], PASSWORD_DEFAULT);
                } else {
                    unset($post_data['password']);
                }
                $res = $this->Customer_model->update_customer($post_data, $id);
            } else {
                // Set timestamps and customer data
                $post_data['password'] = password_hash($post_data['password'], PASSWORD_DEFAULT);
                $res = $this->Customer_model->save_customer($post_data);
            }
            if ($res) {
                echo json_encode(['status' => 'success', 'message' => 'Customer saved successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to save customer']);
            }
        }
    }

    public function delete_customer()
    {
        $id = $this->input->post('id');
        $res = $this->Customer_model->delete_customer($id);
        if ($res) {
            echo json_encode(['status' => 'success', 'message' => 'Customer deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete customer']);
        }
    }

    public function get_customers()
    {
        $customers = $this->Customer_model->get_customers();
        echo json_encode($customers);
    }
}
