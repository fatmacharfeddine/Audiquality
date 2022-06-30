<?php
class Mrisk_planification extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** risk_planification *************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_risk_planification($data)
    {
        $this->db->insert('auditquality_risk_planification', $data);
        return    $this->db->insert_id();
    }
    function get_risk_planification()
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk_planification');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk_planification.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_risk_planification_by_ID($ID_risk_planification)
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk_planification');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk_planification.ID_company');

        $this->db->where('auditquality_risk_planification.ID_risk_planification', $ID_risk_planification);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_risk_planification_by_ID_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk_planification');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk_planification.ID_company');

        $this->db->where('auditquality_risk_planification.ID_company', $ID_company);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function edit_risk_planification($data, $ID_risk_planification)
    {

        $this->db->where('auditquality_risk_planification.ID_risk_planification', $ID_risk_planification);
        if ($this->db->update('auditquality_risk_planification', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_risk_planification($ID_risk_planification)
    {
        $this->db->where('ID_risk_planification', $ID_risk_planification);
        $this->db->delete('auditquality_risk_planification');
    }


    function get_risk_planification_by_processus($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk_planification');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk_objectif.ID_company');

        $this->db->where('auditquality_risk_planification.ID_processus', $ID_processus);
        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End risk_planification *************************************/
    /***************************************************************************/
    /***************************************************************************/


}
