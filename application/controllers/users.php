<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{

    var $USER_OBJ = false;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('article');
        $this->load->library('form_validation');

        $this->USER_OBJ = $this->session->userdata('user');
    }

    public function index()
    {
        if ($this->USER_OBJ != false) {
            //session exists
            redirect('/dashboard');
        } else {
            //session expired or DNE
            $this->load->view('login');
        }
//
//        $user = $this->session->userdata('user');
//        if (isset($user)) {
//            $this->dashboard();
//            //$this->load->view('dashboard');
//        } else {
//            $this->load->view('login');
//        }
    }

    public function dashboard()
    {
        switch ($this->ua->check_login()) {
            case "Super":
                $this->super_user_dashboard();
                break;
            case "Editor":
                $this->editor_dashboard();
                break;
            case "Author":
                $this->author_dashboard();
                break;
            case "Reviewer":
                $this->reviewer_dashboard();
                break;
            default:
                $this->load->view('401');
        }
    }

    private function super_user_dashboard()
    {
        //Here shows the super users dashboard
        redirect('/create_journal');
    }

    private function editor_dashboard()
    {   //$author_id = array("author_id" => $this->USER_OBJ->id);
        $data['author_article'] = $this->user->getData('*', 'article');
        $this->load->view('editor_submissions', $data);
    }

    private function author_dashboard()
    {
        $author_id = array("author_id" => $this->USER_OBJ->id);
        $data['author_article'] = $this->user->getData('*', 'article', $author_id);


        $success = $this->session->flashdata('upload');

        if ($success == "success") {
            $data['success_upload'] = TRUE;
        }
        //$auther_articals = $this->article->getData("*", 'article','');

        //print_r($auther_articals);
        // var_dump($data);
        //die();

        $this->load->view('author_dashboard', $data);
    }


    private function reviewer_dashboard()
    {
        if ($this->USER_OBJ != false) {
            //session exists

            $this->load->model('reviewer');
            $assigned_articles = $this->reviewer->get_assigned_articles($this->USER_OBJ->id);
            $view_data = array('assigned_articles' => $assigned_articles);

            $this->load->view("reviewer_dashboard", $view_data);
        } else {
            //session expired or DNE
            $this->load->view('login');
        }


    }

    // Login & Logout
    public function login()
    {
        $user_obj = $this->session->userdata('user');
        if ($user_obj != false) {
            redirect('/dashboard');
        } else {

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
                    $this->session->set_userdata("user", $user);
                    $this->user->loginLogSave($user->id, $ip);
                    redirect('/dashboard');
                } else {
                    $error = array('error' => "Password is incorrect!");
                    $this->load->view('login', $error);
                }
            } else {
                $error = array('error' => "E-mail is wrong!");
                $this->load->view('login', $error);
            }
        }
    }

    public function logOut()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

    // Editors Area
    public function add_editor()
    {
        $first_name = $this->input->post("first_name", TRUE);
        $email = $this->input->post("email", TRUE);
        $last_name = $this->input->post("last_name", TRUE);
        $password = $this->generateRandomString();
        $DataSet = array('first_name' => $first_name, 'last_name' => $last_name, 'email_address' => $email, 'role' => "Editor", 'password' => sha1($password));
        //Query For Editor insertion
        $insert_id = $this->user->insertData("user", $DataSet);
        if ($insert_id > 0) {
            $this->load->library('EmailSender');
            $data = array(
                'editor_name' => $first_name . " " . $last_name,
                'password' => $password
            );
            $this->emailsender->notify_editor_creation($email, $data);
            $success = array('Success' => "Successfully Added!");
            redirect(base_url() . 'index.php/Users/new_editor', $success);
        } else {
            $Error = array('Error' => "Error Detected!");
            redirect(base_url() . 'index.php/Users/new_editor', $Error);
        }
    }

    private function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function new_editor()
    {
        $fieldset = array('id', 'email_address', 'first_name', 'last_name', 'title', 'address_1', 'address_2',
            'city', 'postal_code', 'country', 'role', 'security_question', 'security_answer', '');
        $data['users'] = $this->user->getData($fieldset, 'user', array('role' => 'Editor'));

        $this->load->model('journalm');

        $data['journals'] = $this->journalm->get_journals();
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
        $fieldset = array('id', 'email_address', 'first_name', 'last_name', 'title', 'address_1', 'address_2',
            'city', 'postal_code', 'country', 'role', 'security_question', 'security_answer', '');

        $data['users'] = $this->user->getData($fieldset, 'user', array('role' => 'Reviewer'));

        $fieldset = array('id', 'email_address', 'first_name', 'last_name');
        $data['invited'] = $this->user->getData($fieldset, 'invited_reviewers');
        $this->load->view("invite_reviewer", $data);
    }

    public function invite_reviewer()
    {
        $first_name = $this->input->post("first_name");
        $email = $this->input->post("email");
        $last_name = $this->input->post("last_name");
        //$journal = $this->input->post("journals[]");
        //ToDO send this data as a mail to reviver
        $this->load->library('EmailSender');

        $this->load->library('parser');
        $data = array(
            'name' => $first_name . " " . $last_name,
            'link' => base_url() . "index.php/users/register_reviewer"
        );
        $body_string = $this->parser->parse('email/invite_reviewer', $data, TRUE);

        if ($this->emailsender->send($email, 'Applied e journal', $body_string)) {

            $DataSet = array('first_name' => $first_name,
                'last_name' => $last_name,
                'email_address' => $email);

            $insert_id = $this->user->insertData("invited_reviewers", $DataSet);
            $success = array('Success' => "Successfully Invited!");
            redirect(base_url() . 'index.php/Users/reviewers', $success);
            //echo "Success";
        } else {
            $Error = array('Error' => "Error Detected!");
            redirect(base_url() . 'index.php/Users/reviewers', $Error);
            //echo "Failed";
        }
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
                'password' => $pass,
                'address_1' => $address1,
                'address_2' => $address2,
                'city' => $city,
                'postal_code' => $postal_code,
                'country' => $country,
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
        $this->load->view("register_author_url");
    }

    public function view_author()
    {
        $fieldset = array('id', 'first_name', 'last_name', 'email_address', 'title',);
        $data['authors'] = $this->user->getData($fieldset, 'user');
        $this->load->view("admin_edit_author", $data);
    }

    public function authorRegistration()
    {

        $email = $this->input->post("email", TRUE);
        $pass = $this->input->post("password", TRUE);
        $pass2 = $this->input->post("password2", TRUE);
        if ($pass == $pass2) {
            $first_name = $this->input->post("first_name", TRUE);
            $last_name = $this->input->post("last_name", TRUE);
            $title = $this->input->post("title", TRUE);
            $address1 = $this->input->post("address1", TRUE);
            $address2 = $this->input->post("address2");
            $city = $this->input->post("city", TRUE);
            $postal_code = $this->input->post("postal_code", TRUE);
            $country = $this->input->post("country", TRUE);
            $sec_question = $this->input->post("sec_question", TRUE);
            $sec_answer = $this->input->post("sec_answer", TRUE);


            $DataSet = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email_address' => $email,
                'title' => $title,
                'password' => sha1($pass),
                'address_1' => $address1,
                'address_2' => $address2,
                'city' => $city,
                'postal_code' => $postal_code,
                'country' => $country,
                'security_question' => $sec_question,
                'security_answer' => $sec_answer,
                'role' => "Author",
                'deleted' => 0,
                'banned' => 1);


            $insert_id = $this->user->insertData("user", $DataSet);
            if ($insert_id > 0) {
                redirect('/login');
                //Todo; send email
            } else {
                $error = array('error' => "Error in InsertData");
                $this->load->view('register_author', $error);
            }
        } else {
            $error = array('error' => "Password mis match!");
            $this->load->view('register_author', $error);
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
