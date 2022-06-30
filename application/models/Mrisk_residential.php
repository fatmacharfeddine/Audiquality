<?php
class Mrisk_residential extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** Mrisk_residential *************************************/
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
    function get_gravity_by_ID($ID_gravity)
    {
        $this->db->select('*');
        $this->db->from('auditquality_gravity');
        $this->db->where('auditquality_gravity.ID_gravity', $ID_gravity);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_probability_by_ID($ID_probability)
    {
        $this->db->select('*');
        $this->db->from('auditquality_probability');
        $this->db->where('auditquality_probability.ID_probability', $ID_probability);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_detectability_by_ID($ID_detectability)
    {
        $this->db->select('*');
        $this->db->from('auditquality_detectability');
        $this->db->where('auditquality_detectability.ID_detectability', $ID_detectability);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function edit_residential($data, $ID_residential)
    {

        $this->db->where('auditquality_residential.ID_residential', $ID_residential);
        if ($this->db->update('auditquality_residential', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function add_residential($data)
    {
        $this->db->insert('auditquality_residential', $data);
        return    $this->db->insert_id();
    }


    function get_all_residential()
    {
        $this->db->select('*');
        $this->db->from('auditquality_residential');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_risk_residential()
    {
        $this->db->select('*');
        $this->db->from('auditquality_residential');
        // $this->db->where('auditquality_residential.ID_identification', $ID_identification);
        $this->db->order_by('ID_residential', 'Asc');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_risk_residential_by_ID($ID_identification)
    {
        $this->db->select('*');
        $this->db->from('auditquality_residential');
        $this->db->where('auditquality_residential.ID_identification', $ID_identification);
        $this->db->order_by('ID_residential', 'Asc');


        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function delete_residential($ID_risk)
    {
        $this->db->where('ID_risk', $ID_risk);
        $this->db->delete('auditquality_residential');
    }
    function delete_residential_bysector($ID_sector)
    {
        $this->db->from('auditquality_residential');

        $this->db->join('auditquality_identification', 'auditquality_residential.ID_identification = auditquality_identification.ID_identification');
        $this->db->where('auditquality_identification.ID_sector', $ID_sector);
        $this->db->delete('auditquality_residential');
    }
}
