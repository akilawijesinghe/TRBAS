<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function get_billboards_stats()
    {

        $this->db->select('tbl_billboards.id as billboard_id, tbl_locations.*, COALESCE(SUM(tbl_traffic_data.vehicle_count), 0) as total_vehicle_count');
        $this->db->from('tbl_billboards');
        $this->db->join('tbl_traffic_data', 'tbl_traffic_data.billboard_id = tbl_billboards.id', 'left');
        $this->db->join('tbl_locations', 'tbl_locations.id = tbl_billboards.location_id', 'left');
        $this->db->group_by('tbl_billboards.id');
        $this->db->order_by('tbl_traffic_data.time_stamp', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_customers()
    {
        $this->db->select('tbl_customer_details.*, COALESCE(COUNT(tbl_advertisements.id), 0) AS total_ads, tbl_users.name');
        $this->db->from('tbl_customer_details');
        $this->db->join('tbl_booking', 'tbl_booking.customer_id = tbl_customer_details.id', 'left');
        $this->db->join('tbl_advertisements', 'tbl_advertisements.booking_id = tbl_booking.id AND tbl_advertisements.deleted_at IS NULL AND tbl_advertisements.status = 1', 'left');
        $this->db->join('tbl_users', 'tbl_users.id = tbl_customer_details.user_id', 'inner');
        $this->db->join('tbl_user_role', 'tbl_user_role.user_id = tbl_users.id', 'left');
        $this->db->join('tbl_role', 'tbl_role.id = tbl_user_role.role_id', 'left');
        $this->db->where('tbl_customer_details.deleted_at IS NULL');
        $this->db->where('tbl_users.deleted_at IS NULL');
        $this->db->where('tbl_users.active', 1);
        $this->db->where('tbl_role.role_name', 'customer');
        $this->db->group_by('tbl_users.id');
        $this->db->order_by('total_ads', 'DESC');

        $query = $this->db->get();
        return $query->result();
    }


    public function get_customer_billboards()
    {
        $this->db->select('
            tbl_billboards.*,
            tbl_traffic_data.*,
            tbl_locations.id as location_id,
            tbl_locations.location_name,
            SUM(tbl_traffic_data.vehicle_count) as total_vehicle_count,
            tbl_customer_details.*,
            tbl_users.name as customer_name
        ');
        $this->db->from('tbl_billboards');
        $this->db->join('tbl_traffic_data', 'tbl_traffic_data.billboard_id = tbl_billboards.id', 'left');
        $this->db->join('tbl_customer_details', 'tbl_customer_details.id = tbl_traffic_data.customer_id', 'left');
        $this->db->join('tbl_users', 'tbl_users.id = tbl_customer_details.user_id AND tbl_users.id = ' . $this->session->userdata('user_id'), 'left');
        $this->db->join('tbl_locations', 'tbl_locations.id = tbl_billboards.location_id', 'left');
        $this->db->order_by('tbl_traffic_data.time_stamp', 'DESC');
        $this->db->group_by('tbl_billboards.id');  // Grouping by tbl_billboards.id instead of tbl_traffic_data.billboard_id
        $query = $this->db->get();
        return $query->result();
    }

    public function get_customer_ads()
    {
        $this->db->select('
            tbl_billboards.id as billboard_id,
            tbl_advertisements.id as ad_id,
            tbl_advertisements.video_link as video_link,
            tbl_locations.location_name,
            SUM(tbl_traffic_data.vehicle_count) as total_vehicles,
            tbl_booking.id as booking_id,
            tbl_booking.from_date,
            tbl_booking.to_date
        ');
        $this->db->from('tbl_billboards');
        $this->db->join('tbl_locations', 'tbl_locations.id = tbl_billboards.location_id', 'left');
        $this->db->join('tbl_booking', 'tbl_booking.billboard_id = tbl_billboards.id', 'left');
        $this->db->join('tbl_advertisements', 'tbl_advertisements.booking_id = tbl_booking.id', 'left');
        $this->db->join('tbl_traffic_data', 'tbl_traffic_data.ad_id = tbl_advertisements.id', 'left');
        $this->db->join('tbl_customer_details', 'tbl_customer_details.id = tbl_traffic_data.customer_id', 'left');
        $this->db->join('tbl_users', 'tbl_users.id = tbl_customer_details.user_id AND tbl_users.id = ' . $this->session->userdata('user_id'), 'left');
        $this->db->group_by('tbl_advertisements.id');
        $query = $this->db->get();
        return $query->result();
    }
}
