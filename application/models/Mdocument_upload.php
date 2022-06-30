<?php
class Mdocument_upload extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** document_upload *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_document_upload($data)
    {
        $this->db->insert('auditquality_document_upload', $data);
        return    $this->db->insert_id();
    }
    function get_document_upload()
    {
        $this->db->select('*');
        $this->db->from('auditquality_document_upload');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document_upload.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_document_upload_by_ID($ID_document_upload)
    {
        $this->db->select('*');
        $this->db->from('auditquality_document_upload');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document_upload.ID_company');
        $this->db->join('auditquality_doc_type', 'auditquality_doc_type.ID_doc = auditquality_document_upload.ID_doc');
        $this->db->join('auditquality_functions', 'auditquality_functions.ID_function = auditquality_document_upload.ID_function');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_document_upload.ID_processus');
        $this->db->join('auditquality_link_document_upload', 'auditquality_link_document_upload.ID_link_document_upload = auditquality_document_upload.ID_link_document_upload');

        $this->db->where('auditquality_document_upload.ID_document_upload', $ID_document_upload);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_document_upload_by_ID_version($ID_document_upload)
    {
        $this->db->select('*');
        $this->db->from('auditquality_document_upload');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document_upload.ID_company');
        $this->db->join('auditquality_doc_type', 'auditquality_doc_type.ID_doc = auditquality_document_upload.ID_doc');
        $this->db->join('auditquality_functions', 'auditquality_functions.ID_function = auditquality_document_upload.ID_function');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_document_upload.ID_processus');
        $this->db->join('auditquality_link_document_upload', 'auditquality_link_document_upload.ID_link_document_upload = auditquality_document_upload.ID_link_document_upload');

      //  $this->db->where('auditquality_document_upload.ID_document_upload', $ID_document_upload);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_document_upload_by_ID_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_document_upload');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document_upload.ID_company');

        $this->db->where('auditquality_document_upload.ID_company', $ID_company);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function edit_document_upload($data, $ID_document_upload)
    {

        $this->db->where('auditquality_document_upload.ID_document_upload', $ID_document_upload);
        if ($this->db->update('auditquality_document_upload', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_document_upload($ID_document_upload)
    {
        $this->db->where('ID_document_upload', $ID_document_upload);
        $this->db->delete('auditquality_document_upload');
    }


    function get_document_upload_by_processus($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_document_upload');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document_upload.ID_company');

        $this->db->where('auditquality_document_upload.ID_processus', $ID_processus);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_document_entete_by_processus($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_entete_doc');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document_upload.ID_company');

        $this->db->where('auditquality_entete_doc.ID_processus', $ID_processus);
        $query = $this->db->get();
        return $query->result_array();
    }



    /*   function get_document_upload_by_ID($ID_document_upload)
    {
        $this->db->select('*');
        $this->db->from('auditquality_document_upload');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document_upload.ID_company');

        $this->db->where('auditquality_document_upload.ID_processus', $ID_processus);
        $query = $this->db->get();
        return $query->result_array();
    }*/

    function get_document_entete_by_ID($ID_entete)
    {
        $this->db->select('*');
        $this->db->from('auditquality_entete_doc');
        $this->db->join('auditquality_doc_type', 'auditquality_doc_type.ID_doc = auditquality_entete_doc.ID_doc');
        $this->db->join('auditquality_functions', 'auditquality_functions.ID_function = auditquality_entete_doc.ID_function');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_entete_doc.ID_processus');

        $this->db->where('auditquality_entete_doc.ID_entete', $ID_entete);
        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End document_upload *************************************/
    /***************************************************************************/
    /***************************************************************************/


    /******************************* Lists ******************************/

    function get_doc_type()
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_type');
        $query = $this->db->get();
        return $query->result_array();
    }


    function get_function()
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions');
        $this->db->where('ismain =1');
        $query = $this->db->get();
        return $query->result_array();
    }


    function get_link_document_upload()
    {
        $this->db->select('*');
        $this->db->from('auditquality_link_document_upload');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document_upload.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }


    /***************************************************************** */
}
