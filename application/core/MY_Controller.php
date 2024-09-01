<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
    }
    public function _render_view($view, $data = [])
    {
        $this->load->view('template/header');
        $data['content'] = $this->load->view($view, $data, TRUE);
        if (!isset($data['title'])) $data['title'] = 'Welcome';
        $this->load->view('template/content', $data);
        $this->load->view('template/footer');
    }

    protected function check_login()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    protected function check_admin()
    {
        if ($this->session->userdata('user_role') != 'admin') {
            show_error('You are not authorized to access this page', 403);
        }
    }

    protected function check_customer()
    {
        if ($this->session->userdata('user_role') != 'customer') {
            show_error('You are not authorized to access this page', 403);
        }
    }

    protected function escape_post($post)
    {
        $data = [];
        foreach ($post as $key => $value) {
            $data[$key] = $this->input->post($key);
        }
        return $data;
    }

    protected function insert_row($table, $data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->session->userdata('user_id');
        return $this->db->insert($table, $data);
    }

    protected function update_row($table, $data, $where)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->session->userdata('user_id');
        return $this->db->update($table, $data, $where);
    }

    public function email_check($email)
    {
        $this->load->database();
        $this->db->where('email', $email);
        $this->db->where('deleted_at', NULL);
        $this->db->where('active', 1);
        $query = $this->db->get('tbl_users');

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('email_check', 'The {field} is already taken.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function location_check($location_name)
    {
        $this->load->database();
        $this->db->where('location_name', $location_name);
        $this->db->where('deleted_at', NULL);
        
        $query = $this->db->get('tbl_locations');

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('location_check', 'The {field} is already taken.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function price_package_check($package_name)
    {
        $this->load->database();
        $this->db->where('package_name', $package_name);
        $this->db->where('deleted_at', NULL);
        $query = $this->db->get('tbl_price_packages');

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('price_package_check', 'The {field} is already taken.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
