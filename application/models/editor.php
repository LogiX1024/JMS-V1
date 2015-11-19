<?php

class Editor extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getData($fieldset, $tableName, $where = "") {
        if ($where == "") {
            $this->db->select($fieldset)->from($tableName);
        } else {
            $this->db->select($fieldset)->from($tableName)->where("'author_id'=" . $where);
        }
        $query = $this->db->get();
        return $query->result();
    }

}

?>