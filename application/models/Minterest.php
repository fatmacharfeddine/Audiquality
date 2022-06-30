<?php
class Minterest extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /************************** interest_group *********************************/

    function delete_interest_group($ID_interest_group)
    {
        $this->db->where('ID_interest_group', $ID_interest_group);
        $this->db->delete('auditquality_interest_group');
    }

    function add_interest_group($data)
    {
        $this->db->insert('auditquality_interest_group', $data);
        return    $this->db->insert_id();
    }

    function get_interest_group_paging($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->from('auditquality_interest_group');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_interest_all()
    {
        $this->db->select('*');

        $this->db->from('auditquality_interest');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_interest_group_nb_page()
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->from('auditquality_interest_group');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function get_interest_by_group_paging($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->from('auditquality_interest');
        //     $this->db->join('auditquality_interest_group', 'auditquality_interest_group.ID_interest_group = auditquality_interest.ID_interest_group', 'left');

        //    $this->db->where('auditquality_interest.ID_interest_group', $ID_interest_group);
        $this->db->order_by('auditquality_interest.Priority_interest','Asc');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    /*****************************Interest********************************/
    function get_interest_by_group_nb_page()
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_interest_group', 'auditquality_interest_group.ID_interest_group = auditquality_interest.ID_interest_group');

        // $this->db->where('auditquality_interest.ID_interest_group', $ID_interest_group);

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->from('auditquality_interest');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    function get_interest_group_by_ID($ID_interest_group)
    {
        $this->db->select('*');
        $this->db->from('auditquality_interest_group');
        $this->db->where('auditquality_interest_group.ID_interest_group', $ID_interest_group);
        $query = $this->db->get();
        return $query->result_array();
    }
    function delete_interest($ID_interest)
    {
        $this->db->where('ID_interest', $ID_interest);
        $this->db->delete('auditquality_interest');
    }
    function delete_interest_by_group($ID_interest_group)
    {
        $this->db->where('ID_interest_group', $ID_interest_group);
        $this->db->delete('auditquality_interest');
    }
    function add_interest($data)
    {
        $this->db->insert('auditquality_interest', $data);
        return    $this->db->insert_id();
    }
    function get_interest_by_ID($ID_interest)
    {
        $this->db->select('*');
        $this->db->from('auditquality_interest');
        $this->db->where('auditquality_interest.ID_interest', $ID_interest);
        $query = $this->db->get();
        return $query->result_array();
    }

    function edit_interest($data, $ID_interest)
    {

        $this->db->where('auditquality_interest.ID_interest', $ID_interest);
        if ($this->db->update('auditquality_interest', $data)) {

            return true;
        } else {

            return false;
        }
    }
}
