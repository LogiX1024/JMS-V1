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
    
}