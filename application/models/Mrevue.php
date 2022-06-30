<?php
class Mrevue extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** revue *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_revue($data)
    {
        $this->db->insert('auditquality_revue', $data);
        return    $this->db->insert_id();
    }
    function get_revue()
    {
        $this->db->select('*');
        $this->db->from('auditquality_revue');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_revue.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_revue_by_ID($ID_revue)
    {
        $this->db->select('*');
        $this->db->from('auditquality_revue');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_revue.ID_company');

        $this->db->where('auditquality_revue.ID_revue', $ID_revue);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_revue_by_ID_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_revue');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_revue.ID_company');

        $this->db->where('auditquality_revue.ID_company', $ID_company);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function edit_revue($data, $ID_revue)
    {

        $this->db->where('auditquality_revue.ID_revue', $ID_revue);
        if ($this->db->update('auditquality_revue', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_revue($ID_revue)
    {
        $this->db->where('ID_revue', $ID_revue);
        $this->db->delete('auditquality_revue');
    }


   
    /***************************************************************************/
    /***************************************************************************/
    /************************** End revue *************************************/
    /***************************************************************************/
    /***************************************************************************/


}
