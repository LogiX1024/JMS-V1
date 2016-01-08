<?php

class Review extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getReviews($id) {
        $this->db->select('id,review_date,reviewer_id,title_acceptable,title_suggession,
            introduction,introduction_suggession,originality,clarity,completeness,interpretation,
            importance,materials_and_methods,materials_and_methods_suggession,
            results_and_discussion,results_and_discussion_suggession,decision');
        $this->db->from('review');
        $this->db->where('id', $id);
        $result = $this->db->get()->result();        
        return $result;
    }

}

?>