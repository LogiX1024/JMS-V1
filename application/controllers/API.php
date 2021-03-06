<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SubAuthors
{

    var $firstname;
    var $lastname;
    var $afilliation;
    var $email;

    public function __construct($fname, $lname, $aflliation, $email)
    {
        $this->firstname = $fname;
        $this->lastname = $lname;
        $this->afilliation = $aflliation;
        $this->email = $email;
    }

}

class API extends CI_Controller
{

    public function get_journal($journal_id)
    {
        $this->load->model('journalm');

        $view_data = $this->journalm->get_journal($journal_id);

        $this->load->view('json', array('data' => $view_data));
    }

    public function get_reviewer($user_id)
    {
        $this->load->model('reviewer');

        $view_data = $this->reviewer->get_reviewer($user_id);

        $this->load->view('json', array('data' => $view_data));
    }

    public function get_reviewed_details($article_id)
    {
        $this->load->model('article');

        $view_data = $this->article->get_reviewed_article($article_id);

        $this->load->view('json', array('data' => $view_data));
    }

    public function add_sub_author()
    {
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

    public function assigned_review()
    {
        $this->load->model('article');
        date_default_timezone_set("Asia/Colombo");
        $this->load->helper('date');

        $acceptid = $this->input->post('acceptid');
        $articleid = $this->input->post('articleid');
        $date = date("Y-m-d");

        $data = array(
            'assigned_date' => $date,
            'reviewer_id' => $acceptid,
            'article_id' => $articleid
        );

        $review_assign = $this->article->assign_review($data);
        //var_dump($review_assign); die();
    }


    public function add_reviewers()
    {
        $fname = $this->input->post("reviewer");

        $subauthor = new SubAuthors($fname);

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

    public function remove_sub_author($index)
    {

        $AuthorArray_JSON = $this->session->userdata("subauthors");
        $AuthorArray = json_decode($AuthorArray_JSON);

        /*
        The $index represents the offset - which basically
        means move 2 positions from the  beginning of the
        array and that will take us to the "X" element.  The 1
        represents the length of the array that you want to
        delete.  Since we just want to delete 1 element, we
        set the length parameter to 1.

        And, since we are not replacing that element with anything
        - we do just want to delete it - we leave the 4th parameter (
        which is optional) blank
        http://www.programmerinterview.com/index.php/php-questions/how-to-delete-an-element-from-an-array-in-php/
        */

        array_splice($AuthorArray, $index, 1);

        $this->session->set_userdata("subauthors", json_encode($AuthorArray));
        $this->load->view('json', array('data' => $AuthorArray));

    }

    public function clean()
    {
        $this->session->unset_userdata('subauthors');
    }

    public function get_reviews($article_id)
    {
        $this->load->model('article');
        $review_ids = $this->article->get_review_ids($article_id);

        $this->load->view('json', array('data' => $review_ids));
    }


}

/* End of file API.php */
/* Location: ./application/controllers/API.php */