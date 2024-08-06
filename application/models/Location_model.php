<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Location_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tbl_locations';
    }

    // save location
    public function save_location($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // get location
    public function get_locations()
    {
        $this->db->where('deleted_at', NULL);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    // update location by id
    public function update_location($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // delete location by id
    public function delete_location($id)
    {
        $data = array(
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $this->session->userdata('user_id')
        );
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
}
