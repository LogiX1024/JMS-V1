<?php


class Article extends CI_Model
{

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function Update($fieldset, $tableName, $id)
    {
        $this->db->where('article_id', $id);
        $this->db->update($tableName, $fieldset);
    }


    public function getData($fieldset, $tableName, $where = '')
    {
        if ($where == "") {
            $this->db->select($fieldset)->from($tableName);
        } else {
            $this->db->select($fieldset)->from($tableName)->where($where);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_article($id)
    {
        $this->db->select('article.id, article.title AS article_title, article.submit_date, article.`status`, article.journal_id, article.author_id, journal.`name`, journal.issue, journal.volume, journal.aim, journal.scope, journal.objective, journal.started_date, journal.collection_date, journal.publishing_date, journal.chief_editor_id, journal.category, journal.camera_ready_date, journal.`status`, `user`.title, `user`.first_name, `user`.last_name, `user`.email_address, `user`.`password`, `user`.role, `user`.affiliation, `user`.address_1, `user`.address_2, `user`.city, `user`.postal_code, `user`.country, `user`.biography');
        $this->db->from('article');
        $this->db->join('journal', 'article.journal_id = journal.id', 'inner');
        $this->db->join('user', 'article.author_id = user.id', 'inner');
        $this->db->where('article.id', $id);
        return $this->db->get()->result()[0];
    }

    public function submit_review($article_id, $data)
    {
        $this->db->insert('review', $data);
        $review_id = $this->db->insert_id();

        $this->db->set('review_id', $review_id);
        $this->db->where('article_id', $article_id);
        $this->db->where('reviewer_id', $data['reviewer_id']);
        $this->db->update('assigned_review');

        return $review_id;
    }

    /**
     * @param $article_id
     * @return int: count of the pending reviews of the article
     */
    public function get_pending_reviews_count($article_id)
    {
        return $this->db->query("SELECT COUNT(*) as count FROM assigned_review WHERE article_id = ? AND review_id is NULL", $article_id)->result()[0]->count;
    }

    /**
     * @param $id : article ID
     * @param $status : new status of the article
     */
    public function change_article_status($id, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $this->db->update('article');
    }

}