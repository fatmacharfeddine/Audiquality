<?php
class Mfunction extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** function *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_function($data)
    {
        $this->db->insert('auditquality_functions', $data);
        return    $this->db->insert_id();
    }
    function get_function()
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_functions.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_functions_main()
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_functions.ID_company');
        $this->db->where('auditquality_functions.ismain', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_function_by_ID($ID_function)
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_functions.ID_company');

        $this->db->where('auditquality_functions.ID_function', $ID_function);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_function($data, $ID_function)
    {

        $this->db->where('auditquality_functions.ID_function', $ID_function);
        if ($this->db->update('auditquality_functions', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_function($ID_function)
    {
        $this->db->where('ID_function', $ID_function);
        $this->db->delete('auditquality_functions');
    }


    function get_function_paging($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_functions.ID_company');

        $this->db->from('auditquality_functions');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_function_nb_page()
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_functions.ID_company');

        $this->db->from('auditquality_functions');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End function *************************************/
    /***************************************************************************/
    /***************************************************************************/

    /****************************** Company ************************************/


    function get_companies()
    {
        $this->db->select('*');
        $this->db->from('auditquality_company');
        $query = $this->db->get();
        return $query->result_array();
    }
}
