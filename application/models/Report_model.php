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

    public function get_ads_info($from_date, $to_date)
    {
        $this->db->select('
            tbl_billboards.id as billboard_id,
            tbl_advertisements.id as ad_id,
            tbl_advertisements.video_link as video_link,
            tbl_locations.location_name,
            SUM(tbl_traffic_data.vehicle_count) as total_vehicles,
            tbl_booking.id as booking_id,
            tbl_booking.from_date,
            tbl_booking.to_date,
            tbl_customer_details.*,
            tbl_users.name as customer_name
        ');
        $this->db->from('tbl_billboards');
        $this->db->join('tbl_locations', 'tbl_locations.id = tbl_billboards.location_id', 'left');
        $this->db->join('tbl_booking', 'tbl_booking.billboard_id = tbl_billboards.id', 'left');
        $this->db->join('tbl_advertisements', 'tbl_advertisements.booking_id = tbl_booking.id', 'inner');
        $this->db->join('tbl_traffic_data', 'tbl_traffic_data.ad_id = tbl_advertisements.id AND tbl_traffic_data.time_stamp >= "' . $from_date . '" AND tbl_traffic_data.time_stamp <= "' . $to_date . '"', 'left');
        $this->db->join('tbl_customer_details', 'tbl_customer_details.id = tbl_booking.customer_id', 'left');
        $this->db->join('tbl_users', 'tbl_users.id = tbl_customer_details.user_id', 'left');
        $this->db->group_by('tbl_advertisements.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_revenue_info($from_date, $to_date)
    {
        $this->db->select('*, sum(total_price) as total_revenue');
        $this->db->from('tbl_booking');
        $this->db->where('date(created_at) >=', $from_date);
        $this->db->where('date(created_at) <=', $to_date);
        $this->db->group_by('from_date');
        $query = $this->db->get();
        return $query->result();
    }

    // get_customer_ad_exposure for logged in customer only
    public function get_customer_ad_exposure($from_date, $to_date)
    {

        $this->db->select('
            tbl_billboards.id as billboard_id,
            tbl_advertisements.id as ad_id,
            tbl_advertisements.video_link as video_link,
            tbl_locations.location_name,
            SUM(tbl_traffic_data.vehicle_count) as total_vehicles,
            tbl_booking.id as booking_id,
            tbl_booking.from_date,
            tbl_booking.to_date,
            tbl_customer_details.*,
            tbl_users.name as customer_name
        ');
        $this->db->from('tbl_billboards');
        $this->db->join('tbl_locations', 'tbl_locations.id = tbl_billboards.location_id', 'left');
        $this->db->join('tbl_booking', 'tbl_booking.billboard_id = tbl_billboards.id', 'left');
        $this->db->join('tbl_advertisements', 'tbl_advertisements.booking_id = tbl_booking.id', 'inner');
        $this->db->join('tbl_traffic_data', 'tbl_traffic_data.ad_id = tbl_advertisements.id AND tbl_traffic_data.time_stamp >= "' . $from_date . '" AND tbl_traffic_data.time_stamp <= "' . $to_date . '"', 'left');
        $this->db->join('tbl_customer_details', 'tbl_customer_details.id = tbl_booking.customer_id', 'left');
        $this->db->join('tbl_users', 'tbl_users.id = tbl_customer_details.user_id AND tbl_users.id = ' . $this->session->userdata('user_id'), 'left');
        $this->db->group_by('tbl_advertisements.id');
        $query = $this->db->get();
        return $query->result();
    }
}
