<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Articles extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('article');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index($success = null)
    {
        $journal_id = 0;
        if (isset($_GET['journal'])) {
            $journal_id = $this->input->get('journal');
            $this->session->set_userdata('journal_id', $journal_id);
        }
        if ($this->ua->check_login() == "Author") {
            $user = $this->session->userdata('user');
            if (isset($user)) {
//            redirect(base_url().'index.php/Users' );
                $success = array('success' => "Successfully Loaded!");
                $this->load->view('author_submit_paper', $success);
            } else {
                $this->load->view('login');
            }
        }
    }

    public function submit_article()
    {

        $user = $this->session->userdata("user");
        $title = $this->input->post("title");
        $journal_id = $this->session->userdata('journal_id');
//        $chf_author = $this->input->post("chief_author");
        $sub_auth_1 = $this->input->post("sub_auth_1");
        $sub_auth_2 = $this->input->post("sub_auth_2");
        $keywords = $this->input->post("keywords");
        $submitted_date = date("Y-m-d");

        $DataSet = array('author_id' => $user->id, 'journal_id' => $journal_id, 'title' => $title,
            'status' => "assigned",  'submit_date' => $submitted_date, 'journal_id' => "6");

        $insert_id = $this->article->insertData("article", $DataSet);
        //$insert_id = $this->article->insertData("article", $DataSet);


        if ($insert_id > 0) {

            $config['upload_path'] = './uploads/FreshCopy';
            $config['allowed_types'] = 'doc|docx|odt';
            $config['file_name'] = $insert_id;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("upload_file")) {
                echo $this->upload->display_errors();
//                $error = array('error' => $this->upload->display_errors());
//                $this->load->view('author_submit_paper', $error);
            }

            $file = $this->upload->data();

            $DataSet = array('file_name' => $file['file_name']);
            //$this->article->Update($DataSet, "article", $insert_id);
            $this->session->set_flashdata('upload', 'success');

            redirect('/dashboard');
//            $success = array('success' => "Successfully Added!");
//            redirect(base_url() . 'index.php/Articles/', $success);
            //Todo; send email
        } else {
            $error = array('error' => "Error Detected!");
            redirect(base_url() . 'index.php/Articles/', $error);
        }
    }

}
