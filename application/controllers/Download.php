<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller
{

    var $USER_OBJ = false;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');

        $this->USER_OBJ = $this->session->userdata('user');
    }

    public function blindcopy($id)
    {
        if ($this->USER_OBJ != false) {
            //session exists
            if ($this->USER_OBJ->role == 'Reviewer') {
                $this->downloadBlindCopy($id);
            } else {
                $this->load->view('401');
            }
        } else {
            //session expired or DNE
            $this->load->view('login');
        }
    }

    private function downloadBlindCopy($id)
    {
        $this->load->helper('download');

        $data = file_get_contents("./uploads/BlindCopy/" . $id . ".docx");
        $filename = "BC_" . $id . ".docx";

        force_download($filename, $data);

    }

}

/* End of file Download.php */
/* Location: ./application/controllers/Download.php */