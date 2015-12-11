<?php

class Author extends CI_Model
{

    function __construct()
    {
        parent::__construct();
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
    
    public function view_author() {
        $fieldset = array('id', 'first_name', 'last_name', 'email_address', 'title',);
        $data['authors'] = $this->user->getData($fieldset, 'user');
        $this->load->view("admin_edit_author", $data);
    }
    
    public function getAuthorData($where)
    {   
        $this->db->select('id,title,first_name,last_name,email_address,country,address_1,address_2,city,postal_code,'
                . 'password,security_question,security_answer');
        $this->db->from('user');
        $this->db->where('id',$where);
        return $this->db->get()->result()[0];
    }
    
    public function UpdateAuthorData($fieldset, $tableName,$where)
    {   
        $this->db->where('id', $where);
        $this->db->update($tableName, $fieldset);
    }
}

?>