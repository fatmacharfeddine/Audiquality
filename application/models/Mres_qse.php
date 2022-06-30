<?php
class Mres_qse extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** res_qse *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_res_qse($data)
    {
        $this->db->insert('auditquality_res_qse', $data);
        return    $this->db->insert_id();
    }
    function get_res_qse()
    {
        $this->db->select('*');
        $this->db->from('auditquality_res_qse');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_res_qse.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_res_qse_by_ID($ID_res_qse)
    {
        $this->db->select('*');
        $this->db->from('auditquality_res_qse');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_res_qse.ID_company');

        $this->db->where('auditquality_res_qse.ID_res_qse', $ID_res_qse);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_res_qse_by_ID_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_res_qse');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_res_qse.ID_company');

        $this->db->where('auditquality_res_qse.ID_company', $ID_company);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function edit_res_qse($data, $ID_res_qse)
    {

        $this->db->where('auditquality_res_qse.ID_res_qse', $ID_res_qse);
        if ($this->db->update('auditquality_res_qse', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_res_qse($ID_res_qse)
    {
        $this->db->where('ID_res_qse', $ID_res_qse);
        $this->db->delete('auditquality_res_qse');
    }


   
    /***************************************************************************/
    /***************************************************************************/
    /************************** End res_qse *************************************/
    /***************************************************************************/
    /***************************************************************************/


}
