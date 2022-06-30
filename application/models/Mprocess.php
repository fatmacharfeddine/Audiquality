<?php
class Mprocess extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    /***************************************************************************/
    /***************************************************************************/
    /****************************** process *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_process($data)
    {
        $this->db->insert('auditquality_process', $data);
        return    $this->db->insert_id();
    }
    function get_process()
    {
        $this->db->select('*');
        $this->db->from('auditquality_process');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_process_by_ID($ID_process)
    {
        $this->db->select('*');
        $this->db->from('auditquality_process');
        $this->db->where('auditquality_process.ID_process', $ID_process);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_process_by_Name($Name_process)
    {
        $this->db->select('*');
        $this->db->from('auditquality_process');
        $this->db->where('auditquality_process.Name_process', $Name_process);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function edit_process($data, $ID_process)
    {
        $this->db->where('auditquality_process.ID_process', $ID_process);
        if ($this->db->update('auditquality_process', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_process($ID_process)
    {
        $this->db->where('ID_process', $ID_process);
        $this->db->delete('auditquality_process');
    }


    function get_process_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_process');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_process_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_process');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End process *************************************/
    /***************************************************************************/
    /***************************************************************************/
}
