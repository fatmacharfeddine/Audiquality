<?php
class Mdepartmentpost extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /***************************************************************************/
    /***************************************************************************/
    /************************** department post ********************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_department_post($data)
    {
        $this->db->insert('auditquality_department_post', $data);
        return    $this->db->insert_id();
    }
    function get_departments_post()
    {
        $this->db->select('*');
        $this->db->from('auditquality_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_department_post_by_ID($ID_department_post)
    {
        $this->db->select('*');
        $this->db->from('auditquality_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        $this->db->where('auditquality_department_post.ID_department_post', $ID_department_post);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_posts_by_department($ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        $this->db->where('auditquality_department_post.ID_department', $ID_department);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_posts_by_departmentpost($ID_department_post)
    {
        $this->db->select('*');
        $this->db->from('auditquality_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        $this->db->where('auditquality_department_post.ID_department_post', $ID_department_post);
        $query = $this->db->get();
        return $query->result_array();
    }


    function edit_department_post($data, $ID_department_post)
    {
             $this->db->where('auditquality_department_post.ID_department_post', $ID_department_post);
        if ($this->db->update('auditquality_department_post',$data)) 
        {

            return true;
        } else {

            return false;
        }
    }

    function delete_department_post($ID_department_post)
    {
        $this->db->where('ID_department_post', $ID_department_post);
        $this->db->delete('auditquality_department_post');
    }


    function get_departments_post_paging($page,$ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        $this->db->where('auditquality_department_post.ID_department', $ID_department);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

  

    function get_departments_post_nb_page($ID_department)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_department_post');
        $this->db->join('auditquality_posts', 'auditquality_posts.ID_post = auditquality_department_post.ID_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        $this->db->where('auditquality_department_post.ID_department', $ID_department);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function get_posts()
    {
        $this->db->select('*');
        $this->db->from('auditquality_posts');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_posts_for_department($ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_posts');
        $this->db->where('auditquality_posts.ID_post not in (select (ID_post) from auditquality_department_post WHERE  ID_department=' . $ID_department . ')');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_posts_for_department_edit($ID_department,$ID_post)
    {
        $this->db->select('*');
        $this->db->from('auditquality_posts');
        $this->db->where('auditquality_posts.ID_post not in (select (ID_post) from auditquality_department_post WHERE ( ID_department=' . $ID_department . ' and ID_post != ' . $ID_post . '))');

        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************************************************************/
    /***************************************************************************/
    /********************** End department post ********************************/
    /***************************************************************************/
    /***************************************************************************/
}

