<?php
class Mdoc_request extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** doc_request *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_doc_request($data)
    {
        $this->db->insert('auditquality_doc_requests', $data);
        return    $this->db->insert_id();
    }
    function get_doc_request()
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_requests');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_doc_requests()
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_requests');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');
        //$this->db->where('auditquality_doc_requests.ismain', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_doc_request_by_ID($ID_requests)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_requests');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->where('auditquality_doc_requests.ID_requests', $ID_requests);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_doc_request($data, $ID_requests)
    {

        $this->db->where('auditquality_doc_requests.ID_requests', $ID_requests);
        if ($this->db->update('auditquality_doc_requests', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function edit_request_doc($ID_document, $ID_requests)
    {
        $this->db->set('auditquality_doc_requests.ID_document', $ID_document);
        $this->db->where('auditquality_doc_requests.ID_requests', $ID_requests);

        if ($this->db->update('auditquality_doc_requests')) {

            return true;
        } else {

            return false;
        }
    }

    function delete_doc_request($ID_requests)
    {
        $this->db->where('ID_requests', $ID_requests);
        $this->db->delete('auditquality_doc_requests');
    }


    function get_doc_request_paging_by_type($page, $Type_requests)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_doc_requests');
        $this->db->where('Type_requests', $Type_requests);
        $this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));
        $this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document','left');

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_doc_request_paging_by_type_edit($page, $Type_requests)
    {
        //$this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_doc_requests');
        $this->db->where('Type_requests', $Type_requests);
        $this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));
        $this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document','left');

        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_version = auditquality_document.Last_version_document');
        //$this->db->order_by("auditquality_doc_version.Number_version", "DESC");
        //$this->db->GROUP_by("auditquality_doc_requests.ID_requests");
        //$this->db->where('auditquality_doc_version.Number_version =( SELECT max(Number_version) FROM auditquality_doc_version)');
        //echo ($this->db->select(' MAX(Number_version) as max_version FROM auditquality_doc_version '));
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }


    function get_doc_request_sent($Type_requests)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_version');
        $this->db->where('auditquality_doc_version.ID_document IN (select (ID_document) from auditquality_doc_requests where Type_requests = ' . $Type_requests . ')');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_doc_request_nb_page_by_type($Type_requests)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_doc_requests');
        $this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document');
        $this->db->where('Type_requests', $Type_requests);
        $this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    /***************************************************************************/
    /******************************Account Director*****************************/
    /***************************************************************************/

    /*******************************Requests************************************/
    function get_doc_request_validation_paging_by_type($page, $Type_requests, $ID_department)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_doc_requests');
        $this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document','left');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_version = auditquality_doc_requests.ID_new_version','left');

        $this->db->where('auditquality_doc_requests.Type_requests', $Type_requests);
        $this->db->where('auditquality_doc_requests.ID_department', $ID_department);
        //$this->db->where('Revisedby_requests !=' . 0);
        //$this->db->where('Refusedstatus_requests=', 0);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_doc_request_validation_nb_page_by_type($Type_requests, $ID_department)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_doc_requests');
        $this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document','left');

        $this->db->where('auditquality_doc_requests.Type_requests', $Type_requests);
        $this->db->where('auditquality_doc_requests.ID_department', $ID_department);
        $this->db->where('auditquality_doc_requests.Revisedby_requests !=' . 0);
        $this->db->where('auditquality_doc_requests.Refusedstatus_requests=', 0);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_doc_request_Revision_paging_by_type($page, $Type_requests, $ID_department)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_doc_requests');
       $this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document','left');

        $this->db->where('auditquality_doc_requests.Type_requests', $Type_requests);
        $this->db->where('auditquality_doc_requests.ID_department', $ID_department);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_doc_request_Revision_nb_page_by_type($Type_requests, $ID_department)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_doc_requests');
      //  $this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document');

        $this->db->where('auditquality_doc_requests.Type_requests', $Type_requests);
        $this->db->where('auditquality_doc_requests.ID_department', $ID_department);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************End Requests************************************/

    /****************************Documents************************************/

    function get_doc_validation_paging_by_type($page, $Type_requests, $ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');
        $this->db->where('auditquality_document.ID_document IN(SELECT auditquality_doc_requests.ID_document FROM auditquality_doc_requests WHERE auditquality_doc_requests.Type_requests=' . $Type_requests . ')');

        $this->db->where('auditquality_document.Archive_status', 0);


        $this->db->order_by("auditquality_doc_version.Number_version", "DESC");
        $this->db->GROUP_by("auditquality_document.ID_document");
        //  $this->db->where('auditquality_doc_version.Number_version =( SELECT max(auditquality_doc_version.Number_version) FROM auditquality_doc_version)');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_doc_validation_nb_page_by_type($Type_requests, $ID_department)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_doc_requests');
        $this->db->where('Type_requests', $Type_requests);
        $this->db->where('ID_department', $ID_department);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function get_doc_Revision_paging_by_type($page, $Type_requests, $ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');
        $this->db->where('auditquality_document.ID_document IN(SELECT auditquality_doc_requests.ID_document FROM auditquality_doc_requests WHERE auditquality_doc_requests.Type_requests=' . $Type_requests . ')');

        $this->db->where('auditquality_document.Archive_status', 0);


        $this->db->order_by("auditquality_doc_version.Number_version", "DESC");
        $this->db->GROUP_by("auditquality_document.ID_document");
        //  $this->db->where('auditquality_doc_version.Number_version =( SELECT max(auditquality_doc_version.Number_version) FROM auditquality_doc_version)');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_doc_Revision_nb_page_by_type($Type_requests, $ID_department)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_doc_requests');
        $this->db->where('Type_requests', $Type_requests);
        $this->db->where('ID_department', $ID_department);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /************************End Documents************************************/


    /***************************************************************************/
    /**************************End Account Director*****************************/
    /***************************************************************************/

    /***************************************************************************/
    /***************************************************************************/
    /************************** End doc_request *************************************/
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

    /********************************Subjects******************************/
    function get_subjects_by_doc_request($ID_requests)
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->where('auditquality_subjects.ID_requests', $ID_requests);
        $query = $this->db->get();
        return $query->result_array();
    }

    /****************************** Document ************************************/


    function get_documents()
    {
        $this->db->select('*');
        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_version = auditquality_document.Last_version_document');
        //$this->db->where('auditquality_document.Last_version_document IN (select (ID_version) from auditquality_doc_version) ');
        $this->db->where('auditquality_doc_version.Refusedstatus_version', 0);
        $this->db->where('auditquality_doc_version.Validatedby_version <>' . 0);
        $this->db->where('auditquality_document.Archive_status', 0);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
}
