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



    function get_audit_plan_by_responsable($ID_responsable)
    {

        $this->db->select('*');
        $this->db->from('auditquality_intern_audit');
        //    $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_intern_audit.ID_department');
        //    $this->db->join('auditquality_audit_plan', 'auditquality_audit_plan.ID_audit_plan = auditquality_intern_audit.ID_audit_plan');
        $this->db->join('auditquality_survey', 'auditquality_survey.ID_audit = auditquality_intern_audit.ID_audit');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_survey.ID_processus');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_survey.ID_constat');
        $this->db->where('auditquality_survey.ID_responsable =', $ID_responsable);
        $query = $this->db->get();
        return $query->result_array();
    }
}
