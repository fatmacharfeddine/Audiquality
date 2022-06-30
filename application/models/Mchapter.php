<?php
class Mchapter extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** chapter *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_chapter($data)
    {
        $this->db->insert('auditquality_chapters', $data);
        return    $this->db->insert_id();
    }
    function get_chapter()
    {
        $this->db->select('*');
        $this->db->from('auditquality_chapters');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_chapters()
    {
        $this->db->select('*');
        $this->db->from('auditquality_chapters');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');
        //$this->db->where('auditquality_chapters.ismain', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_chapter_by_ID($ID_chapter)
    {
        $this->db->select('*');
        $this->db->from('auditquality_chapters');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->where('auditquality_chapters.ID_chapter', $ID_chapter);
        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_chapter($data, $ID_chapter)
    {

        $this->db->where('auditquality_chapters.ID_chapter', $ID_chapter);
        if ($this->db->update('auditquality_chapters', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_chapter($ID_chapter)
    {
        $this->db->where('ID_chapter', $ID_chapter);
        $this->db->delete('auditquality_chapters');
    }


    function get_chapter_paging($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->from('auditquality_chapters');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_chapter_nb_page()
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->from('auditquality_chapters');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End chapter *************************************/
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
    function get_subjects_by_chapter($ID_chapter)
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->where('auditquality_subjects.ID_chapter', $ID_chapter);
        $query = $this->db->get();
        return $query->result_array();
    }
    /************************** Note *********************************/
    function get_note_by_chapter($ID_chapter)
    {
        $this->db->select('*');
        $this->db->from('auditquality_note');
        $this->db->where('auditquality_note.ID_chapter', $ID_chapter);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_note_by_chapter_by_grid($ID_chapter, $ID_grid)
    {
        $this->db->select('*');
        $this->db->from('auditquality_note');
        $this->db->where('auditquality_note.ID_chapter', $ID_chapter);
        $this->db->where('auditquality_note.ID_grid', $ID_grid);

        $query = $this->db->get();
        return $query->result_array();
    }
    /************************** Grid *********************************/

    function delete_grid($ID_grid)
    {
        $this->db->where('ID_grid', $ID_grid);
        $this->db->delete('auditquality_grid');
    }

    function add_grid($data)
    {
        $this->db->insert('auditquality_grid', $data);
        return    $this->db->insert_id();
    }

    function get_grid_paging($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->from('auditquality_grid');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_grid_nb_page()
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->from('auditquality_grid');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    function get_grid_by_ID($ID_grid)
    {
        $this->db->select('*');
        $this->db->from('auditquality_grid');
        $this->db->where('auditquality_grid.ID_grid', $ID_grid);
        $query = $this->db->get();
        return $query->result_array();
    }
    //FlowChart

    function get_response_by_chapter_by_grid($ID_chapter, $ID_grid)
    {
        $this->db->select('auditquality_questions.Text_question Text_question, auditquality_responses.Value_response Value_response');
        $this->db->from('auditquality_questions');
        $this->db->join('auditquality_responses', 'auditquality_responses.ID_question = auditquality_questions.ID_question');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat', 'left');

        $this->db->where('auditquality_questions.ID_chapter', $ID_chapter);
        $this->db->where('auditquality_responses.ID_grid', $ID_grid);


        $this->db->group_by('auditquality_questions.ID_question');

        $query = $this->db->get();
        return $query->result_array();
    }
}
