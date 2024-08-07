<?php

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('User_model');
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
        $data['title'] = 'Users';
        $data['users'] = $this->User_model->get_users();
        $this->_render_view('user/main', $data);
    }

    public function save_user()
    {

        $post_data = $this->escape_post($_POST);

        // validate the post data
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contact', 'Contact', 'numeric');

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
            // set user role as admin
            $post_data['role'] = 'admin';
            // save the user
            if (!empty($post_data['id']) && is_numeric($post_data['id'])) {
                // Update user
                $id = $post_data['id'];
                unset($post_data['id']);

                if (!empty($post_data['password'])) {
                    $post_data['password'] = password_hash($post_data['password'], PASSWORD_DEFAULT);
                } else {
                    unset($post_data['password']);
                }
                $res = $this->User_model->update_user($post_data, $id);
            } else {
                // Set timestamps and user data
                $post_data['password'] = password_hash($post_data['password'], PASSWORD_DEFAULT);
                $res = $this->User_model->save_user($post_data);
            }
            if ($res) {
                echo json_encode(['status' => 'success', 'message' => 'User saved successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to save user']);
            }
        }
    }

    public function delete_user()
    {
        $id = $this->input->post('id');
        $res = $this->User_model->delete_user($id);
        if ($res) {
            echo json_encode(['status' => 'success', 'message' => 'User deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete user']);
        }
    }

    public function get_users()
    {
        $users = $this->User_model->get_users();
        echo json_encode($users);
    }
}
