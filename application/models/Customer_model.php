<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'tbl_customer_details';
    }

    public function save_customer($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = $this->session->userdata('user_id');

        $abn = $data['abn'];
        $business_address = $data['business_address'];

        // remove abn and business_address from data
        unset($data['abn']);
        unset($data['business_address']);

        $this->db->insert('tbl_users', $data);
        $user_id = $this->db->insert_id();

        $customer_data = array(
            'abn' => $abn,
            'business_address' => $business_address,
            'user_id' => $user_id
        );
        
        $this->db->insert($this->table, $customer_data);
        return $user_id;
        
    }

    public function update_customer($data, $id)
    {

        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->session->userdata('user_id');

        $customer_data = array(
            'abn' => $data['abn'],
            'business_address' => $data['business_address']
        );

        $this->db->where('user_id', $id);
        $this->db->update($this->table, $customer_data);
        
        // remove abn and business_address from data
        unset($data['abn']);
        unset($data['business_address']);

        // update user table with the remaining data
        $this->db->where('id', $id);
        return $this->db->update('tbl_users', $data);
        
    }

    public function delete_customer($id)
    {
        $data = array(
            'deleted_at' => date('Y-m-d H:i:s'),
            'deleted_by' => $this->session->userdata('user_id')
        );
        $this->db->where('id', $id);
        return $this->db->update('tbl_users', $data);
    }

    public function get_customers()
    {
        $this->db->select('tbl_customer_details.id as customer_id, abn, business_address,tbl_users.id as id, tbl_users.name, tbl_users.email, tbl_users.contact, tbl_users.active');
        $this->db->from('tbl_customer_details');
        $this->db->join('tbl_users', 'tbl_users.id = tbl_customer_details.user_id');
        $this->db->join('tbl_user_role', 'tbl_user_role.user_id = tbl_users.id', 'left');
        $this->db->join('tbl_role', 'tbl_role.id = tbl_user_role.role_id', 'left');
        $this->db->where('tbl_role.role_name', 'customer');
        $this->db->where('tbl_users.deleted_at', NULL);
        // if user is customer show only his details
        if ($this->session->userdata('user_role') == 'customer') {
            $this->db->where('tbl_users.id', $this->session->userdata('user_id'));
        }
        $query = $this->db->get();
        return $query->result_array();
    }
}
