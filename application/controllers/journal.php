<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Journal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('journalm');
        $this->load->library('form_validation');
    }

    public function index() {
        redirect('/journal/journal_manager');
    }

    public function create_journal() {
        if ($this->ua->check_login() == "Super") {
            $editors = $this->user->get_editors();
            $categories = $this->journalm->get_category();
            //           print_r($categories);
            //           die();
            $this->load->view('admin_create_journal', array('editors' => $editors, 'categories' => $categories));
        } else {
            $this->load->view('401');
        }
    }

    public function add_journal() {
        $name = $this->input->post("name", TRUE);
        $issue = $this->input->post("issue", TRUE);
        $volume = $this->input->post("volume", TRUE);
        $aim = $this->input->post("aim", TRUE);
        $objective = $this->input->post("objective", TRUE);
        $scope = $this->input->post("scope", TRUE);
        $category = $this->input->post("category", TRUE);
        $keywords = $this->input->post("keywords", TRUE);
        $submition_date = $this->input->post("submition_date", TRUE);
        $camera_ready_date = $this->input->post("camera_ready_date", TRUE);
        $chief_editor = $this->input->post("chief_editor", TRUE);
        $editors = $this->input->post("editors", TRUE);
        $DataSet = array('name' => $name, 'issue' => $issue, 'volume' => $volume, 'aim' => $aim,
            'objective' => $objective,
            'scope' => $scope, 'category' => $category, 'collection_date' => $submition_date,
            'camera_rady_date' => $camera_ready_date, 'chief_editor_id' => $chief_editor);
        //Query For Editor insertion 
        $insert_id = $this->journalm->insertData("journal", $DataSet);

        // Save sub-editors
        foreach ($editors as $editor) {
            $editor_data = array('journal_id' => $insert_id, 'editor_id' => $editor);
            $this->journalm->insertData("journal_keywords", $editor_data);
        }
        // Keyword save
        $keyword_arry = explode(",", $keywords);
        foreach ($keyword_arry as $word) {
            $keyword_data = array('journal_id' => $insert_id, 'keyword' => $word);
            $this->journalm->insertData("journal_keywords", $keyword_data);
        }

        if ($insert_id > 0) {

            $config['upload_path'] = './journal_img';
            $config['allowed_types'] = 'jpg';
            $config['file_name'] = $insert_id;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("jurnal_img")) {
                echo $this->upload->display_errors();
                die();
//                $error = array('error' => $this->upload->display_errors());
//                $this->load->view('author_submit_paper', $error);
            }


            $success = array('Success' => "Successfully Added!");
            redirect(base_url() . 'index.php/journal', $success);
            //Todo; send email
        } else {
            $Error = array('Error' => "Error Detected!");
            redirect(base_url() . 'index.php/journal', $Error);
        }
    }

    public function journal_manager() {
        $fieldset = array('id', 'name', 'issue', 'volume', 'aim', 'objective',
            'scope', 'category', 'collection_date',
            'camera_rady_date', 'chief_editor_id', 'status');
        $data['journals'] = $this->journalm->getData($fieldset, 'journal');
        $this->load->view('admin_journal_manager', $data);
    }

    public function edit_journal($id) {

        $JournalData = $this->journalm->get_journal($id);
        //var_dump($editdata);
        //die();
        $editors = $this->user->get_editors();
        $categories = $this->journalm->get_category();
        $sub_editors = $this->journalm->get_sub_editors($id);

        $this->load->view("admin_edit_journal", array('JournalData' => $JournalData, 'editors' => $editors, 'categories' => $categories, 'sub_editors'=>$sub_editors));
    }

    public function update_journal() {

        $name = $this->input->post("name", TRUE);
        $issue = $this->input->post("issue", TRUE);
        $volume = $this->input->post("volume", TRUE);
        $aim = $this->input->post("aim", TRUE);
        $objective = $this->input->post("objective", TRUE);
        $scope = $this->input->post("scope", TRUE);
        $category = $this->input->post("category", TRUE);
        $keywords = $this->input->post("keywords", TRUE);
        $submition_date = $this->input->post("submition_date", TRUE);
        $camera_ready_date = $this->input->post("camera_ready_date", TRUE);
        $chief_editor = $this->input->post("chief_editor", TRUE);
        $editors = $this->input->post("editors", TRUE);
        $id = $this->input->post("hdnID", TRUE);

        $DataSet = array('name' => $name, 'issue' => $issue, 'volume' => $volume, 'aim' => $aim, 'objective' => $objective,
            'scope' => $scope, 'category' => $category, 'collection_date' => $submition_date,
            'camera_rady_date' => $camera_ready_date, 'chief_editor_id' => $chief_editor);
//        $DataSet2 = array('keyword' => $keywords);
        //Initialise the correct ID for the Update
//        $whereArr = array("id" => $id);
        //Query For Employee Update
        $result = $this->user->Update($DataSet, "journal", $id);

//        $result = $this->journalm->UpdateJournal_keywords($DataSet2, "journal_keywords", $id);
        //Delete Sub Editors
        $this->journalm->del_editors($id);
        foreach ($editors as $editor) {
            $editor_data = array('journal_id' => $id, 'editor_id' => $editor);
            $this->journalm->insertData("journal_keywords", $editor_data);
        }

        //Delete Keywords
        $this->journalm->del_keywords($id);
        // Keyword save
        $keyword_arry = explode(",", $keywords);
        foreach ($keyword_arry as $word) {
            $keyword_data = array('journal_id' => $id, 'keyword' => $word);
            $this->journalm->insertData("journal_keywords", $keyword_data);
        }

        //Update Journal Image
        $config['upload_path'] = './journal_img';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $id;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("jurnal_img")) {
            echo $this->upload->display_errors();
            die();
//                $error = array('error' => $this->upload->display_errors());
//                $this->load->view('author_submit_paper', $error);
        }


        //$result = $this->user->Update($DataSet, "journal", $id);
        redirect(base_url() . 'index.php/Journal');
    }

    public function category($id = 0, $msg = 0) {
//        if ($id > 0) {
        $categories = $this->journalm->get_category();
        $category = $this->journalm->get_category_by_id($id);
//            print_r($category);
//            die();
        $message = NULL;
        switch ($msg) {
            case 1:$message = "Successfully Added.";
                break;
            case 2:$message = "Successfully Updated.";
                break;
            case 3:$message = "Successfully Deleted.";
                break;
        }

        $this->load->view("admin_add_category", array('category' => $category, 'categories' => $categories, 'message' => $message));
//        }else if ($id==0) {
//            $categories = $this->journalm->get_category();
//            $this->load->view("admin_add_category", array('category' => NULL, 'categories' => $categories));
//        }
    }

    public function add_category() {
        $category = $this->input->post("name", TRUE);
        $id = $this->journalm->insertData("categories", array("category" => $category));
        if ($id > 0) {
            redirect(base_url() . 'index.php/Journal/category/0/1');
        }
    }

    public function update_category() {
        $id = $this->input->post("id", TRUE);
        $category = $this->input->post("name", TRUE);
        $dataset = array('category' => $category);
        $this->journalm->update($dataset, "categories", $id);
        redirect(base_url() . 'index.php/Journal/category/0/2');
    }

    public function del_category($id) {
//        $id = $this->input->post("id",TRUE);
//        $category = $this->input->post("name",TRUE);
        $dataset = array('deleted' => 1);
        $this->journalm->update($dataset, "categories", $id);
        redirect(base_url() . 'index.php/Journal/category/0/3');
    }

}
