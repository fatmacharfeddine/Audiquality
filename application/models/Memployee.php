<?php
class Memployee extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /***************************************************************************/
    /***************************************************************************/
    /************************** department employee ****************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_employee($data)
    {
        $this->db->insert('auditquality_employee', $data);
        return    $this->db->insert_id();
    }
    function get_employee()
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_employee', 'left');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_employee_by_ID($ID_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_employee');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group');
        $this->db->where('auditquality_employee.ID_employee', $ID_employee);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_employee_by_ID_only($ID_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        //$this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_employee');
        //$this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group');
        $this->db->where('auditquality_employee.ID_employee', $ID_employee);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_employees_by_department($ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_department_post');
        $this->db->join('auditquality_post', 'auditquality_post.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group');
        $this->db->where('auditquality_employee.ID_access_group', $ID_department);
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


    function get_employees_by_ID($ID_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group');
        $this->db->where('auditquality_employee.ID_employee', $ID_employee);
        $query = $this->db->get();
        return $query->result_array();
    }


    function edit_employee($data, $ID_employee)
    {
        $this->db->where('auditquality_employee.ID_employee', $ID_employee);
        if ($this->db->update('auditquality_employee', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_employee($ID_employee)
    {
        $this->db->where('ID_employee', $ID_employee);
        $this->db->delete('auditquality_employee');
    }


    function get_employee_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }



    function get_employee_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    /*  function get_employees()
    {
        $this->db->select('*');
        $this->db->from('auditquality_department_post');
        $query = $this->db->get();
        return $query->result_array();
    }*/
    function get_posts($ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        $this->db->where('auditquality_department_post.ID_department', $ID_department);

        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************************************************************/
    /***************************************************************************/
    /********************** End department employee ****************************/
    /***************************************************************************/
    /***************************************************************************/

    /****************************** Positions **********************************/
    function get_positions_by_department($ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->where('auditquality_department_post.ID_department', $ID_department);
        $query = $this->db->get();
        return $query->result_array();
    }
    /**************************** Access Group *********************************/
    function get_accessgroup_by_department($ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_access_group');
        $this->db->join('auditquality_department', 'auditquality_department.ID_company = auditquality_access_group.ID_company');
        $this->db->where('auditquality_department.ID_department', $ID_department);
        $query = $this->db->get();
        return $query->result_array();
    }
}
