<?php
class Msubject extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** subject *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_subject($data)
    {
        $this->db->insert('auditquality_subjects', $data);
        return    $this->db->insert_id();
    }
    function get_subject()
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_subjects.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_subjects()
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_subjects.ID_company');
        //$this->db->where('auditquality_subjects.ismain', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_subject_by_ID($ID_subject)
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_subjects.ID_company');

        $this->db->where('auditquality_subjects.ID_subject', $ID_subject);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_subject($data, $ID_subject)
    {

        $this->db->where('auditquality_subjects.ID_subject', $ID_subject);
        if ($this->db->update('auditquality_subjects', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_subject($ID_subject)
    {
        $this->db->where('ID_subject', $ID_subject);
        $this->db->delete('auditquality_subjects');
    }


    function get_subject_paging($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_subjects.ID_company');

        $this->db->from('auditquality_subjects');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_subject_nb_page()
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_subjects.ID_company');

        $this->db->from('auditquality_subjects');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End subject *************************************/
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

        /****************************** Constat ************************************/


        function get_constat()
        {
            $this->db->select('*');
            $this->db->from('auditquality_constat');
            $query = $this->db->get();
            return $query->result_array();
        }
    /********************************Subjects******************************/
    function get_subjects_by_subject($ID_subject)
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_subjects.ID_company');

        $this->db->where('auditquality_subjects.ID_subject', $ID_subject);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_chapter_by_subject($ID_subject)
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->where('auditquality_subjects.ID_subject', $ID_subject);
        $query = $this->db->get();
        return $query->result_array();
    }

/********************************Note****************************/
function edit_note($data, $ID_note)
{

    $this->db->where('auditquality_note.ID_note', $ID_note);
    if ($this->db->update('auditquality_note', $data)) {

        return true;
    } else {

        return false;
    }
}
function add_note($data)
{
    $this->db->insert('auditquality_note', $data);
    return    $this->db->insert_id();
}

function delete_note($ID_note)
{
    $this->db->where('ID_note', $ID_note);
    $this->db->delete('auditquality_note');
}
function get_note_by_ID($ID_note)
{
    $this->db->select('*');
    $this->db->from('auditquality_note');
    //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_subjects.ID_company');

    $this->db->where('auditquality_note.ID_note', $ID_note);
    $query = $this->db->get();
    return $query->result_array();
}
}
