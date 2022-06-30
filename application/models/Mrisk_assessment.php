<?php
class Mrisk_assessment extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** Mrisk_assessment *************************************/
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
    }*/

    function get_risk_assessment_by_ID($ID_identification)
    {
        $this->db->select('*');
        $this->db->from('auditquality_assessment');
        $this->db->where('auditquality_assessment.ID_identification', $ID_identification);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_all_gravity()
    {
        $this->db->select('*');
        $this->db->from('auditquality_gravity');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_probability()
    {
        $this->db->select('*');
        $this->db->from('auditquality_probability');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_detectability()
    {
        $this->db->select('*');
        $this->db->from('auditquality_detectability');

        $query = $this->db->get();
        return $query->result_array();
    }

    function edit_assessment($data, $ID_assessment)
    {

        $this->db->where('auditquality_assessment.ID_assessment', $ID_assessment);
        if ($this->db->update('auditquality_assessment', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function add_assessment($data)
    {
        $this->db->insert('auditquality_assessment', $data);
        return    $this->db->insert_id();
    }


    function get_all_assessment()
    {
        $this->db->select('*');
        $this->db->from('auditquality_assessment');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_probability_severity()
    {
        $this->db->select('*');
        $this->db->from('auditquality_probability_severity');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_unit()
    {
        $this->db->select('*');
        $this->db->from('auditquality_unit');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_probability_severity_by_ID($ID_probability_severity)
    {
        $this->db->select('*');
        $this->db->from('auditquality_probability_severity');
        $this->db->where('auditquality_probability_severity.ID_probability_severity', $ID_probability_severity);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_unit_by_ID($ID_unit)
    {
        $this->db->select('*');
        $this->db->from('auditquality_unit');
        $this->db->where('auditquality_unit.ID_unit', $ID_unit);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function delete_assessment($ID_identification)
    {
        $this->db->where('ID_identification', $ID_identification);
        $this->db->delete('auditquality_assessment');
    }

    function delete_assessment_bysector($ID_sector)
    {
        $this->db->join('auditquality_identification', 'auditquality_assessment.ID_identification = auditquality_identification.ID_identification');
        $this->db->where('auditquality_identification.ID_sector', $ID_sector);
        $this->db->delete('auditquality_assessment');
    }
}
