<?php
class Mtraining extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** training *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_training($data)
    {
        $this->db->insert('auditquality_training_programm', $data);
        return    $this->db->insert_id();
    }
    function get_training()
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_programm');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_programm.ID_company');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_trainings()
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_programm');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization','left');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_programm.ID_company');
        //$this->db->where('auditquality_training_programm.ismain', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_training_program()
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_programm');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_programm.ID_company');
        $this->db->where('auditquality_training_programm.ID_status_training !=', 2);
        $this->db->group_by("auditquality_training_programm.Year_training_programm");


        $query = $this->db->get();
        return $query->result_array();
    }
    function get_training_by_ID($ID_training_programm)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_programm');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_programm.ID_company');

        $this->db->where('auditquality_training_programm.ID_training_programm', $ID_training_programm);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_training($data, $ID_training_programm)
    {

        $this->db->where('auditquality_training_programm.ID_training_programm', $ID_training_programm);
        if ($this->db->update('auditquality_training_programm', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_training($ID_training_programm)
    {
        $this->db->where('ID_training_programm', $ID_training_programm);
        $this->db->delete('auditquality_training_programm');
    }


    function get_training_paging($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_programm.ID_company');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization', 'left');

        $this->db->from('auditquality_training_programm');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization', 'left');

        $this->db->from('auditquality_training_programm');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_all_training_group()
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_training_group_request()
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group_request');
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


    function get_group_training_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_group_training_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_training_group');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function get_employee_by_group_training($ID_training_group)
    {
        $this->db->select('*');
        $this->db->from('auditquality_training_group_employee');
        $this->db->join('auditquality_skills_employee', 'auditquality_skills_employee.ID_skill_employee = auditquality_training_group_employee.ID_skill_employee');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_skills_employee.ID_employee');
        $this->db->group_by("auditquality_employee.ID_employee");

        $this->db->where('auditquality_training_group_employee.ID_training_group', $ID_training_group);

        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End training *************************************/
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
    function get_subjects_by_training($ID_training_programm)
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_programm.ID_company');

        $this->db->where('auditquality_subjects.ID_training_programm', $ID_training_programm);
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_Training_paging_by_type($page, $ID_status_training)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_training_programm');
        $this->db->where('ID_status_training', $ID_status_training);
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

    function get_Training_nb_page_by_type($ID_status_training)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_requests.ID_company');

        $this->db->from('auditquality_training_programm');
        //$this->db->join('auditquality_document', 'auditquality_document.ID_document = auditquality_doc_requests.ID_document');
        $this->db->where('ID_status_training', $ID_status_training);
        //$this->db->where('Createdby_requests', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function get_training_by_year_paging($page, $year)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_programm.ID_company');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization', 'left');

        $this->db->from('auditquality_training_programm');
        $this->db->where('auditquality_training_programm.Year_training_programm', $year);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_training_by_year_nb_page($year)
    {
        $this->db->select('count(*) nb');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization', 'left');

        $this->db->from('auditquality_training_programm');
        $this->db->where('auditquality_training_programm.Year_training_programm', $year);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_training_eval_emp_paging($page, $year)
    {
        $this->db->select('auditquality_training_programm.ID_training_programm,
                            auditquality_training_programm.Title_training_programm,
                            auditquality_training_programm.Startdate_training_programm,
                            auditquality_training_programm.Enddate_training_programm,
                            auditquality_training_programm.Hours_training_programm,
                            auditquality_training_programm.Budget_training_programm,
                            auditquality_organization.Name_organization,
                            auditquality_training_programm.Year_training_programm,
                            auditquality_training_evaluation_emp.File_training_evaluation_emp,
                            auditquality_training_evaluation_emp.ID_training_evaluation_emp,
                            auditquality_training_evaluation_emp.Objectif_training_evaluation_emp');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_programm.ID_company');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization', 'left');
        $this->db->join('auditquality_training_evaluation_emp', 'auditquality_training_evaluation_emp.ID_training_programm = auditquality_training_programm.ID_training_programm', 'left');

        $this->db->from('auditquality_training_programm');
        $this->db->where('auditquality_training_programm.Year_training_programm', $year);
        $this->db->where('auditquality_training_programm.ID_training_group IN (SELECT auditquality_training_group_employee.ID_training_group FROM `auditquality_skills_employee` Join auditquality_training_group_employee ON auditquality_training_group_employee.ID_skill_employee = auditquality_skills_employee.ID_skill_employee where auditquality_skills_employee.ID_employee = ' . $this->session->userdata('ID_employee') . ')');
        $this->db->or_where('auditquality_training_programm.ID_training_group_request IN (SELECT auditquality_training_group_employee_request.ID_training_group_request FROM auditquality_training_group_employee_request where auditquality_training_group_employee_request.ID_employee = ' . $this->session->userdata('ID_employee') . ')');
        $this->db->where('auditquality_training_evaluation_emp.ID_employee', $this->session->userdata('ID_employee'));
        $this->db->group_by("auditquality_training_programm.ID_training_programm");

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_training_eval_emp_nb_page($year)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_programm.ID_company');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization', 'left');
        $this->db->join('auditquality_training_evaluation_emp', 'auditquality_training_evaluation_emp.ID_training_programm = auditquality_training_programm.ID_training_programm', 'left');

        $this->db->from('auditquality_training_programm');
        $this->db->where('auditquality_training_programm.Year_training_programm', $year);
        $this->db->where('auditquality_training_programm.ID_training_group IN (SELECT auditquality_training_group_employee.ID_training_group FROM `auditquality_skills_employee` Join auditquality_training_group_employee ON auditquality_training_group_employee.ID_skill_employee = auditquality_skills_employee.ID_skill_employee where auditquality_skills_employee.ID_employee = ' . $this->session->userdata('ID_employee') . ')');
        $this->db->or_where('auditquality_training_programm.ID_training_group_request IN (SELECT auditquality_training_group_employee_request.ID_training_group_request FROM auditquality_training_group_employee_request where auditquality_training_group_employee_request.ID_employee = ' . $this->session->userdata('ID_employee') . ')');
        $this->db->where('auditquality_training_evaluation_emp.ID_employee', $this->session->userdata('ID_employee'));
        $this->db->group_by("auditquality_training_programm.ID_training_programm");

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function delete_training_evaluation_emp($ID_training_evaluation_emp)
    {
        $this->db->where('ID_training_evaluation_emp', $ID_training_evaluation_emp);
        $this->db->delete('auditquality_training_evaluation_emp');
    }


    function get_training_eval_all_nb_page($year)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_training_programm');

        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization', 'left');

        $this->db->where('auditquality_training_programm.Year_training_programm', $year);

        $this->db->join('auditquality_training_group', 'auditquality_training_group.ID_training_group = auditquality_training_programm.ID_training_group', 'left');

        $this->db->join('auditquality_training_group_employee', 'auditquality_training_group_employee.ID_training_group = auditquality_training_group.ID_training_group', 'left');

        $this->db->join('auditquality_training_group_request', 'auditquality_training_group_request.ID_training_group_request = auditquality_training_programm.ID_training_group_request', 'left');

        $this->db->join('auditquality_training_group_employee_request', 'auditquality_training_group_employee_request.ID_training_group_request = auditquality_training_group_request.ID_training_group_request', 'left');

        $this->db->where('auditquality_training_programm.Year_training_programm', $year);

        $this->db->group_by('auditquality_training_programm.ID_training_programm');

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_training_eval_all_paging($page, $year)
    {
        $this->db->select('*,count(*) as nbr_emp');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_programm.ID_company');
        $this->db->from('auditquality_training_programm');

        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization', 'left');
        $this->db->join('auditquality_training_group', 'auditquality_training_group.ID_training_group = auditquality_training_programm.ID_training_group', 'left');
        $this->db->join('auditquality_training_group_employee', 'auditquality_training_group_employee.ID_training_group = auditquality_training_group.ID_training_group', 'left');
        $this->db->join('auditquality_skills_employee', 'auditquality_skills_employee.ID_training_group = auditquality_training_group_employee.ID_training_group', 'left');
    
          $this->db->join('auditquality_training_group_request', 'auditquality_training_group_request.ID_training_group_request = auditquality_training_programm.ID_training_group_request', 'left');
        $this->db->join('auditquality_training_group_employee_request', 'auditquality_training_group_employee_request.ID_training_group_request = auditquality_training_group_request.ID_training_group_request', 'left');


        $this->db->group_by('auditquality_training_programm.ID_training_programm');
      $this->db->where('auditquality_training_programm.Year_training_programm', $year);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }


    function insert_training_evaluation_emp($data)
    {
        $this->db->insert('auditquality_training_evaluation_emp', $data);
        return    $this->db->insert_id();
    }


    /***************** All trainings - detail by programme **************/




    function get_trainings_eval_by_prog_nb_page($ID_training_programm)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_training_programm');

        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization', 'left');

        //   $this->db->where('auditquality_training_programm.ID_training_programm', $ID_training_programm);

        $this->db->join('auditquality_training_group', 'auditquality_training_group.ID_training_group = auditquality_training_programm.ID_training_group', 'left');

        $this->db->join('auditquality_training_group_employee', 'auditquality_training_group_employee.ID_training_group = auditquality_training_group.ID_training_group', 'left');

        $this->db->join('auditquality_training_group_request', 'auditquality_training_group_request.ID_training_group_request = auditquality_training_programm.ID_training_group_request', 'left');

        $this->db->join('auditquality_training_group_employee_request', 'auditquality_training_group_employee_request.ID_training_group_request = auditquality_training_group_request.ID_training_group_request', 'left');

        $this->db->where('auditquality_training_programm.ID_training_programm', $ID_training_programm);

        // $this->db->group_by('auditquality_training_programm.ID_training_programm');

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_trainings_eval_by_prog1_paging($page, $ID_training_programm)
    {
        $this->db->select('* , auditquality_training_programm.ID_training_programm, e1.ID_employee');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_programm.ID_company');
        $this->db->from('auditquality_training_programm');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization');
        //    $this->db->where('auditquality_training_programm.ID_training_programm', $yeID_training_programmar);
        $this->db->join('auditquality_training_group', 'auditquality_training_group.ID_training_group = auditquality_training_programm.ID_training_group');
        $this->db->join('auditquality_training_group_employee', 'auditquality_training_group_employee.ID_training_group = auditquality_training_group.ID_training_group');
        $this->db->join('auditquality_skills_employee', 'auditquality_skills_employee.ID_skill_employee = auditquality_training_group_employee.ID_skill_employee');
        $this->db->join('auditquality_employee e1', 'e1.ID_employee = auditquality_skills_employee.ID_employee');
        // $this->db->group_by("auditquality_employee.ID_employee");
        //     $this->db->join('auditquality_training_group_request', 'auditquality_training_group_request.ID_training_group_request = auditquality_training_programm.ID_training_group_request', 'left');
        //     $this->db->join('auditquality_training_group_employee_request', 'auditquality_training_group_employee_request.ID_training_group_request = auditquality_training_group_request.ID_training_group_request', 'left');
        //     $this->db->join('auditquality_employee e2', 'e2.ID_employee = auditquality_training_group_employee_request.ID_employee', 'left');

        $this->db->join('auditquality_training_evaluation_emp e3', 'e3.ID_employee = e1.ID_employee','left');
        //    $this->db->join('auditquality_training_evaluation_emp e4', 'e4.ID_employee = e2.ID_employee', 'left');



        $this->db->where('auditquality_training_programm.ID_training_programm', $ID_training_programm);

        $this->db->group_by('e1.ID_employee');
     //   $this->db->group_by('e2.ID_employee');

        //  $this->db->group_by('auditquality_training_programm.ID_training_programm');

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_trainings_eval_by_prog2_paging($page, $ID_training_programm)
    {
        $this->db->select('* , auditquality_training_programm.ID_training_programm, e2.ID_employee');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_training_programm.ID_company');
        $this->db->from('auditquality_training_programm');
        $this->db->join('auditquality_organization', 'auditquality_organization.ID_organization = auditquality_training_programm.ID_organization');
        //    $this->db->where('auditquality_training_programm.ID_training_programm', $yeID_training_programmar);
        //      $this->db->join('auditquality_training_group', 'auditquality_training_group.ID_training_group = auditquality_training_programm.ID_training_group', 'left');
        //      $this->db->join('auditquality_training_group_employee', 'auditquality_training_group_employee.ID_training_group = auditquality_training_group.ID_training_group', 'left');
        //    $this->db->join('auditquality_skills_employee', 'auditquality_skills_employee.ID_skill_employee = auditquality_training_group_employee.ID_skill_employee', 'left');
        //     $this->db->join('auditquality_employee e1', 'e1.ID_employee = auditquality_skills_employee.ID_employee', 'left');
        // $this->db->group_by("auditquality_employee.ID_employee");
        $this->db->join('auditquality_training_group_request', 'auditquality_training_group_request.ID_training_group_request = auditquality_training_programm.ID_training_group_request');
        $this->db->join('auditquality_training_group_employee_request', 'auditquality_training_group_employee_request.ID_training_group_request = auditquality_training_group_request.ID_training_group_request');
        $this->db->join('auditquality_employee e2', 'e2.ID_employee = auditquality_training_group_employee_request.ID_employee');

        //   $this->db->join('auditquality_training_evaluation_emp e3', 'e3.ID_employee = e1.ID_employee', 'left');
        $this->db->join('auditquality_training_evaluation_emp e4', 'e4.ID_employee = e2.ID_employee','left');



        $this->db->where('auditquality_training_programm.ID_training_programm', $ID_training_programm);

        //  $this->db->group_by('e1.ID_employee');
        $this->db->group_by('e2.ID_employee');

        //  $this->db->group_by('auditquality_training_programm.ID_training_programm');

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
        $this->db->order_by('auditquality_document_upload.ID_document_upload','desc');
   
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
}
