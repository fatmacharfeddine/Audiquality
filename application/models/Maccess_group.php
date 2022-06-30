<?php
class Maccess_group extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** access_group *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_access_group($data)
    {
        $this->db->insert('auditquality_access_group', $data);
        return    $this->db->insert_id();
    }
    function get_access_group()
    {
        $this->db->select('*');
        $this->db->from('auditquality_access_group');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_access_group.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_access_group_by_ID($ID_access_group)
    {
        $this->db->select('*');
        $this->db->from('auditquality_access_group');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_access_group.ID_company');

        $this->db->where('auditquality_access_group.ID_access_group', $ID_access_group);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_access_group($data, $ID_access_group)
    {

        $this->db->where('auditquality_access_group.ID_access_group', $ID_access_group);
        if ($this->db->update('auditquality_access_group', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_access_group($ID_access_group)
    {
        $this->db->where('ID_access_group', $ID_access_group);
        $this->db->delete('auditquality_access_group');
    }


    function get_access_group_paging($page)
    {
        $this->db->select('*');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_access_group.ID_company');

        $this->db->from('auditquality_access_group');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_access_group_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_access_group.ID_company');

        $this->db->from('auditquality_access_group');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End access_group *************************************/
    /***************************************************************************/
    /***************************************************************************/

    /****************************** Company ************************************/


    function get_companies()
    {
        $this->db->select('*');
        $this->db->from('auditquality_company');
        $query = $this->db->get();
        return $query->result_array();
    }
}
