<?php
class Mrisk_analysis extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** Mrisk_analysis *************************************/
    /***************************************************************************/
    /***************************************************************************/

    /*   function update_risk_identification($data, $ID_identification)
    {

        $this->db->where('auditquality_identification.ID_identification', $ID_identification);
        if ($this->db->update('auditquality_identification', $data)) {

            return true;
        } else {

            return false;
        }
    }
    function add_risk_identification($data)
    {
        $this->db->insert('auditquality_identification', $data);
        return    $this->db->insert_id();
    }

    function get_identification_method()
    {
        $this->db->select('*');
        $this->db->from('auditquality_method_identification');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_risk_identif_by_ID($ID_risk, $ID_sector)
    {
        $this->db->select('*');
        $this->db->from('auditquality_identification');
        $this->db->where('auditquality_identification.ID_risk', $ID_risk);
        $this->db->where('auditquality_identification.ID_sector', $ID_sector);


        $query = $this->db->get();
        return $query->result_array();
    }*/

    function get_all_method_analysis()
    {
        $this->db->select('*');
        $this->db->from('auditquality_method');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_method_analysis_by_ID($ID_analysis_method)
    {
        $this->db->select('*');
        $this->db->from('auditquality_method');
        $this->db->where('auditquality_method.ID_analysis_method', $ID_analysis_method);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function edit_analysis($data, $ID_analysis)
    {

        $this->db->where('auditquality_analysis.ID_analysis', $ID_analysis);
        if ($this->db->update('auditquality_analysis', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function add_analysis($data)
    {
        $this->db->insert('auditquality_analysis', $data);
        return    $this->db->insert_id();
    }


    function get_all_analysis()
    {
        $this->db->select('*');
        $this->db->from('auditquality_analysis');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_risk_analysis_by_ID($ID_identification)
    {
        $this->db->select('*');
        $this->db->from('auditquality_analysis');
        $this->db->where('auditquality_analysis.ID_identification', $ID_identification);
        $this->db->order_by('ID_analysis', 'Asc');


        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function delete_analysis($ID_identification)
    {
        $this->db->where('ID_identification', $ID_identification);
        $this->db->delete('auditquality_analysis');
    }
    function delete_analysis_bysector($ID_sector)
    {
        $this->db->join('auditquality_identification', 'auditquality_analysis.ID_identification = auditquality_identification.ID_identification');
        $this->db->where('auditquality_identification.ID_sector', $ID_sector);
        $this->db->delete('auditquality_analysis');
    }
}
