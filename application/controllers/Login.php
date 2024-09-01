<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

    //  constructor check if the user is already logged in
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Login_model');
        $this->load->library('emailer');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect('welcome');
    }

    // authenticate user
    public function authenticate()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            http_response_code(422);
            echo json_encode($this->form_validation->error_array());
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->model('Login_model');
            $user = $this->Login_model->auth($email);

            if ($user && password_verify($password, $user['password'])) {

                $role = $this->Login_model->get_user_role($user['id']);
                $user['role'] = $role['role_name'];

                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('user_name', $user['name']);
                $this->session->set_userdata('user_email', $user['email']);
                $this->session->set_userdata('user_role', $user['role']);

                http_response_code(200);
                $url = $user['role'] . "_dashboard";
                echo json_encode(array('status' => 'success', 'message' => 'Login successful', 'role' => $url));
            } else {
                http_response_code(422);
                $error['credentials_error'] = 'Check your credentials';
                echo json_encode($error);
            }
        }
    }

    // register user
    public function register_customer()
    {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email_reg', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contact', 'Contact', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('passwordreg', 'Password', 'required|min_length[8]|regex_match[/[0-9]/]|regex_match[/[A-Z]/]|regex_match[/[a-z]/]|regex_match[/[^a-zA-Z0-9]/]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[passwordreg]');
        $this->form_validation->set_rules('email_reg', 'Email', 'required|valid_email|callback_email_check');

        if ($this->form_validation->run() == FALSE) {
            http_response_code(422);
            echo json_encode($this->form_validation->error_array());
        } else {

            $password = $this->input->post('passwordreg');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $verification_code = $this->generate_verification_code();
            $verification_expire = date('Y-m-d H:i:s', strtotime('+1 day'));

            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email_reg'),
                'contact' => $this->input->post('contact'),
                'password' => $hashed_password,
                'verification_code' => $verification_code,
                'verification_expire' => $verification_expire,
                'active' => 0
            );

            $this->load->model('Login_model');
            $user = $this->Login_model->register($data);

            $customer_data = array(
                'user_id' => $user,
                'business_address' => $this->input->post('address'),
                'abn' => $this->input->post('abn')
            );

            $customer = $this->Login_model->register_customer($customer_data);

            $role_data = array(
                'user_id' => $user,
                'role_id' => 2
            );

            $this->db->insert('tbl_user_role', $role_data);
            // send email verification code and expire time and information
            $email_res = $this->send_email_verification($data);

            if ($user && $customer && $email_res) {
                // set the user session
                $this->session->set_userdata('user_id', $user);
                $this->session->set_userdata('user_name', $data['name']);
                $this->session->set_userdata('user_email', $data['email']);
                $this->session->set_userdata('user_role', 'customer');

                http_response_code(200);
                $url = "customer_dashboard";
                echo json_encode(array('status' => 'success', 'message' => 'Registration successful', 'role' => $url));
            } else {
                http_response_code(422);
                $error[] = 'Registration failed';
                echo json_encode($error);
            }
        }
    }

    // send email verification code
    public function send_email_verification($data)
    {
        $this->load->library('email');
        $to = $data['email'];
        $subject = 'Email Verification';
        $message = 'Hello ' . $data['name'] . ',<br><br>';
        $message .= 'Thank you for registering with CQUTRBAS. Please verify your email address to continue.<br><br>';
        $message .= 'Your verification code is <strong>' . $data['verification_code'] . '</strong>. This code will expire in 24 hours.<br><br>';
        $message .= 'Thank you,<br>CQUTRBAS Team';
        $res = $this->emailer->send_email($to, $subject, $message);

        if ($res) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function email_check($email)
    {
        $this->load->database();
        $this->db->where('email', $email);
        $this->db->where('deleted_at', NULL);
        $this->db->where('active', 1);
        $query = $this->db->get('tbl_users');

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('email_check', 'The {field} is already taken.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    //verify_customer
    public function verify_customer()
    {
        $this->form_validation->set_rules('verification_code', 'Verification Code', 'required');
        $this->form_validation->set_rules('email_verify', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            http_response_code(422);
            echo json_encode($this->form_validation->error_array());
        } else {
            $verification_code = $this->input->post('verification_code');
            $email = $this->input->post('email_verify');

            $this->db->select('*');
            $this->db->from('tbl_users');
            $this->db->where('email', $email);
            $this->db->where('verification_code', $verification_code);
            $this->db->where('verification_expire >', date('Y-m-d H:i:s'));
            $query = $this->db->get();
            $user = $query->row_array();

            if ($user) {
                $data = array(
                    'active' => 1,
                    'verification_code' => NULL,
                    'verification_expire' => NULL
                );

                $this->db->where('id', $user['id']);
                $this->db->update('tbl_users', $data);

                // send an than you email for customer with impression
                $subject = 'Email Verified - Welcome to CQUTRBAS';
                $message = 'Hello ' . $user['name'] . ',<br><br>';
                $message .= 'Thank you for verifying your email address. You can now login to your CQUTRBAS account.<br>';
                $message .= '<br>Thank you,<br>CQUTRBAS Team';
                $this->emailer->send_email($email, $subject, $message);

                http_response_code(200);
                echo json_encode(array('status' => 'success', 'message' => 'Email verified successfully', 'role' => 'customer_dashboard'));
            } else {
                http_response_code(422);
                $error['credentials_error_verify'] = 'Invalid verification code or expired';
                echo json_encode($error);
            }
        }
    }

    // generate verification code
    public function generate_verification_code()
    {
        $verification_code = rand(100000, 999999);
        return $verification_code;
    }
}
