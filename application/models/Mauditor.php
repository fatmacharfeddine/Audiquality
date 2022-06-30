<?php
class Mauditor extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    function get_chapters($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_chapters');
        $this->db->where('auditquality_chapters.ID_chapter=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_chapters_all()
    {
        $this->db->select('*');
        $this->db->from('auditquality_chapters');
        //  $this->db->where('auditquality_chapters.ID_chapter=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getcountchapters()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_chapters');
        $query = $this->db->get();
        return $query->result_array()[0]['nb'];
    }

    function get_subjects($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        $this->db->order_by('Number_subject');
        $this->db->where('auditquality_subjects.ID_chapter=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_questions($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_questions');
        $this->db->order_by('ID_question');
        $this->db->where('auditquality_questions.ID_chapter=' . $id);
        $query = $this->db->get();
        // echo print_r($query->result_array()) ;die();
        return $query->result_array();
    }
    function add_answer($data)
    {
        $this->db->insert('auditquality_responses', $data);
        return    $this->db->insert_id();
    }
    function get_audityear_by_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_year');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_year.ID_company');
        $this->db->where('auditquality_year.Status_year = 1');
        $this->db->where('auditquality_year.ID_company=' . $ID_company);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_audityear($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_year');
        $this->db->where('auditquality_year.ID_company=' . $ID_company);
        $query = $this->db->get();
        return $query->result_array();
    }

    function edit_year_activate($ID_company, $ID_year)
    {
        $this->db->set('auditquality_year.Status_year', '1');
        $this->db->where('ID_company', $ID_company);
        $this->db->where('ID_year', $ID_year);

        if ($this->db->update('auditquality_year')) {

            return true;
        } else {

            return false;
        }
    }

    function edit_year_inactivate($ID_company, $ID_year)
    {
        $this->db->set('auditquality_year.Status_year', '0');
        $this->db->where('ID_company', $ID_company);
        $this->db->where('ID_year !=' . $ID_year);

        if ($this->db->update('auditquality_year')) {

            return true;
        } else {

            return false;
        }
    }
    function edit_year_company($ID_company, $ID_year)
    {
        $this->db->set('auditquality_company.ID_year', $ID_year);
        $this->db->where('ID_company', $ID_company);
        if ($this->db->update('auditquality_company')) {

            return true;
        } else {

            return false;
        }
    }

    function edit_company($ID_company, $ID_department)
    {
        $this->db->set('auditquality_department.ID_company', $ID_company);
        $this->db->where('ID_department', $ID_department);
        if ($this->db->update('auditquality_department')) {

            return true;
        } else {

            return false;
        }
    }

    function AddAccess($data)
    {
        $this->db->insert('auditquality_access', $data);
        return    $this->db->insert_id();
    }

    function get_access_bydepartment($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_access');
        $this->db->where('auditquality_access.ID_department=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_department_by_ID($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_department');
        $this->db->where('auditquality_department.ID_department=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_status_all()
    {
        $this->db->select('*');
        $this->db->from('auditquality_status');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_chapters_with_status($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_access');
        $this->db->join('auditquality_chapters', 'auditquality_chapters.ID_chapter = auditquality_access.ID_chapter');
        $this->db->where('auditquality_access.ID_department=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }


    function edit_access_status($ID_access, $ID_status)
    {
        $this->db->set('auditquality_access.ID_status', $ID_status);
        $this->db->where('ID_access', $ID_access);
        if ($this->db->update('auditquality_access')) {

            return true;
        } else {

            return false;
        }
    }
}
