<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Articles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('form_validation');
    }

    public function index() {
        $userid = $this->session->userdata('id');
        if ($userid != FALSE) {
//            redirect(base_url().'index.php/Users' );
            $success = array('success' => "Successfully Loaded!");
            $this->load->view('author_submit_paper',$success);
        } else {
            $this->load->view('login');
        }
    }

    public function submit_article() {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf';

        $this->load->library('upload', $config);

        $user = $this->session->userdata("user");
        $title = $this->input->post("title");
        $journal_id = $this->input->post("journal_id");
//        $chf_author = $this->input->post("chief_author");
        $sub_auth_1 = $this->input->post("sub_auth_1");
        $sub_auth_2 = $this->input->post("sub_auth_2");
        $keywords = $this->input->post("keywords");
        $upload = "";

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('author_submit_paper', $error);
        } else {
            $upload = $this->upload->data('file_name');
        }

        $DataSet = array('author_id' => $user->id, 'journal_id' => $journal_id, 'title' => $title, 'status' => "assigned", 'co-authors' => $sub_auth_1 . "," . $sub_auth_2, 'keywords' => $keywords, 'file_name' => $upload);

        $insert_id = $this->user->insertData("article", $DataSet);

        if ($insert_id > 0) {
            $success = array('success' => "Successfully Added!");
            redirect(base_url() . 'index.php/Articles/', $success);
            //Todo; send email
        } else {
            $error = array('error' => "Error Detected!");
            redirect(base_url() . 'index.php/Articles/', $error);
        }
    }

}
