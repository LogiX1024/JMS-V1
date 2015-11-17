<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Journal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('form_validation');
    }

    public function index() {
        $user = $this->session->userdata('user');
        if (isset($user)) {
//            redirect(base_url().'index.php/Users' );
            $this->load->view('admin_create_journal');
        } else {
            $this->load->view('login');
        }
    }
    
    public function add_journal(){
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
        $DataSet = array('name' => $name, 'issue' => $issue, 'volume' => $volume, 'aim' =>$aim ,'objective' =>$objective,
           'scope' =>$scope, 'category'=> $category , 'keywords' => $keywords,'collection_date'=> $submition_date,
            'camera_rady_date' => $camera_ready_date, 'chief_editor_id' => $chief_editor, 'editor' =>$editors);
        //Query For Editor insertion 
       $insert_id = $this->user->insertData("journal", $DataSet);
        if ($insert_id > 0) {
            $success = array('Success' => "Successfully Added!");
            redirect(base_url() . 'index.php/journal', $success);
            //Todo; send email
        } else {
            $Error = array('Error' => "Error Detected!");
            redirect(base_url() . 'index.php/journal', $Error);
        }
        
    }
    
    public function view_journal() {
        $fieldset = array('id', 'name', 'issue','volume', 'aim' ,'objective',
           'scope' , 'category', 'keywords','collection_date',
            'camera_rady_date' , 'chief_editor_id', 'editor', 'status');
        $data['journals'] = $this->user->getData($fieldset, 'journal');
        $this->load->view('admin_view_journal', $data);
    }
    
    public function edit_journal($id){
        $whereArr = array("id" => $id);
        $result = $this->user->getData('id,name,issue,volume,aim,objective,scope,category,'
                . 'keywords,collection_date,camera_rady_date,chief_editor_id,editor,status',
                'journal', $whereArr);
        $editdata['JournalData'] = $result[0];
        $editdata["id"] = $id;
        $this->load->view("admin_edit_journal",$editdata, $id);
        
    }
    
    public function update_journal(){
         
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
        $id = $this->input->post("hdnID",TRUE);
        
        $DataSet = array('name' => $name, 'issue' => $issue, 'volume' => $volume, 'aim' =>$aim ,'objective' =>$objective,
           'scope' =>$scope, 'category'=> $category , 'keywords' => $keywords,'collection_date'=> $submition_date,
            'camera_rady_date' => $camera_ready_date, 'chief_editor_id' => $chief_editor, 'editor' =>$editors);
        //Initialise the correct ID for the Update
        $whereArr = array("id" => $id);        
        //Query For Employee Update
        $result = $this->user->Update($DataSet,"journal",  $id);
        redirect(base_url() . 'index.php/Journal');    
         
    }
}