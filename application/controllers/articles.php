<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Articles extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('article');
        $this->load->model('reviewer');
        $this->load->model('journalm');
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
                $journals = $this->journalm->get_journals();
                $success = array('success' => "Successfully Loaded!");
                $this->load->view('author_submit_paper', array('journals' => $journals), $success);
            } else {
                $this->load->view('login');
            }
        }
    }

    public function submit_article()
    {
        date_default_timezone_set("Asia/Colombo");

        $user = $this->session->userdata("user");
        $title = $this->input->post("title");
        $journal_id = $this->session->userdata('journal_id');
        //$journal_id = $this->input->post("journal_id");
        $keywords = $this->input->post("keywords");
        $submitted_date = date("Y-m-d");

        $DataSet = array('author_id' => $user->id, 'journal_id' => $journal_id, 'title' => $title, 'submit_date' => $submitted_date, 'journal_id' => "9");
        //var_dump($DataSet); die();
        $insert_id = $this->article->insertData("article", $DataSet);


        if ($insert_id > 0) {

            $config['upload_path'] = './uploads/FreshCopy';
            $config['allowed_types'] = 'doc|docx|odt';
            $config['file_name'] = $insert_id;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("upload_file")) {
                echo $this->upload->display_errors();
            }


            $AuthorArray_JSON = $this->session->userdata("subauthors");
            $AuthorArray = json_decode($AuthorArray_JSON);

            $insert_data = array();


            $this->load->library('EmailSender');
            $this->load->model('journalm');
            $journal = $this->journalm->get_journal($journal_id);

            foreach ($AuthorArray as $sub_author) {
                $sub_author_data = array(
                    'article_id' => $insert_id,
                    'first_name' => $sub_author->firstname,
                    'last_name' => $sub_author->lastname,
                    'affiliation' => $sub_author->afilliation,
                    'email' => $sub_author->email
                );
                array_push($insert_data, $sub_author_data);

                //Send e-mails to the sub authors

                $data = array(
                    'author_name' => $user->first_name . " " . $user->last_name,
                    'sub_author_name' => $sub_author->firstname . " " . $sub_author->lastname,
                    'paper_title' => $title,
                    'journal_name' => $journal->name,
                    'chief_editor_name' => $journal->first_name . " " . $journal->last_name,
                    'chief_editor_email' => $journal->email_address
                );
                if ($this->emailsender->sub_author_acknowledgement($sub_author->email, $data)) {
                    //echo "Success";
                } else {
                    die('Error!');
                    // echo "Failed";
                }

            }

            $this->article->insert_sub_authors($insert_data);


            // Keyword save
            $keyword_array = explode(", ", $keywords);
            foreach ($keyword_array as $word) {
                $keyword_data = array('article_id' => $insert_id, 'keyword' => $word);
                $this->journalm->insertData("article_keywords", $keyword_data);
            }

            $file = $this->upload->data();

            $DataSet = array('file_name' => $file['file_name']);
            $this->session->set_flashdata('upload', 'success');

            $suggested_reviewers = array();
            if ($this->input->post('suggestedReviewer1email') != '') {
                $suggested_reviewer = array(
                    'article_id' => $insert_id,
                    'first_name' => $this->input->post('suggestedReviewer1fname'),
                    'last_name' => $this->input->post('suggestedReviewer1lname'),
                    'email' => $this->input->post('suggestedReviewer1email'),
                    'affiliation' => $this->input->post('suggestedReviewer1affiliation')
                );
                array_push($suggested_reviewers, $suggested_reviewer);
            }
            if ($this->input->post('suggestedReviewer2email') != '') {
                $suggested_reviewer = array(
                    'article_id' => $insert_id,
                    'first_name' => $this->input->post('suggestedReviewer2fname'),
                    'last_name' => $this->input->post('suggestedReviewer2lname'),
                    'email' => $this->input->post('suggestedReviewer2email'),
                    'affiliation' => $this->input->post('suggestedReviewer2affiliation')
                );
                array_push($suggested_reviewers, $suggested_reviewer);
            }
            if ($this->input->post('suggestedReviewer3email') != '') {
                $suggested_reviewer = array(
                    'article_id' => $insert_id,
                    'first_name' => $this->input->post('suggestedReviewer3fname'),
                    'last_name' => $this->input->post('suggestedReviewer3lname'),
                    'email' => $this->input->post('suggestedReviewer3email'),
                    'affiliation' => $this->input->post('suggestedReviewer3affiliation')
                );
                array_push($suggested_reviewers, $suggested_reviewer);
            }
            $this->article->insert_suggested_reviewer($suggested_reviewers);

            redirect('/dashboard');
        } else {
            $error = array('error' => "Error Detected!");
            redirect(base_url() . 'index.php/Articles/', $error);
        }

    }

    public function review($id)
    {
        if ($this->ua->check_login() == "Reviewer") {
            $review_article = $this->article->get_article($id);
            $view_data = array(
                'article' => $review_article,
            );
            $this->load->view('reviewer_reviewing', $view_data);
        } else {
            $this->load->view('401');
        }
    }

    public function reviewer_assigning_last($id)
    {
        if ($this->ua->check_login() == "Editor") {
            $role = array("role" => "Reviewer");
            $article = array("id" => $id);
            $view_data['article'] = $this->article->getData('*', 'article', $article);
            $view_data['reviewer'] = $this->reviewer->getData('*', 'user', $role);
            //var_dump($view_data);die();
            $this->load->view('reviewers_assigning ', $view_data);
        } else {
            $this->load->view('401');
        }
    }

    public function reviewer_assigning($id)
    {
        if ($this->ua->check_login() == "Editor") {
            $role = array("role" => "Reviewer");
            $article = array("id" => $id);
            $view_data['article'] = $this->article->getData('*', 'article', $article);
            $view_data['reviewer'] = $this->reviewer->getData('*', 'user', $role);
            //var_dump($view_data); die();
            $this->load->view('reviewers_assigning_datalist', $view_data);
        } else {
            $this->load->view('401');
        }
    }

    public function upload_new_version()
    {
        if ($this->ua->check_login() == "Author") {


            $article_id = $this->input->post('article_id');
            $config['upload_path'] = './uploads/FreshCopy';
            $config['allowed_types'] = 'doc|docx|odt';
            $config['file_name'] = $article_id;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("upload_file")) {
                echo $this->upload->display_errors();
            }

            $this->session->set_flashdata('upload', 'success');

            redirect('/dashboard');
        } else {
            $this->load->view('401');
        }
    }

    public function request_camera_ready()
    {
        $article_id = $this->input->post('article_id');
        $CRNote = $this->input->post('CRNote');

        $this->article->store_CRNote($article_id, $CRNote);
        $this->article->change_article_status($article_id, 'Camera Ready Requested');

        $this->session->set_flashdata('message', 'Camera Ready request sent successfully');
        $this->session->set_flashdata('type', 'success');

        redirect('/dashboard');

    }

}
