<?php
class Mtraining_group extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    /***************************************************************************/
    /***************************************************************************/
    /****************************** training_groupS *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_training_group($data)
    {
        $this->db->insert('auditquality_training_group', $data);
        return    $this->db->insert_id();
    }
    function add_training_group_employee($data)
    {
        $this->db->insert('auditquality_training_group_employee', $data);
        return    $this->db->insert_id();
    }
    function get_training_groups()
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_training_group_by_ID($ID_training_group)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group');
        $this->db->where('auditquality_training_group.ID_training_group', $ID_training_group);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_group_by_Name($Name_training_group)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group');
        $this->db->where('auditquality_training_group.Name_training_group', $Name_training_group);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function edit_training_group($data, $ID_training_group)
    {
        $this->db->where('auditquality_training_group.ID_training_group', $ID_training_group);
        if ($this->db->update('auditquality_training_group', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_training_group($ID_training_group)
    {
        $this->db->where('ID_training_group', $ID_training_group);
        $this->db->delete('auditquality_training_group');
    }


    function get_training_groups_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_groups_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_training_group');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }



    /************************** Employees by training_groups *************************/

    function get_employee_by_training_group_paging($page, $ID_training_group, $tri)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_training_group_employee', 'auditquality_training_group_employee.ID_employee = auditquality_employee.ID_employee');
        $this->db->join('auditquality_training_group', 'auditquality_training_group.ID_training_group = auditquality_training_group_employee.ID_training_group');
        $this->db->where('auditquality_training_group.ID_training_group', $ID_training_group);
        $this->db->where('auditquality_training_group_employee.Grade_training_group_employee <=' . $tri);
        $this->db->order_by('Grade_training_group_employee', 'Asc');

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_employee_by_training_group_nb_page($ID_training_group, $tri)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_training_group_employee', 'auditquality_training_group_employee.ID_employee = auditquality_employee.ID_employee');
        $this->db->join('auditquality_training_group', 'auditquality_training_group.ID_training_group = auditquality_training_group_employee.ID_training_group');
        $this->db->where('auditquality_training_group.ID_training_group', $ID_training_group);
        $this->db->where('auditquality_training_group_employee.Grade_training_group_employee <=' . $tri);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /********************** End Employees by training_groups *************************/


    /***************************************************************************/
    /***************************************************************************/
    /************************** End training_groupS *************************************/
    /***************************************************************************/
    /***************************************************************************/
}
