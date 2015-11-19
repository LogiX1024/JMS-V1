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
        } else {
            return false;
        }
    }

    /**
     * @param $to
     * @param $data
     * @return bool
     */
    public function call_for_papers($to, $data)
    {
        $this->CI->load->library('parser');
        $view_data = array(
            'journal_name' => $data['journal_name'],
            'issue' => $data['issue'],
            'volume' => $data['volume'],
            'paper_open_date' => date_parse($data['open_date'])['day'],
            'paper_open_month' => date_parse($data['open_date'])['month'],
            'paper_open_year' => date_parse($data['open_date'])['year'],
            'deadline_date' => date_parse($data['collection_date'])['day'],
            'deadline_month' => date_parse($data['collection_date'])['month'],
            'deadline_year' => date_parse($data['collection_date'])['year'],
            'publication_date' => date_parse($data['publishing_date'])['day'],
            'publication_month' => date_parse($data['publishing_date'])['month'],
            'publication_year' => date_parse($data['publishing_date'])['year'],
            'link' => $data['registration_link'],
            'chief_editor_email' => $data['chief_editor_email']
        );
        $body_string = $this->CI->parser->parse('email/call_for_papers', $view_data, TRUE);
        return $this->send($to, "Call for Papers", $body_string);
    }

    public function author_acknowledgement($to, $data)
    {
        $this->CI->load->library('parser');
        $view_data = array(
            'author_name' => $data['author_name'],
            'paper_title' => $data['paper_title'],
            'journal_name' => $data['journal_name'],
            'link' => $data['author_dashboard_link'],
            'chief_editor_name' => $data['chief_editor_name'],
            'chief_editor_email' => $data['chief_editor_email']
        );
        $body_string = $this->CI->parser->parse('email/author_acknowledgement', $view_data, TRUE);

        return $this->send($to, "Paper Submission Acknowledgement", $body_string);
    }

    public function invite_reviewer($to, $data)
    {
        $this->CI->load->library('parser');
        $view_data = array(
            'journal_name' => $data['journal_name'],
            'link' => $data['register_reviewer_link'],
            'chief_editor_email' => $data['chief_editor_email']
        );
        $body_string = $this->CI->parser->parse('email/invite_reviewer', $view_data, TRUE);

        return $this->send($to, "Invitation to register as a reviewer", $body_string);
    }

    public function assign_manuscript($to, $data)
    {
        $this->CI->load->library('parser');
        $view_data = array(
            'reviewer_name' => $data['reviewer_name'],
            'link' => $data['reviewer_dashboard_link'],
            'chief_editor_email' => $data['chief_editor_email']
        );
        $body_string = $this->CI->parser->parse('email/assign_manuscript', $view_data, TRUE);

        return $this->send($to, "Invitation to register as a reviewer", $body_string);
    }

}