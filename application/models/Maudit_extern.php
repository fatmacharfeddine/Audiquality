<?php
class Maudit_extern extends CI_Model {

    public function __constract()
    {
        $this->load->database();
    }


    public function add_organizations($data)
    {
        $this->db->insert('auditquality_organization',$data);
        return $this->db->insert_id();
    }
    public function add_survey($data)
    {
        $this->db->insert('auditquality_survey_extern',$data);
        return $this->db->insert_id();
    }
    public function add_audit_extern($data)
    {
        $this->db->insert('auditquality_extern_audit',$data);
        return $this->db->insert_id();
    }
    public function add_processus($data)
    {
        $this->db->insert('auditquality_processus',$data);
        return $this->db->insert_id();
    }
    public function select_processus()
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $query=$this->db->get();

        return $query->result_array();
    }
    public function select_employee()
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $query=$this->db->get();

        return $query->result_array();
    }
    public function select_constat()
    {
        $this->db->select('*');
        $this->db->from('auditquality_constat');
        //$this->db->join('auditquality_constat' ,'auditquality_constat.ID_constat=auditquality_survey_extern.ID_constat_extern');
        //$this->db->where('ID_constat', $ID_constat);
        $query=$this->db->get();

        return $query->result_array();
    }
    public function select_processus_byID($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->where('ID_processus', $ID_processus);

        $query=$this->db->get();

        return $query->result_array();
    }
    public function select_constat_byID($ID_constat)
    {
        $this->db->select('*');
        $this->db->from('auditquality_constat');
        $this->db->where('ID_constat', $ID_constat);

        $query=$this->db->get();

        return $query->result_array();
    }
    public function select_survey_byID($ID_audit_extern)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey_extern');
        $this->db->join('auditquality_constat' ,'auditquality_constat.ID_constat=auditquality_survey_extern.ID_constat_extern');
        $this->db->join('auditquality_processus' ,'auditquality_processus.ID_processus=auditquality_survey_extern.ID_processus');
        
        $this->db->where('ID_audit_extern', $ID_audit_extern);
        $this->db->join('auditquality_employee' ,'auditquality_employee.ID_employee=auditquality_processus.ID_Responsable');
        $this->db->order_by('auditquality_survey_extern.ID_processus','desc'); 


        $query=$this->db->get();

        return $query->result_array();
    }
    public function select_survey1_byID($ID_survey)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey_extern');
        $this->db->join('auditquality_constat' ,'auditquality_constat.ID_constat=auditquality_survey_extern.ID_constat_extern');
        $this->db->join('auditquality_processus' ,'auditquality_processus.ID_processus=auditquality_survey_extern.ID_processus');
        //$this->db->join('auditquality_processus' ,'auditquality_processus.ID_Responsable=auditquality_employee.ID_employee');
        $this->db->where('ID_survey', $ID_survey);

        $query=$this->db->get();

        return $query->result_array();
    }

    public function select_audit_plan_list()
    {
        $this->db->select('*');
        $this->db->from('auditquality_audit_plan_extern');

        $query=$this->db->get();

        return $query->result_array();
    }
    public function select_organizations()
    {
        $this->db->select('*');
        $this->db->from('auditquality_organization');

        $query=$this->db->get();

        return $query->result_array();
    }
    public function select_admin($ID_audit_plan_extern)
    {
        $this->db->select('*');
        $this->db->from('auditquality_extern_audit');
        $this->db->join('auditquality_processus' ,'auditquality_processus.ID_processus=auditquality_extern_audit.ID_processus_extern');
        $this->db->where('ID_audit_plan_extern', $ID_audit_plan_extern);
        $query=$this->db->get();

        return $query->result_array();
    }
    public function select_audit_extern()
    {
        $this->db->select('*');
        $this->db->from('auditquality_extern_audit');
        $this->db->join('auditquality_organization' ,'auditquality_organization.ID_organization=auditquality_extern_audit.ID_organization');
        //$this->db->where('ID_audit_plan_extern', $ID_audit_plan_extern);

        $query=$this->db->get();

        return $query->result_array();
    }
    public function select_audit()
    {
        $this->db->select('*');
        $this->db->from('auditquality_audit_plan_extern');
        $query=$this->db->get();

        return $query->result_array();
    }
    public function delete($ID_organization )
    {
        $this->db->where('ID_organization', $ID_organization );
        $this->db->delete('auditquality_organization');
    }
    function edit_audit($data,$ID_organization)
    {
        $this->db->set($data);
        $this->db->where('auditquality_organization.ID_organization', $ID_organization);
        $this->db->update('auditquality_organization', $data);
    }
    function edit_survey($data,$ID_survey)
    {
        $this->db->set($data);
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_survey_extern.ID_constat_extern');
        $this->db->where('auditquality_survey_extern.ID_survey', $ID_survey);
        $this->db->update('auditquality_survey_extern', $data);
    }
    public function select_audit_byID()
    {
        $this->db->select('*');
        $this->db->from('auditquality_organization');
        //$this->db->where('auditquality_organization.ID_organization', $ID_organization);
        $query=$this->db->get();

        return $query->result_array();
    }

    public function select_admin_byID($ID_audit_extern)
    {
        $this->db->select('*');
        $this->db->from('auditquality_extern_audit');
        //$this->db->join('auditquality_processus' ,'auditquality_processus.ID_processus=auditquality_extern_audit.ID_processus_extern');
        $this->db->where('auditquality_extern_audit.ID_audit_extern', $ID_audit_extern);

        $query=$this->db->get();

        return $query->result_array();
    }
    public function delete_survey($ID_survey)
    {
        $this->db->where('ID_survey', $ID_survey);
        $this->db->delete('auditquality_survey_extern');
    }
    
};

    ?>