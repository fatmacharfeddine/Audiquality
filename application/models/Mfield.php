<?php
class Mfield extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    /***************************************************************************/
    /***************************************************************************/
    /****************************** field *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_field($data)
    {
        $this->db->insert('auditquality_field', $data);
        return    $this->db->insert_id();
    }
    function get_field()
    {
        $this->db->select('*');
        $this->db->from('auditquality_field');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_field_by_ID($ID_field)
    {
        $this->db->select('*');
        $this->db->from('auditquality_field');
        $this->db->where('auditquality_field.ID_field', $ID_field);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_field_by_Name($Title_field)
    {
        $this->db->select('*');
        $this->db->from('auditquality_field');
        $this->db->where('auditquality_field.Title_field', $Title_field);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function edit_field($data, $ID_field)
    {
        $this->db->where('auditquality_field.ID_field', $ID_field);
        if ($this->db->update('auditquality_field', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_field($ID_field)
    {
        $this->db->where('ID_field', $ID_field);
        $this->db->delete('auditquality_field');
    }


    function get_field_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_field');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_field_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_field');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End field *************************************/
    /***************************************************************************/
    /***************************************************************************/
}
