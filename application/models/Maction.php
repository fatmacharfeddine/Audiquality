<?php
class Maction extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** action *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_action($data)
    {
        $this->db->insert('auditquality_action', $data);
        return    $this->db->insert_id();
    }

    function add_version($data)
    {
        $this->db->insert('auditquality_doc_version', $data);
        return    $this->db->insert_id();
    }

    /*function get_action()
    {
        $this->db->select('*');
        $this->db->from('auditquality_action');
                $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_action = auditquality_action.ID_action');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_action.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }*/

    function get_action()
    {
        $this->db->select('*');
        $this->db->from('auditquality_action');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_action.ID_type');

        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_action = auditquality_action.ID_action');

        //$this->db->where('auditquality_action.Archive_status', 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_action_paging($page, $ID_risk)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_action.ID_company');

        $this->db->from('auditquality_action');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_action.ID_type');
        $this->db->where('auditquality_action.ID_risk', $ID_risk);
        //$this->db->where('auditquality_action.Archive_status', 0);

        $this->db->GROUP_by("auditquality_action.ID_action");

        // $this->db->where('auditquality_action.ID_action', $ID_action);
        // $this->db->where('auditquality_action.Createdby_action', $this->session->userdata('ID_employee'));

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_action_view_nb_page($ID_risk)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_action.ID_company');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_action.ID_type');

        $this->db->from('auditquality_action');
        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_version = auditquality_action.Last_version_action');
        $this->db->where('auditquality_action.ID_risk', $ID_risk);
        //$this->db->where('auditquality_action.Archive_status', 0);

        $this->db->GROUP_by("auditquality_action.ID_action");

        //  $this->db->where('auditquality_action.ID_action', $ID_action);
        // $this->db->where('auditquality_action.Createdby_action', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_action_view_paging($page, $ID_risk)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_action.ID_company');

        $this->db->from('auditquality_action');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_action.ID_type');

        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_version = auditquality_action.Last_version_action');
        $this->db->where('auditquality_action.ID_risk', $ID_risk);
        //$this->db->where('auditquality_action.Archive_status', 0);

        $this->db->GROUP_by("auditquality_action.ID_action");

        // $this->db->where('auditquality_action.ID_action', $ID_action);
        // $this->db->where('auditquality_action.Createdby_action', $this->session->userdata('ID_employee'));

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_action_nb_page($ID_risk)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_action.ID_company');

        $this->db->from('auditquality_action');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_action.ID_type');

        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_action = auditquality_action.ID_action');
        $this->db->where('auditquality_action.ID_risk', $ID_risk);
        //$this->db->where('auditquality_action.Archive_status', 0);

        $this->db->GROUP_by("auditquality_action.ID_action");

        //  $this->db->where('auditquality_action.ID_action', $ID_action);
        // $this->db->where('auditquality_action.Createdby_action', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_action_by_ID($ID_action)
    {
        $this->db->select('*');
        $this->db->from('auditquality_action');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_action.ID_type');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_action.ID_company');
        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_action = auditquality_action.ID_action');
        //$this->db->where('auditquality_action.Archive_status', 0);

        $this->db->where('auditquality_action.ID_action', $ID_action);

       // $this->db->order_by('ID_version', 'desc');


        $query = $this->db->get();
        return $query->result_array();
    }
    function edit_action($data, $ID_action)
    {

        $this->db->where('auditquality_action.ID_action', $ID_action);
        if ($this->db->update('auditquality_action', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_action($ID_action)
    {
        $this->db->where('ID_action', $ID_action);
        $this->db->delete('auditquality_action');
    }


    function get_action_paging_by_type($page, $ID_action)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_action.ID_company');

        $this->db->from('auditquality_action');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_action.ID_type');

        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_action = auditquality_action.ID_action');
        // $this->db->where('auditquality_action.Archive_status', 0);

        $this->db->where('auditquality_action.ID_action', $ID_action);
        //$this->db->where('auditquality_action.Createdby_action', $this->session->userdata('ID_employee'));

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_action_nb_page_by_type($ID_action)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_action.ID_company');

        $this->db->from('auditquality_action');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_action.ID_type');

        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_action = auditquality_action.ID_action');
        //$this->db->where('auditquality_action.Archive_status', 0);

        $this->db->where('auditquality_action.ID_action', $ID_action);
        //$this->db->where('auditquality_action.Createdby_action', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /***************************Type********************************/
    function get_type_action()
    {
        $this->db->select('*');
        $this->db->from('auditquality_type');
        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************Type********************************/

}
