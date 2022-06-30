<?php
class Mentete extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    /***************************************************************************/
    /***************************************************************************/
    /****************************** entete_doc *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_entete_doc($data)
    {
        $this->db->insert('auditquality_entete_doc', $data);
        return    $this->db->insert_id();
    }
    function get_entete_doc()
    {
        $this->db->select('*');
        $this->db->from('auditquality_entete_doc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_entete_by_type($Type_entete)
    {
        $this->db->select('*');
        $this->db->from('auditquality_entete_doc');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_entete_doc.ID_processus');
        $this->db->join('auditquality_doc_type', 'auditquality_doc_type.ID_doc = auditquality_entete_doc.ID_doc');

        $this->db->where('auditquality_entete_doc.Type_entete', $Type_entete);
        $this->db->where('auditquality_entete_doc.ID_company', $this->data['ID_company']);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_entete_doc_by_ID($ID_entete_doc)
    {
        $this->db->select('*');
        $this->db->from('auditquality_entete_doc');
        $this->db->where('auditquality_entete_doc.ID_entete_doc', $ID_entete_doc);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }



    function edit_entete_doc($data, $ID_entete_doc)
    {
        $this->db->where('auditquality_entete_doc.ID_entete_doc', $ID_entete_doc);
        if ($this->db->update('auditquality_entete_doc', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_entete_doc($ID_entete)
    {
        $this->db->where('ID_entete', $ID_entete);
        $this->db->delete('auditquality_entete_doc');
    }





    /***************************************************************************/
    /***************************************************************************/
    /************************** End entete_doc *************************************/
    /***************************************************************************/
    /***************************************************************************/
}
