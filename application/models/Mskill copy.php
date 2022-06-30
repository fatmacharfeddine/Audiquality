<?php
class Mdepartment extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    /***************************************************************************/
    /***************************************************************************/
    /****************************** departmentS *************************************/
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
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_department_by_ID($ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_department');
        $this->db->where('auditquality_department.ID_department', $ID_department);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_department($Name_department, $Phone_department, $ID_department)
    {
        $this->db->set('auditquality_department.Name_department', $Name_department);
        $this->db->set('auditquality_department.Phone_department', $Phone_department);
        $this->db->where('auditquality_department.ID_department', $ID_department);
        if ($this->db->update('auditquality_department')) {

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
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End departmentS *************************************/
    /***************************************************************************/
    /***************************************************************************/
}
