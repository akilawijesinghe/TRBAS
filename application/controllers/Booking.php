<?php

class Booking extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Booking_model');
        $this->load->model('Billboard_model');
        $this->load->model('Location_model');
        $this->load->model('Customer_model');
        $this->load->model('PricePackage_model');
        // check login
        $this->check_login();

    }

    public function index()
    {
        // Load data for admin dashboard
        $data = array();
        $data['title'] = 'Bookings';
        $data['bookings'] = $this->Booking_model->get_bookings();
        $data['locations'] = $this->Location_model->get_locations();
        $data['customers'] = $this->Customer_model->get_customers();
        $data['billboards'] = $this->Billboard_model->get_billboards();
        $data['price_packages'] = $this->PricePackage_model->get_pricepackages();
        $this->_render_view('booking/main', $data);
    }

    public function save_booking()
    {

        $post_data = $this->escape_post($_POST);
        // validate the post data
        $this->form_validation->set_rules('billboard_id', 'Billboard', 'required');
        $this->form_validation->set_rules('customer_id', 'Customer', 'required');
        $this->form_validation->set_rules('price_package_id', 'Price Package', 'required');
        $this->form_validation->set_rules('from_date', 'From Date', 'required');
        $this->form_validation->set_rules('to_date', 'To Date', 'required');
        $this->form_validation->set_rules('active', 'Active', 'required');

        if ($this->form_validation->run() == FALSE) {
            http_response_code(422);
            echo json_encode($this->form_validation->error_array());
        } else {
            // save the booking
            if (!empty($post_data['id']) && is_numeric($post_data['id'])) {
                // Update booking
                $id = $post_data['id'];
                unset($post_data['id']);
                $res = $this->Booking_model->update_booking($post_data, $id);
            } else {
                // Set timestamps and user data
                $post_data['created_at'] = date('Y-m-d H:i:s');
                $post_data['created_by'] = $this->session->userdata('user_id');
                $res = $this->Booking_model->save_booking($post_data);
            }
            if ($res) {
                http_response_code(200);
                echo json_encode(array('status' => 'success', 'message' => 'Booking saved successfully'));
            } else {
                http_response_code(500);
                echo json_encode(array('status' => 'error', 'message' => 'Error saving booking'));
            }
        }
    }

    // delete_booking
    public function delete_booking()
    {
        $post_data = $this->escape_post($_POST);
        $id = $post_data['id'];
        $res = $this->Booking_model->delete_booking($id);
        if ($res) {
            http_response_code(200);
            echo json_encode(array('status' => 'success', 'message' => 'Booking deleted successfully'));
        } else {
            http_response_code(500);
            echo json_encode(array('status' => 'error', 'message' => 'Error deleting booking'));
        }
    }

    // get booking dates by billboard id
    public function get_booking_dates_of_billboard()
    {
        $post_data = $this->escape_post($_POST);
        $billboard_id = $post_data['billboard_id'];
        $dates = $this->Booking_model->get_booking_dates_of_billboard($billboard_id);
        echo json_encode($dates);
    }

}
