<?php
class Mdoc_iso extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** doc_iso *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_doc_iso($data)
    {
        $this->db->insert('auditquality_doc_iso', $data);
        return    $this->db->insert_id();
    }
    function get_doc_iso()
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_iso');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_iso.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_doc_iso_by_ID($ID_doc_iso)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_iso');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_iso.ID_company');

        $this->db->where('auditquality_doc_iso.ID_doc_iso', $ID_doc_iso);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_doc_iso_by_type($Type_doc_iso)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_iso');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_iso.ID_company');

        $this->db->where('auditquality_doc_iso.Type_doc_iso', $Type_doc_iso);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_doc_iso_by_ID_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_iso');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_iso.ID_company');

        $this->db->where('auditquality_doc_iso.ID_company', $ID_company);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function edit_doc_iso($data, $ID_doc_iso)
    {

        $this->db->where('auditquality_doc_iso.ID_doc_iso', $ID_doc_iso);
        if ($this->db->update('auditquality_doc_iso', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_doc_iso($ID_doc_iso)
    {
        $this->db->where('ID_doc_iso', $ID_doc_iso);
        $this->db->delete('auditquality_doc_iso');
    }


    function get_doc_iso_by_type_paging($page, $Type_doc_iso)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_iso');
        $this->db->where('auditquality_doc_iso.Type_doc_iso', $Type_doc_iso);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_doc_iso_by_type_nb_page($Type_doc_iso)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_doc_iso');
        $this->db->where('auditquality_doc_iso.Type_doc_iso', $Type_doc_iso);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End doc_iso *************************************/
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

    /********************************doc_iso******************************/
    function get_doc_iso_by_doc_iso($ID_doc_iso)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_iso');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_doc_iso.ID_company');

        $this->db->where('auditquality_doc_iso.ID_doc_iso', $ID_doc_iso);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_doc_iso_by_chapter($ID_chapter)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_iso');
        //$this->db->join('auditquality_responses', 'auditquality_responses.ID_doc_iso = auditquality_doc_iso.ID_doc_iso','left');
        //$this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat','left');

        $this->db->where('auditquality_doc_iso.ID_chapter', $ID_chapter);
        $this->db->group_by('auditquality_doc_iso.ID_doc_iso');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_chapter_by_doc_iso($ID_doc_iso)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_iso');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->where('auditquality_doc_iso.ID_doc_iso', $ID_doc_iso);

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
        $this->db->from('auditquality_doc_iso');
        $this->db->join('auditquality_responses', 'auditquality_responses.ID_doc_iso = auditquality_doc_iso.ID_doc_iso', 'left');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat', 'left');

        $this->db->where('auditquality_doc_iso.ID_chapter', $ID_chapter);
        $this->db->group_by('auditquality_doc_iso.ID_doc_iso');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_response_by_ID($ID_response)
    {
        $this->db->select('*');
        $this->db->from('auditquality_responses');
        //$this->db->join('auditquality_responses', 'auditquality_responses.ID_doc_iso = auditquality_doc_iso.ID_doc_iso','left');
        //$this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat','left');

        $this->db->where('auditquality_responses.ID_response', $ID_response);
        //$this->db->group_by('auditquality_doc_iso.ID_doc_iso');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_response_by_chapter_by_grid($ID_chapter, $ID_grid)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_iso');
        $this->db->join('auditquality_responses', 'auditquality_responses.ID_doc_iso = auditquality_doc_iso.ID_doc_iso');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat', 'left');

        $this->db->where('auditquality_doc_iso.ID_chapter', $ID_chapter);
        $this->db->where('auditquality_responses.ID_grid', $ID_grid);


        $this->db->group_by('auditquality_doc_iso.ID_doc_iso');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_response_by_chapter_by_grid_bysubject($ID_chapter, $ID_grid, $ID_subject)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_iso');
        $this->db->join('auditquality_responses', 'auditquality_responses.ID_doc_iso = auditquality_doc_iso.ID_doc_iso');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat', 'left');
        //   $this->db->join('auditquality_responses', 'auditquality_responses.ID_doc_iso = auditquality_doc_iso.ID_doc_iso');

        $this->db->where('auditquality_doc_iso.ID_chapter', $ID_chapter);
        $this->db->where('auditquality_doc_iso.ID_grid', $ID_grid);
        $this->db->where('auditquality_doc_iso.ID_subject', $ID_subject);


        //
        $this->db->group_by('auditquality_doc_iso.ID_doc_iso');

        $query = $this->db->get();
        return $query->result_array();
    }
}
