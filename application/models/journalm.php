<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class journalm extends CI_Model
{
    public function get_journal($id)
    {
        $this->db->select('name, issue, volume, aim, journal.id, objective, scope, category, keywords, collection_date, camera_rady_date, publishing_date, chief_editor_id, status, journal_created_date, journal_created_date, first_name, last_name');
        $this->db->from('journal');
        $this->db->join('user', 'chief_editor_id = user.id', 'inner');
        $this->db->where('journal.id', $id);
        
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result()[0];
        } else {
            return null;
        }
    }


}

/* End of file journalm.php */
/* Location: ./application/models/journalm.php */