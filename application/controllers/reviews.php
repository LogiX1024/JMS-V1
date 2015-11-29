<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reviews extends CI_Controller
{
    var $USER_OBJ = false;


    public function __construct()
    {
        parent::__construct();
        $this->load->model('article');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->USER_OBJ = $this->session->userdata('user');

    }

    public function submit_review()
    {
        date_default_timezone_set("Asia/Colombo");

        $this->load->helper('date');


        $article_id = $this->input->post('article_id');
        $title = $this->input->post('title');
        $title_sug = $this->input->post('title_sug');
        $introduction = $this->input->post('introduction');
        $intro_sug = $this->input->post('intro_sug');
        $originality = $this->input->post('originality');
        $clarity = $this->input->post('clarity');
        $completeness = $this->input->post('completeness');
        $interpretation = $this->input->post('interpretation');
        $importance = $this->input->post('importance');
        $materials = $this->input->post('materials');
        $materials_sug = $this->input->post('materials_sug');
        $result = $this->input->post('result');
        $result_sug = $this->input->post('result_sug');
        $decision = $this->input->post('decision');

        $insert_data = array(
            'review_date' => date("Y-m-d"),
            'reviewer_id' => $this->USER_OBJ->id,
            'title_acceptable' => $title,
            'title_suggession' => $title_sug,
            'introduction' => $introduction,
            'introduction_suggession' => $intro_sug,
            'originality' => $originality,
            'clarity' => $clarity,
            'completeness' => $completeness,
            'interpretation' => $interpretation,
            'importance' => $importance,
            'materials_and_methods' => $materials,
            'materials_and_methods_suggession' => $materials_sug,
            'results_and_discussion' => $result,
            'results_and_discussion_suggession' => $result_sug,
            'decision' => $decision
        );

        $review_id = $this->article->submit_review($article_id, $insert_data);

        if ($review_id > 0) {
            $config['upload_path'] = './uploads/Reviews';
            $config['allowed_types'] = 'doc|docx|odt';
            $config['file_name'] = "Reviewed_" . $article_id . "_" . $review_id;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload("upload_file")) {
//                echo $this->upload->display_errors();
                $this->load->view('500');
            } else {

                if ($this->article->get_pending_reviews_count($article_id) == 0) {
                    //the 3rd reviewer reviewed
                    //change the status of the article to reviewed
                    $this->article->change_article_status($article_id, 'Reviewed');
                }


                $this->session->set_flashdata('flash_message', 'Review Submission successful.');
                redirect('/dashboard');
            }
        }


    }
}