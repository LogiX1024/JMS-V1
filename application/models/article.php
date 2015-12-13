<?php

class Article extends CI_Model {

    public function insertData($table, $data) {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function Update($fieldset, $tableName, $id) {
        $this->db->where('article_id', $id);
        $this->db->update($tableName, $fieldset);
    }

    public function getData($fieldset, $tableName, $where = '') {
        if ($where == "") {
            $this->db->select($fieldset)->from($tableName);
        } else {
            $this->db->select($fieldset)->from($tableName)->where($where);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_article($id) {
        $this->db->select('article.id, article.title AS article_title, article.submit_date, article.`status`, article.journal_id, article.author_id, journal.`name`, journal.issue, journal.volume, journal.aim, journal.scope, journal.objective, journal.started_date, journal.collection_date, journal.publishing_date, journal.chief_editor_id, journal.category, journal.camera_ready_date, journal.`status`, `user`.title, `user`.first_name, `user`.last_name, `user`.email_address, `user`.`password`, `user`.role, `user`.affiliation, `user`.address_1, `user`.address_2, `user`.city, `user`.postal_code, `user`.country, `user`.biography');
        $this->db->from('article');
        $this->db->join('journal', 'article.journal_id = journal.id', 'inner');
        $this->db->join('user', 'article.author_id = user.id', 'inner');
        $this->db->where('article.id', $id);
        return $this->db->get()->result()[0];
    }

    public function get_reviewed_article($id) {
        $this->db->select('assigned_review.article_id,
assigned_review.reviewer_id,
assigned_review.assigned_date,
assigned_review.review_id,
review.id,
review.review_date,
review.reviewer_id,
review.title_acceptable,
review.title_suggession,
review.introduction,
review.introduction_suggession,
review.originality,
review.clarity,
review.completeness,
review.interpretation,
review.importance,
review.materials_and_methods,
review.materials_and_methods_suggession,
review.results_and_discussion,
review.results_and_discussion_suggession,
review.decision,
article.id,
article.title');
        $this->db->from('assigned_review');
        $this->db->join('review', 'assigned_review.review_id = review.id', 'inner');
        $this->db->join('article', 'assigned_review.article_id = article.id', 'inner');
        $this->db->where('assigned_review.article_id', $id);
        return $this->db->get()->result()[0];
    }

    public function submit_review($article_id, $data) {
        $this->db->insert('review', $data);
        $review_id = $this->db->insert_id();

        $this->db->set('review_id', $review_id);
        $this->db->where('article_id', $article_id);
        $this->db->where('reviewer_id', $data['reviewer_id']);
        $this->db->update('assigned_review');

        return $review_id;
    }

    public function assign_review($article_id, $data) {
        $this->db->insert('assigned_review', $data[]);
        $review_id = $this->db->insert_id();


        return $review_id;
    }

    /**
     * @param $article_id
     * @return int: count of the pending reviews of the article
     */
    public function get_pending_reviews_count($article_id) {
        return $this->db->query("SELECT COUNT(*) as count FROM assigned_review WHERE article_id = ? AND review_id is NULL", $article_id)->result()[0]->count;
    }

    /**
     * @param $id : article ID
     * @param $status : new status of the article
     */
    public function change_article_status($id, $status) {
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $this->db->update('article');
    }

    public function insert_sub_authors($insert_data) {
        $this->db->insert_batch('sub_authors', $insert_data);
    }

}
