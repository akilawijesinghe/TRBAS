<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generic_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Search Data
    public function search_all($table, $where = array(), $limit = NULL, $offset = NULL) {
        // Apply conditions
        if (isset($where['and'])) {
            foreach ($where['and'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }
    
        if (isset($where['or'])) {
            foreach ($where['or'] as $key => $value) {
                $this->db->or_where($key, $value);
            }
        }
    
        // Apply limit and offset if provided
        if ($limit !== NULL) {
            $this->db->limit($limit, $offset);
        }
    
        // Execute the query
        $query = $this->db->get($table);
    
        // Return results as an array of associative arrays
        return $query->result_array();
    }
    
    public function search_single($table, $where = array()) {
        // Apply conditions
        if (isset($where['and'])) {
            foreach ($where['and'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }
    
        if (isset($where['or'])) {
            foreach ($where['or'] as $key => $value) {
                $this->db->or_where($key, $value);
            }
        }
    
        // Execute the query
        $query = $this->db->get($table);
    
        // Return a single row as an associative array
        return $query->row_array();
    }
    
    
}