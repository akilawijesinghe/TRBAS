<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tbl_booking';
    }

    public function save_booking($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->session->userdata('user_id');
        return $this->db->insert($this->table, $data);
    }

    public function update_booking($data, $id)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->session->userdata('user_id');
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_booking($id)
    {
        $data = array(
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $this->session->userdata('user_id')
        );
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function get_bookings()
    {
        $this->db->select('tbl_booking.*, tbl_users.name as customer_name,tbl_locations.location_name as billboard_name, tbl_price_packages.package_name as price_package_name,tbl_locations.id as location_id');
        $this->db->from('tbl_booking');
        $this->db->join('tbl_customer_details', 'tbl_customer_details.id = tbl_booking.customer_id', 'inner');
        $this->db->join('tbl_users', 'tbl_users.id = tbl_customer_details.user_id', 'inner');
        $this->db->join('tbl_price_packages', 'tbl_price_packages.id = tbl_booking.price_package_id', 'inner');
        $this->db->join('tbl_billboards', 'tbl_billboards.id = tbl_booking.billboard_id', 'inner');
        $this->db->join('tbl_locations', 'tbl_locations.id = tbl_billboards.location_id', 'inner');
        $this->db->where('tbl_booking.deleted_at', NULL);
        $this->db->where('tbl_booking.active', 1);

        if ($this->session->userdata('user_role') == 'customer') {
            $this->db->where('tbl_users.id', $this->session->userdata('user_id'));
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    // get bookings by booking id
    public function get_booking_by_id($id)
    {
        $this->db->select('tbl_booking.*, tbl_users.name as customer_name,tbl_users.id as uid,tbl_locations.location_name as billboard_name, tbl_price_packages.package_name as price_package_name,tbl_locations.id as location_id');
        $this->db->from('tbl_booking');
        $this->db->join('tbl_customer_details', 'tbl_customer_details.id = tbl_booking.customer_id', 'inner');
        $this->db->join('tbl_users', 'tbl_users.id = tbl_customer_details.user_id', 'inner');
        $this->db->join('tbl_price_packages', 'tbl_price_packages.id = tbl_booking.price_package_id', 'inner');
        $this->db->join('tbl_billboards', 'tbl_billboards.id = tbl_booking.billboard_id', 'inner');
        $this->db->join('tbl_locations', 'tbl_locations.id = tbl_billboards.location_id', 'inner');
        $this->db->where('tbl_booking.deleted_at', NULL);
        $this->db->where('tbl_booking.active', 1);
        $this->db->where('tbl_booking.id', $id);
        // if user is customer show only his details
        if ($this->session->userdata('user_role') == 'customer') {
            $this->db->where('tbl_users.id', $this->session->userdata('user_id'));
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_booking_dates_of_billboard($billboard_id)
    {
        $this->db->select('from_date,to_date');
        $this->db->from('tbl_booking');
        $this->db->where('billboard_id', $billboard_id);
        $this->db->where('deleted_at', NULL);
        $this->db->where('active', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

}
