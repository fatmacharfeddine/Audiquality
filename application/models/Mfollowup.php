<?php
class Mfollowup extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** followup *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_followup($data)
    {
        $this->db->insert('auditquality_followup', $data);
        return    $this->db->insert_id();
    }
    function get_followup()
    {
        $this->db->select('*');
        $this->db->from('auditquality_followup');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_followup.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_followup_by_ID($ID_followup)
    {
        $this->db->select('*');
        $this->db->from('auditquality_followup');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_followup.ID_company');

        $this->db->where('auditquality_followup.ID_followup', $ID_followup);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_followup_by_ID_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_followup');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_followup.ID_company');

        $this->db->where('auditquality_followup.ID_company', $ID_company);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function edit_followup($data, $ID_followup)
    {

        $this->db->where('auditquality_followup.ID_followup', $ID_followup);
        if ($this->db->update('auditquality_followup', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_followup($ID_followup)
    {
        $this->db->where('ID_followup', $ID_followup);
        $this->db->delete('auditquality_followup');
    }


   
    /***************************************************************************/
    /***************************************************************************/
    /************************** End followup *************************************/
    /***************************************************************************/
    /***************************************************************************/


}
