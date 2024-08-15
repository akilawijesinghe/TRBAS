<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Billboard_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tbl_billboards';
    }

    public function save_billboard($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_billboard($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_billboard($id)
    {
        $data = array(
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $this->session->userdata('user_id')
        );
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function get_billboards()
    {
        $this->db->select('tbl_billboards.*, tbl_locations.location_name as location');
        $this->db->from('tbl_billboards');
        $this->db->join('tbl_locations', 'tbl_locations.id = tbl_billboards.location_id', 'left');
        $this->db->where('tbl_billboards.deleted_at', NULL);
        $this->db->where('tbl_billboards.active', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

}
