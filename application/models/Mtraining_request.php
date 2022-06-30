<?php
class Mtraining_request extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** training_request *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_training_request($data)
    {
        $this->db->insert('auditquality_training_request', $data);
        return    $this->db->insert_id();
    }
    function get_training_request()
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_request');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_request.ID_company');
        //$this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_request.ID_organization');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_training_requests()
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_request');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_request.ID_organization');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_request.ID_company');
        //$this->db->where('auditquality_training_request.ismain', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_training_request_by_ID($ID_training_request_programm)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_request');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_request.ID_organization');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_request.ID_company');

        $this->db->where('auditquality_training_request.ID_training_request', $ID_training_request_programm);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_training_request($data, $ID_training_request_programm)
    {

        $this->db->where('auditquality_training_request.ID_training_request', $ID_training_request_programm);
        if ($this->db->update('auditquality_training_request', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_training_request($ID_training_request_programm)
    {
        $this->db->where('ID_training_request_programm', $ID_training_request_programm);
        $this->db->delete('auditquality_training_request');
    }


    function get_training_request_paging($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_request.ID_company');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_request.ID_organization');

        $this->db->from('auditquality_training_request');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_request_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_request.ID_organization');

        $this->db->from('auditquality_training_request');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_all_training_request_group()
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_request_group');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_organization()
    {
        $this->db->select('*');
        $this->db->from('auditquality_organization');
        $query = $this->db->get();
        return $query->result_array();
    }


    function get_group_training_request_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_request_group');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_group_training_request_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_training_request_group');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function get_employee_by_group_training_request($ID_training_request_group)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_request_group_employee');
        $this->db->join('auditquality_skills_employee', 'auditquality_skills_employee.ID_skill_employee = auditquality_training_request_group_employee.ID_skill_employee');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_skills_employee.ID_employee');

        $this->db->where('auditquality_training_request_group_employee.ID_training_request_group', $ID_training_request_group);

        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End training_request *************************************/
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
    function get_subjects_by_training_request($ID_training_request_programm)
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_request.ID_company');

        $this->db->where('auditquality_subjects.ID_training_request_programm', $ID_training_request_programm);
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_training_request_paging_by_type($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_training_request');
        // $this->db->where('ID_status_training_request', $ID_status_training_request);
        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));
        //$this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document','left');

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_request_nb_page_by_type()
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_training_request');
        //$this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document');
        //$this->db->where('ID_status_training_request', $ID_status_training_request);
        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));

        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return False;
        } else {
            return ceil($query->result_array()[0]['nb'] / 9);
        }
    }

    function get_training_request_paging_accepted($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_training_request');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_training_request.Createdby_training_request');

        // $this->db->where('ID_status_training_request', $ID_status_training_request);
        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));
        //$this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document','left');
        $this->db->where('Validatedby_training_request !=' . 0);
        $this->db->where('Refusedstatus_training_request =' . 0);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_request_nb_page_accepted()
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_training_request');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_training_request.Createdby_training_request');

        //$this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document');
        $this->db->where('Validatedby_training_request !=' . 0);
        $this->db->where('Refusedstatus_training_request =' . 0);

        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));

        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return False;
        } else {
            return ceil($query->result_array()[0]['nb'] / 9);
        }
    }

    function get_training_request_paging_all($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_training_request');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_training_request.Createdby_training_request');

        // $this->db->where('ID_status_training_request', $ID_status_training_request);
        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));
        //$this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document','left');
      //  $this->db->where('Validatedby_training_request !=' . 0);
     //   $this->db->where('Refusedstatus_training_request =' . 0);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_request_nb_page_all()
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_training_request');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_training_request.Createdby_training_request');

        //$this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document');
     //   $this->db->where('Validatedby_training_request !=' . 0);
      //  $this->db->where('Refusedstatus_training_request =' . 0);

        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));

        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return False;
        } else {
            return ceil($query->result_array()[0]['nb'] / 9);
        }
    }
    function get_training_request_paging_by_employee($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_training_request');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_training_request.Createdby_training_request');
        $this->db->where('Createdby_training_request', $this->session->userdata('ID_employee'));

        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));
        //$this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document','left');

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_request_nb_page_by_employee()
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_training_request');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_training_request.Createdby_training_request');
        $this->db->where('Createdby_training_request', $this->session->userdata('ID_employee'));

        //$this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document');
        //$this->db->where('ID_status_training_request', $ID_status_training_request);
        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));

        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return False;
        } else {
            return ceil($query->result_array()[0]['nb'] / 9);
        }
    }

    /*************************************************** */
    function get_training_request_paging_by_group($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_training_request');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_training_request.Createdby_training_request','left');
        //$this->db->where('Createdby_training_request', $this->session->userdata('ID_employee'));

        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));
        //$this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document','left');

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_request_nb_page_by_group()
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_training_request');
        $this->db->join('auditquality_training_group_request', 'auditquality_training_group_request.ID_training_group_request = auditquality_training_request.ID_training_group_request');
        //$this->db->where('Createdby_training_request', $this->session->userdata('ID_employee'));

        //$this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document');
        //$this->db->where('ID_status_training_request', $ID_status_training_request);
        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));

        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return False;
        } else {
            return ceil($query->result_array()[0]['nb'] / 9);
        }
    }
}
