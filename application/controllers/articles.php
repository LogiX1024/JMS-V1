<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Articles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('article');
        $this->load->library('form_validation');
    }

    public function index() {
        $userid = $this->session->userdata('id');
        if ($userid != FALSE) {
//            redirect(base_url().'index.php/Users' );
            $this->load->view('author_submit_paper');
        } else {
            $this->load->view('login');
        }
    }

    public function submit_article() {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf';
        
        $this->load->library('upload', $config);

        $title = $this->input->post("title");
        $chf_author = $this->input->post("chief_author");
        $sub_auth_1 = $this->input->post("sub_auth_1");
        $sub_auth_2 = $this->input->post("sub_auth_2");
        $keywords = $this->input->post("keywords");
        $upload = $this->upload->data('file_name');
    }

}
