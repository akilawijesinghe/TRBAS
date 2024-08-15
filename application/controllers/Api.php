<?php

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Api_model');
    }

    // check_traffic
    public function check_traffic()
    {
        $vehicle_count = $this->input->get('vehicle_count');
        $mac_address = $this->input->get('mac_address');

        if ($vehicle_count == 0) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'error', 'message' => 'Not enough traffic to display ads']));
            return;
        }

        if (!$vehicle_count || !$mac_address) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'error', 'message' => 'Missing parameters'. $vehicle_count . $mac_address])); 
            return;
        }

        // Get the billboard by MAC address
        $billboard = $this->Api_model->get_billboard_by_mac($mac_address);
        if (!$billboard) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'error', 'message' => 'Billboard not found']));
            return;
        }

        // Check for active bookings and get the next ad in the queue
        $ad = $this->Api_model->get_next_ad($billboard->id);

        // check the billboard minimum vehicle count
        if ($vehicle_count < $billboard->minimum_vehicle_count) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'error', 'message' => 'Not enough traffic to display ads']));
            return;
        }

        if ($ad) {
            $video_link = base_url('uploads/' . $ad->booking_id . '/' . $ad->video_link);

            $data = array(
                'billboard_id' => $billboard->id,
                'customer_id' => $ad->customer_id,
                'ad_id' => $ad->id,
                'vehicle_count' => $vehicle_count,
                'time_stamp' => date('Y-m-d H:i:s')
            );

            $this->db->insert('tbl_traffic_data', $data);

            // update the ad start time
            $this->db->where('id', $ad->id);
            $this->db->update('tbl_advertisements', ['start_time' => date('Y-m-d H:i:s')]);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'success',
                    'message' => 'Enough traffic to display ads',
                    'video_link' => $video_link
                ]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'error', 'message' => 'No active ads']));
        }
    }
}
