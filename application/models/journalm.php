<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class journalm extends CI_Model
{
    public function get_journal($id)
    {
        $this->db->select('journal.id, journal.name, journal.issue, journal.volume, journal.aim, journal.scope,
                journal.objective, journal.started_date, journal.collection_date, categories.category, user.first_name,
                user.last_name, journal.publishing_date, journal.camera_rady_date, journal.`status`');
        $this->db->from('journal');
        $this->db->join('user', 'journal.chief_editor_id = user.id', 'inner');
        $this->db->join('categories', 'journal.category = categories.id', 'inner');
        $this->db->where('journal.id', $id);

        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            $Journal =  $result->result()[0];
           
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

    public function get_journals()
    {
        $this->db->from('journal');
        return $this->db->get()->result();
    }
    
    public function get_category()
    {
        $this->db->from('categories');
        return $this->db->get()->result();
    }
    
    public function UpdateJournal_keywords($fieldset, $tableName, $id) {
        $this->db->where('journal_id', $id);
        $this->db->update($tableName, $fieldset);
    }
}

/* End of file journalm.php */
/* Location: ./application/models/journalm.php */