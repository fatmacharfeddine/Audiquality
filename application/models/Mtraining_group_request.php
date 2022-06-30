<?php
class Mtraining_group_request extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    /***************************************************************************/
    /***************************************************************************/
    /****************************** training_group_requestS *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_training_group_request($data)
    {
        $this->db->insert('auditquality_training_group_request', $data);
        return    $this->db->insert_id();
    }
    function add_training_group_request_employee($data)
    {
        $this->db->insert('auditquality_training_group_request_employee', $data);
        return    $this->db->insert_id();
    }
    function get_training_group_requests()
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group_request');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_training_group_request_by_ID($ID_training_group_request)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group_request');
        $this->db->where('auditquality_training_group_request.ID_training_group_request', $ID_training_group_request);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_group_request_by_Name($Name_training_group_request)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group_request');
        $this->db->where('auditquality_training_group_request.Name_training_group_request', $Name_training_group_request);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function edit_training_group_request($data, $ID_training_group_request)
    {
        $this->db->where('auditquality_training_group_request.ID_training_group_request', $ID_training_group_request);
        if ($this->db->update('auditquality_training_group_request', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_training_group_request($ID_training_group_request)
    {
        $this->db->where('ID_training_group_request', $ID_training_group_request);
        $this->db->delete('auditquality_training_group_request');
    }


    function get_training_group_requests_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group_request');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_group_requests_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_training_group_request');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }



    /************************** Employees by training_group_requests *************************/

    function get_employee_by_training_group_request_paging($page, $ID_training_group_request, $tri)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_training_group_request_employee', 'auditquality_training_group_request_employee.ID_employee = auditquality_employee.ID_employee');
        $this->db->join('auditquality_training_group_request', 'auditquality_training_group_request.ID_training_group_request = auditquality_training_group_request_employee.ID_training_group_request');
        $this->db->where('auditquality_training_group_request.ID_training_group_request', $ID_training_group_request);
        $this->db->where('auditquality_training_group_request_employee.Grade_training_group_request_employee <=' . $tri);
        $this->db->order_by('Grade_training_group_request_employee', 'Asc');

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_employee_by_training_group_request_nb_page($ID_training_group_request, $tri)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_training_group_request_employee', 'auditquality_training_group_request_employee.ID_employee = auditquality_employee.ID_employee');
        $this->db->join('auditquality_training_group_request', 'auditquality_training_group_request.ID_training_group_request = auditquality_training_group_request_employee.ID_training_group_request');
        $this->db->where('auditquality_training_group_request.ID_training_group_request', $ID_training_group_request);
        $this->db->where('auditquality_training_group_request_employee.Grade_training_group_request_employee <=' . $tri);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /********************** End Employees by training_group_requests *************************/


    function add_training_group_employee_request($data)
    {
        $this->db->insert('auditquality_training_group_employee_request', $data);
        return    $this->db->insert_id();
    }


    function get_training_group_employee_request_paging($ID_training_group_request, $page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group_employee_request');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_training_group_employee_request.ID_employee');
        $this->db->where('auditquality_training_group_employee_request.ID_training_group_request', $ID_training_group_request);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function test($ID_training_group_request, $page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group_employee_request');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_training_group_employee_request.ID_employee');
        $this->db->where('auditquality_training_group_employee_request.ID_training_group_request', $ID_training_group_request);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_group_employee_request_nb_page($ID_training_group_request)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_training_group_employee_request');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_training_group_employee_request.ID_employee');
        $this->db->where('auditquality_training_group_employee_request.ID_training_group_request', $ID_training_group_request);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function delete_training_group_employee_request($ID_training_group_request)
    {
        $this->db->where('ID_training_group_request', $ID_training_group_request);
        $this->db->delete('auditquality_training_group_employee_request');
    }

    function delete_training_group_employee_request_ID($ID_employee)
    {
        $this->db->where('ID_employee', $ID_employee);
        $this->db->delete('auditquality_training_group_employee_request');
    }

    function get_employee_request($ID_training_group_request)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_employee', 'left');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group', 'left');
        $this->db->where('ID_employee not in (select (ID_employee) from auditquality_training_group_employee_request where ID_training_group_request = ' . $ID_training_group_request . ')');

        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End training_group_requestS *************************************/
    /***************************************************************************/
    /***************************************************************************/
}
