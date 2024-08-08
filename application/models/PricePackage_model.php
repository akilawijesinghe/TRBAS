<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PricePackage_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tbl_price_packages';
    }

    public function save_pricepackage($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_pricepackage($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_pricepackage($id)
    {
        $data = array(
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $this->session->userdata('user_id')
        );
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function get_pricepackages()
    {
        $this->db->select('*');
        $this->db->from('tbl_price_packages');
        $this->db->where('deleted_at', NULL);
        $this->db->where('active', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
}
