<?php
class Mpolicy extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** policy *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_policy($data)
    {
        $this->db->insert('auditquality_policy', $data);
        return    $this->db->insert_id();
    }
    function get_policy()
    {
        $this->db->select('*');
        $this->db->from('auditquality_policy');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_policy.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_policy_by_ID($ID_policy)
    {
        $this->db->select('*');
        $this->db->from('auditquality_policy');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_policy.ID_company');

        $this->db->where('auditquality_policy.ID_policy', $ID_policy);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_policy_by_ID_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_policy');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_policy.ID_company');

        $this->db->where('auditquality_policy.ID_company', $ID_company);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function edit_policy($data, $ID_policy)
    {

        $this->db->where('auditquality_policy.ID_policy', $ID_policy);
        if ($this->db->update('auditquality_policy', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_policy($ID_policy)
    {
        $this->db->where('ID_policy', $ID_policy);
        $this->db->delete('auditquality_policy');
    }


    function get_policy_paging($page, $ID_subject)
    {
        $this->db->select('*');
        $this->db->from('auditquality_policy');
        $this->db->join('auditquality_subjects', 'auditquality_subjects.ID_subject = auditquality_policy.ID_subject');
        $this->db->join('auditquality_chapters', 'auditquality_chapters.ID_chapter = auditquality_policy.ID_chapter');

        $this->db->where('auditquality_policy.ID_subject', $ID_subject);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_policy_nb_page($ID_subject)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_policy');
        $this->db->join('auditquality_subjects', 'auditquality_subjects.ID_subject = auditquality_policy.ID_subject');
        $this->db->join('auditquality_chapters', 'auditquality_chapters.ID_chapter = auditquality_policy.ID_chapter');

        $this->db->where('auditquality_policy.ID_subject', $ID_subject);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************************************************************/
    /***************************************************************************/
    /************************** End policy *************************************/
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

    /********************************policy******************************/
    function get_policy_by_policy($ID_policy)
    {
        $this->db->select('*');
        $this->db->from('auditquality_policy');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_policy.ID_company');

        $this->db->where('auditquality_policy.ID_policy', $ID_policy);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_policy_by_chapter($ID_chapter)
    {
        $this->db->select('*');
        $this->db->from('auditquality_policy');
        //$this->db->join('auditquality_responses', 'auditquality_responses.ID_policy = auditquality_policy.ID_policy','left');
        //$this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat','left');

        $this->db->where('auditquality_policy.ID_chapter', $ID_chapter);
        $this->db->group_by('auditquality_policy.ID_policy');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_chapter_by_policy($ID_policy)
    {
        $this->db->select('*');
        $this->db->from('auditquality_policy');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_chapters.ID_company');

        $this->db->where('auditquality_policy.ID_policy', $ID_policy);

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
        $this->db->from('auditquality_policy');
        $this->db->join('auditquality_responses', 'auditquality_responses.ID_policy = auditquality_policy.ID_policy', 'left');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat', 'left');

        $this->db->where('auditquality_policy.ID_chapter', $ID_chapter);
        $this->db->group_by('auditquality_policy.ID_policy');

        $query = $this->db->get();
        return $query->result_array();
    }

    /* function get_response_by_ID($ID_response)
    {
        $this->db->select('*');
        $this->db->from('auditquality_responses');
        //$this->db->join('auditquality_responses', 'auditquality_responses.ID_policy = auditquality_policy.ID_policy','left');
        //$this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat','left');

        $this->db->where('auditquality_responses.ID_response', $ID_response);
        //$this->db->group_by('auditquality_policy.ID_policy');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_response_by_chapter_by_grid($ID_chapter, $ID_grid)
    {
        $this->db->select('*');
        $this->db->from('auditquality_policy');
        $this->db->join('auditquality_responses', 'auditquality_responses.ID_policy = auditquality_policy.ID_policy');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat', 'left');

        $this->db->where('auditquality_policy.ID_chapter', $ID_chapter);
        $this->db->where('auditquality_responses.ID_grid', $ID_grid);


        $this->db->group_by('auditquality_policy.ID_policy');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_response_by_chapter_by_grid_bysubject($ID_chapter, $ID_grid, $ID_subject)
    {
        $this->db->select('*');
        $this->db->from('auditquality_policy');
        $this->db->join('auditquality_responses', 'auditquality_responses.ID_policy = auditquality_policy.ID_policy');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_responses.ID_constat', 'left');
        //   $this->db->join('auditquality_responses', 'auditquality_responses.ID_policy = auditquality_policy.ID_policy');

        $this->db->where('auditquality_policy.ID_chapter', $ID_chapter);
        $this->db->where('auditquality_policy.ID_grid', $ID_grid);
        $this->db->where('auditquality_policy.ID_subject', $ID_subject);


        //
        $this->db->group_by('auditquality_policy.ID_policy');

        $query = $this->db->get();
        return $query->result_array();
    }*/

    function edit_read_policy()
    {

        $this->db->set('auditquality_employee.status_policy', 1);
        $this->db->where('auditquality_employee.ID_employee', $this->session->userdata('ID_employee'));
        if ($this->db->update('auditquality_employee')) {

            return true;
        } else {

            return false;
        }
    }



    /****************************Policy_axe****************************/
    function edit_policy_axe($data, $ID_policy_axe)
    {

        $this->db->where('auditquality_policy_axe.ID_policy_axe', $ID_policy_axe);
        if ($this->db->update('auditquality_policy_axe', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function add_policy_axe($data)
    {
        $this->db->insert('auditquality_policy_axe', $data);
        return    $this->db->insert_id();
    }

    function get_policy_axe_by_ID_Policy($ID_policy)
    {
        $this->db->select('*');
        $this->db->from('auditquality_policy_axe');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_policy.ID_company');

        $this->db->where('auditquality_policy_axe.ID_policy', $ID_policy);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_policy_axe_by_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_policy_axe');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_policy.ID_company');

        $this->db->where('auditquality_policy_axe.ID_company', $ID_company);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function delete_policy_axe($ID_policy_axe)
    {
        $this->db->where('ID_policy_axe', $ID_policy_axe);
        $this->db->delete('auditquality_policy_axe');
    }
}
