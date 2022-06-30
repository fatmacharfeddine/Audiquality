<?php
class Mleadership extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** Engagement *********************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_engagement($data)
    {
        $this->db->insert('auditquality_engagement', $data);
        return    $this->db->insert_id();
    }
    function get_engagement($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_engagement');
        $this->db->where('auditquality_engagement.ID_company', $ID_company);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function edit_engagement($data, $ID_engagement)
    {

        $this->db->where('auditquality_engagement.ID_engagement', $ID_engagement);
        if ($this->db->update('auditquality_engagement', $data)) {

            return true;
        } else {

            return false;
        }
    }
    function delete_engagement($ID_engagement)
    {
        $this->db->where('ID_engagement', $ID_engagement);
        $this->db->delete('auditquality_engagement');
    }
}
