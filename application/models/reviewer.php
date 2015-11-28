<?php

class Reviewer extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_reviewer($id) {

        $this->db->select('user.id,user.title,user.first_name,user.last_name,user.email_address,user.address_1,
                            user.address_2,user.city,user.postal_code,reviewer.expertise');
        $this->db->from('user');
        $this->db->join('reviewer', 'user.id = reviewer.id', 'inner');
        $this->db->where('user.id', $id);

        $result = $this->db->get();
                
        if ($result->num_rows() > 0) {
            $Reviewer = $result->result()[0];

            $this->db->select('expertise');
            $this->db->from('reviewer');
            $this->db->where('id', $id);

            $Reviewer->expertise = $this->db->get()->result();

            return $Reviewer;
        } else {
            return null;
        }
    }
  

}

?>