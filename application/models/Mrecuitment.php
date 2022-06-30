<?php
class Mrecuitment extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** recuitment *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_recuitment_programm($data)
    {
        $this->db->insert('auditquality_recuitment_programm', $data);
        return    $this->db->insert_id();
    }
    function get_recuitment_programm()
    {
        $this->db->select('*');
        $this->db->from('auditquality_recuitment_programm');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recuitment_programm.ID_company');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_recuitment_programm_by_ID($ID_recuitment_programm)
    {
        $this->db->select('*');
        $this->db->from('auditquality_recuitment_programm');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recuitment_programm.ID_company');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee');
        $this->db->where('auditquality_recuitment_programm.ID_recuitment_programm = ', $ID_recuitment_programm);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_recuitments()
    {
        $this->db->select('*');
        $this->db->from('auditquality_recuitment_programm');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee', 'left');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recuitment_programm.ID_company');
        //$this->db->where('auditquality_recuitment_programm.ismain', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_recuitment_program()
    {
        $this->db->select('*');
        $this->db->from('auditquality_recuitment_programm');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recuitment_programm.ID_company');
        $this->db->where('auditquality_recuitment_programm.ID_status_recuitment !=', 2);
        $this->db->group_by("auditquality_recuitment_programm.Year_recuitment_programm");


        $query = $this->db->get();
        return $query->result_array();
    }
    function get_recuitment_programm_by_ID_company()
    {
        $this->db->select('*');
        $this->db->from('auditquality_recuitment_programm');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee');

        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recuitment_programm.ID_company');
        $this->db->where('auditquality_company.ID_company !=', $this->session->userdata('ID_employee'));

        $this->db->where('auditquality_recuitment_programm.ID_status_recuitment !=', 2);


        $query = $this->db->get();
        return $query->result_array();
    }
    function get_recuitment_by_ID($ID_recuitment_programm)
    {
        $this->db->select('*');
        $this->db->from('auditquality_recuitment_programm');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recuitment_programm.ID_company');

        $this->db->where('auditquality_recuitment_programm.ID_recuitment_programm', $ID_recuitment_programm);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_recuitment_programm($data, $ID_recuitment_programm)
    {

        $this->db->where('auditquality_recuitment_programm.ID_recuitment_programm', $ID_recuitment_programm);
        if ($this->db->update('auditquality_recuitment_programm', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_recuitment_programm($ID_recuitment_programm)
    {
        $this->db->where('ID_recuitment_programm', $ID_recuitment_programm);
        $this->db->delete('auditquality_recuitment_programm');
    }


    function get_recuitment_paging($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recuitment_programm.ID_company');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee', 'left');

        $this->db->from('auditquality_recuitment_programm');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_recuitment_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee', 'left');

        $this->db->from('auditquality_recuitment_programm');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_all_recuitment_group()
    {
        $this->db->select('*');
        $this->db->from('auditquality_recuitment_group');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_recuitment_group_request()
    {
        $this->db->select('*');
        $this->db->from('auditquality_recuitment_group_request');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_employee()
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $query = $this->db->get();
        return $query->result_array();
    }


    function get_group_recuitment_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_recuitment_group');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_group_recuitment_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_recuitment_group');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function get_employee_by_group_recuitment_programm($ID_recuitment_group)
    {
        $this->db->select('*');
        $this->db->from('auditquality_recuitment_group_employee');
        $this->db->join('auditquality_skills_employee', 'auditquality_skills_employee.ID_skill_employee = auditquality_recuitment_group_employee.ID_skill_employee');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_skills_employee.ID_employee');
        $this->db->group_by("auditquality_employee.ID_employee");

        $this->db->where('auditquality_recuitment_group_employee.ID_recuitment_group', $ID_recuitment_group);

        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End recuitment *************************************/
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
    function get_subjects_by_recuitment_programm($ID_recuitment_programm)
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recuitment_programm.ID_company');

        $this->db->where('auditquality_subjects.ID_recuitment_programm', $ID_recuitment_programm);
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_recuitment_paging_by_type($page, $ID_status_recuitment)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_recuitment_programm');
        $this->db->where('ID_status_recuitment', $ID_status_recuitment);
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

    function get_recuitment_nb_page_by_type($ID_status_recuitment)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_recuitment_programm');
        //$this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document');
        $this->db->where('ID_status_recuitment', $ID_status_recuitment);
        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function get_recuitment_by_year_paging($page, $year)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recuitment_programm.ID_company');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee', 'left');

        $this->db->from('auditquality_recuitment_programm');
        $this->db->where('auditquality_recuitment_programm.Year_recuitment_programm', $year);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_recuitment_by_year_nb_page($year)
    {
        $this->db->select('count(*) nb');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee', 'left');

        $this->db->from('auditquality_recuitment_programm');
        $this->db->where('auditquality_recuitment_programm.Year_recuitment_programm', $year);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_recuitment_eval_emp_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_recuitment_programm');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee');

        $this->db->group_by("auditquality_recuitment_programm.ID_recuitment_programm");

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_recuitment_eval_emp_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_recuitment_programm');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee');

        $this->db->group_by("auditquality_recuitment_programm.ID_recuitment_programm");
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function delete_recuitment_evaluation_emp($ID_recuitment_evaluation_emp)
    {
        $this->db->where('ID_recuitment_evaluation_emp', $ID_recuitment_evaluation_emp);
        $this->db->delete('auditquality_recuitment_evaluation_emp');
    }


    function get_recuitment_eval_all_nb_page($year)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_recuitment_programm');

        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee', 'left');

        $this->db->where('auditquality_recuitment_programm.Year_recuitment_programm', $year);

        $this->db->join('auditquality_recuitment_group', 'auditquality_recuitment_group.ID_recuitment_group = auditquality_recuitment_programm.ID_recuitment_group', 'left');

        $this->db->join('auditquality_recuitment_group_employee', 'auditquality_recuitment_group_employee.ID_recuitment_group = auditquality_recuitment_group.ID_recuitment_group', 'left');

        $this->db->join('auditquality_recuitment_group_request', 'auditquality_recuitment_group_request.ID_recuitment_group_request = auditquality_recuitment_programm.ID_recuitment_group_request', 'left');

        $this->db->join('auditquality_recuitment_group_employee_request', 'auditquality_recuitment_group_employee_request.ID_recuitment_group_request = auditquality_recuitment_group_request.ID_recuitment_group_request', 'left');

        $this->db->where('auditquality_recuitment_programm.Year_recuitment_programm', $year);

        $this->db->group_by('auditquality_recuitment_programm.ID_recuitment_programm');

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_recuitment_eval_all_paging($page, $year)
    {
        $this->db->select('*,count(*) as nbr_emp');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recuitment_programm.ID_company');
        $this->db->from('auditquality_recuitment_programm');

        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee', 'left');
        $this->db->join('auditquality_recuitment_group', 'auditquality_recuitment_group.ID_recuitment_group = auditquality_recuitment_programm.ID_recuitment_group', 'left');
        $this->db->join('auditquality_recuitment_group_employee', 'auditquality_recuitment_group_employee.ID_recuitment_group = auditquality_recuitment_group.ID_recuitment_group', 'left');
        $this->db->join('auditquality_skills_employee', 'auditquality_skills_employee.ID_recuitment_group = auditquality_recuitment_group_employee.ID_recuitment_group', 'left');

        $this->db->join('auditquality_recuitment_group_request', 'auditquality_recuitment_group_request.ID_recuitment_group_request = auditquality_recuitment_programm.ID_recuitment_group_request', 'left');
        $this->db->join('auditquality_recuitment_group_employee_request', 'auditquality_recuitment_group_employee_request.ID_recuitment_group_request = auditquality_recuitment_group_request.ID_recuitment_group_request', 'left');


        $this->db->group_by('auditquality_recuitment_programm.ID_recuitment_programm');
        $this->db->where('auditquality_recuitment_programm.Year_recuitment_programm', $year);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }


    function insert_recuitment_evaluation_emp($data)
    {
        $this->db->insert('auditquality_recuitment_evaluation_emp', $data);
        return    $this->db->insert_id();
    }


    /***************** All recuitments - detail by programme **************/




    function get_recuitments_eval_by_prog_nb_page($ID_recuitment_programm)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_recuitment_programm');

        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee', 'left');

        //   $this->db->where('auditquality_recuitment_programm.ID_recuitment_programm', $ID_recuitment_programm);

        $this->db->join('auditquality_recuitment_group', 'auditquality_recuitment_group.ID_recuitment_group = auditquality_recuitment_programm.ID_recuitment_group', 'left');

        $this->db->join('auditquality_recuitment_group_employee', 'auditquality_recuitment_group_employee.ID_recuitment_group = auditquality_recuitment_group.ID_recuitment_group', 'left');

        $this->db->join('auditquality_recuitment_group_request', 'auditquality_recuitment_group_request.ID_recuitment_group_request = auditquality_recuitment_programm.ID_recuitment_group_request', 'left');

        $this->db->join('auditquality_recuitment_group_employee_request', 'auditquality_recuitment_group_employee_request.ID_recuitment_group_request = auditquality_recuitment_group_request.ID_recuitment_group_request', 'left');

        $this->db->where('auditquality_recuitment_programm.ID_recuitment_programm', $ID_recuitment_programm);

        // $this->db->group_by('auditquality_recuitment_programm.ID_recuitment_programm');

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_recuitments_eval_by_prog1_paging($page, $ID_recuitment_programm)
    {
        $this->db->select('* , auditquality_recuitment_programm.ID_recuitment_programm, e1.ID_employee');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recuitment_programm.ID_company');
        $this->db->from('auditquality_recuitment_programm');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee');
        //    $this->db->where('auditquality_recuitment_programm.ID_recuitment_programm', $yeID_recuitment_programmar);
        $this->db->join('auditquality_recuitment_group', 'auditquality_recuitment_group.ID_recuitment_group = auditquality_recuitment_programm.ID_recuitment_group');
        $this->db->join('auditquality_recuitment_group_employee', 'auditquality_recuitment_group_employee.ID_recuitment_group = auditquality_recuitment_group.ID_recuitment_group');
        $this->db->join('auditquality_skills_employee', 'auditquality_skills_employee.ID_skill_employee = auditquality_recuitment_group_employee.ID_skill_employee');
        $this->db->join('auditquality_employee e1', 'e1.ID_employee = auditquality_skills_employee.ID_employee');
        // $this->db->group_by("auditquality_employee.ID_employee");
        //     $this->db->join('auditquality_recuitment_group_request', 'auditquality_recuitment_group_request.ID_recuitment_group_request = auditquality_recuitment_programm.ID_recuitment_group_request', 'left');
        //     $this->db->join('auditquality_recuitment_group_employee_request', 'auditquality_recuitment_group_employee_request.ID_recuitment_group_request = auditquality_recuitment_group_request.ID_recuitment_group_request', 'left');
        //     $this->db->join('auditquality_employee e2', 'e2.ID_employee = auditquality_recuitment_group_employee_request.ID_employee', 'left');

        $this->db->join('auditquality_recuitment_evaluation_emp e3', 'e3.ID_employee = e1.ID_employee', 'left');
        //    $this->db->join('auditquality_recuitment_evaluation_emp e4', 'e4.ID_employee = e2.ID_employee', 'left');



        $this->db->where('auditquality_recuitment_programm.ID_recuitment_programm', $ID_recuitment_programm);

        $this->db->group_by('e1.ID_employee');
        //   $this->db->group_by('e2.ID_employee');

        //  $this->db->group_by('auditquality_recuitment_programm.ID_recuitment_programm');

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_recuitments_eval_by_prog2_paging($page, $ID_recuitment_programm)
    {
        $this->db->select('* , auditquality_recuitment_programm.ID_recuitment_programm, e2.ID_employee');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_recuitment_programm.ID_company');
        $this->db->from('auditquality_recuitment_programm');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_recuitment_programm.ID_employee');
        //    $this->db->where('auditquality_recuitment_programm.ID_recuitment_programm', $yeID_recuitment_programmar);
        //      $this->db->join('auditquality_recuitment_group', 'auditquality_recuitment_group.ID_recuitment_group = auditquality_recuitment_programm.ID_recuitment_group', 'left');
        //      $this->db->join('auditquality_recuitment_group_employee', 'auditquality_recuitment_group_employee.ID_recuitment_group = auditquality_recuitment_group.ID_recuitment_group', 'left');
        //    $this->db->join('auditquality_skills_employee', 'auditquality_skills_employee.ID_skill_employee = auditquality_recuitment_group_employee.ID_skill_employee', 'left');
        //     $this->db->join('auditquality_employee e1', 'e1.ID_employee = auditquality_skills_employee.ID_employee', 'left');
        // $this->db->group_by("auditquality_employee.ID_employee");
        $this->db->join('auditquality_recuitment_group_request', 'auditquality_recuitment_group_request.ID_recuitment_group_request = auditquality_recuitment_programm.ID_recuitment_group_request');
        $this->db->join('auditquality_recuitment_group_employee_request', 'auditquality_recuitment_group_employee_request.ID_recuitment_group_request = auditquality_recuitment_group_request.ID_recuitment_group_request');
        $this->db->join('auditquality_employee e2', 'e2.ID_employee = auditquality_recuitment_group_employee_request.ID_employee');

        //   $this->db->join('auditquality_recuitment_evaluation_emp e3', 'e3.ID_employee = e1.ID_employee', 'left');
        $this->db->join('auditquality_recuitment_evaluation_emp e4', 'e4.ID_employee = e2.ID_employee', 'left');



        $this->db->where('auditquality_recuitment_programm.ID_recuitment_programm', $ID_recuitment_programm);

        //  $this->db->group_by('e1.ID_employee');
        $this->db->group_by('e2.ID_employee');

        //  $this->db->group_by('auditquality_recuitment_programm.ID_recuitment_programm');

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }


    function get_doc_upload($ID_link_document_upload)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_link_document_upload');
        $this->db->where('auditquality_link_document_upload.ID_link_document_upload', $ID_link_document_upload);
        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));
        $this->db->join('auditquality_document_upload', 'auditquality_document_upload.ID_link_document_upload = auditquality_link_document_upload.ID_link_document_upload');
        $this->db->order_by('auditquality_document_upload.ID_document_upload', 'desc');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
}
