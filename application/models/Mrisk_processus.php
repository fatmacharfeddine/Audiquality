<?php
class Mrisk_processus extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** Mrisk_processus *************************/
    /***************************************************************************/
    /***************************************************************************/



    function edit_risk_processus($data, $ID_risk_processus)
    {

        $this->db->where('auditquality_risk_processus.ID_risk_processus', $ID_risk_processus);
        if ($this->db->update('auditquality_risk_processus', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function add_risk_processus($data)
    {
        $this->db->insert('auditquality_risk_processus', $data);
        return    $this->db->insert_id();
    }


    function get_all_risk_processus()
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk_processus');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_risk_processus()
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk_processus');
        // $this->db->where('auditquality_risk_processus.ID_identification', $ID_identification);
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_risk_processus.ID_processus', 'left');

        $this->db->order_by('ID_risk_processus', 'Asc');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_risk_processus_by_ID($ID_identification)
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk_processus');
        $this->db->where('auditquality_risk_processus.ID_identification', $ID_identification);
        $this->db->order_by('ID_risk_processus', 'Asc');


        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function delete_risk_processus($ID_risk)
    {
        $this->db->where('ID_risk', $ID_risk);
        $this->db->delete('auditquality_risk_processus');
    }
    function delete_risk_processus_bysector($ID_sector)
    {
        $this->db->from('auditquality_risk_processus');

        $this->db->join('auditquality_identification', 'auditquality_risk_processus.ID_identification = auditquality_identification.ID_identification');
        $this->db->where('auditquality_identification.ID_sector', $ID_sector);
        $this->db->delete('auditquality_risk_processus');
    }
}
