<?php
class Maudit_plan extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    /***************************************************************************/
    /***************************************************************************/
    /****************************** audit_plan *************************************/
    /***************************************************************************/
    /***************************************************************************/



    function get_audit_plan_by_responsable($ID_Responsable)
    {

        $this->db->select('*');
        $this->db->from('auditquality_intern_audit');
        $this->db->join('auditquality_survey', 'auditquality_survey.ID_audit = auditquality_intern_audit.ID_audit');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_intern_audit.ID_processus', 'left');
        $this->db->where('auditquality_processus.ID_Responsable =', $ID_Responsable);
        $this->db->group_by('auditquality_intern_audit.ID_audit');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_survey_list_by_survey_paging($ID_audit, $ID_responsable, $page)
    {

        $this->db->select('*');
        $this->db->from('auditquality_intern_audit');
        $this->db->join('auditquality_survey', 'auditquality_survey.ID_audit = auditquality_intern_audit.ID_audit');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_intern_audit.ID_processus', 'left');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_survey.ID_constat');
        $this->db->where('auditquality_processus.ID_Responsable =', $ID_responsable);
        $this->db->where('auditquality_survey.ID_audit =', $ID_audit);
        $this->db->group_by('auditquality_survey.ID_survey');


        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    function get_survey_list_by_survey_nb_page($ID_audit, $ID_responsable)
    {

        $this->db->select('count(*) nb');
        $this->db->from('auditquality_intern_audit');
             $this->db->join('auditquality_survey', 'auditquality_survey.ID_audit = auditquality_intern_audit.ID_audit');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_intern_audit.ID_processus');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_survey.ID_constat');
        $this->db->where('auditquality_processus.ID_Responsable =', $ID_responsable);
        $this->db->where('auditquality_intern_audit.ID_audit=', $ID_audit);
        
      //    $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_intern_audit.ID_department');
        //    $this->db->join('auditquality_audit_plan', 'auditquality_audit_plan.ID_audit_plan = auditquality_intern_audit.ID_audit_plan');
    
        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    function edit_survey($data, $ID_survey)
    {

        //$this->db->where('auditquality_survey.ID_audit', $ID_audit);
        $this->db->where('auditquality_survey.ID_survey', $ID_survey);

        if ($this->db->update('auditquality_survey', $data)) {

            return true;
        } else {

            return false;
        }
    }

    
    function get_action_type()
    {

        $this->db->select('*');
        $this->db->from('auditquality_action_type');
        $query = $this->db->get();
        return $query->result_array();
    }
}
