<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class journalm extends CI_Model {

    public function get_journal($id) {
        $this->db->select('journal.id, journal.name, journal.issue, journal.volume, journal.aim, journal.scope,journal.chief_editor_id,
                journal.objective, journal.started_date, journal.collection_date, categories.category, user.first_name,
                user.last_name, journal.publishing_date, journal.camera_rady_date, journal.`status`');
        $this->db->from('journal');
        $this->db->join('user', 'journal.chief_editor_id = user.id', 'inner');
        $this->db->join('categories', 'journal.category = categories.id', 'inner');
        $this->db->where('journal.id', $id);

        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            $Journal = $result->result()[0];

            $this->db->select('keyword');
            $this->db->from('journal_keywords');
            $this->db->where('journal_id', $id);

            $Journal->keywords = $this->db->get()->result();

            //echo json_encode($Journal);
            //die();

            return $Journal;
        } else {
            return null;
        }
    }

    public function get_journals() {
        $this->db->from('journal');
        return $this->db->get()->result();
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

    public function get_sub_editors($journal_id) {
        $this->db->from('sub_editors');
        $this->db->where('journal_id', $journal_id);
        return $this->db->get()->result();
    }
    
    public function del_editors($journal_id) {
        $this->db->where('journal_id', $journal_id);
        $this->db->delete('sub_editors');
    }

    public function get_category() {
        $this->db->from('categories');
        $this->db->where('deleted', 0);
        return $this->db->get()->result();
    }

    public function UpdateJournal_keywords($fieldset, $tableName, $id) {
        $this->db->where('journal_id', $id);
        $this->db->update($tableName, $fieldset);
    }

    public function del_keywords($journal_id) {
        $this->db->where('journal_id', $journal_id);
        $this->db->delete('journal_keywords');
    }

    public function get_category_by_id($id) {
        $this->db->from('categories');
        $this->db->where(array('deleted' => 0, 'id' => $id));
        return $this->db->get()->result();
    }

    public function insertData($table, $data) {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update($fieldset, $tableName, $id) {
        $this->db->where('id', $id);
        $this->db->update($tableName, $fieldset);
    }

}

/* End of file journalm.php */
/* Location: ./application/models/journalm.php */