<?php
class Mfunctions_access extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /***************************************************************************/
    /***************************************************************************/
    /************************** SKILLS Management ******************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_functions_access($data)
    {
        $this->db->insert('auditquality_functions_access', $data);
        return    $this->db->insert_id();
    }
    /*function get_functions_access()
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions_access');
        $this->db->join('auditquality_functions', 'auditquality_functions.ID_function = auditquality_functions_access.ID_function');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_functions_access.ID_access_group');
        $query = $this->db->get();
        return $query->result_array();
    }*/

    function get_functions_access()
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_functions_access_by_ID($ID_functions_access)
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions_access');
        $this->db->join('auditquality_functions', 'auditquality_functions.ID_function = auditquality_functions_access.ID_function');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_functions_access.ID_access_group');
        $this->db->where('auditquality_functions_access.ID_functions_access', $ID_functions_access);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_access_group_by_ID($ID_access_group)
    {
        $this->db->select('*');
        $this->db->from('auditquality_access_group');
        $this->db->where('auditquality_access_group.ID_access_group', $ID_access_group);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_access_function_by_ID($ID_access_group)
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions_access');
        $this->db->where('auditquality_functions_access.ID_access_group', $ID_access_group);
        $query = $this->db->get();
        return $query->result_array();
    }

    function edit_functions_access($data, $ID_functions_access)
    {
        $this->db->where('auditquality_functions_access.ID_functions_access', $ID_functions_access);
        if ($this->db->update('auditquality_functions_access', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_functions_access($ID_functions_access)
    {
        $this->db->where('ID_functions_access', $ID_functions_access);
        $this->db->delete('auditquality_functions_access');
    }
    function delete_functions_access_by_access_group($ID_access_group, $ID_function)
    {
        $this->db->where('ID_access_group', $ID_access_group);
        $this->db->where('ID_function', $ID_function);
        $this->db->delete('auditquality_functions_access');
    }

    function get_functions_access_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions_access');
        $this->db->join('auditquality_functions', 'auditquality_functions.ID_function = auditquality_functions_access.ID_function');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_functions_access.ID_access_group');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_functions_access_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_functions_access');
        $this->db->join('auditquality_functions', 'auditquality_functions.ID_function = auditquality_functions_access.ID_function');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_functions_access.ID_access_group');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }




    function get_skills_by_post_management_paging($page, $ID_access_group)
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions_access');
        $this->db->join('auditquality_functions', 'auditquality_functions.ID_function = auditquality_functions_access.ID_function');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_functions_access.ID_access_group');
        $this->db->where('auditquality_functions_access.ID_access_group', $ID_access_group);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_functions_access_by_post_nb_page($ID_function)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_functions_access');
        $this->db->join('auditquality_functions', 'auditquality_functions.ID_function = auditquality_functions_access.ID_function');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_functions_access.ID_access_group');
        $this->db->where('auditquality_functions_access.ID_function', $ID_function);
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************************************************************/
    /***************************************************************************/
    /********************** End SKILLS Management ******************************/
    /***************************************************************************/
    /***************************************************************************/


    /************************************ Skills *******************************/
    function get_skills()
    {
        $this->db->select('*');
        $this->db->from('auditquality_access_group');
        $query = $this->db->get();
        return $query->result_array();
    }
    /******************************** End Skills *******************************/

    /************************************ Posts *******************************/
    function get_posts()
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_access_by_post_functionaccess($ID_functions_access)
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions_access');
        $this->db->where('auditquality_functions_access.ID_functions_access', $ID_functions_access);
        $query = $this->db->get();
        return $query->result_array();
    }
    /******************************** End Posts *******************************/
}
