<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{

    // get_next_ad
    public function get_next_ad($billboard_id)
    {
        $this->db->select('tbl_booking.*, tbl_advertisements.*');
        $this->db->from('tbl_booking');
        $this->db->join('tbl_advertisements', 'tbl_advertisements.booking_id = tbl_booking.id', 'INNER');
        $this->db->join('tbl_customer_details', 'tbl_customer_details.id = tbl_booking.customer_id', 'INNER');
        $this->db->join('tbl_users', 'tbl_users.id = tbl_customer_details.user_id', 'INNER');
        $this->db->where('tbl_users.active', 1);
        $this->db->where('tbl_users.deleted_at', NULL);
        $this->db->where('tbl_booking.billboard_id', $billboard_id);
        $this->db->where('tbl_booking.active', 1);
        $this->db->where('tbl_advertisements.status', 1);
        $this->db->where('tbl_advertisements.deleted_at', NULL);
        $this->db->where('tbl_booking.from_date <=', date('Y-m-d'));
        $this->db->where('tbl_booking.to_date >=', date('Y-m-d'));
        $this->db->order_by('tbl_advertisements.start_time', 'ASC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_ad_start_time($ad_id)
    {
        $data = array(
            'start_time' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $ad_id);
        return $this->db->update('tbl_advertisements', $data);
    }

    public function get_billboard_by_mac($mac_address)
    {
        $this->db->select('*');
        $this->db->from('tbl_billboards');
        $this->db->where('mac_address', $mac_address);
        $this->db->where('active', 1);
        $this->db->where('deleted_at', NULL);
        $query = $this->db->get();
        return $query->row();
    }
}
