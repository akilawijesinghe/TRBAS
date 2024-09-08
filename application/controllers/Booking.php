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
        require_once(APPPATH . '../vendor/autoload.php');
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
            // calculate the total price
            $price_package = $this->PricePackage_model->get_pricepackage($post_data['price_package_id']);
            // get billboard price
            $billboard = $this->Billboard_model->get_billboard($post_data['billboard_id']);
            $price = $billboard['price_per_day'];

            $from_date = new DateTime($post_data['from_date']);
            $to_date = new DateTime($post_data['to_date']);
            $discount = $price_package['discount'];
            $diff = $from_date->diff($to_date);
            $days = $diff->days;
            $days = $days + 1;
            $total_price = $price * $days;
            $total_price = $total_price - ($total_price * $discount / 100);
            $post_data['total_price'] = $total_price;
            // save the booking
            if (!empty($post_data['id']) && is_numeric($post_data['id'])) {
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

    public function process_payment()
    {
        // Set your secret Stripe key here
        $stripe_secret_key = $this->config->item('stripe_secret_key');

        //escape post data
        $post_data = $this->escape_post($_POST);

        // calculate the total price of the booking by from date and to date
        $from_date = new DateTime($post_data['from_date']);
        $to_date = new DateTime($post_data['to_date']);
        $diff = $from_date->diff($to_date);

        $days = $diff->days + 1; // Including the last day

        $billboard = $this->Billboard_model->get_billboard($post_data['billboard_id']);
        $price = $billboard['price_per_day'];

        // get price package by id
        $price_packages = $this->PricePackage_model->get_pricepackages();

        $selectedOption = null;
        foreach ($price_packages as $price_package) {
            if ($days >= $price_package['duration']) {
                $selectedOption = $price_package;
                break;
            }
        }

        $discount = $selectedOption ? $selectedOption['discount'] : $price_packages[0]['discount'];

        $total_price = $price * $days;
        $total_price = $total_price - ($total_price * $discount / 100);
        $total_price_new = $total_price * 100; // Convert to cents

        $name = $billboard['location'] . ' Billboard';
        $name .= ' (' . $from_date->format('Y-m-d') . ' to ' . $to_date->format('Y-m-d') . ')';
        $name .= ' for ' . $days . ' days';
        $name .= ' at $' . $price . ' per day';
        $name .= ' with ' . $discount . '% discount';

        // Set API key
        \Stripe\Stripe::setApiKey($stripe_secret_key);

        // Create a checkout session with booking data in metadata
        $checkout_session = \Stripe\Checkout\Session::create([
            "mode" => "payment",
            "success_url" => base_url('booking/success?session_id={CHECKOUT_SESSION_ID}'),
            "cancel_url" => base_url('booking/cancel'),
            "locale" => "auto",
            "line_items" => [
                [
                    "quantity" => 1,
                    "price_data" => [
                        "currency" => "aud",
                        "unit_amount" => $total_price_new, // in cents
                        "product_data" => [
                            "name" => $name
                        ]
                    ]
                ]
            ],
            "metadata" => [
                "billboard_id" => $post_data['billboard_id'],
                "customer_id" => $post_data['customer_id'],
                "from_date" => $from_date->format('Y-m-d'),
                "to_date" => $to_date->format('Y-m-d'),
                "price_package_id" => $selectedOption['id'],
                "total_price" => $total_price
            ]
        ]);

        // Redirect to Stripe Checkout
        http_response_code(303);
        header("Location: " . $checkout_session->url);
    }


    public function success()
    {
        // Set your Stripe secret key
        $stripe_secret_key = $this->config->item('stripe_secret_key');
        \Stripe\Stripe::setApiKey($stripe_secret_key);

        // Get the session_id from the URL
        $session_id = $this->input->get('session_id');

        if ($session_id) {
            // Retrieve the checkout session from Stripe
            $session = \Stripe\Checkout\Session::retrieve($session_id);

            // Retrieve the payment intent
            $payment_intent = \Stripe\PaymentIntent::retrieve($session->payment_intent);

            if ($payment_intent->status == 'succeeded') {
                // Retrieve metadata from Stripe
                $billboard_id = $session->metadata->billboard_id;
                $customer_id = $session->metadata->customer_id;
                $from_date = $session->metadata->from_date;
                $to_date = $session->metadata->to_date;
                $price_package_id = $session->metadata->price_package_id;
                $total_price = $session->metadata->total_price;

                // Create the booking only after successful payment
                $booking_data = array(
                    'billboard_id' => $billboard_id,
                    'customer_id' => $customer_id,
                    'price_package_id' => $price_package_id,
                    'from_date' => $from_date,
                    'to_date' => $to_date,
                    'total_price' => $total_price,
                    'transaction_id' => $payment_intent->id,  // Use the payment intent ID as transaction ID
                    'active' => 1
                );

                // Save the booking
                $this->Booking_model->save_booking($booking_data);

                // Set success message
                $this->session->set_flashdata('success', 'Payment and booking successful');
                redirect('booking');
            } else {
                // Handle payment failure
                $this->session->set_flashdata('error', 'Payment failed or was not completed.');
                redirect('booking/cancel');
            }
        } else {
            // No session ID provided
            show_error("No session ID provided.");
        }
    }


    public function cancel()
    {
        $this->session->set_flashdata('error', 'Payment cancelled');
        // redirect to booking page
        header("Location: " . base_url('booking'));
    }
}
