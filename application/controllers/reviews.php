<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reviews extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('article');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

}
