<?php
class Mrisk_identification extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** risk_identification *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function update_risk_identification($data, $ID_identification)
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
    function get_identification_method_by_ID($ID_identification_method)
    {
        $this->db->select('*');
        $this->db->from('auditquality_method_identification');
        $this->db->where('auditquality_method_identification.ID_identification_method', $ID_identification_method);

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_risk_identif_by_ID($ID_risk)
    {
        $this->db->select('*');
        $this->db->from('auditquality_identification');
        $this->db->where('auditquality_identification.ID_risk', $ID_risk);
        $this->db->join('auditquality_method_identification', 'auditquality_method_identification.ID_identification_method = auditquality_identification.ID_identification_method');
        $this->db->join('auditquality_enjeu', 'auditquality_enjeu.ID_enjeu = auditquality_identification.ID_enjeu');
        //   $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_identification.ID_processus');
        //$this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable');

        //$this->db->where('auditquality_identification.ID_sector', $ID_sector);
        $this->db->order_by('ID_identification', 'Asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_risk_identify_by_ID($ID_identification)
    {
        $this->db->select('*');
        $this->db->from('auditquality_identification');
        $this->db->where('auditquality_identification.ID_identification', $ID_identification);
        $this->db->order_by('ID_identification', 'Asc');


        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_all_employees()
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_employees_by_ID($ID_responsable_identification)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->where('auditquality_employee.ID_employee', $ID_responsable_identification);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function delete_identification($ID_identification)
    {
        $this->db->where('ID_identification', $ID_identification);
        $this->db->delete('auditquality_identification');
    }
    function delete_identification_bysector($ID_sector)
    {
        $this->db->where('ID_sector', $ID_sector);
        $this->db->delete('auditquality_identification');
    }


    /******************************* Enjeu *****************************/

    function get_all_enjeu($ID_risk)
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');
        $this->db->where('auditquality_enjeu.ID_enjeu not in (select (ID_enjeu) from auditquality_identification where ID_risk =' . $ID_risk . ')');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_all_processus($ID_risk)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->where('auditquality_processus.ID_processus not in (select (ID_processus) from auditquality_identification where ID_risk =' . $ID_risk . ')');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_all_processus_employee($ID_risk)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->where('auditquality_processus.ID_processus not in (select (ID_processus) from auditquality_identification where ID_risk =' . $ID_risk . ')');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable');
        $this->db->group_by('auditquality_employee.ID_employee');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
}
