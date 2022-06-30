<?php
class Mrisk_objectif extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** risk_objectif *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_risk_objectif($data)
    {
        $this->db->insert('auditquality_risk_objectif', $data);
        return    $this->db->insert_id();
    }
    function get_risk_objectif()
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk_objectif');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk_objectif.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_risk_objectif_by_ID($ID_risk_objectif)
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk_objectif');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk_objectif.ID_company');

        $this->db->where('auditquality_risk_objectif.ID_risk_objectif', $ID_risk_objectif);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_risk_objectif_by_ID_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk_objectif');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk_objectif.ID_company');

        $this->db->where('auditquality_risk_objectif.ID_company', $ID_company);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function edit_risk_objectif($data, $ID_risk_objectif)
    {

        $this->db->where('auditquality_risk_objectif.ID_risk_objectif', $ID_risk_objectif);
        if ($this->db->update('auditquality_risk_objectif', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_risk_objectif($ID_risk_objectif)
    {
        $this->db->where('ID_risk_objectif', $ID_risk_objectif);
        $this->db->delete('auditquality_risk_objectif');
    }


    function get_risk_objectif_by_processus($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk_objectif');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk_objectif.ID_company');

        $this->db->where('auditquality_risk_objectif.ID_processus', $ID_processus);
        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End risk_objectif *************************************/
    /***************************************************************************/
    /***************************************************************************/


}
