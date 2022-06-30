<?php
class Maudit extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    /********* get liste referencial ********/
    function get_referencial()
    {
        $this->db->select('*');
        $this->db->from('auditquality_rerencial');
        $this->db->order_by('ID_rerencial', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    /******** get referencial by id ************/
    function get_refencial_by_ID($ID_rerencial)
    {
        $this->db->select('*');
        $this->db->from('auditquality_rerencial');
        $this->db->where('ID_rerencial =', $ID_rerencial);
        $query = $this->db->get();
        return $query->result_array();
    }
    /*********update referencial ********/
    function update_info_referencial($data, $id)
    {
        $this->db->where('ID_rerencial', $id);

        if ($this->db->update('auditquality_rerencial', $data)) {

            return true;
        } else {

            return false;
        }
    }
    /********* insert referencial ***********/

    function insert_referencial($data)
    {
        $this->db->insert('auditquality_rerencial', $data);
        return $this->db->insert_id();
    }
    /********delete referencial ********/
    function delete_referencial($id)
    {
        $this->db->where('ID_rerencial', $id);
        $this->db->delete('auditquality_rerencial');
    }
    /********* get liste plan d'audit ********/
    function get_audit_Plan()
    {
        $this->db->select('*');
        $this->db->from('auditquality_audit_plan');
        $this->db->order_by('ID_audit_plan', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    /********* insert Plan audit ***********/

    function insert_Plan($data)
    {
        $this->db->insert('auditquality_audit_plan', $data);
        return $this->db->insert_id();
    }
    /*******delete plan d'audit ******/
    function delete_Plan($id)
    {
        $this->db->where('ID_audit_plan', $id);
        $this->db->delete('auditquality_audit_plan');
    }
    //delete audit
    //delete processus
    function delete_audit_plan($id)
    {
        $this->db->where('ID_audit_plan', $id);
        $this->db->delete('auditquality_intern_audit');
    }
    /******** get plan d'audit by id ************/
    function get_plan_by_ID($ID_audit_plan)
    {
        $this->db->select('*');
        $this->db->from('auditquality_audit_plan');
        $this->db->where('ID_audit_plan =', $ID_audit_plan);
        $query = $this->db->get();
        return $query->result_array();
    }
    /******update plan d'audit *****/
    function update_info_plan($data, $id)
    {
        $this->db->where('ID_audit_plan', $id);

        if ($this->db->update('auditquality_audit_plan', $data)) {

            return true;
        } else {

            return false;
        }
    }

    /******get departement by id audit (by id plan) */
    function get_processus_audit($ID_audit_plan)
    {
        $this->db->select('*');
        $this->db->from('auditquality_intern_audit');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_intern_audit.ID_processus');
        $this->db->join('auditquality_audit_plan', 'auditquality_audit_plan.ID_audit_plan = auditquality_intern_audit.ID_audit_plan');
        $this->db->where('auditquality_intern_audit.ID_audit_plan =', $ID_audit_plan);
        $this->db->order_by('auditquality_intern_audit.ID_processus', 'ASC');
        $this->db->order_by('auditquality_intern_audit.planned_date_audit', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_processus_audit_list($ID_audit_plan)
    {
        $this->db->select('*');
        $this->db->from('auditquality_intern_audit');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_intern_audit.ID_processus');
        $this->db->join('auditquality_audit_plan', 'auditquality_audit_plan.ID_audit_plan = auditquality_intern_audit.ID_audit_plan');
        $this->db->where('auditquality_intern_audit.ID_audit_plan =', $ID_audit_plan);
        $this->db->group_by('auditquality_intern_audit.ID_processus');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_processus($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->where('auditquality_processus.ID_Responsable !=', $id);

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_referencial()
    {
        $this->db->select('*');
        $this->db->from('auditquality_rerencial');
        $query = $this->db->get();
        return $query->result_array();
    }
    /********add audit *****/
    function add_audit($data)
    {
        $this->db->insert('auditquality_intern_audit', $data);
        return    $this->db->insert_id();
    }
    /******list team ******/
    function get_team()
    {
        $this->db->select('*');
        $this->db->from('auditquality_team');
        $this->db->order_by('ID_team', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    /*******add Team *****/
    function insert_team($data)
    {
        $this->db->insert('auditquality_team', $data);
        return    $this->db->insert_id();
    }
    /******get team by id ******/
    function get_team_by_ID($ID_team)
    {
        $this->db->select('*');
        $this->db->from('auditquality_team');
        $this->db->where('ID_team =', $ID_team);
        $query = $this->db->get();
        return $query->result_array();
    }
    /*****update team ******/
    function update_info_team($data, $id)
    {
        $this->db->where('ID_team', $id);

        if ($this->db->update('auditquality_team', $data)) {

            return true;
        } else {

            return false;
        }
    }
    /******delete team *****/
    function delete_team($id)
    {
        $this->db->where('ID_team', $id);
        $this->db->delete('auditquality_team');
    }
    /*******add Team *****/
    function insert_actor($data)
    {
        $this->db->insert('auditquality_actor', $data);
        return    $this->db->insert_id();
    }

    /*****liste des employee *****/
    function get_all_employees()
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $query = $this->db->get();
        return $query->result_array();
    }
    /*******get list actor by id team *****/
    function get_Actor_by_IDTeam($ID_team)
    {
        $this->db->select('*');
        $this->db->from('auditquality_actor');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_actor.ID_employee');
        $this->db->join('auditquality_team', 'auditquality_team.ID_team = auditquality_actor.ID_team');
        $this->db->where('auditquality_actor.ID_team =', $ID_team);
        $query = $this->db->get();
        return $query->result_array();
    }
    /******delete actor *****/
    function delete_actor($id)
    {
        $this->db->where('ID_actor', $id);
        $this->db->delete('auditquality_actor');
    }

    /*****liste des employee non pas au liste actor*****/
    function get_Filter_employees($ID_team)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        // $this->db->join('auditquality_actor', 'auditquality_actor.ID_employee = auditquality_employee.ID_employee', 'left');
        $this->db->where('auditquality_employee.ID_employee NOT IN(SELECT auditquality_actor.ID_employee FROM auditquality_actor WHERE auditquality_actor.ID_team=' . $ID_team . ')');

        $query = $this->db->get();
        return $query->result_array();
    }
    /******get processus by id *******/
    function get_processus_by_ID($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_intern_audit', 'auditquality_processus.ID_audit = auditquality_intern_audit.ID_audit');
        $this->db->where('auditquality_processus.ID_processus =', $ID_processus);
        $query = $this->db->get();
        return $query->result_array();
    }
   
    /******get list processus ******/
    function get_processus()
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_intern_audit', 'auditquality_processus.ID_audit = auditquality_intern_audit.ID_audit');
        //  $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_intern_audit.ID_department');
        //$this->db->join('auditquality_rerencial', 'auditquality_rerencial.ID_rerencial = auditquality_intern_audit.ID_rerencial');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_processus_by_ID_audit($ID_audit/*, $ID_department*/)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_intern_audit', 'auditquality_processus.ID_audit = auditquality_intern_audit.ID_audit');
        $this->db->where('auditquality_processus.ID_audit =', $ID_audit);
        // $this->db->where('auditquality_processus.ID_department =', $ID_department);

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_audit_by_id($ID_audit)
    {
        $this->db->select('*');
        $this->db->from('auditquality_intern_audit');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_intern_audit.ID_processus', 'left');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_intern_audit.Auditeur', 'left');
        $this->db->join('auditquality_rerencial', 'auditquality_rerencial.ID_rerencial = auditquality_intern_audit.ID_rerencial', 'left');
        $this->db->where('auditquality_intern_audit.ID_audit =', $ID_audit);

        $query = $this->db->get();
        return $query->result_array();
    }
    /******get Title process by id process *****/
    function get_titreProcessus_by_id($ID_processus)
    {
        $this->db->select('Title_processus');
        $this->db->from('auditquality_processus');
        $this->db->where('auditquality_processus.ID_processus =', $ID_processus);

        $query = $this->db->get();
        return $query->result_array();
    }

    /******get info processus *****/
    function get_info_processus($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->where('ID_processus =', $ID_processus);
        $query = $this->db->get();
        return $query->result_array();
    }
    /****update processus *****/
    function update_info_processus($data, $id)
    {
        $this->db->where('auditquality_processus.ID_processus', $id);

        if ($this->db->update('auditquality_processus', $data)) {

            return true;
        } else {

            return false;
        }
    }
    /******afficher checklist from survey by id process******/
    function get_check_survey($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey');
        
        $this->db->where('auditquality_intern_audit.ID_processus =', $ID_processus);
        $this->db->where('auditquality_survey.ID_constat = 0');

        $this->db->order_by('ID_survey', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    /********************get check list survey for mission*****/
    function get_check_surveyMission($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey');
        //   $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_survey.ID_constat');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_intern_audit.ID_processus');
        
        $this->db->join('auditquality_constat', 'auditquality_survey.ID_constat = auditquality_constat.ID_constat', 'left');

        $this->db->where('auditquality_intern_audit.ID_processus =', $ID_processus);
        //  $this->db->where('auditquality_survey.ID_constat = 0');
        $this->db->order_by('ID_survey', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }
    /*****pagging*****/
    function get_check_surveyMission_paging($ID_processus, $page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey');
        //   $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_survey.ID_constat');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_intern_audit.ID_processus');
        $this->db->join('auditquality_constat', 'auditquality_survey.ID_constat = auditquality_constat.ID_constat', 'left');

        $this->db->where('auditquality_intern_audit.ID_processus =', $ID_processus);
        //  $this->db->where('auditquality_survey.ID_constat = 0');
        $this->db->order_by('ID_survey', 'DESC');

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    /*****nb page****/
    function get_check_surveyMission_nb_page($ID_processus)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_survey');
        //   $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_survey.ID_constat');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_intern_audit.ID_processus');
        $this->db->join('auditquality_constat', 'auditquality_survey.ID_constat = auditquality_constat.ID_constat', 'left');

        $this->db->where('auditquality_intern_audit.ID_processus =', $ID_processus);
        //  $this->db->where('auditquality_survey.ID_constat = 0');
        $this->db->order_by('ID_survey', 'DESC');


        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }

    /*****get list constat ******/
    function get_constat()
    {
        $this->db->select('*');
        $this->db->from('auditquality_constat');
        $query = $this->db->get();
        return $query->result_array();
    }

    /****get id processus by id survey pour loader view mission *****/
    function get_IDProcessus($ID_survey)
    {
        $this->db->select('ID_processus');
        $this->db->from('auditquality_survey');
        $this->db->where('auditquality_survey.ID_survey =', $ID_survey);
        $query = $this->db->get();
        return $query->result_array();
    }
    /*****update info audit (generate) *****/
    function update_info_audit($data, $id)
    {
        $this->db->where('auditquality_intern_audit.ID_audit', $id);

        if ($this->db->update('auditquality_intern_audit', $data)) {

            return true;
        } else {

            return false;
        }
    }

    /*********non-conformité majeure id=1 *******/
    function get_majeure($ID_audit)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_survey');
        $this->db->where('auditquality_survey.ID_constat =', 1);
        $this->db->where('auditquality_survey.ID_audit =', $ID_audit);
        $query = $this->db->get();
        return floor($query->result_array()[0]['nb']);
    }
    /*********non-conformité mineure id=2 *******/
    function get_mineure($ID_audit)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_survey');
        $this->db->where('auditquality_survey.ID_constat =', 2);
        $this->db->where('auditquality_survey.ID_audit =', $ID_audit);
        $query = $this->db->get();
        return floor($query->result_array()[0]['nb']);
    }
    /*********opportunité d'amélioration id=3 *******/
    function get_amelioration($ID_audit)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_survey');
        $this->db->where('auditquality_survey.ID_constat =', 3);
        $this->db->where('auditquality_survey.ID_audit =', $ID_audit);
        $query = $this->db->get();
        return floor($query->result_array()[0]['nb']);
    }
    /*****update audit *******/
    function update_audit($data, $id)
    {
        $this->db->where('auditquality_intern_audit.ID_audit', $id);

        if ($this->db->update('auditquality_intern_audit', $data)) {

            return true;
        } else {

            return false;
        }
    }
    /**********delete audit ********/
    //delete processus
    function delete_aud_process($id)
    {
        $this->db->where('ID_audit', $id);
        $this->db->delete('auditquality_processus');
    }
    //delete survey
    function delete_aud_survey($id)
    {
        $this->db->where('ID_audit', $id);
        $this->db->delete('auditquality_survey');
    }
    //delete audit
    function delete_audit($id)
    {
        $this->db->where('ID_audit', $id);
        $this->db->delete('auditquality_intern_audit');
    }
    /****get liste processus by idaudit/iddepartement/date planned audit******/
    function get_list_processus($ID_audit/*,$ID_department,$planned_date_audit*/)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_intern_audit', 'auditquality_processus.ID_audit = auditquality_intern_audit.ID_audit');
        $this->db->where('auditquality_processus.ID_audit =', $ID_audit);
        //   $this->db->where('auditquality_processus.ID_department =', $ID_department);
        //   $this->db->where('auditquality_processus.ID_audit in (SELECT auditquality_intern_audit.ID_audit FROM auditquality_intern_audit WHERE auditquality_intern_audit.planned_date_audit=' . $planned_date_audit . ')');

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    /**********view report ******/
    function get_report($ID_audit)
    {
        $this->db->select('*');
        $this->db->from('auditquality_intern_audit');
        //    $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_intern_audit.ID_department');
        //    $this->db->join('auditquality_audit_plan', 'auditquality_audit_plan.ID_audit_plan = auditquality_intern_audit.ID_audit_plan');
        $this->db->join('auditquality_survey', 'auditquality_survey.ID_audit = auditquality_intern_audit.ID_audit');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_intern_audit.ID_processus');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_survey.ID_constat');
        $this->db->where('auditquality_intern_audit.ID_audit =', $ID_audit);
        $query = $this->db->get();
        return $query->result_array();
    }
    /***********get audit by id (view report) ******/
    function get_audit_by_idReport($ID_audit)
    {
        $this->db->select('*');
        $this->db->from('auditquality_intern_audit');
        $this->db->join('auditquality_survey', 'auditquality_survey.ID_audit = auditquality_intern_audit.ID_audit');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_intern_audit.ID_department');
        $this->db->join('auditquality_rerencial', 'auditquality_rerencial.ID_rerencial = auditquality_intern_audit.ID_rerencial');
        $this->db->join('auditquality_team', 'auditquality_team.ID_team = auditquality_intern_audit.ID_team');
        $this->db->where('auditquality_intern_audit.ID_audit =', $ID_audit);

        $query = $this->db->get();
        return $query->result_array();
    }

    /**********get processus by departement *****/
    function get_processus_departement($ID_department, $ID_audit)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_processus.ID_department', 'left');
        //$this->db->join('auditquality_Ligne_processus', 'auditquality_Ligne_processus.ID_processus = auditquality_processus.ID_processus', 'left');

        $this->db->where('auditquality_processus.ID_processus NOT IN (SELECT auditquality_Ligne_processus.ID_processus FROM auditquality_Ligne_processus where auditquality_Ligne_processus.ID_audit =' . $ID_audit . ')');
        $this->db->where('auditquality_processus.ID_department', $ID_department);

        $query = $this->db->get();
        return $query->result_array();
    }

    /****************paging ligne processus****************/
    function get_Ligne_Processus_paging($ID_audit, $page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_Ligne_processus');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_Ligne_processus.ID_processus', 'left');
        // $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_Ligne_processus.ID_Responsable','left');
        $this->db->where('auditquality_Ligne_processus.ID_audit', $ID_audit);

        $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_Ligne_Processus_nb_page($ID_audit)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_Ligne_processus');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_Ligne_processus.ID_processus', 'left');
        //    $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_Ligne_processus.ID_Responsable','left');
        $this->db->where('auditquality_Ligne_processus.ID_audit', $ID_audit);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    /****************End paging ligne processus****************/

    /*****insert ligne processus *****/
    function add_Ligne_processus($data)
    {
        $this->db->insert('auditquality_Ligne_processus', $data);
        return $this->db->insert_id();
    }
    /******delete ligne processus *****/

    function Delete_Ligne_processus($ID_Ligne_processus)
    {
        $this->db->where('ID_Ligne_processus', $ID_Ligne_processus);
        $this->db->delete('auditquality_Ligne_processus');
    }
    /*****inser openning meeting */
    function insert_ouverture($data)
    {
        $this->db->insert('auditquality_survey', $data);
        return $this->db->insert_id();
    }
    /*******get title ouverture by id audit ****/
    function get_title_ouverture($ID_audit)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey');
        $this->db->where('auditquality_survey.ID_audit', $ID_audit);
        $this->db->where('auditquality_intern_audit.ID_processus=', 0);

        $query = $this->db->get();
        return $query->result_array();
    }
    /*******get title cloture by id audit ****/
    function get_title_cloture($ID_audit)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey');
        $this->db->where('auditquality_survey.ID_audit', $ID_audit);
        $this->db->where('auditquality_intern_audit.ID_processus=', -1);

        $query = $this->db->get();
        return $query->result_array();
    }
    /****get all ajout etape ****/

    function get_All_etape($ID_audit)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey');
        $this->db->join('auditquality_intern_audit', 'auditquality_intern_audit.ID_audit = auditquality_survey.ID_audit');

        $this->db->join('auditquality_ligne_processus', 'auditquality_ligne_processus.ID_processus = auditquality_intern_audit.ID_processus', 'left');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_ligne_processus.ID_processus', 'left');
        $this->db->where('auditquality_survey.ID_audit', $ID_audit);
        $this->db->where('auditquality_intern_audit.ID_processus!=', -1);
        $this->db->where('auditquality_intern_audit.ID_processus!=', 0);

        $query = $this->db->get();
        return $query->result_array();
    }
    /*******get processus by departement ******/
    function get_processus_by_departement($ID_department, $ID_audit)
    {
        $this->db->select('*');
        $this->db->from('auditquality_ligne_processus');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_ligne_processus.ID_department', 'left');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_ligne_processus.ID_processus', 'left');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable', 'left');
        $this->db->where('auditquality_ligne_processus.ID_department', $ID_department);
        $this->db->where('auditquality_ligne_processus.ID_audit', $ID_audit);
        $this->db->where('auditquality_ligne_processus.ID_processus NOT IN(SELECT auditquality_intern_audit.ID_processus FROM auditquality_survey WHERE auditquality_survey.ID_audit=' . $ID_audit . ')');

        $query = $this->db->get();
        return $query->result_array();
    }

    /****update steps ouverture & cloture *****/
    function update_steps($data, $id)
    {
        $this->db->where('auditquality_survey.ID_Steps', $id);

        if ($this->db->update('auditquality_survey', $data)) {

            return true;
        } else {

            return false;
        }
    }
    /****get date by steps ouverture & cloture *****/
    function get_date_steps($ID_Steps)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey');
        $this->db->where('auditquality_survey.ID_Steps', $ID_Steps);
        $query = $this->db->get();
        return $query->result_array();
    }
    /*****delete steps ****/
    function delete_Step($ID_Steps)
    {
        $this->db->where('ID_Steps', $ID_Steps);
        $this->db->delete('auditquality_survey');
    }
    /****get info step */
    function get_steps_etape($ID_Steps)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey');
        $this->db->join('auditquality_ligne_processus', 'auditquality_ligne_processus.ID_processus = auditquality_intern_audit.ID_processus', 'left');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_ligne_processus.ID_processus', 'left');

        $this->db->where('auditquality_survey.ID_Steps', $ID_Steps);

        $query = $this->db->get();
        return $query->result_array();
    }
    /****get cheeklist by id steps */
    function get_checklist($ID_Steps)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey');
        $this->db->where('auditquality_survey.ID_Steps', $ID_Steps);

        $query = $this->db->get();
        return $query->result_array();
    }
    /******insert checklist survey ********/
    function insert_check_survey($data)
    {
        $this->db->insert('auditquality_survey', $data);
        return $this->db->insert_id();
    }
    /******delete checklist *****/

    function delete_checklist($ID_survey)
    {
        $this->db->where('ID_survey', $ID_survey);
        $this->db->delete('auditquality_survey');
    }
    /*****mission******/
    function get_cheeklist_mission($ID_audit)
    {
        $this->db->select('*');

        $this->db->from('auditquality_intern_audit');
        $this->db->join('auditquality_survey', 'auditquality_survey.ID_audit = auditquality_intern_audit.ID_audit');
 
        //$this->db->from('auditquality_survey');
      //  $this->db->join('auditquality_intern_audit', 'auditquality_intern_audit.ID_audit = auditquality_survey.ID_audit', 'left');
        $this->db->join('auditquality_ligne_processus', 'auditquality_ligne_processus.ID_processus = auditquality_intern_audit.ID_processus', 'left');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_ligne_processus.ID_processus', 'left');
        //  $this->db->join('auditquality_survey', 'auditquality_survey.ID_Steps = auditquality_survey.ID_Steps');
        //  $this->db->join('auditquality_constat', 'auditquality_survey.ID_constat = auditquality_constat.ID_constat', 'left');
        $this->db->where('auditquality_intern_audit.ID_processus!=', -1);
        $this->db->where('auditquality_intern_audit.ID_processus!=', 0);
        $this->db->where('auditquality_intern_audit.ID_audit=', $ID_audit);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_cheeklist_mission_step2($ID_audit)
    {

 

        $this->db->select('*');
       $this->db->from('auditquality_intern_audit');
        $this->db->join('auditquality_survey', 'auditquality_survey.ID_audit = auditquality_intern_audit.ID_audit');
 
 
        $this->db->join('auditquality_ligne_processus', 'auditquality_ligne_processus.ID_processus = auditquality_intern_audit.ID_processus', 'left');
        $this->db->join('auditquality_processus', 'auditquality_processus.ID_processus = auditquality_ligne_processus.ID_processus');
       // $this->db->join('auditquality_survey', 'auditquality_survey.ID_Steps = auditquality_survey.ID_Steps');
       $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_survey.ID_constat');
       $this->db->where('auditquality_intern_audit.ID_processus!=', -1);
        $this->db->where('auditquality_intern_audit.ID_processus!=', 0);
        $this->db->where('auditquality_intern_audit.ID_audit=', $ID_audit);
        $this->db->where('auditquality_survey.ID_constat != ', 0);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    /****update survey *****/
    function update_info_survey($data, $id)
    {
        $this->db->where('auditquality_survey.ID_survey', $id);

        if ($this->db->update('auditquality_survey', $data)) {

            return true;
        } else {

            return false;
        }
    }
    function insert_survey($data)
    {
        $this->db->insert('auditquality_survey', $data);
        return $this->db->insert_id();
    }
    /*****get list processus *****/
    function get_list_processusdep()
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        //   $this->db->join('auditquality_department', 'auditquality_processus.ID_department = auditquality_department.ID_department');
        $this->db->join('auditquality_employee', 'auditquality_processus.ID_Responsable = auditquality_employee.ID_employee');

        $query = $this->db->get();
        return $query->result_array();
    }
    /********delete processus *******/
    function delete_processus($id2)
    {
        $this->db->where('ID_processus', $id2);
        $this->db->delete('auditquality_processus');
    }
    /*****insert processus *****/
    function insert_processus($data)
    {
        $this->db->insert('auditquality_processus', $data);
        return $this->db->insert_id();
    }
    /*******get constat by audit ******/
    function get_constat_by_id($ID_audit)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey');
        //  $this->db->join('auditquality_intern_audit', 'auditquality_survey.ID_audit = auditquality_intern_audit.ID_audit');
        // $this->db->join('auditquality_processus', 'auditquality_intern_audit.ID_processus = auditquality_processus.ID_processus');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_survey.ID_constat', 'left');
        $this->db->where('auditquality_survey.ID_audit =', $ID_audit);
        $query = $this->db->get();
        return $query->result_array();
    }
    /******insert constat *****/
    function insert_constat($data)
    {
        $this->db->insert('auditquality_survey', $data);
        return $this->db->insert_id();
    }
    /****update constat *****/
    function update_constat($data, $id)
    {
        $this->db->where('auditquality_survey.ID_survey', $id);

        if ($this->db->update('auditquality_survey', $data)) {

            return true;
        } else {

            return false;
        }
    }
    /*****get constat by id *****/
    function get_constat_by_idSurvey($ID_survey)
    {
        $this->db->select('*');
        $this->db->from('auditquality_survey');
        $this->db->join('auditquality_constat', 'auditquality_constat.ID_constat = auditquality_survey.ID_constat', 'left');
        $this->db->where('auditquality_survey.ID_survey =', $ID_survey);
        $query = $this->db->get();
        return $query->result_array();
    }
    /****delete constat *****/
    function delete_constat($id)
    {
        $this->db->where('ID_survey', $id);
        $this->db->delete('auditquality_survey');
    }
}
