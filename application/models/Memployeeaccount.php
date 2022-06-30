<?php
class Memployeeaccount extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /***************************************************************************/
    /***************************************************************************/
    /****************************** employee ***********************************/
    /***************************************************************************/
    /***************************************************************************/


    function get_access_by_employee($ID_connected_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions');
        $this->db->join('auditquality_functions_access', 'auditquality_functions_access.ID_function = auditquality_functions.ID_function');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_functions_access.ID_access_group');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_access_group = auditquality_access_group.ID_access_group');

        $this->db->where('auditquality_employee.ID_employee', $ID_connected_employee);
        $this->db->order_by('auditquality_functions.ID_function', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }


    function get_department_by_employee($ID_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_department_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        //$this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group');
        $this->db->where('auditquality_employee.ID_employee', $ID_employee);
        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************************************************************/
    /***************************************************************************/
    /**************************** End employee *********************************/
    /***************************************************************************/
    /***************************************************************************/
}
