<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tbl_users';
    }

    public function save_user($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->session->userdata('user_id');
        return $this->db->insert($this->table, $data);
    }

    public function update_user($data, $id)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->session->userdata('user_id');
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_user($id)
    {
        $data = array(
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $this->session->userdata('user_id')
        );
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function get_users()
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('role', 'admin');
        $this->db->where('tbl_users.deleted_at', NULL);
        $query = $this->db->get();
        return $query->result_array();
    }
}
