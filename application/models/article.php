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
    
    
    public function getData($fieldset, $tableName, $where = "") {
        if ($where == "") {
            $this->db->select($fieldset)->from($tableName);
        } else {
            $this->db->select($fieldset)->from($tableName)->where("'author_id'=".$where);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
}