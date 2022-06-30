<?php
class Mpost extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


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
    function get_posts_first_parent()
    {
        $this->db->select('*');
        $this->db->from('auditquality_posts');
        $this->db->where('auditquality_posts.ID_parent', 0);

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_post_by_ID($ID_post)
    {
        $this->db->select('auditquality_posts.*,post2.Name_post as Name_parent');
        $this->db->from('auditquality_posts');
        $this->db->join('auditquality_posts as post2', 'post2.ID_post = auditquality_posts.ID_parent','left');
        $this->db->where('auditquality_posts.ID_post', $ID_post);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_post_by_Name($Name_post)
    {
        $this->db->select('*');
        $this->db->from('auditquality_posts');
        $this->db->where('auditquality_posts.Name_post', $Name_post);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function edit_post($data, $ID_post)
    {

        $this->db->where('auditquality_posts.ID_post', $ID_post);
        if ($this->db->update('auditquality_posts', $data)) {

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
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function get_skills_by_post($ID_post)
    {
        $this->db->select('*');
        $this->db->from('auditquality_skills_management');
        $this->db->join('auditquality_skills', 'auditquality_skills.ID_skill = auditquality_skills_management.ID_skill');
        $this->db->where('auditquality_skills_management.ID_post', $ID_post);

        $query = $this->db->get();
        return $query->result_array();
    }


    function get_employees()
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End POSTS *************************************/
    /***************************************************************************/
    /***************************************************************************/
}
