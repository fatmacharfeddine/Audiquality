<?php
class Mdepartment extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    /***************************************************************************/
    /***************************************************************************/
    /****************************** departmentS ********************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_department($data)
    {
        $this->db->insert('auditquality_department', $data);
        return    $this->db->insert_id();
    }
    function get_departments()
    {
        $this->db->select('*');
        $this->db->from('auditquality_department');
        //$this->db->join('auditquality_department parent', 'parent.Parent_department = auditquality_department.ID_department');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_department.Director_department');
        //$this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_department.Quality_Director_department');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_department.ID_company');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_department_by_ID($ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_department');
        //$this->db->join('auditquality_department parent', 'parent.Parent_department = auditquality_department.ID_department');
        //$this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_department.Director_department','left');
        //$this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_department.Quality_Director_department');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_department.ID_company', 'left');


        $this->db->where('auditquality_department.ID_department', $ID_department);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_department($data, $ID_department)
    {

        $this->db->where('auditquality_department.ID_department', $ID_department);
        if ($this->db->update('auditquality_department', $data)) {

            return true;
        } else {
            return false;
        }
    }



    function delete_department($ID_department)
    {
        $this->db->where('ID_department', $ID_department);
        $this->db->delete('auditquality_department');
    }


    function get_departments_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_department');
        //$this->db->join('auditquality_department parent', 'parent.Parent_department = auditquality_department.ID_department');
        //$this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_department.Director_department');
        //$this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_department.Quality_Director_department');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_department.ID_company');

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_departments_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_department');
        //$this->db->join('auditquality_department parent', 'parent.Parent_department = auditquality_department.ID_department');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_department.Director_department');
        //$this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_department.Quality_Director_department');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_department.ID_company');

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function add_department_post($data)
    {
        $this->db->insert('auditquality_department_post', $data);
        return    $this->db->insert_id();
    }



    /***************************************************************************/
    /***************************************************************************/
    /************************** End departmentS ********************************/
    /***************************************************************************/
    /***************************************************************************/

    /************************************ employee *******************************/
    function get_employees()
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_employee_paging_by_department($page, $ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group');
        $this->db->where('auditquality_department.ID_department', $ID_department);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }



    function get_employee_nb_page_by_department($ID_department)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group');
        $this->db->where('auditquality_department.ID_department', $ID_department);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /******************************** End employee *******************************/

    /************************************ employee *******************************/
    function get_companies()
    {
        $this->db->select('*');
        $this->db->from('auditquality_company');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_employee_by_ID($ID_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->where('auditquality_employee.ID_employee', $ID_employee);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }    }
    /******************************** End employee *******************************/
    function edit_employee_post($ID_department_post, $ID_employee)
    {
        $this->db->set('auditquality_employee.ID_department_post', $ID_department_post);
        $this->db->where('auditquality_employee.ID_employee', $ID_employee);

        if ($this->db->update('auditquality_employee')) {

            return true;
        } else {

            return false;
        }
    }
}
