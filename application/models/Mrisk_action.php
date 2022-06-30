<?php
class Mrisk_action extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** Mrisk_action *************************************/
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

  /*  function get_all_gravity()
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
    }*/

    function edit_action($data, $ID_action)
    {

        $this->db->where('auditquality_action.ID_action', $ID_action);
        if ($this->db->update('auditquality_action', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function add_action($data)
    {
        $this->db->insert('auditquality_action', $data);
        return    $this->db->insert_id();
    }


    function get_all_action()
    {
        $this->db->select('*');
        $this->db->from('auditquality_action');
        $this->db->join('auditquality_identification', 'auditquality_identification.ID_identification = auditquality_action.ID_identification');
        $this->db->GROUP_by("auditquality_action.ID_action");

        $query = $this->db->get();
        return $query->result_array();
    }

   /* function get_all_probability_severity()
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
    }*/

    function get_all_response()
    {
        $this->db->select('*');
        $this->db->from('auditquality_action_response');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_response_by_ID($ID_response)
    {
        $this->db->select('*');
        $this->db->from('auditquality_action_response');
        $this->db->where('auditquality_action_response.ID_response', $ID_response);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_risk_action_by_ID($ID_identification)
    {
        $this->db->select('*');
        $this->db->from('auditquality_action');
        $this->db->where('auditquality_action.ID_identification', $ID_identification);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function delete_action($ID_identification)
    {
        $this->db->where('ID_identification', $ID_identification);
        $this->db->delete('auditquality_action');
    }

    function delete_action_bysector($ID_sector)
    {
        $this->db->join('auditquality_identification', 'auditquality_action.ID_identification = auditquality_identification.ID_identification');
        $this->db->where('auditquality_identification.ID_sector', $ID_sector);
        $this->db->delete('auditquality_action');
    }


    function get_action_by_responsable($ID_responsable_identification)
    {
        $this->db->select('*');
        $this->db->from('auditquality_action');
  //      $this->db->join('auditquality_identification', 'auditquality_identification.ID_identification = auditquality_action.ID_identification');
  //  $this->db->join('auditquality_risk', 'auditquality_risk.ID_risk = auditquality_identification.ID_risk');

        //$this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_risk.ID_processus');
        $this->db->join('auditquality_action_list', 'auditquality_action_list.ID_action = auditquality_action.ID_action');

        $this->db->where('auditquality_action_list.Actor_action_list', $ID_responsable_identification);
        $this->db->GROUP_by("auditquality_action.ID_action");

        $query = $this->db->get();
        return $query->result_array();
    }

    /***********************************************************************/
    /****************************** Action List ****************************/
    /***********************************************************************/

    function get_action_list_by_action($ID_action)
    {
        $this->db->select('*');
        $this->db->from('auditquality_action_list');
        $this->db->where('auditquality_action_list.ID_action', $ID_action);

        $query = $this->db->get();
        return $query->result_array();
    }


    function get_action_list_by_action_paging($ID_action, $page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_action_list');
        $this->db->where('auditquality_action_list.ID_action', $ID_action);
        $this->db->where('auditquality_action_list.Actor_action_list', $this->session->userdata('ID_employee'));

        $this->db->join('auditquality_action_type', 'auditquality_action_type.ID_type = auditquality_action_list.ID_type', 'left');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_action_list.Actor_action_list', 'left');
        $this->db->join('auditquality_execute', 'auditquality_execute.ID_execute = auditquality_action_list.ID_execute', 'left');
    
        $this->db->order_by('auditquality_action_list.ID_action_list', 'desc');

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_action_list_by_action_nb_page($ID_action)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_action_list');
        $this->db->where('auditquality_action_list.ID_action', $ID_action);
        $this->db->where('auditquality_action_list.Actor_action_list', $this->session->userdata('ID_employee'));

        $this->db->join('auditquality_action_type', 'auditquality_action_type.ID_type = auditquality_action_list.ID_type', 'left');
       // $this->db->join('auditquality_execute', 'auditquality_execute.ID_execute = auditquality_action_list.ID_execute', 'left');
       // $this->db->join('auditquality_cost', 'auditquality_cost.ID_cost = auditquality_action_list.ID_cost', 'left');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return ceil($query->result_array()[0]['nb'] / 9);
        }
    }

    function get_all_execute()
    {
        $this->db->select('*');
        $this->db->from('auditquality_execute');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_cost()
    {
        $this->db->select('*');
        $this->db->from('auditquality_cost');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_action_type()
    {
        $this->db->select('*');
        $this->db->from('auditquality_action_type');
        //$this->db->join('auditquality_risk', 'auditquality_risk.ID_risk = auditquality_action_list.ID_risk');

        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_action_list($data, $ID_action)
    {

        $this->db->where('auditquality_action_list.ID_action_list', $ID_action);
        if ($this->db->update('auditquality_action_list', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function add_action_list($data)
    {
        $this->db->insert('auditquality_action_list', $data);
        return    $this->db->insert_id();
    }
    function delete_action_list($ID_risk)
    {
        $this->db->where('ID_risk', $ID_risk);
        $this->db->delete('auditquality_action_list');
    }
    function delete_action_list_by_action($ID_action)
    {
        $this->db->where('ID_action', $ID_action);
        $this->db->delete('auditquality_action_list');
    }
    function delete_action_list_bysector($ID_sector)
    {
        $this->db->join('auditquality_action', 'auditquality_action_list.ID_action = auditquality_action.ID_action');
        $this->db->join('auditquality_identification', 'auditquality_identification.ID_identification = auditquality_action.ID_identification');
        $this->db->where('auditquality_identification.ID_sector', $ID_sector);
        $this->db->delete('auditquality_action_list');
    }


    function get_risk_action()
    {
        $this->db->select('*');
        $this->db->from('auditquality_action');
        // $this->db->where('auditquality_evaluation.ID_identification', $ID_identification);
        $this->db->order_by('ID_action', 'Asc');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_risk_actionlist()
    {
        $this->db->select('*');
        $this->db->from('auditquality_action_list');
        // $this->db->where('auditquality_evaluation.ID_identification', $ID_identification);
        $this->db->order_by('ID_action_list', 'Asc');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    /***********************************************************************/
    /************************** End Action List ****************************/
    /***********************************************************************/
}
