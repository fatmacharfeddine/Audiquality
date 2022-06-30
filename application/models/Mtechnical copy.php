<?php
class Mtechnical extends CI_Model
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
        return $query->result_array();
    }
    function edit_skill($Name_skill, $Description_skill, $ID_skill)
    {
        $this->db->set('auditquality_skills.Name_skill', $Name_skill);
        $this->db->set('auditquality_skills.Description_skill', $Description_skill);
        $this->db->where('auditquality_skills.ID_skill', $ID_skill);
        if ($this->db->update('auditquality_skills')) {

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
    /***************************************************************************/
    /***************************************************************************/
    /************************** End SKILLS *************************************/
    /***************************************************************************/
    /***************************************************************************/


    /***************************************************************************/
    /***************************************************************************/
    /****************************** POSTS *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_post($data)
    {
        $this->db->insert('auditquality_posts', $data);
        return    $this->db->insert_id();
    }
    function get_posts()
    {
        $this->db->select('*');
        $this->db->from('auditquality_posts');
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
    function edit_post($Name_post, $Description_post, $ID_post)
    {
        $this->db->set('auditquality_posts.Name_post', $Name_post);
        $this->db->set('auditquality_posts.Description_post', $Description_post);
        $this->db->where('auditquality_posts.ID_post', $ID_post);
        if ($this->db->update('auditquality_posts')) {

            return true;
        } else {

            return false;
        }
    }

    function delete_post($ID_post)
    {
        $this->db->where('ID_post', $ID_post);
        $this->db->delete('auditquality_posts');
    }


    function get_posts_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_posts');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_posts_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_posts');
        $query = $this->db->get();
        return floor($query->result_array()[0]['nb'] / 9) + 1;
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End POSTS *************************************/
    /***************************************************************************/
    /***************************************************************************/


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
    function edit_skill_management($ID_post, $ID_skill, $ID_management)
    {
        $this->db->set('auditquality_skills_management.ID_post', $ID_post);
        $this->db->set('auditquality_skills_management.ID_skill', $ID_skill);
        $this->db->where('auditquality_skills_management.ID_management', $ID_management);
        if ($this->db->update('auditquality_skills_management')) {

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
        return floor($query->result_array()[0]['nb'] / 9) + 1;
    }
    /***************************************************************************/
    /***************************************************************************/
    /********************** End SKILLS Management ******************************/
    /***************************************************************************/
    /***************************************************************************/
}
