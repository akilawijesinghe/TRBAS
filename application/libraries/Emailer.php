<?php

class Emailer
{

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();  // Get CodeIgniter instance
        $this->CI->load->library('email');

        $config['protocol']    = 'smtp';
        $config['smtp_host']   = 'mail.cqutrbas.au';
        $config['smtp_port']   = 587;
        $config['smtp_user']   = 'cqutrbas@cqutrbas.au';
        $config['smtp_pass']   = '_j3qf2+,pc{j';
        $config['smtp_crypto'] = '';  // No encryption
        $config['mailtype']    = 'html';
        $config['charset']     = 'utf-8';
        $config['wordwrap']    = TRUE;
        $config['newline']     = "\r\n";

        $this->CI->email->initialize($config);
    }

    public function send_email($to, $subject, $message)
    {
        $this->CI->email->from('cqutrbas@cqutrbas.au', 'CQUTRBAS');
        $this->CI->email->to($to);
        $this->CI->email->subject($subject);
        $this->CI->email->message($message);

        return $this->CI->email->send();
    }
}
