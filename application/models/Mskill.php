<?php
class Mskill extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    /***************************************************************************/
    /***************************************************************************/
    /****************************** SKILLS *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_skill($data)
    {
        $this->db->insert('auditquality_skills', $data);
        return    $this->db->insert_id();
    }
    function get_skills()
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_skill_by_ID($ID_skill)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills');
        $this->db->where('auditquality_skills.ID_skill', $ID_skill);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_skill_by_Name($Name_skill)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills');
        $this->db->where('auditquality_skills.Name_skill', $Name_skill);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function edit_skill($data, $ID_skill)
    {
        $this->db->where('auditquality_skills.ID_skill', $ID_skill);
        if ($this->db->update('auditquality_skills', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_skill($ID_skill)
    {
        $this->db->where('ID_skill', $ID_skill);
        $this->db->delete('auditquality_skills');
    }


    function get_skills_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_skills_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_skills');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }



    /************************** Employees by skills *************************/

    function get_employee_by_skill_paging($page, $ID_skill, $tri)
    {
        $this->db->select('
        auditquality_employee.ID_employee,
        auditquality_employee.Name_employee,
        auditquality_employee.Lastname_employee,
        auditquality_skills_employee.ID_skill_employee,
        auditquality_skills_employee.ID_skill,
        auditquality_skills_employee.Grade_skill_employee,
        auditquality_training_group_employee.ID_training_group,
        auditquality_skills.Name_skill,
        auditquality_training_group_employee.ID_training_group_employee,
        auditquality_training_group.Name_training_group
        ');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_skills_employee', 'auditquality_skills_employee.ID_employee = auditquality_employee.ID_employee');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_employee.ID_skill');
        $this->db->join('auditquality_training_group_employee', 'auditquality_training_group_employee.ID_skill_employee = auditquality_skills_employee.ID_skill_employee','left');
        $this->db->join('auditquality_training_group', 'auditquality_training_group.ID_training_group = auditquality_training_group_employee.ID_training_group','left');

        $this->db->where('auditquality_skills.ID_skill', $ID_skill);
        $this->db->where('auditquality_skills_employee.Grade_skill_employee <=' . $tri);
        $this->db->order_by('Grade_skill_employee', 'Asc');

        $this->db->group_by('auditquality_employee.ID_employee');


        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_employee_by_skill_nb_page($ID_skill, $tri)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_skills_employee', 'auditquality_skills_employee.ID_employee = auditquality_employee.ID_employee');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_employee.ID_skill');
        $this->db->where('auditquality_skills.ID_skill', $ID_skill);
        $this->db->where('auditquality_skills_employee.Grade_skill_employee <=' . $tri);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /********************** End Employees by skills *************************/
    function get_group_training()
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }


    function get_group_training_by_skill($ID_skill)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group');
        $this->db->where('auditquality_training_group.ID_skill', $ID_skill);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_group_training_filtred($ID_skill_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group');
    //    $this->db->join('auditquality_training_group_employee', 'auditquality_training_group_employee.ID_training_group = auditquality_training_group.ID_training_group');
       // $this->db->where('auditquality_training_group_employee.ID_training_group not in (select (ID_training_group) from auditquality_training_group INNER JOIN ((auditquality_training_group_employee ON auditquality_training_group_employee.ID_training_group = auditquality_training_group.ID_training_group)) where auditquality_training_group_employee.ID_skill_employee=' . $ID_skill_employee . ')');
       $this->db->group_by("auditquality_training_group.ID_training_group"); 

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_group_training_by_employee($ID_skill_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group');
        $this->db->join('auditquality_training_group_employee', 'auditquality_training_group_employee.ID_training_group = auditquality_training_group.ID_training_group');
        $this->db->where('auditquality_training_group_employee.ID_skill_employee', $ID_skill_employee);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End SKILLS *************************************/
    /***************************************************************************/
    /***************************************************************************/
}
