<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_billboards_info($from_date, $to_date)
    {
        $this->db->select('tbl_billboards.id as billboard_id, tbl_locations.*, COALESCE(SUM(tbl_traffic_data.vehicle_count), 0) as total_vehicle_count');
        $this->db->from('tbl_billboards');
        $this->db->join('tbl_traffic_data', 'tbl_traffic_data.billboard_id = tbl_billboards.id AND tbl_traffic_data.time_stamp >= "' . $from_date . '" AND tbl_traffic_data.time_stamp <= "' . $to_date . '"', 'left');
        $this->db->join('tbl_locations', 'tbl_locations.id = tbl_billboards.location_id', 'left');
        $this->db->group_by('tbl_billboards.id');
        $this->db->order_by('tbl_traffic_data.time_stamp', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
