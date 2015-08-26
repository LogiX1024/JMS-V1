<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{   
     public function __construct() {
        parent::__construct();
        $this->load->model('user');
    }
    
    public function test2($view)
    {   
        $this->load->view($view);
    }

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */