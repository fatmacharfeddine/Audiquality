<?php
class Mdocument extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** document *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_document($data)
    {
        $this->db->insert('auditquality_document', $data);
        return    $this->db->insert_id();
    }

    function add_version($data)
    {
        $this->db->insert('auditquality_doc_version', $data);
        return    $this->db->insert_id();
    }

    /*function get_document()
    {
        $this->db->select('*');
        $this->db->from('auditquality_document');
                $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }*/

    function get_document()
    {
        $this->db->select('*');
        $this->db->from('auditquality_document');

        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');

        $this->db->where('auditquality_document.Archive_status', 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_document_paging($page, $ID_department)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');

        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');
        $this->db->where('auditquality_document.ID_department', $ID_department);
        $this->db->where('auditquality_document.Archive_status', 0);

        $this->db->GROUP_by("auditquality_document.ID_document");

        // $this->db->where('auditquality_document.ID_document', $ID_document);
        // $this->db->where('auditquality_document.Createdby_document', $this->session->userdata('ID_employee'));

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_document_view_nb_page($ID_department)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');

        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_version = auditquality_document.Last_version_document');
        $this->db->where('auditquality_document.ID_department', $ID_department);
        $this->db->where('auditquality_document.Archive_status', 0);

        $this->db->GROUP_by("auditquality_document.ID_document");

        //  $this->db->where('auditquality_document.ID_document', $ID_document);
        // $this->db->where('auditquality_document.Createdby_document', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_document_view_paging($page, $ID_department)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');

        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_version = auditquality_document.Last_version_document');
        $this->db->where('auditquality_document.ID_department', $ID_department);
        $this->db->where('auditquality_document.Archive_status', 0);

        $this->db->GROUP_by("auditquality_document.ID_document");

        // $this->db->where('auditquality_document.ID_document', $ID_document);
        // $this->db->where('auditquality_document.Createdby_document', $this->session->userdata('ID_employee'));

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_document_nb_page($ID_department)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');

        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');
        $this->db->where('auditquality_document.ID_department', $ID_department);
        $this->db->where('auditquality_document.Archive_status', 0);

        $this->db->GROUP_by("auditquality_document.ID_document");

        //  $this->db->where('auditquality_document.ID_document', $ID_document);
        // $this->db->where('auditquality_document.Createdby_document', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_document_by_ID($ID_document)
    {
        $this->db->select('*');
        $this->db->from('auditquality_document');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');
        $this->db->where('auditquality_document.Archive_status', 0);

        $this->db->where('auditquality_document.ID_document', $ID_document);

        $this->db->order_by('ID_version', 'desc');


        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_document($data, $ID_document)
    {

        $this->db->where('auditquality_document.ID_document', $ID_document);
        if ($this->db->update('auditquality_document', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_document($ID_document)
    {
        $this->db->where('ID_document', $ID_document);
        $this->db->delete('auditquality_document');
    }


    function get_document_paging_by_type($page, $ID_document)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');

        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');
        $this->db->where('auditquality_document.Archive_status', 0);

        $this->db->where('auditquality_document.ID_document', $ID_document);
        $this->db->where('auditquality_document.Createdby_document', $this->session->userdata('ID_employee'));

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_document_nb_page_by_type($ID_document)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');

        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');
        $this->db->where('auditquality_document.Archive_status', 0);

        $this->db->where('auditquality_document.ID_document', $ID_document);
        $this->db->where('auditquality_document.Createdby_document', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    /*****************************Generate Code Document***********************/


    function Get_department_by_document($ID_document)
    {
        $this->db->select('Alias_department');
        $this->db->from('auditquality_department');
        $this->db->where('auditquality_department.ID_department=(SELECT ID_department FROM auditquality_document WHERE ID_document=' . $ID_document . ')');
        $query = $this->db->get();
        return $query->result_array()[0]['Alias_department'];
    }
    function Get_version_by_document($ID_document)
    {
        $this->db->select('Number_version');
        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_document.ID_document = auditquality_doc_version.ID_document');
        $this->db->where('auditquality_document.ID_document=' . $ID_document);
        $this->db->where('auditquality_document.Archive_status', 0);

        $this->db->order_by('ID_version', 'DESC');
        $query = $this->db->get();
        return $query->result_array()[0]['Number_version'];
    }

    function edit_code_document($ID_document, $Code_document)
    {
        $this->db->set('auditquality_document.Code_document', $Code_document);
        $this->db->where('ID_document', $ID_document);
        if ($this->db->update('auditquality_document')) {

            return true;
        } else {

            return false;
        }
    }
    /*************************End Generate Code Document***********************/

    /****************************Version Document******************************/
    function get_document_version_paging($page, $ID_document)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');

        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');
        $this->db->where('auditquality_document.ID_document', $ID_document);
        //$this->db->where('auditquality_doc_version.Revisedby_version', 0);
        $this->db->where('auditquality_document.Archive_status', 0);

        $this->db->order_by('Number_version', 'DESC');

        //$this->db->GROUP_by("auditquality_document.ID_document");

        // $this->db->where('auditquality_document.Createdby_document', $this->session->userdata('ID_employee'));

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_document_version_nb_page($ID_document)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');

        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');
        $this->db->where('auditquality_document.ID_document', $ID_document);
        $this->db->where('auditquality_doc_version.Revisedby_version', 0);
        $this->db->where('auditquality_document.Archive_status', 0);

        $this->db->order_by('Number_version', 'DESC');

        //  $this->db->where('auditquality_document.ID_document', $ID_document);
        // $this->db->where('auditquality_document.Createdby_document', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function get_document_validation_version_paging($page, $ID_document)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');

        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');
        $this->db->where('auditquality_document.ID_document', $ID_document);
        //$this->db->where('auditquality_doc_version.Revisedby_version !='. 0);
        //$this->db->where('auditquality_doc_version.Refusedstatus_version ', 0);
        $this->db->where('auditquality_document.Archive_status', 0);

        $this->db->order_by('Number_version', 'DESC');

        //$this->db->GROUP_by("auditquality_document.ID_document");

        // $this->db->where('auditquality_document.ID_document', $ID_document);
        // $this->db->where('auditquality_document.Createdby_document', $this->session->userdata('ID_employee'));

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_document_validation_version_nb_page($ID_document)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');

        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');
        $this->db->where('auditquality_document.ID_document', $ID_document);
        $this->db->where('auditquality_doc_version.Revisedby_version !=' . 0);
        $this->db->where('auditquality_doc_version.Validatedby_version ', 0);
        $this->db->where('auditquality_document.Archive_status', 0);

        $this->db->order_by('Number_version', 'DESC');

        //  $this->db->where('auditquality_document.ID_document', $ID_document);
        // $this->db->where('auditquality_document.Createdby_document', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_version_by_ID($ID_version)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');

        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_document = auditquality_document.ID_document');

        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_doc_version.Createdby_version');

        //$this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_doc_version.Revisedby_version');

        //$this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_doc_version.Validatedby_version');

        $this->db->join('auditquality_doc_type', 'auditquality_doc_type.ID_doc = auditquality_doc_version.ID_doc');

        $this->db->where('auditquality_doc_version.ID_version', $ID_version);
        $this->db->where('auditquality_document.Archive_status', 0);


        $query = $this->db->get();
        return $query->result_array();
    }


    function edit_doc_version($data, $ID_version)
    {

        $this->db->where('auditquality_doc_version.ID_version', $ID_version);
        if ($this->db->update('auditquality_doc_version', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function get_document_by_version($ID_version)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_version');
        $this->db->where('auditquality_doc_version.ID_version', $ID_version);
        $this->db->where('auditquality_doc_version.ID_document IN (select (ID_document) from auditquality_document where Archive_status = 0) ');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    /************************End Version Document******************************/



    /***************************************************************************/
    /***************************************************************************/
    /************************** End document *************************************/
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
    function get_subjects_by_document($ID_document)
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_document.ID_company');

        $this->db->where('auditquality_subjects.ID_document', $ID_document);
        $query = $this->db->get();
        return $query->result_array();
    }

    /****************************** type ************************************/


    function get_type()
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_type');
        $query = $this->db->get();
        return $query->result_array();
    }

    /***************************Request*******************************/
    function get_document_by_ID_request($ID_requests)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_requests');
        $this->db->where('auditquality_doc_requests.ID_requests', $ID_requests);
        //$this->db->where('auditquality_document.Archive_status', 0);

        $query = $this->db->get();
        return $query->result_array();
    }




    /*****************************Version***********************************/

    function get_last_version($ID_document)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_version');
        $this->db->where('auditquality_doc_version.ID_document', $ID_document);
        $this->db->where('auditquality_doc_version.Revisedby_version !=' . 0);
        $this->db->where('auditquality_doc_version.Refusedstatus_version', 0);
        $this->db->order_by('ID_version', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    /****************************Employee********************************/

    function get_employee_by_ID($ID_employee)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        //$this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_employee');
        //$this->db->join('auditquality_access_group', 'auditquality_access_group.ID_access_group = auditquality_employee.ID_access_group');
        $this->db->where('auditquality_employee.ID_employee', $ID_employee);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    /************************End Employee********************************/

    /************************ doc upload *****************************/
    function insert_document_upload($data)
    {
        $this->db->insert('auditquality_document_upload', $data);
        return    $this->db->insert_id();
    }

    function get_document_upload_bytype($code_document_upload)
    {
        $this->db->select('*');
        $this->db->from('auditquality_document_upload');
        $this->db->where('auditquality_document_upload.code_document_upload', $code_document_upload);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }


    function get_document_upload_by_processus($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_document_upload');
        $this->db->where('auditquality_document_upload.ID_processus', $ID_processus);
        $this->db->join('auditquality_link_document_upload', 'auditquality_link_document_upload.ID_link_document_upload = auditquality_document_upload.ID_link_document_upload');

        $this->db->group_by('auditquality_link_document_upload.ID_link_document_upload');
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }


}
