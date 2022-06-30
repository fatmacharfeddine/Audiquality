<?php
class Mrecrutement extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** recrutement *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_recrutement($data)
    {
        $this->db->insert('auditquality_recrutement', $data);
        return    $this->db->insert_id();
    }
    function get_recrutement()
    {
        $this->db->select('*');
        $this->db->from('auditquality_recrutement');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recrutement.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_recrutement_by_ID($ID_recrutement)
    {
        $this->db->select('*');
        $this->db->from('auditquality_recrutement');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recrutement.ID_company');

        $this->db->where('auditquality_recrutement.ID_recrutement', $ID_recrutement);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_recrutement_by_ID_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_recrutement');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recrutement.ID_company');

        $this->db->where('auditquality_recrutement.ID_company', $ID_company);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function edit_recrutement($data, $ID_recrutement)
    {

        $this->db->where('auditquality_recrutement.ID_recrutement', $ID_recrutement);
        if ($this->db->update('auditquality_recrutement', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_recrutement($ID_recrutement)
    {
        $this->db->where('ID_recrutement', $ID_recrutement);
        $this->db->delete('auditquality_recrutement');
    }


   
    /***************************************************************************/
    /***************************************************************************/
    /************************** End recrutement *************************************/
    /***************************************************************************/
    /***************************************************************************/


}
