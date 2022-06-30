<?php
class Mquestion extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** question *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_question($data)
    {
        $this->db->insert('auditquality_questions', $data);
        return    $this->db->insert_id();
    }
    function get_question()
    {
        $this->db->select('*');
        $this->db->from('auditquality_questions');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_questions.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_questions()
    {
        $this->db->select('*');
        $this->db->from('auditquality_questions');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_questions.ID_company');
        //$this->db->where('auditquality_questions.ismain', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_question_by_ID($ID_question)
    {
        $this->db->select('*');
        $this->db->from('auditquality_questions');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_questions.ID_company');

        $this->db->where('auditquality_questions.ID_question', $ID_question);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_question($data, $ID_question)
    {

        $this->db->where('auditquality_questions.ID_question', $ID_question);
        if ($this->db->update('auditquality_questions', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_question($ID_question)
    {
        $this->db->where('ID_question', $ID_question);
        $this->db->delete('auditquality_questions');
    }


    function get_question_paging($page, $ID_subject)
    {
        $this->db->select('*');
        $this->db->from('auditquality_questions');
        $this->db->join('auditquality_subjects', 'auditquality_subjects.ID_subject = auditquality_questions.ID_subject');
        $this->db->join('auditquality_chapters', 'auditquality_chapters.ID_chapter = auditquality_questions.ID_chapter');

        $this->db->where('auditquality_questions.ID_subject', $ID_subject);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_question_nb_page($ID_subject)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_questions');
        $this->db->join('auditquality_subjects', 'auditquality_subjects.ID_subject = auditquality_questions.ID_subject');
        $this->db->join('auditquality_chapters', 'auditquality_chapters.ID_chapter = auditquality_questions.ID_chapter');

        $this->db->where('auditquality_questions.ID_subject', $ID_subject);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End question *************************************/
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

    /********************************questions******************************/
    function get_questions_by_question($ID_question)
    {
        $this->db->select('*');
        $this->db->from('auditquality_questions');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_questions.ID_company');

        $this->db->where('auditquality_questions.ID_question', $ID_question);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_questions_by_chapter($ID_chapter)
    {
        $this->db->select('*');
        $this->db->from('auditquality_questions');
        //$this->db->join('auditquality_responses', 'auditquality_responses.ID_question = auditquality_questions.ID_question','left');
        //$this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat','left');

        $this->db->where('auditquality_questions.ID_chapter', $ID_chapter);
        $this->db->group_by('auditquality_questions.ID_question');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_chapter_by_question($ID_question)
    {
        $this->db->select('*');
        $this->db->from('auditquality_questions');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->where('auditquality_questions.ID_question', $ID_question);

        $query = $this->db->get();
        return $query->result_array();
    }
    /********************************response******************************/

    function edit_response($data, $ID_response)
    {

        $this->db->where('auditquality_responses.ID_response', $ID_response);
        if ($this->db->update('auditquality_responses', $data)) {

            return true;
        } else {

            return false;
        }
    }
    function add_response($data)
    {
        $this->db->insert('auditquality_responses', $data);
        return    $this->db->insert_id();
    }

    function delete_response($ID_response)
    {
        $this->db->where('ID_response', $ID_response);
        $this->db->delete('auditquality_responses');
    }
    function get_response_by_chapter($ID_chapter)
    {
        $this->db->select('*');
        $this->db->from('auditquality_questions');
        $this->db->join('auditquality_responses', 'auditquality_responses.ID_question = auditquality_questions.ID_question', 'left');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat', 'left');

        $this->db->where('auditquality_questions.ID_chapter', $ID_chapter);
        $this->db->group_by('auditquality_questions.ID_question');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_response_by_ID($ID_response)
    {
        $this->db->select('*');
        $this->db->from('auditquality_responses');
        //$this->db->join('auditquality_responses', 'auditquality_responses.ID_question = auditquality_questions.ID_question','left');
        //$this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat','left');

        $this->db->where('auditquality_responses.ID_response', $ID_response);
        //$this->db->group_by('auditquality_questions.ID_question');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_response_by_chapter_by_grid($ID_chapter, $ID_grid)
    {
        $this->db->select('*');
        $this->db->from('auditquality_questions');
        $this->db->join('auditquality_responses', 'auditquality_responses.ID_question = auditquality_questions.ID_question');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat', 'left');

        $this->db->where('auditquality_questions.ID_chapter', $ID_chapter);
        $this->db->where('auditquality_responses.ID_grid', $ID_grid);


        $this->db->group_by('auditquality_questions.ID_question');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_response_by_chapter_by_grid_bysubject($ID_chapter, $ID_grid, $ID_subject)
    {
        $this->db->select('*');
        $this->db->from('auditquality_questions');
        $this->db->join('auditquality_responses', 'auditquality_responses.ID_question = auditquality_questions.ID_question');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat', 'left');
        //   $this->db->join('auditquality_responses', 'auditquality_responses.ID_question = auditquality_questions.ID_question');

        $this->db->where('auditquality_questions.ID_chapter', $ID_chapter);
        $this->db->where('auditquality_questions.ID_grid', $ID_grid);
        $this->db->where('auditquality_questions.ID_subject', $ID_subject);


        //
        $this->db->group_by('auditquality_questions.ID_question');

        $query = $this->db->get();
        return $query->result_array();
    }
}
