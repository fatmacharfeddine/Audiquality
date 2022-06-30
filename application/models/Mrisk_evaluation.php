<?php
class Mrisk_evaluation extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** Mrisk_evaluation *************************************/
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



    /*************************** opp ****************************/
    function get_all_avantage()
    {
        $this->db->select('*');
        $this->db->from('auditquality_avantage');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_effort()
    {
        $this->db->select('*');
        $this->db->from('auditquality_effort');

        $query = $this->db->get();
        return $query->result_array();
    }
      /*************************** opp ****************************/
  
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

    function edit_evaluation($data, $ID_evaluation)
    {

        $this->db->where('auditquality_evaluation.ID_evaluation', $ID_evaluation);
        if ($this->db->update('auditquality_evaluation', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function add_evaluation($data)
    {
        $this->db->insert('auditquality_evaluation', $data);
        return    $this->db->insert_id();
    }


    function get_all_evaluation()
    {
        $this->db->select('*');
        $this->db->from('auditquality_evaluation');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_risk_evaluation()
    {
        $this->db->select('*');
        $this->db->from('auditquality_evaluation');
        // $this->db->where('auditquality_evaluation.ID_identification', $ID_identification);
        $this->db->order_by('ID_evaluation', 'Asc');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_risk_evaluation_by_ID($ID_identification)
    {
        $this->db->select('*');
        $this->db->from('auditquality_evaluation');
        $this->db->where('auditquality_evaluation.ID_identification', $ID_identification);
        $this->db->order_by('ID_evaluation', 'Asc');


        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function delete_evaluation($ID_identification)
    {
        $this->db->where('ID_identification', $ID_identification);
        $this->db->delete('auditquality_evaluation');
    }
    function delete_evaluation_bysector($ID_sector)
    {
        $this->db->from('auditquality_evaluation');

        $this->db->join('auditquality_identification', 'auditquality_evaluation.ID_identification = auditquality_identification.ID_identification');
        $this->db->where('auditquality_identification.ID_sector', $ID_sector);
        $this->db->delete('auditquality_evaluation');
    }
}
