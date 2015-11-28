<?php

class Reviewer extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_reviewer($id)
    {

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

    public function get_assigned_articles($id)
    {
        $this->db->select('assigned_review.assigned_date, article.id, article.title, article.submit_date, article.`status`, article.author_id, journal.`name`, journal.issue, journal.volume');
        $this->db->from('assigned_review');
        $this->db->join('article', 'assigned_review.article_id = article.id', 'inner');
        $this->db->join('journal', 'article.journal_id = journal.id', 'inner');
        $this->db->where('`assigned_review`.reviewer_id', $id);
        return $this->db->get()->result();
    }


}

?>