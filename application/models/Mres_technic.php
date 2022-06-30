<?php
class Mres_technic extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** res_technic *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_res_technic($data)
    {
        $this->db->insert('auditquality_res_technic', $data);
        return    $this->db->insert_id();
    }
    function get_res_technic()
    {
        $this->db->select('*');
        $this->db->from('auditquality_res_technic');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_res_technic.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_res_technic_by_ID($ID_res_technic)
    {
        $this->db->select('*');
        $this->db->from('auditquality_res_technic');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_res_technic.ID_company');

        $this->db->where('auditquality_res_technic.ID_res_technic', $ID_res_technic);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_res_technic_by_ID_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_res_technic');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_res_technic.ID_company');

        $this->db->where('auditquality_res_technic.ID_company', $ID_company);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function edit_res_technic($data, $ID_res_technic)
    {

        $this->db->where('auditquality_res_technic.ID_res_technic', $ID_res_technic);
        if ($this->db->update('auditquality_res_technic', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_res_technic($ID_res_technic)
    {
        $this->db->where('ID_res_technic', $ID_res_technic);
        $this->db->delete('auditquality_res_technic');
    }


   
    /***************************************************************************/
    /***************************************************************************/
    /************************** End res_technic *************************************/
    /***************************************************************************/
    /***************************************************************************/


}
