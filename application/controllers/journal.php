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
        $editors = $this->input->post("editors[]", TRUE);
        $DataSet = array('name' => $name, 'issue' => $issue, 'volume' => $volume, 'aim' => $aim,
            'objective' => $objective,
            'scope' => $scope, 'category' => $category, 'collection_date' => $submition_date,
            'camera_rady_date' => $camera_ready_date, 'chief_editor_id' => $chief_editor);
        //Query For Editor insertion 
        $insert_id = $this->user->insertData("journal", $DataSet);

        // Keyword save
        $keyword_arry = explode(",", $keywords);
        foreach ($keyword_arry as $word) {
            $keyword_data = array('journal_id' => $insert_id, 'keyword' => $word);
            $this->user->insertData("journal_keywords", $keyword_data);
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
        $data['journals'] = $this->user->getData($fieldset, 'journal');
        $this->load->view('admin_journal_manager', $data);
    }

    public function edit_journal($id) {

        $editdata['JournalData'] = $this->journalm->get_journal($id);
        //var_dump($editdata);
        //die();
        $this->load->view("admin_edit_journal", $editdata, $id);
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
        //-$editors = $this->input->post("editors[]", TRUE);
        $id = $this->input->post("hdnID", TRUE);

        $DataSet = array('name' => $name, 'issue' => $issue, 'volume' => $volume, 'aim' => $aim, 'objective' => $objective,
            'scope' => $scope, 'category' => $category, 'collection_date' => $submition_date,
            'camera_rady_date' => $camera_ready_date, 'chief_editor_id' => $chief_editor);
        $DataSet2 = array('keyword' => $keywords);
        //Initialise the correct ID for the Update
        $whereArr = array("id" => $id);

        //Query For Employee Update
        $result = $this->user->Update($DataSet, "journal", $id);
        $result = $this->journalm->UpdateJournal_keywords($DataSet2, "journal_keywords", $id);
        //$result = $this->user->Update($DataSet, "journal", $id);
        redirect(base_url() . 'index.php/Journal');
    }

}
