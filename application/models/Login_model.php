<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function auth($email)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('email', $email);
        $this->db->where('deleted_at', NULL);
        $this->db->where('active', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    // register_customer
    public function register($data)
    {

        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('email', $data['email']);
        $query = $this->db->get();
        $user = $query->row_array();

        if ($user) {
            return false;
        }

        $this->db->insert('tbl_users', $data);
        return $this->db->insert_id();
    }

    public function register_customer($data)
    {
        $this->db->insert('tbl_customer_details', $data);
        return $this->db->insert_id();
    }

    public function get_user_role($user_id)
    {
        $this->db->select('tbl_user_role.*, tbl_role.role_name');
        $this->db->from('tbl_user_role');
        $this->db->join('tbl_role', 'tbl_role.id = tbl_user_role.role_id');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->row_array();
    }
}
