<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SubAuthors {

    var $firstname;
    var $lastname;
    var $afilliation;
    var $email;

    public function __construct($fname, $lname, $aflliation, $email) {
        $this->firstname = $fname;
        $this->lastname = $lname;
        $this->afilliation = $aflliation;
        $this->email = $email;
    }

}

class API extends CI_Controller {

    public function get_journal($journal_id) {
        $this->load->model('journalm');

        $view_data = $this->journalm->get_journal($journal_id);

        $this->load->view('json', array('data' => $view_data));
    }
    
    public function get_reviewer($user_id){
        $this->load->model('reviewer');

        $view_data = $this->reviewer->get_reviewer($user_id);

        $this->load->view('json', array('data' => $view_data));
    }

        public function add_sub_author() {
        $fname = $this->input->post("fname");
        $lname = $this->input->post("lname");
        $affiliation = $this->input->post("affiliation");
        $email = $this->input->post("email");

        $subauthor = new SubAuthors($fname, $lname, $affiliation, $email);
//        $this->session->unset_userdata('subauthors');
//        die();
         $AuthorArray_JSON = $this->session->userdata("subauthors");

        if (!$AuthorArray_JSON) {
            $AuthorArray = array($subauthor);
            
        } else {
            $AuthorArray = json_decode($AuthorArray_JSON);
            array_push($AuthorArray, $subauthor);
            
        }
        $this->session->set_userdata("subauthors", json_encode($AuthorArray));
        $this->load->view('json', array('data' => $AuthorArray));
    }

}

/* End of file API.php */
/* Location: ./application/controllers/API.php */