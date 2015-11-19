<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class API extends CI_Controller
{
    public function get_journal($journal_id)
    {
        $this->load->model('journalm');

        $view_data = $this->journalm->get_journal($journal_id);

        $this->load->view('json', array('data' => $view_data));

    }

}

/* End of file API.php */
/* Location: ./application/controllers/API.php */