<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $userid = $this->session->userdata('id');
        if ($userid != FALSE) {
//            redirect(base_url().'index.php/Users' );
            $this->load->view('dashboard');
        } else {
            $this->load->view('login');
        }
    }

    public function test()
    {
        $this->load->library('EmailSender');

        $this->load->library('parser');
        $data = array(
            'name' => 'Kamal Piyasena',
            'link' => 'http://www.google.com'
        );
        $body_string = $this->parser->parse('email/invite_reviewer', $data, TRUE);

        if ($this->emailsender->send('harithalht@gmail.com', 'Applied e journal', $body_string)) {
            echo "Success";
        } else {
            echo "Failed";
        }
    }

    // Login & Logout
    public function login()
    {
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

    public function logOut()
    {
        $this->session->sess_destroy();
        $this->load->view('login');
    }

    // Editors Area
    public function add_editor()
    {
        $first_name = $this->input->post("first_name", TRUE);
        $email = $this->input->post("email", TRUE);
        $last_name = $this->input->post("last_name", TRUE);
        $DataSet = array('first_name' => $first_name, 'last_name' => $last_name, 'email_address' => $email, 'role' => "Editor");
        //Query For Editor insertion 
        $insert_id = $this->user->insertData("user", $DataSet);
        if ($insert_id > 0) {
            $success = array('Success' => "Successfully Added!");
            redirect(base_url() . 'index.php/Users/new_editor', $success);
            //Todo; send email
        } else {
            $Error = array('Error' => "Error Detected!");
            redirect(base_url() . 'index.php/Users/new_editor', $Error);
        }
    }

    public function new_editor()
    {
        $fieldset = array('id', 'email_address', 'first_name', 'last_name', 'title', 'gender', 'mobile_no', 'address1', 'address2',
            'city', 'postal_code', 'country', 'role', 'profile_picture_URL', 'security_question', 'security_answer', '');
        $data['users'] = $this->user->getData($fieldset, 'user');
        $this->load->view('admin_manage_editors', $data);
    }

    function get_single_user()
    {
        $data = $this->input->post("user_id");
        $query = $this->db->get_where('user', array('id' => $data))->result()[0];
        //$a = $query['rows'];
        echo json_encode($query);
        //var_dump($a);
    }

    public function delete_editor()
    {

    }

    // Reviewers Area
    public function reviewers()
    {
        $fieldset = array('id', 'email_address', 'first_name', 'last_name', 'title', 'gender', 'mobile_no', 'address1', 'address2',
            'city', 'postal_code', 'country', 'role', 'profile_picture_URL', 'security_question', 'security_answer', '');
        $data['users'] = $this->user->getData($fieldset, 'user');
        $this->load->view("invite_reviewer", $data);
    }

    public function invite_reviewer()
    {
        $first_name = $this->input->post("first_name");
        $email = $this->input->post("email");
        $last_name = $this->input->post("last_name");
        //ToDO send this data as a mail to reviver        
    }

    public function accept_reviewer()
    {
        // login userge pw eka check karanna oona
        // Reviewerge banded      
        $id = $this->input->post("id");
        $user_password = $this->session->userdata("id");
        $password = $this->input->post("password");
        $password = sha1($password);
        if ($user_password === $password) {
            $fieldset = array('banned' => 0);
            $this->user->Update($fieldset, "user", $id);
        }
    }

    public function reject_reviewer()
    {
        // login userge pw eka check karanna oona
        // Reviewerge banded         
        $id = $this->session->userdata("id");
        $user_password = $this->session->userdata("id");
        $password = $this->input->post("password");
        $password = sha1($password);
        if ($user_password === $password) {
            $fieldset = array('deleted' => 1);
            $this->user->Update($fieldset, "user", $id);
        }
    }

    public function register_reviewer()
    {
        $this->load->view("register_reviewer");
    }

    public function reviewerRegistration()
    {

        $email = $this->input->post("username", TRUE);
        $pass = $this->input->post("password", TRUE);
        $pass2 = $this->input->post("password2", TRUE);
        if ($pass == $pass2) {
            $first_name = $this->input->post("first_name", TRUE);
            $last_name = $this->input->post("last_name", TRUE);
            $title = $this->input->post("title", TRUE);
            $gender = $this->input->post("gender", TRUE);
            $mobile_no = $this->input->post("mobile_no", TRUE);
            $address1 = $this->input->post("address1", TRUE);
            $address2 = $this->input->post("address2");
            $city = $this->input->post("city", TRUE);
            $postal_code = $this->input->post("postal_code", TRUE);
            $country = $this->input->post("country", TRUE);
            $sec_question = $this->input->post("sec_question", TRUE);
            $sec_answer = $this->input->post("sec_answer", TRUE);
            // Uploading Part
            $config['upload_path'] = './uploadimg/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 0;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('profile_picture')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('register_reviewer', $error);
            } else {
                $img_url = $this->upload->data('full_path');
            }

            $DataSet = array('first_name' => $first_name,
                'last_name' => $last_name,
                'email_address' => $email,
                'title' => $title,
                'gender' => $gender,
                'password' => $pass,
                'mobile_no' => $mobile_no,
                'address1' => $address1,
                'address2' => $address2,
                'city' => $city,
                'postal_code' => $postal_code,
                'country' => $country,
                'profile_picture_URL' => $img_url,
                'security_question' => $sec_question,
                'security_answer' => $sec_answer,
                'role' => "Reviewer",
                'deleted' => 0,
                'banned' => 1);

            $insert_id = $this->user->insertData("user", $DataSet);
            if ($insert_id > 0) {
                $this->load->view('login');
                //Todo; send email
            } else {
                $error = array('error' => "Error in InsertData");
                $this->load->view('register_reviewer', $error);
            }
        } else {
            $error = array('error' => "Password mis match!");
            $this->load->view('register_reviewer', $error);
        }
    }

    // Authors Area
    public function register_author()
    {
        $this->load->view("register_author");
    }

    public function authorRegistration()
    {

        $email = $this->input->post("username", TRUE);
        $pass = $this->input->post("password", TRUE);
        $pass2 = $this->input->post("password2", TRUE);
        if ($pass == $pass2) {
            $first_name = $this->input->post("first_name", TRUE);
            $last_name = $this->input->post("last_name", TRUE);
            $title = $this->input->post("title", TRUE);
            $gender = $this->input->post("gender", TRUE);
            $mobile_no = $this->input->post("mobile_no", TRUE);
            $address1 = $this->input->post("address1", TRUE);
            $address2 = $this->input->post("address2");
            $city = $this->input->post("city", TRUE);
            $postal_code = $this->input->post("postal_code", TRUE);
            $country = $this->input->post("country", TRUE);
            $sec_question = $this->input->post("sec_question", TRUE);
            $sec_answer = $this->input->post("sec_answer", TRUE);
            // Uploading Part
            $config['upload_path'] = './uploadimg/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 0;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('profile_picture')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('register_reviewer', $error);
            } else {
                $img_url = $this->upload->data('full_path');
            }

            $DataSet = array('first_name' => $first_name,
                'last_name' => $last_name,
                'email_address' => $email,
                'title' => $title,
                'gender' => $gender,
                'password' => $pass,
                'mobile_no' => $mobile_no,
                'address1' => $address1,
                'address2' => $address2,
                'city' => $city,
                'postal_code' => $postal_code,
                'country' => $country,
                'profile_picture_URL' => $img_url,
                'security_question' => $sec_question,
                'security_answer' => $sec_answer,
                'role' => "Author",
                'deleted' => 0,
                'banned' => 1);

            $insert_id = $this->user->insertData("user", $DataSet);
            if ($insert_id > 0) {
                $this->load->view('login');
                //Todo; send email
            } else {
                $error = array('error' => "Error in InsertData");
                $this->load->view('register_reviewer', $error);
            }
        } else {
            $error = array('error' => "Password mis match!");
            $this->load->view('register_reviewer', $error);
        }
    }

    // Forgot Password Area
    public function forgot_pass()
    {
        $this->load->view("forgot_password");
    }

    public function forgot_pw()
    {
        $this->form_validation->set_rules('username', 'Email', 'required|valid_email|is_unique[user.email_address]');
        $email = $this->input->post('username');
        $id_email = $this->user->is_User($email);
        if (isset($id_email)) {
            $url = "http://localhost/JMS-V1/index.php/users/reset_password/" . $id_email->email_address . "/";
            echo $url;
//            echo $id_email->id." ".$id_email->email_address;
        } else {
            $this->load->view("forgot_password");
        }
    }

    public function reset_password($email)
    {
        $data["emails"] = array("email" => $email);
        $this->load->view("password_reset", $data);
    }

    public function reset()
    {
        $this->form_validation->set_rules('username', 'Email', 'required|valid_email|is_unique[user.email_address]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|sha1');
        $this->form_validation->set_rules('repassword', 'Password', 'trim|required|sha1');
        $email = $this->input->post('username');
        $pass = $this->input->post('password');
        $pass2 = $this->input->post('repassword');

        if ($pass == $pass2) {
            $this->user->reset_pw($email, $pass);
        } else {
            $url = "http://localhost/JMS-V1/index.php/users/reset_password/" . $email . "/";
            redirect($url);
        }
    }

}
