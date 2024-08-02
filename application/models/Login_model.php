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
}
