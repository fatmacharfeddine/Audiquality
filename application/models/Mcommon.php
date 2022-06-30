<?php
class Mcommon extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    function get_function_by_group($ID_access_group)
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions_access');
        $this->db->join('auditquality_functions', 'auditquality_functions.ID_function = auditquality_functions_access.ID_function');
        $this->db->where('auditquality_functions_access.ID_access_group=' . $ID_access_group);
        $this->db->order_by('auditquality_functions_access.ID_function', 'desc');

        $query = $this->db->get();
        return $query->result_array();
    }
    /*****************************Employee*******************************/
    function get_employee_by_ID($ID_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        //$this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_employee');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_access_group.ID_company');
        $this->db->where('auditquality_employee.ID_employee', $ID_employee);
        $this->db->group_by('ID_employee');
        $query = $this->db->get();
        return $query->result_array();
    }
    /*****************************Skill*******************************/
    function get_all_employee()
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_access_group.ID_company');
        $this->db->group_by('ID_employee');
       
            $query = $this->db->get();
        return $query->result_array();
    }
    function get_skill_employee_by_ID($ID_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills_employee');
        //$this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_skills_employee.ID_employee');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_employee.ID_skill');
        $this->db->where('auditquality_skills_employee.ID_employee', $ID_employee);
        $this->db->group_by('auditquality_skills_employee.ID_skill');

        $query = $this->db->get();
        return $query->result_array();
    }
}
