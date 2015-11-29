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

    public function get_assigned_articles($id, $status = null)
    {
        $this->db->select('assigned_review.assigned_date, assigned_review.review_id, article.id, article.title, article.submit_date, article.`status`, article.author_id, article.journal_id, journal.`name`, journal.issue, journal.volume');
        $this->db->from('assigned_review');
        $this->db->join('article', 'assigned_review.article_id = article.id', 'inner');
        $this->db->join('journal', 'article.journal_id = journal.id', 'inner');
        $this->db->where('`assigned_review`.reviewer_id', $id);
        if ($status != null) {
            if ($status == 'pending') {
                $this->db->where('assigned_review.review_id', null);
            } elseif ($status == 'reviewed') {
                $this->db->select('review.review_date');
                $this->db->join('review', 'assigned_review.review_id = review.id', 'inner');
                $this->db->where('assigned_review.review_id !=','null');
            }
        }

        $articles = $this->db->get()->result();

        $i = 0;
        foreach ($articles as $article) {
            $this->db->select('keyword');
            $this->db->from('article_keywords');
            $this->db->where('article_id', $article->id);
            $articles[$i]->keywords = $this->db->get()->result();
            $i++;
        }

        return $articles;

    }


}

?>