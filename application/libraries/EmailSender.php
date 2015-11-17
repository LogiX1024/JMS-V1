<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/17/15
 * Time: 5:17 PM
 */
class EmailSender
{
    protected $CI;

    function __construct()
    {
        $this->CI =& get_instance();
    }

    /**
     * @param $to
     * @param $subject
     * @param $body
     * @return bool
     */
    public function send($to, $subject, $body)
    {
        include_once "vendor/autoload.php";
        date_default_timezone_set("Asia/Colombo");

        $this->CI->config->load('send_grid');

        $username = $this->CI->config->item('send_grid_username');
        $password = $this->CI->config->item('send_grid_password');
        $smtp_server = $this->CI->config->item('send_grid_smtp_server');
        $smtp_server_port = $this->CI->config->item('send_grid_smtp_server_port');

        $sending_address = $this->CI->config->item('email_sender_address');
        $sending_name = $this->CI->config->item('email_sender_name');

        $from = array($sending_address => $sending_name);
        $to = array($to);

        $transport = Swift_SmtpTransport::newInstance($smtp_server, $smtp_server_port);
        $transport->setUsername($username);
        $transport->setPassword($password);
        $swift = Swift_Mailer::newInstance($transport);

        $message = new Swift_Message($subject);
        $message->setFrom($from);
        $message->setBody($body, 'text/html');
        $message->setTo($to);
        $message->addPart($body, 'text/plain');

        // send message
        if ($recipients = $swift->send($message, $failures)) {
            return true;
        }
        else {
            return false;
        }
    }
}