<?php
class Mtechnical extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    /***************************************************************************/
    /***************************************************************************/
    /****************************** Technical *************************************/
    /***************************************************************************/
    /***************************************************************************/
    function get_technical_by_ID($ID_technical)
    {
        $this->db->select('*');
        $this->db->from('auditquality_technical');
        $this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_technical.ID_access_group');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_access_group.ID_company');
        
        $this->db->where('auditquality_technical.ID_technical', $ID_technical);
        $query = $this->db->get();
        return $query->result_array();
    }
 
    /***************************************************************************/
    /***************************************************************************/
    /********************** End Technical **************************************/
    /***************************************************************************/
    /***************************************************************************/
}
