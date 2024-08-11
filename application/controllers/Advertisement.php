<?php

class Advertisement extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        // load advertisement model
        $this->load->model('Advertisement_model');
        // load booking model
        $this->load->model('Booking_model');
    }

    public function index()
    {
        // Load data for admin dashboard
        $data = array();
        $data['title'] = 'Advertisement';
        $data['bookings'] = $this->Advertisement_model->get_bookings();
        $this->_render_view('advertisement/main', $data);
    }

    public function get_adverts()
    {
        $post_data = $this->escape_post($_POST);
        $id = $post_data['booking_id'];
        $adverts = $this->Advertisement_model->get_advertisements($id);
        http_response_code(200);
        echo json_encode(array('status' => 'success', 'data' => $adverts));
    }

    public function upload_video()
    {

        $bookingId = $this->input->post('bookingid');
        if (!is_dir('uploads/' . $bookingId)) {
            mkdir('./uploads/' . $bookingId, 0777, TRUE);
        }
        $config['upload_path']   = 'uploads/' . $bookingId . '/';
        $config['allowed_types'] = 'mp4|mov|avi|flv|wmv|mkv';
        $config['max_size']      = 10240; // 10 MB
        $config['overwrite']     = TRUE;
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $uploadData = $this->upload->data();

            // Insert data into the database
            $data = array(
                'booking_id' => $bookingId,
                'video_link' => $uploadData['file_name']
            );

            $this->Advertisement_model->save_advertisement($data); // Save the data into the database
            $response = array('success' => 'Video uploaded and data saved successfully.', 'file_name' => $uploadData['file_name']);
        } else {
            http_response_code(500);
            // clear errors message 
            echo json_encode(array('status' => 'error', 'message' => $this->upload->display_errors()));
            die;
        }

        if ($response) {
            http_response_code(200);
            echo json_encode(array('status' => 'success', 'message' => 'Billboard deleted successfully'));
        } else {
            http_response_code(500);
            echo json_encode(array('status' => 'error', 'message' => 'Error deleting billboard'));
        }
    }

    public function view_video($ad_id, $booking_id)
    {

        $data = array();
        $data['error'] = '';
        $data['title'] = 'View Video';
        $ad = $this->Advertisement_model->get_advertisement_by_ad_id($ad_id);

        if (empty($ad)) {
            $data['error'] = 'Advertisement not found';
            $this->_render_view('advertisement/view_video', $data);
        } else {
            $video_path = base_url() . 'uploads/' . $booking_id . '/' . $ad['video_link'];
            $data['video_path'] = $video_path;
            if ($this->session->userdata('user_role') == 'admin') {
                $this->_render_view('advertisement/view_video', $data);
            } else {
                $booking = $this->Booking_model->get_booking_by_id($booking_id);
                if ($booking && $booking['uid'] == $this->session->userdata('user_id')) {
                    $this->_render_view('advertisement/view_video', $data);
                } else {
                    $data['error'] = 'You are not authorized to view this video';
                    $this->_render_view('advertisement/view_video', $data);
                }
            }
        }
    }

    public function delete_ad()
    {
        $post_data = $this->escape_post($_POST);
        $id = $post_data['id'];
        $res = $this->Advertisement_model->delete_advertisement($id);
        if ($res) {
            http_response_code(200);
            echo json_encode(array('status' => 'success', 'message' => 'Advertisement deleted successfully'));
        } else {
            http_response_code(500);
            echo json_encode(array('status' => 'error', 'message' => 'Error deleting advertisement'));
        }
    }
}
