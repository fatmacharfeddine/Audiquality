<?php
class Mskillmanagement extends CI_Model
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

    function add_skill_management($data)
    {
        $this->db->insert('auditquality_skills_management', $data);
        return    $this->db->insert_id();
    }
    function get_skills_management()
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills_management');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_skills_management.ID_post');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_management.ID_skill');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_skill_management_by_ID($ID_management)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills_management');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_skills_management.ID_post');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_management.ID_skill');
        $this->db->where('auditquality_skills_management.ID_management', $ID_management);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_skill_management($data, $ID_management)
    {
        $this->db->where('auditquality_skills_management.ID_management', $ID_management);
        if ($this->db->update('auditquality_skills_management', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_skill_management($ID_management)
    {
        $this->db->where('ID_management', $ID_management);
        $this->db->delete('auditquality_skills_management');
    }


    function get_skills_management_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills_management');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_skills_management.ID_post');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_management.ID_skill');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_skills_management_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_skills_management');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_skills_management.ID_post');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_management.ID_skill');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }




    function get_skills_by_post_management_paging($page, $ID_post)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills_management');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_skills_management.ID_post');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_management.ID_skill');
        $this->db->where('auditquality_skills_management.ID_post', $ID_post);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_skills_management_by_post_nb_page($ID_post)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_skills_management');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_skills_management.ID_post');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_management.ID_skill');
        $this->db->where('auditquality_skills_management.ID_post', $ID_post);
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
        $this->db->from('auditquality_skills');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_skills_for_position($ID_post)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills');
        $this->db->where('auditquality_skills.ID_skill not in (select (ID_skill) from auditquality_skills_management WHERE  ID_post=' . $ID_post . ')');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_skills_for_position_edit($ID_post, $ID_skill)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills');
        $this->db->where('auditquality_skills.ID_skill not in (select (ID_skill) from auditquality_skills_management WHERE  (ID_post=' . $ID_post . ' and ID_skill != ' . $ID_skill . '))');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    /******************************** End Skills *******************************/

    /************************************ Posts *******************************/
    function get_posts()
    {
        $this->db->select('*');
        $this->db->from('auditquality_posts');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_post_by_post_management($ID_management)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills_management');
        $this->db->where('auditquality_skills_management.ID_management', $ID_management);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_post_by_ID($ID_post)
    {
        $this->db->select('*');
        $this->db->from('auditquality_posts');
        $this->db->where('auditquality_posts.ID_post', $ID_post);
        $query = $this->db->get();
        return $query->result_array();
    }
    /******************************** End Posts *******************************/
}
