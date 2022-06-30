<?php
class Mrisk extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** risk *************************************/
    /***************************************************************************/
    /***************************************************************************/

    function add_risk($data)
    {
        $this->db->insert('auditquality_risk', $data);
        return    $this->db->insert_id();
    }

    function add_version($data)
    {
        $this->db->insert('auditquality_doc_version', $data);
        return    $this->db->insert_id();
    }

    /*function get_risk()
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk');
                $this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_risk = auditquality_risk.ID_risk');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk.ID_company');
        $query = $this->db->get();
        return $query->result_array();
    }*/

    function get_risk()
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_risk.ID_processus');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_responsable');
        //$this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_risk.ID_department');
        // $this->db->join('auditquality_process', 'auditquality_process.ID_process = auditquality_risk.ID_process');

        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_risk = auditquality_risk.ID_risk');

        //$this->db->where('auditquality_risk.Archive_status', 0);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_sector_by_eval($ID_risk)
    {
        $this->db->select('*');
        $this->db->from('auditquality_sector');
        // $this->db->join('auditquality_risk', 'auditquality_risk.ID_risk = auditquality_sector.ID_risk');
        //$this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_risk.ID_responsable');
        //$this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_risk.ID_department');

        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_risk = auditquality_risk.ID_risk');

        $this->db->where('ID_risk = ', $ID_risk);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_risk_paging($page, $ID_department)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk.ID_company');

        $this->db->from('auditquality_risk');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_risk.ID_type');
        $this->db->join('auditquality_process', 'auditquality_process.ID_process = auditquality_risk.ID_process');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_risk.ID_responsable');


        $this->db->where('auditquality_risk.ID_department', $ID_department);
        //$this->db->where('auditquality_risk.Archive_status', 0);

        $this->db->GROUP_by("auditquality_risk.ID_risk");

        // $this->db->where('auditquality_risk.ID_risk', $ID_risk);
        // $this->db->where('auditquality_risk.Createdby_risk', $this->session->userdata('ID_employee'));

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_risk_view_nb_page($ID_department)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk.ID_company');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_risk.ID_type');

        $this->db->from('auditquality_risk');
        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_version = auditquality_risk.Last_version_risk');
        $this->db->where('auditquality_risk.ID_department', $ID_department);
        //$this->db->where('auditquality_risk.Archive_status', 0);

        $this->db->GROUP_by("auditquality_risk.ID_risk");

        //  $this->db->where('auditquality_risk.ID_risk', $ID_risk);
        // $this->db->where('auditquality_risk.Createdby_risk', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_risk_view_paging($page, $ID_department)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk.ID_company');

        $this->db->from('auditquality_risk');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_risk.ID_type');

        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_version = auditquality_risk.Last_version_risk');
        $this->db->where('auditquality_risk.ID_department', $ID_department);
        //$this->db->where('auditquality_risk.Archive_status', 0);

        $this->db->GROUP_by("auditquality_risk.ID_risk");

        // $this->db->where('auditquality_risk.ID_risk', $ID_risk);
        // $this->db->where('auditquality_risk.Createdby_risk', $this->session->userdata('ID_employee'));

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_risk_nb_page($ID_department)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk.ID_company');

        $this->db->from('auditquality_risk');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_risk.ID_type');

        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_risk = auditquality_risk.ID_risk');
        $this->db->where('auditquality_risk.ID_department', $ID_department);
        //$this->db->where('auditquality_risk.Archive_status', 0);

        $this->db->GROUP_by("auditquality_risk.ID_risk");

        //  $this->db->where('auditquality_risk.ID_risk', $ID_risk);
        // $this->db->where('auditquality_risk.Createdby_risk', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_risk_by_ID($ID_risk)
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_risk.ID_processus', 'left');

        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_responsable', 'left');

        //$this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_risk.ID_type');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk.ID_company');
        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_risk = auditquality_risk.ID_risk');
        //$this->db->where('auditquality_risk.Archive_status', 0);

        $this->db->where('auditquality_risk.ID_risk', $ID_risk);

        // $this->db->order_by('ID_version', 'desc');


        $query = $this->db->get();
        return $query->result_array();
    }

    function get_eval_by_ID($ID_risk)
    {
        $this->db->select('*');
        $this->db->from('auditquality_risk');
        //$this->db->join('auditquality_sector', 'auditquality_sector.ID_sector = auditquality_risk.ID_sector');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_risk.ID_processus');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_responsable', 'left');
    //    $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_risk.ID_department', 'left');
 //       $this->db->join('auditquality_process', 'auditquality_process.ID_process = auditquality_risk.ID_process', 'left');
      //  $this->db->join('auditquality_field', 'auditquality_field.ID_field = auditquality_risk.ID_field', 'left');

        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk.ID_company');
        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_risk = auditquality_risk.ID_risk');
        //$this->db->where('auditquality_risk.Archive_status', 0);

        $this->db->where('auditquality_risk.ID_risk', $ID_risk);

        // $this->db->order_by('ID_version', 'desc');


        $query = $this->db->get();
        return $query->result_array();
    }

    function edit_risk($data, $ID_risk)
    {

        $this->db->where('auditquality_risk.ID_risk', $ID_risk);
        if ($this->db->update('auditquality_risk', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_risk($ID_risk)
    {
        $this->db->where('ID_risk', $ID_risk);
        $this->db->delete('auditquality_risk');
    }


    function get_risk_paging_by_type($page, $ID_risk)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk.ID_company');

        $this->db->from('auditquality_risk');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_risk.ID_type');

        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_risk = auditquality_risk.ID_risk');
        // $this->db->where('auditquality_risk.Archive_status', 0);

        $this->db->where('auditquality_risk.ID_risk', $ID_risk);
        //$this->db->where('auditquality_risk.Createdby_risk', $this->session->userdata('ID_employee'));

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_risk_nb_page_by_type($ID_risk)
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_risk.ID_company');

        $this->db->from('auditquality_risk');
        $this->db->join('auditquality_type', 'auditquality_type.ID_type = auditquality_risk.ID_type');

        //$this->db->join('auditquality_doc_version', 'auditquality_doc_version.ID_risk = auditquality_risk.ID_risk');
        //$this->db->where('auditquality_risk.Archive_status', 0);

        $this->db->where('auditquality_risk.ID_risk', $ID_risk);
        //$this->db->where('auditquality_risk.Createdby_risk', $this->session->userdata('ID_employee'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function get_all_processus()
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_responsable', 'left');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_field()
    {
        $this->db->select('*');
        $this->db->from('auditquality_field');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_employees()
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_department()
    {
        $this->db->select('*');
        $this->db->from('auditquality_department');
        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************Type********************************/
    function get_type_risk()
    {
        $this->db->select('*');
        $this->db->from('auditquality_type');
        $query = $this->db->get();
        return $query->result_array();
    }
    /***************************Type********************************/

    /*function get_activity_identification_paging($page)
    {
        $this->db->select('*');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_activity_identification.ID_company');

        $this->db->from('auditquality_activity_identification');
        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_activity_identification_nb_page()
    {
        $this->db->select('count(*) nb');
        //$this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_activity_identification.ID_company');

        $this->db->from('auditquality_activity_identification');
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
*/


    /************************************ Sector ********************************/

    function add_sector($data)
    {
        $this->db->insert('auditquality_sector', $data);
        return    $this->db->insert_id();
    }

    function edit_sector($data, $ID_sector)
    {

        $this->db->where('auditquality_sector.ID_sector', $ID_sector);
        if ($this->db->update('auditquality_sector', $data)) {

            return true;
        } else {

            return false;
        }
    }
    function get_sector_by_ID($ID_sector)
    {
        $this->db->select('*');
        $this->db->from('auditquality_sector');
        $this->db->where('auditquality_sector.ID_sector', $ID_sector);

        $query = $this->db->get();
        return $query->result_array();
    }
    function delete_sector($ID_sector)
    {
        $this->db->where('ID_sector', $ID_sector);
        $this->db->delete('auditquality_sector');
    }

 

}
