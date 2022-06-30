<?php
class Mskillemployee extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /***************************************************************************/
    /***************************************************************************/
    /************************** SKILLS employee ******************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_skill_employee($data)
    {
        $this->db->insert('auditquality_skills_employee', $data);
        return    $this->db->insert_id();
    }
    function get_skills_employee()
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills_employee');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_skills_employee.ID_employee');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_employee.ID_skill');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_skill_employee_by_ID($ID_skill_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills_employee');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_skills_employee.ID_employee');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_employee.ID_skill');
        $this->db->where('auditquality_skills_employee.ID_skill_employee', $ID_skill_employee);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_skill_employee($data, $ID_skill_employee)
    {
        $this->db->where('auditquality_skills_employee.ID_skill_employee', $ID_skill_employee);
        if ($this->db->update('auditquality_skills_employee', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_skill_employee($ID_skill_employee)
    {
        $this->db->where('ID_skill_employee', $ID_skill_employee);
        $this->db->delete('auditquality_skills_employee');
    }


    function get_skills_employee_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills_employee');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_skills_employee.ID_employee');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_employee.ID_skill');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_skills_employee_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_skills_employee');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_skills_employee.ID_employee');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_employee.ID_skill');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }




    function get_skills_employee_by_ID_paging($page, $ID_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills_employee');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_skills_employee.ID_employee');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_employee.ID_skill');
        $this->db->join('auditquality_skills_management', 'auditquality_skills_management.ID_skill = auditquality_skills.ID_skill');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_skills_management.ID_post');

        $this->db->group_by("auditquality_skills_employee.ID_skill"); 
        $this->db->where('auditquality_skills_employee.ID_employee', $ID_employee);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_skills_employee_by_ID($page, $ID_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills_employee');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_skills_employee.ID_employee');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_employee.ID_skill');
        $this->db->join('auditquality_skills_management', 'auditquality_skills_management.ID_skill = auditquality_skills.ID_skill');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_skills_management.ID_post');

        $this->db->group_by("auditquality_skills_employee.ID_skill"); 
        $this->db->where('auditquality_skills_employee.ID_employee', $ID_employee);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_skills_employee_by_ID_nb_page($ID_employee)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_skills_employee');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_skills_employee.ID_employee');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_employee.ID_skill');
        $this->db->where('auditquality_skills_employee.ID_employee', $ID_employee);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }



    /***************************************************************************/
    /***************************************************************************/
    /********************** End SKILLS employee ******************************/
    /***************************************************************************/
    /***************************************************************************/


    /************************************ Skills *******************************/
    function get_skills()
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_skills_for_employee($ID_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills');
        $this->db->where('auditquality_skills.ID_skill not in (select (ID_skill) from auditquality_skills_employee WHERE  ID_employee=' . $ID_employee . ')');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    
    function get_skills_for_employee_edit($ID_employee, $ID_skill)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills');
        $this->db->where('auditquality_skills.ID_skill not in (select (ID_skill) from auditquality_skills_employee WHERE  (ID_employee=' . $ID_employee . ' and ID_skill != ' . $ID_skill . '))');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    /******************************** End Skills *******************************/

    /************************************ employee *******************************/
    function get_employees()
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
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
    /******************************** End employee *******************************/
}
