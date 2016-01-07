<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
    }

    public function test2($view)
    {
        $this->load->view($view);
    }

    public function test_call4papers()
    {
        $this->load->library('EmailSender');

//        $this->load->library('parser');
//        $data = array(
//            'name' => 'Kamal Piyasena',
//            'link' => 'http://www.google.com'
//        );
//        $body_string = $this->parser->parse('email/invite_reviewer', $data, TRUE);
//        if ($this->emailsender->send('tosandeepa@gmail.com', 'Applied e journal', $body_string)) {
//            echo "Success";
//        } else {
//            echo "Failed";
//        }

        $data = array(
            'journal_name' => 'Test Journal',
            'issue' => 4,
            'volume' => 5,
            'open_date' => '2015-09-12',
            'collection_date' => '2015-11-12',
            'publishing_date' => '2015-12-20',
            'registration_link' => 'http://www.brightron.net',
            'chief_editor_email' => 'thejan@brightron.net'
        );
//        if ($this->emailsender->call_for_papers('harithalht@gmail.com', $data)) {
        if (true) {
            echo "Success";
        } else {
            echo "Failed";
        }

    }

    public function test_authorack()
    {
        $this->load->library('EmailSender');

        $data = array(
            'journal_name' => 'Test Journal',
            'paper_title' => 'Test Paper Title',
            'author_name' => 'Saman Ginadasa',
            'author_dashboard_link' => 'http://www.brightron.net',
            'chief_editor_name' => 'Gunapala Rathnayake',
            'chief_editor_email' => 'thejan@brightron.net'
        );
//        if ($this->emailsender->author_acknowledgement('harithalht@gmail.com', $data)) {
        if (true) {
            echo "Success";
        } else {
            echo "Failed";
        }
    }

    public function test_invite_reviewer()
    {
        $this->load->library('EmailSender');

        $data = array(
            'journal_name' => 'Test Journal',
            'register_reviewer_link' => 'http://www.brightron.net',
            'chief_editor_email' => 'thejan@brightron.net'
        );
        if ($this->emailsender->invite_reviewer('jayaneetha@brightron.net', $data)) {
            echo "Success";
        } else {
            echo "Failed";
        }
    }

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */