<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
    }

    public function index() {
        $userid = $this->session->userdata('id');
        if(isset($userid)){
//            redirect(base_url().'index.php/Users' );
            $this->load->view('dashboard');
        }  else {
            $this->load->view('login');
        }
    }

    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Email', 'required|valid_email|is_unique[user.email_address]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|sha1');
        $email = $this->input->post('username');
        $pass = $this->input->post('password');
        $remember = $this->input->post('remember');
        $ip = $this->input->server('REMOTE_ADDR');
        $pass = sha1($pass);
        $user = $this->user->get_pass($email);
        if (!is_null($user)) {
            if ($user->password === $pass) {                
                $this->session->set_userdata($user);               
                $this->load->view('dashboard');
                $this->user->loginLogSave($user->id, $ip);
            } else {
                $error = array('error' => "Password is incorrect!");
                $this->load->view('login', $error);
            }
        } else {
            $error = array('error' => "E-mail is wrong!");
            $this->load->view('login', $error);
        }
    }
    
    public function add_editor() {      
        $first_name = $this->input->post("first_name", TRUE);
        $email = $this->input->post("email", TRUE);
        $last_name = $this->input->post("last_name", TRUE);      
        $DataSet = array('first_name'=>$first_name,'last_name'=>$last_name,'email_address'=>$email,'role'=>"Editor");     
        //Query For Editor insertion 
        $insert_id = $this->user->insertData( "user", $DataSet);
        if($insert_id > 0){
            $success = array('Success'=> "Successfully Added!"); 
            redirect(base_url().'index.php/Users/new_editor',$success );
            //Todo; send email
            }  
            else {
            $Error = array('Error'=> "Error Detected!");   
            redirect(base_url().'index.php/Users/new_editor',$Error );            
        }       
    }
    
    public function new_editor(){
        $fieldset = array('id','email_address','first_name','last_name','title','gender','mobile_no' ,'address1','address2',
        'city','postal_code','country','role','profile_picture_URL','security_question','security_answer','');
        $data['users'] = $this->user->getData($fieldset,'user');
        $this->load->view('admin_manage_editors',$data);
    }
    
    function get_single_user(){
      $data = $this->input->post("user_id");
      $query = $this->db->get_where('user', array('id' => $data))->result()[0];
      //$a = $query['rows'];
      echo json_encode($query);
      //var_dump($a);
    }

    public function reviewers(){
        $fieldset = array('id','email_address','first_name','last_name','title','gender','mobile_no' ,'address1','address2',
        'city','postal_code','country','role','profile_picture_URL','security_question','security_answer','');
        $data['users'] = $this->user->getData($fieldset,'user');
        $this->load->view("invite_reviewer",$data);      
    }
    
    public function invite_reviewer(){
        $first_name = $this->input->post("first_name");
        $email = $this->input->post("email");
        $last_name = $this->input->post("last_name");       
        //ToDO send this data as a mail to reviver        
    }
    
    public function accept_reviewer() {
        // login userge pw eka check karanna oona
        // Reviewerge banded      
        $id = $this->input->post("id");      
        $user_password = $this->session->userdata("id");
        $password = $this->input->post("password");
        $password = sha1($password);        
        if ($user_password===$password) {
            $fieldset = array('banned'=>0);
            $this->user->Update($fieldset,"user",$id);
        }
    }
    
    public function reject_reviewer() {
        // login userge pw eka check karanna oona
        // Reviewerge banded         
        $id = $this->session->userdata("id");        
        $user_password = $this->session->userdata("id");
        $password = $this->input->post("password");        
        $password = sha1($password);        
        if ($user_password===$password) {
            $fieldset = array('deleted'=>1);
            $this->user->Update($fieldset,"user",$id);
        }
    }
    
    public function logOut() {
       $this->session->sess_destroy();
        $this->load->view('login');
    }
    
}
